<?php
/**
 * 
 * @author Administrator
 *
 */
class base
{
	/**
	  * 获取当前请求用户IP
	  */
	function get_user_ip()
	{
	 	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown'))
	 	{
			$onlineip=getenv('HTTP_CLIENT_IP');
		}
		elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknow'))
		{
			$onlineip=getenv('HTTP_X_FORWARDED_FOR');  //HTTP_X_FORWARDED_FOR存在的情况下，说明使用了代理
		}
		elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'),'unknown'))
		{
			$onlineip=getenv('REMOTE_ADDR');//指正在浏览当前页面用户的IP
		}
		elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],'unknown'))
		{
			$onlineip=$_SERVER['REMOTE_ADDR'];
		}
		$onlineip=addslashes($onlineip);
		@preg_match("/[\d\.]{7,15}/",$onlineip,$onlineipmatches);
		$onlineip=$onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
		unset($onlineipmatches);
		return $onlineip;
	 }
	
	/**
	 *截取字符
	 **/
	function get_word($string, $length ,$tag=1)
	{
		$strcut = '';
		$strLength = 0;
		$width  = 0;
		if(strlen($string) > $length) {
			//将$length换算成实际UTF8格式编码下字符串的长度
			for($i = 0; $i < $length; $i++) {
				if ( $strLength >= strlen($string) ){
					break;
				}
				if ( $width>=$length){
					break;
				}
				//当检测到一个中文字符时
				if( ord($string[$strLength]) > 127 ){
					$strLength += 3;
					$width     += 2;              //大概按一个汉字宽度相当于两个英文字符的宽度
				}else{
					$strLength += 1;
					$width     += 1;
				}
			}
			if($tag==1){
				return substr($string, 0, $strLength).'......';
			}else{
				return substr($string, 0, $strLength);
			}
		} else {
			return $string;
		}
	}
	
	function change_fontstyle($title,$key){
		$key_new='<span class="highlight">'.$key.'</span>';
		return str_replace($key,$key_new,$title);
	}
	
	/*****************/
	function vcurlt($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='20',$localhost='0',$header='')
	{

		//echo "ssssssssssssssss";exit;
		$tmpInfo = '';
		$cookiepath = getcwd().'./'.$cookiejar;
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
		switch($localhost)
			{
				case "3":
					//echo 'ffffffffffffff';
						curl_setopt($curl, CURLOPT_PROXY, '210.34.4.59:808');   //厦大
						curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'mylibrary:mylibrary');  
					break; 
				default :
					$a='njnu';break;
			}
	    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		if($referer) {
	    curl_setopt($curl, CURLOPT_REFERER, $referer);
		} else {
	    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);	
		}
		if($post) {
	    curl_setopt($curl, CURLOPT_POST, 1); 
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		}
		if($cookie) {
	    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
		}
		if($cookiejar) {
	    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookiepath);
	    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiepath);
		//curl_setopt($curl, CURLOPT_COOKIE, $cookie);
		}
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($curl, CURLOPT_TIMEOUT, $stime);
	
		if($header!='')
		{
			 curl_setopt($curl, CURLOPT_HEADER, 0);
		}
		else
		{
			 curl_setopt($curl, CURLOPT_HEADER, 1);
		}
	   
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
	    $tmpInfo = curl_exec($curl);
		$errno = curl_errno($curl);
		curl_close($curl);
		
		if($errno==28) { self::$timeout_infos='2';}
		elseif($errno==7){self::$timeout_infos='3';}
		elseif($errno==52){self::$timeout_infos='4';}
	    return $tmpInfo;
	}

	function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='20',$localhost='0',$header='aaa')
	{	
		$tmpInfo = '';
		$cookiepath = getcwd().'./'.$cookiejar;
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);

		/*
		switch($localhost)
			{
				case "3":
					//echo 'ffffffffffffff';
						curl_setopt($curl, CURLOPT_PROXY, '210.34.4.59:808');   //厦大
						curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'mylibrary:mylibrary');  
					break; 
				default :
					$a='njnu';break;
			}
			*/
	    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		if($referer) {
	    curl_setopt($curl, CURLOPT_REFERER, $referer);
		} else {
	    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);	
		}
		if($post) {
	    curl_setopt($curl, CURLOPT_POST, 1); 
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		}
		if($cookie) {
	    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
		}
		if($cookiejar) {
	    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookiepath);
	    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiepath);
		//curl_setopt($curl, CURLOPT_COOKIE, $cookie);
		}
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($curl, CURLOPT_TIMEOUT, $stime);
	
		if($header!='')
		{
			 curl_setopt($curl, CURLOPT_HEADER, 0);
		}
		else
		{
			 curl_setopt($curl, CURLOPT_HEADER, 1);
		}
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
	    $tmpInfo = curl_exec($curl);
		$errno = curl_errno($curl);
		curl_close($curl);
	    return $tmpInfo;
	}
	
	
	function con_replace($str){
		$patterns[0] = "/	/";
		$patterns[1] = "/\n/";
		$patterns[2] = "/\r/";
		$patterns[3] = "/&nbsp;/";
		$replacements[0] = " ";
		$replacements[1] = " ";
		$replacements[2] = " ";
		$replacements[3] = " ";
		$arr=preg_replace($patterns, $replacements,$str);
		return $arr;
	}
	
	
	function chulistring($ddg)
	{
		$ddg=trim(strip_tags($ddg));
		$ddg=str_replace('&nbsp;','',$ddg);
		return $ddg;
	}
	/*--------------------------------字符解码转换------------------------------*/
	function  unicodeToUtf8($str) {
		$str = rawurldecode($str);
		$str=preg_replace('/&#x000d;&#x000a;/siU','',$str);
		preg_match_all("/(?:%u.{4})|&#x.{4};|&#\d+;|.+/U",$str,$r);//以&#、&#x、&#u的unicode
		$ar = $r[0];
		//print_r($ar);
		foreach($ar as $k=>$v) {
			if(substr($v,0,2) == "%u")
				$ar[$k] = iconv("UCS-2","UTF-8",pack("H4",substr($v,-4)));
			elseif(substr($v,0,3) == "&#x")
			$ar[$k] = iconv("UCS-2","UTF-8",pack("H4",substr($v,3,-1)));
			elseif(substr($v,0,2) == "&#") {
				//echo substr($v,2,-1)."\n";
				$ar[$k] = iconv("UCS-2","UTF-8",pack("n",substr($v,2,-1)));
			}
		}
		return join("",$ar);//字符解码转换  修改  Author【cxx】
	}
	/*--------------------------------字符解码转换------------------------------*/
	/***组装关键词****/
	function cut_keywords($keywords){
		$aaa=substr_count ($keywords,"@@@");
		if($aaa>0){
			$bbb=explode("@@@", $keywords);
			$keywords=$bbb[0];
			$keywords2=$bbb[1];
			$ccc=substr_count ($keywords2,"***");
			if($ccc>0){
				$keywords2=preg_replace("/\(/","",$keywords2);
				$keywords2=preg_replace("/\)/","",$keywords2);
				$keywords2=preg_replace("/\[/","",$keywords2);
				$keywords2=preg_replace("/\]/","",$keywords2);
				$data2=explode('***',$keywords2);
				$date=explode(',',$data2[0]);
				$sort=$data2[1];
			}else{
				$date='';
				$sort='';
			}
		}
		$count=substr_count ($keywords,"|||");
		$tmp_second=stripos($keywords,'[[');
		if($tmp_second>0)	$runtimes=$count+1;
		else $runtimes=$count;
		$num=explode("|||", $keywords);
		for($m=0;$m<$runtimes;$m++){
			$data=explode(",(",$num[$m]);
			for($k=0;$k<count($data);$k++){
				$data[$k]=preg_replace("/\(/","",$data[$k]);
				$data[$k]=preg_replace("/\)/","",$data[$k]);
				$data[$k]=preg_replace("/\[/","",$data[$k]);
				$data[$k]=preg_replace("/\]/","",$data[$k]);
			}
			$typenum[$m]=trim($data[0]);
			$key[$m]=trim($data[1]);
			$data[2]=strtolower($data[2]);
			$bool[$m]=trim($data[2]);
		}
		$array[0]=$typenum;//搜索类型数组$array[0][$n]
		$array[1]=$key;//关键词数组$array[1][$n]
		$array[2]=$bool;//bool逻辑数组$array[2][$n]
		$array[3]=$date;//时间数组$array[3][$n]
		$array[4]=$sort;//排序（非数组）$array[4]
		$array[5]=$count;//二次检索：类型：$array[0][$count]		关键词：$array[1][$count]
		$array[6]=$tmp_second;//判断有无二次检索   >0 表示有
		return $array;
	}
	/***组装关键词****/
}