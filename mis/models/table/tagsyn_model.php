<?php
class Tagsyn_model extends DbManage_model
{
	var $strTable='quku_tag_syn';
	var $strPrimaryKey='ts_id';
	var $strForeignKey='ts_tagid';
}
