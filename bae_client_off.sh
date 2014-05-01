#!/bin/bash

client_version="1"
baeurl='http://newcode.bae.baidu.com'
logfile='./bae.log'
username=''
password=''


check_version() {
		local tmpfile=$(mktemp)
		wget -q -O $tmpfile http://baesdk.bae.baidu.com/bae_client_off.sh	
		wget_resu=$?
		if [ 0 -ne $wget_resu ]; then
				echo 'can not get bae_client_off.sh from server ERRNO:'$wget_resu
				rm $tmpfile
				exit
		fi
		#echo "get bae_client_off.sh to $tmpfile"	

		new_md5=$(md5sum $tmpfile|awk '{print $1}')
		now_md5=$(md5sum $0|awk '{print $1}')
		if [ "$new_md5" != "$now_md5" ]; then
				#echo "not equal"
				echo "new md5 is:"$new_md5
				echo "now md5 is:"$now_md5
				cp $tmpfile $0
				echo "update bae_client_off.sh success! please rerun the script"
				rm $tmpfile
				exit
		fi
		rm $tmpfile
}
check_version




get_base_url()
{
		local result=$(curl  "$baeurl/services/codeaction.php?action=appbaseurl&appid=$1&version=$2&auth=$3" -d "username=$username&password=$password"  2>>$logfile)
        echo $result >/dev/tty
		local url=$(echo $result | cut -d'"' -f2)
		echo ${url//'\/'/'/'}
}
get_sys_encode(){
    local ans=""
    ans=`locale | awk -F. ' /LANG=zh_CN\./{ans = $2} END{print ans}'`
    [ -z $ans ] && \
    ans=`locale | awk -F. ' /LANG=en_US\./{ans = $2} END{print ans}'`
	if [ -z $ans ]
	then
		ans="gbk"
	fi
	echo $(echo $ans | tr '[A-Z]' '[a-z]')
}

# $1 appid
# $2 version
# $3 auth
get_upload_sign() {
		local result=$(curl "$baeurl/services/codeaction.php?action=getUploadSign&appid=$1&version=$2&auth=$3" -d "username=$username&password=$password" 2>>$logfile)
		sysenc=$(get_sys_encode)
		#echo $result | perl -pe 'use Encode; sub u2g {return encode("gbk", chr(hex($_[0])))} s/\\u([0-9a-f]{4})/u2g($1)/eg' >/dev/tty 
		echo "sysenc is ${sysenc}" > /dev/tty
		case $sysenc in 
			"utf-8") echo $result | perl -pe 'use Encode; sub u2g {return encode("utf-8", chr(hex($_[0])))} s/\\u([0-9a-f]{4})/u2g($1)/eg' >/dev/tty ;;
			"utf8") echo $result | perl -pe 'use Encode; sub u2g {return encode("utf-8", chr(hex($_[0])))} s/\\u([0-9a-f]{4})/u2g($1)/eg' >/dev/tty ;;
			"gbk") echo $result | perl -pe 'use Encode; sub u2g {return encode("gbk", chr(hex($_[0])))} s/\\u([0-9a-f]{4})/u2g($1)/eg' >/dev/tty;;
		esac
		local url=$(echo $result | cut -d'"' -f8)
		echo ${url//'\/'/'/'}
}

upload_to_bs() {
		echo "begin upload app code to bs"
        local cmd="curl -v -T \"$1\" \"$2\" 2>&1"
        local result_org=$(eval $cmd )
        local result=$( echo $result_org | grep '< HTTP' | grep -o '200 OK')
		if [[ -z "$result" || "$result" != "200 OK" ]]; then
                echo $result_org > /dev/tty
				echo "upload failed."
				exit 1
		fi
		echo "upload to bs success"
}

# $1 appid
# $2 version
# $3 auth
ack_upload_result() {
		echo "ack_upload_result, appid($1), version($2), auth($3)";
		for i in `seq 1 3`;
		do
				local result_raw=$(curl "$baeurl/services/codeaction.php?action=upload&appid=$1&version=$2&auth=$3" -d "username=$username&password=$password" -w " "%{http_code} 2>>$logfile);
				echo $result_raw
				local result=$(echo $result_raw|awk '{x = 1; while(x < NF) {print $x; x++; }}')
				local http_code=$(echo $result_raw|awk '{print $NF}')
				local retcode=$(echo $result | cut -d'"' -f4);
				local errmsg=$(echo $result | cut -d'"' -f8);
				if [[ -z "$retcode" || 0 -ne "$retcode" ]]; then
						echo "ack_upload_result failed, result http_code:$http_code, errmsg:$errmsg";

						if [[ $i -eq 3 ]]; then
								echo "retry failed"
								echo "ack_upload_result failed"
								exit 1
						fi

						echo "retry after 3 seconds"
						sleep 3
				else
						echo "ack_upload_result success"
						return
				fi
		done
}

