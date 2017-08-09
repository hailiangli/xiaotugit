<?php
class base
{
	/**************闂備胶顢婇崺鏍箰濮濆被浜归柛銉㈡櫇绾鹃箖鏌熸潏鎹愮闁跨喕妫勯ˇ闈涱嚕椤掑倹鍠嗛柛鏇ㄥ幑閿熸枻鎷�***************/
    function biomedcentralgetPdf($url = '',$Domain = '',$docid = '',$doi = '')
    {
       $cnt	= $this->pcurl($url);
        preg_match_all('/name="citation_pdf_url.*content=\'(.*)\'/siU',$cnt,$arr);
        $pdfUrl	= $this->chulistring2($arr[1][0]);
        //echo $pdfUrl;exit;
        if(!empty($pdfUrl))
        {
            $cnt	= $this->pcurl($pdfUrl);
           if(preg_match('/^(%PDF)/siU',$cnt))
            {
                return $cnt;
            }
            else
            {
                return 404;
            }
        }
        else
        {
            return 404;
        }
    
    }
    function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='120',$localhost='0',$header='0')
	{
		$tmpInfo = '';
		$cookiepath = getcwd().'/'.$cookiejar;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		switch($localhost)
			{
				case "3":
					//echo 'ffffffffffffff';
						curl_setopt($curl, CURLOPT_PROXY, '210.34.4.59:808');   //闂備礁鎲￠敃顐ょ不閹达箑桅闁跨噦鎷�
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
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, $stime);

		curl_setopt($curl, CURLOPT_HEADER, $header);
		
	   
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
		$tmpInfo = curl_exec($curl);
		$errno = curl_errno($curl);
		curl_close($curl);
		/*
		if($errno==28) { self::$timeout_infos='2';}
		elseif($errno==7){self::$timeout_infos='3';}
		elseif($errno==52){self::$timeout_infos='4';}
		*/
		return $tmpInfo;
	}

	function pcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='120',$localhost='0',$header='0')
	{
		$tmpInfo = '';
		$cookiepath = getcwd().'./'.$cookiejar;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		switch($localhost)
			{
				case "3":
					//echo 'ffffffffffffff';
						curl_setopt($curl, CURLOPT_PROXY, '210.34.4.59:808');   //闂備礁鎲￠敃顐ょ不閹达箑桅闁跨噦鎷�
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
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, $stime);

		curl_setopt($curl, CURLOPT_HEADER, $header);
		
	   
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
		$tmpInfo = curl_exec($curl);
		$errno = curl_errno($curl);
		curl_close($curl);
		/*
		if($errno==28) { self::$timeout_infos='2';}
		elseif($errno==7){self::$timeout_infos='3';}
		elseif($errno==52){self::$timeout_infos='4';}
		*/
		return $tmpInfo;
	}
    
	function curl($url = '')
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    $cnt = curl_exec($ch);
	    return $cnt;
	}
	
	function getDomain($url='')
	{

		if(preg_match_all('/http:\/\/(.*)\//siU',$url,$arr))
		{
			return $arr[1][0];
		}
		else
		{
			$this->state='Domain empty!';
		}
	}
	
	function getDomains($url='')
	{
	
	    if(preg_match_all('/https:\/\/(.*)\//siU',$url,$arr))
	    {
	        return $arr[1][0];
	    }
	    else
	    {
	        $this->state='Domains empty!';
	    }
	}

	/********************闂備礁鎲￠敋妞ゎ厼鍢查埢宥咁啅婵摮l闂備礁鎼粔鏉懨洪妸鈺婃晢闁跨噦鎷�***********************/
	function delHtmltag($string)
	{
		$string	= trim(strip_tags($string));
		return $string;
	}

	function chulistring2($ddg)
	{
		$ddg=trim(strip_tags($ddg));
		return $ddg;
	}

	function chulistring($ddg)
	{
		$ddg=trim(strip_tags($ddg));
		$ddg=str_replace('&nbsp;','',$ddg);
		$ddg=addslashes($ddg);
		return $ddg;
	}

	function chulistring3($ddg)
	{
		$ddg=trim(strip_tags($ddg));
		$ddg=addslashes($ddg);
		return $ddg;
	}

	//闂佸搫顦遍崕鎰板礂濞戞氨涓嶉柣鏃傚帶缁�鍕煠閹帒鍔滄繛鍫嫹
	function stringSlash($ddg)
	{
		$ddg	= addslashes($ddg);
		return $ddg;
	}

	
	function unicodeToUtf8($str) 
	{
		$str = rawurldecode($str);
		$str=preg_replace('/&#x000d;&#x000a;/siU','',$str);
		preg_match_all("/(?:%u.{4})|&#x.{4};|&#\d+;|.+/U",$str,$r);//濠电偛顕刊鎾箯閿燂拷&#闂備線娼уΛ鎾箯閿燂拷&#x闂備線娼уΛ鎾箯閿燂拷&#u闂備焦鐪归崝灞炬櫠濮婄剾code
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
		return join("",$ar);//闂佽瀛╃粙鎺椼�冮崼銉晞濞达絿鍎ら崰鍡涙煥濠靛棙宸濋柛銊﹀▕瀵爼鎮滈崱妤�顫悗瑙勬穿閹凤拷  濠电儑绲藉ù鍌炲窗濡ゅ懎鏋侀柨鐕傛嫹  Author闂備線娼уΛ娆愮閻涘�勯梻渚�娼уΛ鎾箯閿燂拷
	}

	//闂備礁鍚嬮崕鎶藉床閼艰翰浜归柛銉簵娴滃綊鏌熼幆褍鏆辨い銈呮嚇閺岋繝宕橀妸褍鐓熷┑鈽嗗亾閹凤拷
	function getTimeString()
	{
		$timestring	= date('YmdHis');
		return $timestring;
	}

	//闂備礁鍚嬮崕鎶藉床閼艰翰浜归柛銉ｅ妼缁剁偤鏌熺紒銏犳灈闁告棏娅搊okivalue
	function getCookieValue($string)
	{
		preg_match_all('/Set-Cookie:(.*)path=/siU',$string,$arr);
		$cookieValue	= implode('',$arr[1]);
		return	$cookieValue;
	}
	
	function Del_space($str){
		$str=preg_replace('/	/siU','',trim($str));
		for($i=0;$i<strlen($str);$i++){
			if($i==0){
				$b=substr($str,$i,1);
			}else{
				if($str[$i]==" "){
					if($str[$i-1]!=" ")
						$b.=substr($str,$i,1);
				}else
					$b.=substr($str,$i,1);
			}
		}
		return $b;	
	}

	function con_replace($str){
		$patterns[0] = '/	/'; 
		$patterns[1] = '/\n/';
		$patterns[2] = '/\r/';
		$patterns[3] = '/&nbsp;/';
		$replacements[0] = ' '; 
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$arr=preg_replace($patterns, $replacements,$str); 
		return $arr;
	}
}

?>