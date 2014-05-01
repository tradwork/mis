<?php
	class Songsfiles_model extends DbManage_model
	{
		var $strTable='quku_songs_files';
		var $strPrimaryKey='sf_globalid';
		var $strForeignKey='sf_song_id';
	}