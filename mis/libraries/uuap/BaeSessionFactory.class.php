<?php
/**
 *  BaeSessionFactory Session工厂类
 *
 * @copyright			(C) baidu
 * @license				http://www.baidu.com/
 * @lastmodify			2011-04-29
 */
require_once(dirname(__FILE__).'/session/SessionZCache.class.php');
require_once(dirname(__FILE__).'/session/SessionMysqli.class.php');
final class BaeSessionFactory {
	
	private static $_session=null;
	
	/**
	 * 实例化session实例
	 * @param $handler 	数据库或zcache操作句柄
	 * @param $table	数据表名或zcache firstkey
	 * @param $lifetime	session存活时间
	 * @return object
	 */
	public static function init_session($handler,$type='mysqli',$table='session',$lifetime=10800) {
		if(is_object(BaeSessionFactory::$_session)){
			BaeSessionFactory::$_session->init($handler,$table,$lifetime);
			return true;
		}
		switch (strtolower($type)) {
			case 'zcache' :
				BaeSessionFactory::$_session=new SessionZCache();
				break;
			case 'mysqli' :
			default :
				BaeSessionFactory::$_session=new SessionMysqli();
		}
		if(is_object(BaeSessionFactory::$_session)){
			return BaeSessionFactory::$_session->init($handler,$table,$lifetime);
		}
		return false;
	}
	/**
	 * 获取最后一次错误号
	 * 
	 * @return number
	 */
	public static function getLastErrNo(){
		if(is_object(BaeSessionFactory::$_session)){
			return BaeSessionFactory::$_session->getLastErrNo();
		}
		return false;
	}
	/**
	 * 获取最后一次错误语号
	 * 
	 * @return number
	 */
	public static function getLastErrMsg(){
		if(is_object(BaeSessionFactory::$_session)){
			return BaeSessionFactory::$_session->getLastErrMsg();
		}
		return false;
	}
}
?>