upload() {
		if [[ -z "$1" ]]; then
				echo "appdir not specified";
				exit 1;
		fi
		echo "begin upload app code(appdir:$1)"
		#parse bae.conf
		local conf="$1/bae.conf"
		if [ -e "$conf" ]; then
				echo "using $conf";
		else
				echo "can't find $conf";
				exit 1;
		fi

		dos2unix $conf

		#extract appid
		local appid=$(grep "^appid" $conf | awk -F':' '{print $2}')
		#extract version
		local version=$(grep "^version" $conf | awk -F':' '{print $2}')
		local auth=$(grep "^auth" $conf | awk -F':' '{print $2}')
		if [[ -z "$appid" || -z "$version" || -z "$auth" ]]; then
				echo "extract appid or version or auth error";
				exit 1;
		fi
		echo "appid:$appid, version:$version, auth:$auth"
		baeurl=$(get_base_url $appid $version $auth)
		#baeurl="http://an.bae.baidu.com:8080"
		echo "baeurl" $baeurl
		#get upload signature
		bsurl=$(get_upload_sign $appid $version $auth)
		echo "bsurl" $bsurl
		if [[ -z "$bsurl" || "${bsurl:0:4}" != "http" ]]; then
				echo "get upload signature error"
				exit 1
		fi

		#compress app code
		local tmpfile=$(mktemp)
		local tmpdir=$(mktemp -d)
		cd $1
		rsync -t -l --delete --recursive --exclude=".*" --exclude="*~"--exclude=CVS --exclude=output --exclude=bae_client.sh --exclude=bae_client_off.sh --exclude=bae.log . $tmpdir
		cd -
		cd $tmpdir
		tar czvf $tmpfile .
		cd -

		#upload app code to bs
		upload_to_bs $tmpfile $bsurl
		ack_upload_result  $appid $version $auth

		#delete tar
		rm -f $tmpfile &> /dev/null
		rm -rf $tmpdir &> /dev/null
}

# $1 appid
# $2 version
get_download_sign() {
		local result=$(curl "$baeurl/services/codeaction.php?action=download&appid=$1&version=$2" -d "username=$username&password=$password" -v 2>&1 | grep "Location:" | cut -d' ' -f3);
		echo $result
}

# $1 bsurl
# $2 file
download_from_bs() {
		wget  $1 -O $2 2>>$logfile
		local result=$(file $2 | grep -o gzip);
		if [[ "$result" != "gzip" ]]; then
                echo $result > /dev/tty
				echo "download from bs error";
				rm -f $2 &> /dev/null
				exit 1;
		fi	
		echo "download success"
}

# $1 appid
# $2 version
# $3 file
download() {
		if [[ -z "$1" || -z "$2" ]]; then
				echo "bad download parameter, invalid appid or version";
				exit 1;
		fi
		local filename=$3
		filename=${filename%.tar.gz}
		filename=${filename%.tgz}
		if [[ -z "$filename" ]]; then
				echo "bad download parameter, invalid file name";
				exit 1;
		fi
		filename="${filename}.tar.gz"
		echo "begin download app code(appid:$1, version:$2, localfile:$filename) ......"
		local bsurl=$(get_download_sign $1 $2)
		if [[ -z "$bsurl" || "${bsurl:0:4}" != "http" ]]; then
				echo "get download signature error"
				exit 1
		fi
		download_from_bs $bsurl $filename
}

# $1 script name
usage() {
		echo "usage:
		$1 [-u username] [-p password] upload|download args...
		$1 [-u username] [-p password] upload appdir
		$1 [-u username] [-p password] download appid version filename"
}

#check env
if [[ ! -e "$(which curl)" ]]; then
		echo "curl not installed"
		exit 1
fi
if [[ ! -e "$(which rsync)" ]]; then
		echo "rsync not installed"
		exit 1
fi
if [[ ! -e "$(which wget)" ]]; then
		echo "wget not installed"
		exit 1
fi
if [[ ! -e "$(which dos2unix)" ]]; then
		echo "dos2unix not installed"
		exit 1
fi
if [[ ! -e "$(which perl)" ]]; then
		echo "perl not installed"
		exit 1
fi
# assume all other commands installed

# parse options
myname=$0

while getopts u:p: o
do  
		case "$o" in 
				u)  username="$OPTARG";;
				p)  password="$OPTARG";;
		esac    
done
shift $(($OPTIND-1))

action=$1
appdir=$2
appid=$2
version=$3
filename=$4
if [[ -z "$action" ]]; then
		usage $myname
		exit 1
fi
case "C$action" in
		"Cupload")
		if [[ -z "$appdir" || ! -d "$appdir" ]]; then
				echo "bad appdir"
				usage $myname
				exit 1
		fi
		;;
		"Cdownload")
		if [[ -z "$appid" || -z "$version" ]]; then
				echo "bad appid or version"
				usage $myname
				exit 1
		fi
		if [[ -z "$filename" ]]; then
				filename="$appid_$version.tar.gz"
		fi
		;;
		*)
		usage $myname
		exit 1
		;;
esac


# check login state
if [[ -z "$username" ]]; then
		echo -n "username>"
		read username
fi
if [[ -z "$password" ]]; then
		echo -n "password>"
		stty -echo
		read password
		stty echo
		echo ""
fi
password=$(echo -n "$password" | perl -p -e 's/([^A-Za-z0-9])/sprintf("%%%02X", ord($1))/seg')
#uuap_login $username $password

# recheck login state
case "C$action" in
		"Cupload")
		upload $appdir
		;;
		"Cdownload")
		download $appid $version $filename
		;;
esac

