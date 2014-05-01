<?php
//define('BAE_CAS_URL', 'uuap.baidu.com');
//define('BAE_CAS_PORT', 443);
//define('BAE_CAS_URL', 'itebeta.baidu.com');
//define('BAE_CAS_PORT', 443);
require_once(dirname(__FILE__).'/uuap/cas/CAS.php');
require_once(dirname(__FILE__).'/uuap/BaeSessionFactory.class.php');
require_once(dirname(__FILE__).'/uuap/config/BaeCasConfigure.class.php');
class BaeCasSession
{
	 public static $instance = null;
	 private static $db = null;

	 public static function getInstance()
	 {   
		 if( self::$instance === null )
		 {   
			 self::$instance = new BaeCasSession();
		 }

		 return self::$instance;
	 }

	public function __construct() {
		self::iniSession();
	    phpCAS::client(CAS_VERSION_2_0, BAE_CAS_URL, BAE_CAS_PORT,'');
		phpCAS::setNoCasServerValidation();
		phpCAS::handleLogoutRequests(false);

	}

	private function get_mysqli()
	{
		$ret = new mysqli( 
				BaeCasConfigure::$host,
				BaeCasConfigure::$user,
				BaeCasConfigure::$pwd,
				BaeCasConfigure::$dbname,
				BaeCasConfigure::$port
			);

		if (mysqli_connect_errno())
		{
		//	trigger_error("BaeCasSession: get_mysqli handler error!",E_USER_WARNING);
			return null;
		}
		return $ret;
	}
	public static function iniSession()
	{
		if(!is_null(BaeCasConfigure::$db))
		{
			self::$db = BaeCasConfigure::$db;
		}
		else if(empty(BaeCasConfigure::$host) ||
		   empty(BaeCasConfigure::$user) ||
	   	   empty(BaeCasConfigure::$pwd) ||
	           empty(BaeCasConfigure::$dbname) ||
	           empty(BaeCasConfigure::$port)
	   	  )
		  {
//			  trigger_error("BaeCasSession: mysql connect args empty!",E_USER_NOTICE);
			  return ;
		  }	  
		  
		if(is_null(self::$db))
		{
			self::$db = self::get_mysqli();
			if(is_null(self::$db)) return ;
		}
		
	        BaeSessionFactory::init_session(self::$db,
						BaeCasConfigure::$storagetype,
						BaeCasConfigure::$table,
					        BaeCasConfigure::$lifetime);
	}
	
	//ǿ���û���֤, ��������½����
	public function auth() {
		return phpCAS::forceAuthentication();
	}
	public function isAuth() {
		//return phpCAS::isAuthenticated();
		return phpCAS::checkAuthentication();
	}
	//��ȡ��ǰ�û�
	public function user() {
		return phpCAS::getUser();
	}
	//�˳�
	public function logout() {
		return phpCAS::logout();
	}
}
?>
