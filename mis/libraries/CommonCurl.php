<?php
/***************************************************************************
 * 
 * Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Common_Curl.php
 * @author caoyupeng(caoyupeng@baidu.com)
 * @date 2010/09/13 14:00:05
 * @brief  Curl相关操作
 *  
 **/
class Commoncurl {
	/**
	 *
	 * @param array $url
	 * @param string $postParams
	 * @param int $timeOut The maximum number of seconds to allow cURL functions to execute
	 * @return curl
	 */
	public function procPostCurlHandle($url,$postParams = '',$timeOut = 30)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams );
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeOut);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		return $ch;
		/*$ch = curl_init() ;
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_POSTFIELDS => $postParams,
			CURLOPT_TIMEOUT => $timeOut,
			CURLOPT_FAILONERROR => false,
			CURLOPT_ENCODING => '',
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FILETIME => true,
			CURLOPT_POST => 1
		);
		curl_setopt_array($ch, $options);
		return $ch;*/
	}
	/**
	 * @param string $url
	 * @param int $timeOut
	 * @return curl
	 */
	public function procGetCurlHandle($url,$timeOut = 30)
	{
		$ch = curl_init($url) ;
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
		curl_setopt($ch ,CURLOPT_CUSTOMREQUEST , 'GET');
		curl_setopt($ch, CURLOPT_TIMEOUT,$timeOut);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		return $ch;
	}
}

?>
