<?php
/**
 *  SessionZCache zcache管理类
 *
 * @copyright			(C) baidu
 * @license				http://www.baidu.com/
 * @lastmodify			2011-04-29
 */
class SessionZCache {
	private $_lifetime = 10800;
	private $_db;
	private $_table='session';
	private $_errmsg='';
	private $_errno=0;
/**
 * 构造函数
 * 
 */
	public function init($db,$table='session',$lifetime=10800) {
		$this->_db=$db;
		$this->_table=$table;
		$this->_lifetime = intval($lifetime);
		if(empty($this->_table)){
			$this->_errmsg='session table invalid';
			$this->_errno=2;
			return false;
		}

		if($this->_lifetime==0){
			$this->_errmsg='expire time invalid';
			$this->_errno=3;
			return false;
		}
    	session_set_save_handler(array(&$this,'open'), array(&$this,'close'), array(&$this,'read'), array(&$this,'write'), array(&$this,'destroy'), array(&$this,'gc'));
		return true;
    }
/**
 * session_set_save_handler  open方法
 * @param $save_path
 * @param $session_name
 * @return true
 */
    public function open($save_path, $session_name) {
		return true;
    }
/**
 * session_set_save_handler  close方法
 * @return bool
 */
    public function close() {
        return $this->gc($this->_lifetime);
    } 
/**
 * 读取session_id
 * session_set_save_handler  read方法
 * @return string 读取session_id
 */
	public function read($session_id) {
		$rs=$this->_db->getOne($this->_table,$session_id,0,101);
		return $rs;
    } 
/**
 * 写入session_id 的值
 * 
 * @param $session_id session
 * @param $data 值
 * @return mixed query 执行结果
 */
	public function write($session_id, $data) {
		$intRes=$this->_db->addOne($this->_table,$session_id,$data,$this->_lifetime,0,102);
		$intRes=$this->_db->updateOne($this->_table,$session_id,$data,$this->_lifetime,0,102);
		if($intRes!=0){
			$this->_errmsg=$this->_db->getLastErr();
			$this->_errno=$this->_db->getLastErrNO();
			return false;
		}
		return true;
	}
/** 
 * 删除指定的session_id
 * 
 * @param $session_id session
 * @return bool
 */
	public function destroy($session_id) {
		$intRes=$this->_db->deleteOne($this->_table,$session_id,0,0,103);
		if($intRes!=0){
			$this->_errmsg=$this->_db->getLastErr();
			$this->_errno=$this->_db->getLastErrNO();
			return false;
		}
		return true;
	}
/**
 * 删除过期的 session
 * 
 * @param $maxlifetime 存活期时间
 * @return bool
 */
   public function gc($maxlifetime) {
		return true;
   }
/**
 * 获取最后一次错误号
 * 
 * @return number
 */
	public function getLastErrNo(){
		return $this->_errno;
	}
/**
 * 获取最后一次错误语号
 * 
 * @return number
 */
	public function getLastErrMsg(){
		return $this->_errmsg;
	}
}
?>
