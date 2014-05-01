<?php
class Globalid_model extends Common_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('table/Sysglobalid_model','sysglobalid');
	}
	
	function insertItem($arrParam)
	{
		try
		{
			$this->db->trans_begin();
			$intGlobalId=$this->sysglobalid->insert($arrParam);
			$this->db->trans_commit();
		}
		catch (Exception $e)
		{
			$this->db->trans_rollback();
			$strMessage=sprintf("%s:%d %s", $e->getFile (), $e->getLine (), $e->getMessage ());
			log_message('error',$strMessage);
            return false;
		}
        return $intGlobalId;
	}
}
