<?php
/**
 *  SessionMysqli mysql管理类
 *
 * @copyright			(C) baidu
 * @license				http://www.baidu.com/
 * @lastmodify			2011-04-29
 */
class SessionMysqli {
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
		$this->_lifetime = $lifetime;
		if(!$this->_db instanceof mysqli){
			$this->_errmsg='store db invalid';
			$this->_errno=1;
			return false;
		}
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
		$sql='SELECT `data` FROM '.$this->_table.' WHERE `id`='."'".$session_id."' LIMIT 1";
		$result=mysqli_query($this->_db,$sql);
		if(!$result){
			$this->_errmsg=mysqli_error($this->_db);
			$this->_errno=10;
			return '';
		}
		$rs=mysqli_fetch_array($result);
		return $rs ? $rs['data'] : '';
    } 
/**
 * 写入session_id 的值
 * 
 * @param $session_id session
 * @param $data 值
 * @return mixed query 执行结果
 */
	public function write($session_id, $data) {
		$sql='REPLACE '.$this->_table." (`id`,`data`,`lastmodify`) VALUES ('".$session_id."','".$data."','".time()."')";
		$result=mysqli_query($this->_db,$sql);
		if(!$result){
			$this->_errmsg=mysqli_error($this->_db);
			$this->_errno=10;
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
		$sql='DELETE FROM '.$this->_table.' WHERE `id`='."'".$session_id."'";
		return mysqli_query($this->_db,$sql);
    }
/**
 * 删除过期的 session
 * 
 * @param $maxlifetime 存活期时间
 * @return bool
 */
   public function gc($maxlifetime) {
		$expiretime = time() - $maxlifetime;
		$sql='DELETE FROM '.$this->_table.' WHERE `lastmodify`<'."'".$expiretime."'";
		return mysqli_query($this->_db,$sql);
   }
/**
 * 获取最后一次错误号
 * @return number
 */
	public function getLastErrNo(){
		return $this->_errno;
	}
/**
 * 获取最后一次错误信息
 * @return string
 */
	public function getLastErrMsg(){
		return $this->_errmsg;
	}
}
?>
