<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* @file system/application/libraries/Mysmarty.php
*/
require_once(dirname(__FILE__).'/smarty/Smarty.class.php');
class Smarty3 extends Smarty
{
	function Smarty3()
	{
		parent::__construct();
		$config =& get_config();
		// absolute path prevents "template not found" errors
		$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] : BASEPATH . 'application/views/');
		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['smarty_compile_dir'] : BASEPATH . 'cache/');
		//use CI's cache folder
		if (function_exists('site_url'))
		{
			// URL helper required
			$this->assign("site_url", site_url()); // so we can get the full path to CI easily
		}
		$this->config_dir = $config['smarty_config_dir'];
		$this->cache_dir  = $config['smarty_cache_dir'];
		$this->left_delimiter = "<(";
		$this->right_delimiter = ")>";
	}
	/**
     * @param $resource_name string
     * @param $params array holds params that will be passed to the template
     * @desc loads the template
     */
	function view($resource_name, $params = array())
	{
        if(empty($resource_name))
        {
            log_message('INFO','there is no template');
            return;
        }
		if (strpos($resource_name, '.') === false)
		{
			$resource_name .= '.html';
		}
		if (is_array($params) && count($params))
		{
			foreach ($params as $key => $value)
			{
				$this->assign($key, $value);
			}
		}

		// check if the template file exists.
		if (!is_file($this->template_dir . $resource_name))
		{
			show_error("template: [$resource_name] cannot be found.");
		}
		else
		{
			return parent::display($resource_name);
		}
	}
} // END class smarty_library
/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
