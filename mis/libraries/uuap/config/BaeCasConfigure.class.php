<?php
/***************************************************************************
 * 
 * Copyright (c) 2011 Baidu.com, Inc. All Rights Reserved
 * $Id$ 
 * 
 **************************************************************************/
 
 
 
/**
 * @file BaeCasConfigure.class.php
 * @author weiyongchao(weiyongchao04@baidu.com)
 * @date 2011/08/10 00:11:52
 * @version $Revision$ 
 * @brief 
 *  
 **/

 class BaeCasConfigure
 {
	 public static $storagetype = 'mysqli';
	 public static $table = 'session';
	 public static $lifetime = 10800;

	 public static $host = '';
	 public static $user = '';
	 public static $pwd = '';
	 public static $dbname = '';
	 public static $port = '';

	 public static $db = null;

	 public static function setConf($host, $user, $pwd, $dbname, $port)
	 {
		 self::$host = $host;
		 self::$user = $user;
		 self::$pwd = $pwd;
		 self::$dbname = $dbname;
		 self::$port = $port;
	 }

	 public static function setDb($db)
	 {
		 self::$db = $db;
	 }

 }





/* vim: set ts=4 sw=4 sts=4 tw=100 noet: */
?>
