<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
define('TEST_MODE',true);
/**
 * test constants
 *
 */
if(TEST_MODE)
{
define('BAE_CAS_URL', 'itebeta.baidu.com');
define('BAE_CAS_PORT', 443);


define('BCS_BUCKET','qukuauto');//测试bucket，曲库所有数据都存在一个bucket中，相当于bcs一级存储目录，线上bucket暂时保密
//define('BCS_HOST','10.26.7.198');//测试地址,线上暂时保密
//define('BCS_AK','7yndfW8AMd6R');//BCS的公钥(access key)
//define('BCS_SK','UQHi0TEp5piq');//BCS的私钥(secure key)
define('BCS_HOST','bcs-sandbox.baidu.com');//测试地址,线上暂时保密
define('BCS_AK','gxAxClFwWYGap9');//BCS的公钥(access key)
define('BCS_SK','jwGDGaysAkPJHJOn8ObAzgwM54mk2lKnrNtH');//BCS的私钥(secure key)
define('BCS_LINK','http://10.215.254.55:8080/qukutest');
define('BCS_INTERNAL','http://10.215.254.55:8080/qukutest');
define('QUKU_BASICSERVER_URL','http://localhost:5651/qs');
define('QUKU_BATCHOPERATION_URL','http://cq01-rdqa-pool146.cq01.baidu.com:8588/bin/index.php');
define('QUKU_STATISTICS_URL','http://cq01-rdqa-pool146.cq01.baidu.com:8911/bin/index.php');
}
/**
 * formal constants
 *
 */
else
{
//define('BAE_CAS_URL', 'itebeta.baidu.com');
//define('BAE_CAS_PORT', 443);
define('BAE_CAS_URL', 'uuap.baidu.com');
define('BAE_CAS_PORT', 443);
define('BCS_BUCKET','qukufile');//测试bucket，曲库所有数据都存在一个bucket中，相当于bcs一级存储目录，线上bucket暂时保密
define('BCS_HOST','s3.bae.baidu.com:8080');//测试地址,线上暂时保密
define('BCS_AK','HrO7whcINlzi');//BCS的公钥(access key)
define('BCS_SK','Nu0QSQS04AUC');//BCS的私钥(secure key)
define('BCS_LINK','http://qukufile2.qianqian.com');
define('BCS_INTERNAL','http://s3.bae.baidu.com:8080/qukufile');
define('QUKU_BASICSERVER_URL','http://tc-vswisearch-pinterest07.tc:9106/qs');
define('QUKU_BATCHOPERATION_URL','http://ai-quku-api00.ai01.baidu.com:8389/bin/index.php');
define('QUKU_STATISTICS_URL','http://http://ai-quku-api00.ai01.baidu.com::8911/bin/index.php');
}



define ('SMARTY_RESOURCE_CHAR_SET', 'utf-8');
define('STATIC_DIR', '/static');
define('ROOT_PATH', BASEPATH . '../');

//data type
define('QUKU_TYPE_SONG',1);
define('QUKU_TYPE_ALBUM', 2);
define('QUKU_TYPE_ARTIST', 3);
define('QUKU_TYPE_SHOW', 4);
define('QUKU_TYPE_PIC', 11);
define('QUKU_TYPE_MV',5);
define('QUKU_TYPE_VIDEO',6);
define('QUKU_TYPE_VIDEO_FILE',17);
define('QUKU_TYPE_YINGSHI',7);
define('QUKU_TYPE_MEDIA', 12);
define('QUKU_TYPE_LRC', 13);
define('QUKU_TYPE_OPTION',101);
define('QUKU_TYPE_USER',102);
define('QUKU_TYPE_OPERATE',103);
define('QUKU_TYPE_TAG',104);
define('QUKU_TYPE_OPEN_USER',105);
define('QUKU_TYPE_OPEN_USER',105);
define('QUKU_TYPE_USER_MATERIAL',106);
define('QUKU_TYPE_SEARCH', 816);
define('QUKU_DAY_SECONDS', 86400);
define('QUKU_WEEK_SECONDS', 604800);
define('QUKU_PRIORITY',2);

//升序降序定义
define('QUKU_OPTIONS_ASCEND', 0);
define('QUKU_OPTIONS_DEASCEND', 1);

//bcs
define ( 'BCS_SUPERFILE_SLICE_SIZE', 1024 * 1024 );
define ( 'BCS_SUPERFILE_POSTFIX', '_bcs_superfile_' );
define('BCS_BUCKET_ACL','BaiduBCS::BCS_SDK_ACL_TYPE_PUBLIC_READ');//buck的默认权限,所有人可读
define('LOG_LEVEL',0);

//著作权
define('QUKU_YINZHUXIE','中国音乐著作权协会');

//图片压缩质量
define('PIC_QUALITY',80);

//开放平台用户
define('OPEN_COMPANY',1);
define('OPEN_MUSICIAN',2);
define('OPEN_STUDIO',3);

//FFMPEG 执行路径
define("FFMPEG_PATH","ffmpeg");

