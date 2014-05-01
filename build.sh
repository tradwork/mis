#!/bin/bash
#please modify this script adapting to your module!

#source file folder NEED CHANGE
SF_SRC="mis"
#need encode or not ( 1 or 0)  NEED CHANGE
NEED=0

#target file folder
if [ $NEED -eq 1 ]; then
    SF_ENC=$SF_SRC"_encode"
else
    SF_ENC=$SF_SRC"_src"
fi

#delete output folder
find ./ -name output|xargs -i rm -rf {}

mkdir output
RETVAL=$?
[ $RETVAL -gt 0 ] && echo "create output folder failed!"  && exit $RETVAL

cd ..

#encode if this module NEED encode 
if [ $NEED -eq 1 ]; then
    /usr/local/Zend/bin/zendenc --recursive --silent $SF_SRC $SF_ENC
    RETVAL=$?
    [ $RETVAL -gt 0 ] && echo "zend encode failed!" && exit $RETVAL
else
    cp -r $SF_SRC $SF_ENC
    RETVAL=$?
    [ $RETVAL -gt 0 ] && echo "copy files failed!" && exit $RETVAL
fi

#delete build.sh
rm -f $SF_ENC"/build.sh"
rm -rf $SF_ENC"/output"

#delete some folders according to your module NEED CHANGE
#find ./$SF_ENC -name inc|xargs -i rm -rf {}

#delete CVS folders
find ./$SF_ENC -name .svn|xargs -i rm -rf {}

#delete some files 
find ./$SF_ENC -name releasenotes.*|xargs -i rm -f {}


#if the first
#cp -r $SF_SRC"/inc" $SF_ENC"/"

mv ./$SF_ENC ./$SF_SRC/output/$SF_SRC
cd ./$SF_SRC/output/

tar cvzf $SF_SRC".tar.gz" $SF_SRC > /dev/null
RETVAL=$?
[ $RETVAL -gt 0 ] && echo "tar failed!" && exit $RETVAL

rm -rf $SF_SRC

#mv $SF_ENC".tar.gz" $SF_SRC"/output/"
RETVAL=$?
[ $RETVAL -gt 0 ] && echo "mv files failed!" && exit $RETVAL
[ ! -e $SF_SRC".tar.gz" ] && echo "build failed!" && exit 1 

echo "build success!"
exit 0
