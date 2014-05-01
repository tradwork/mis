<?php
	class Songscopyright_model extends DbManage_model
	{
		var $strTable='quku_songs_copyright';
		var $strPrimaryKey='sc_id';
		var $strForeignKey='sc_song_id';
	}