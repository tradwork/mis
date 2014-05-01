<?php
class loadModel
{	
	function load()
	{
		$ObjCI =& get_instance();
		$strClass=$ObjCI->input->get('c');
		$strModelName=$strClass.'_model';
		$this->load->model($strModelName);
	}
}
