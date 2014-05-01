<?php
	class Songslrcs_model extends DbManage_model
	{
		var $strTable='quku_songs_lrcs';
		var $strPrimaryKey='sl_globalid';
		var $strForeignKey='sl_song_id';
	}