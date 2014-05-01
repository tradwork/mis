<?php
	class Videofiles_model extends DbManage_model
	{
		var $strTable='quku_video_files';
		var $strPrimaryKey='vf_globalid';
		var $strForeignKey='vf_videoinfo_id';
	}