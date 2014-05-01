<?php
//superfile 每个object分片后缀
define ( 'BCS_SUPERFILE_POSTFIX', '_bcs_superfile_' );
//sdk superfile分片大小 ，单位 B（字节）
//define ( 'BCS_SUPERFILE_SLICE_SIZE', 1024 * 1024 );
//define('BCS_BUCKET','qukutest');//测试bucket，曲库所有数据都存在一个bucket中，相当于bcs一级存储目录，线上bucket暂时保密
//define('BCS_HOST','10.81.2.114:8090');//测试地址,线上暂时保密
//define('BCS_AK','7yndfW8AMd6R');//BCS的公钥(access key)
//define('BCS_SK','UQHi0TEp5piq');//BCS的私钥(secure key)
//define('BCS_BUCKET','qukufile');//测试bucket，曲库所有数据都存在一个bucket中，相当于bcs一级存储目录，线上bucket暂时保密
//define('BCS_HOST','s3.bae.baidu.com:8080');//测试地址,线上暂时保密
//define('BCS_AK','HrO7whcINlzi');//BCS的公钥(access key)
//define('BCS_SK','Nu0QSQS04AUC');//BCS的私钥(secure key)
define('BCS_BUCKET_ACL','BaiduBCS::BCS_SDK_ACL_TYPE_PUBLIC_READ');//buck的默认权限,所有人可读
define('LOG_LEVEL',0);
?>