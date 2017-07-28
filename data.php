<?php

class data
{
    static $timeout_infos;
	static $timeout_refer;
/*--------------------------------Curl_GET 的方法--------------------------*/
	static function curl_get($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, self::$timeout_refer);//链接时间最大15秒
		$content=curl_exec($ch);
		$errno = curl_errno($ch);
		@curl_close($ch); 
		if($errno==28)   {self::$timeout_infos="2";}//连接超时
		elseif($errno==7){self::$timeout_infos="3";}//无法连接
		return $content;
	}
/*--------------------------------Curl_GET 的方法--------------------------*/

static function curl_power($url,$post_data = ""){
		$user_agent     =  "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1) ; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Tablet PC 2.0; .NET CLR 1.1.4322)"; 
		$follow_loc   =   1;
		$cookie_file   ="ASP.NET_SessionId=enqrq0rwwm5khw45zilp0k45"; 
		$ch   =   @curl_init(); 
		@curl_setopt($ch,   CURLOPT_URL,   $url); 
		@curl_setopt($ch,   CURLOPT_USERAGENT,   $user_agent); 
		@curl_setopt($ch,   CURLOPT_COOKIEJAR,   $cookie_file); 
		@curl_setopt($ch,   CURLOPT_COOKIEFILE,   $cookie_file); 
		@curl_setopt($ch,   CURLOPT_HEADER,   $header); 
		@curl_setopt($ch,   CURLOPT_RETURNTRANSFER,   1); 
		@curl_setopt($ch,   CURLOPT_FOLLOWLOCATION,   $follow_loc); 
		@curl_setopt($ch,   CURLOPT_TIMEOUT, self::$timeout_refer);
		if   (trim($post_data)!= "")   { 
		@curl_setopt($ch,   CURLOPT_POST,   1); 
		@curl_setopt($ch,   CURLOPT_POSTFIELDS,   $post_data); 
		}
		$result   =   @curl_exec($ch); 
		$errno = curl_errno($ch);
		@curl_close($ch); 
		if($errno==28)   {self::$timeout_infos="2";}//连接超时
		elseif($errno==7){self::$timeout_infos="3";}//无法连接 
		return   $result; 
}








/*--------------------------------Curl_POST的方法--------------------------*/
	static function curl_post($url,$parm){
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_TIMEOUT,self::$timeout_refer);
		$content = curl_exec($ch);//链接时间最大15秒
		$errno = curl_errno($ch);
		@curl_close($ch); 
		if($errno==28)   {self::$timeout_infos="2";}//连接超时
		elseif($errno==7){self::$timeout_infos="3";}//无法连接
		return $content;
	}

//字符解码转换  修改  Author【cxx】
/*--------------------------------字符解码转换------------------------------*/
static function unicodeToUtf8($str) {
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
/*********************************全角半角特殊字符处理****************************************/
static function  specialCharDeal($arr){
	$orginalChar=array("/ａ/","/ｂ/", "/ｃ/", "/ｄ/", "/ｅ/", "/ｆ/", "/ｇ/", "/ｈ/", "/ｉ/", "/ｊ/", "/ｋ/", 
    "/ｌ/", "/ｍ/", "/ｎ/","/ｏ/","/ｐ/","/ｑ/","/ｒ/","/ｓ/","/ｔ/","/ｕ/","/ｖ/","/ｗ/","/ｘ/","/ｙ/","/ｚ/"
	,"/Ａ/","/Ｂ/", "/Ｃ/", "/Ｄ/", "/Ｅ/", "/Ｆ/", "/Ｇ/", "/Ｈ/", "/Ｉ/", "/Ｊ/", "/Ｋ/", "/Ｌ/", "/Ｍ/", "/Ｎ/"
	,"/Ｏ/","/Ｐ/","/Ｑ/","/Ｒ/","/Ｓ/","/Ｔ/","/Ｕ/","/Ｖ/","/Ｗ/","/Ｘ/","/Ｙ/","/Ｚ/","/０/","/１/","/２/","/３/"
	,"/４/","/５/","/６/","/７/","/８/","/９/",);

	$replace=array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v",
	"w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V",
	"W","X","Y","Z","0","1","2","3","4","5","6","7","8","9");
	for($i=0;$i<count($arr);$i++){
		 $arr[$i]=str_replace(
		   array("～","！","＠","＃","％","＆","＊","，","。","？","；","：","‘","’","“","”","【","】"," （","）"," ｛","｝","’"),
		   array("~","!","@","#","%","&","*",",",".","?",";",":","'","'",'"','"'," [","]"," (",")"," {","}","'"),
		   $arr[$i]);

	   //$arr[$i]=preg_replace($orginalChar,$replace,$arr[$i]);
	   $arr[$i]=trim(strip_tags($arr[$i]));//去掉HTML标记
	   $arr[$i]=preg_replace('/\\\n|’|&.*;/siU','',$arr[$i]);//去掉\n换行符|空格符|HTML字符实体
	   $arr[$i]=preg_replace("/'|\\\|\"|,/siU",'',$arr[$i]);//去掉(单引号|双引号|反斜线) }
	}
   return $arr;
}

/*****************/
function vcurl2($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='50',$localhost='0')
{
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
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookiepath);//存储cookie--路径绝对路径
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiepath);//读取cookie
	//curl_setopt($curl, CURLOPT_COOKIE, $cookie);
	}
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $stime);
    curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_NOBODY, 0);
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
/*****************/
function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='50',$localhost='0',$header='0')
{
	$tmpInfo = '';
	$cookiepath = getcwd().'./'.$cookiejar;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
	//curl_setopt($curl, CURLOPT_PROXY, '202.119.252.252:8099');   //厦大
					//curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'lezhian:lezhian1');  
	switch($localhost)
		{
			case "3":
				//echo 'ffffffffffffff';
					curl_setopt($curl, CURLOPT_PROXY, '202.119.252.252:8099');   //厦大
					curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'lezhian:lezhian1');  
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

	//echo $errno;exit;
	curl_close($curl);
	
	if($errno==28) { self::$timeout_infos='2';}
	elseif($errno==7){self::$timeout_infos='3';}
	elseif($errno==52){self::$timeout_infos='4';}
    return $tmpInfo;
}

function get_head($sUrl)
{
	$oCurl = curl_init();
	curl_setopt($oCurl, CURLOPT_URL, $sUrl);
	curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
	// 返回 response_header, 该选项非常重要,如果不为 true, 只会获得响应的正文
	curl_setopt($oCurl, CURLOPT_HEADER, true);
	// 是否不需要响应的正文,为了节省带宽及时间,在只需要响应头的情况下可以不要正文
	curl_setopt($oCurl, CURLOPT_NOBODY, true);
	// 使用上面定义的 ua
	curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
	curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
	// 不用 POST 方式请求, 意思就是通过 GET 请求
	curl_setopt($oCurl, CURLOPT_POST, false);

	$sContent = curl_exec($oCurl);
	// 获得响应结果里的：头大小
	$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
	// 根据头大小去获取头信息内容
	$header = substr($sContent, 0, $headerSize);
	 
	curl_close($oCurl);

	return $header;
}

/************ 简单的去处一些特殊符号***/
function form_js($arr)
    {
        $patterns[0] = "/'/";
        $patterns[1] = "/\"/";
        $patterns[2] = "/&nbsp;/";
        $patterns[3] = "/\s/";
		$patterns[4] = "/( )+/";
		$patterns[5] = "/\r\n/";
        $replacements[0] = "";
        $replacements[1] = "";
        $replacements[2] = "";
        $replacements[3] = "";
		$replacements[4] = " ";
		$replacements[5] = "";
        if (is_array($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                $arr_a[$i] = trim($arr[$i]);
            }
        } else {
            $arr_a = trim($arr);
        }
        $arr = preg_replace($patterns, $replacements, $arr_a);
        return $arr;
    }


/**********/
 function fenge($keywords, $x, $y, $z, $p, $w)
    {
        $keywords_1 = explode('@@@', $keywords);
        if ($z == '1') {
            $keywords2 = $keywords_1[0];
            if (strpos($keywords2, "|||")) {
                //	$shulian=substr_count ($keywords,"|||");
                $b = explode("|||", $keywords2);
                $c = explode(",", $b[$x - 1]);
                $value = str_replace(")", "", str_replace("(", "", $c[$y - 1]));
                if ($w == 1) {
                    $rule = '/\[\[\((.*)\),\((.*)\)\]\]/siU';
                    preg_match_all($rule, $keywords2, $value);
                    $value = $value[$p][0];
                    //$keywords;
                }
            }
        } elseif ($z == '2') {
            $keywords2 = $keywords_1[1];
            $rule = '/\[\[\((.*),(.*)\)\]\]\*\*\*\[\[\((.*)\)\]\]/siU';
            preg_match_all($rule, $keywords2, $value);
            $value = $value[$p][0];
        }
        return $value;
    }
/*******/
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

/*********小陈伟 的去处空格**/
/*在循环里调用：
$fun_title[$tmp_j]=parent::con_replace($fun_title[$tmp_j]);
$fun_title[$tmp_j]=parent::Del_space($fun_title[$tmp_j]);
/*
/*
*/	
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


/*********小处理*********/

function chulistring($ddg)
{
	$ddg=trim(strip_tags($ddg));
	$ddg=str_replace('&nbsp;','',$ddg);
	$ddg=addslashes($ddg);
	return $ddg;
}

	function unescape($str) 
	{
		 $str = rawurldecode($str);
		 preg_match_all("/(?:%u.{4})|.{4};|&#\d+;|.+/U",$str,$r);
		 $ar = $r[0];
		 #print_r($ar);
		 foreach($ar as $k=>$v) {
		 if(substr($v,0,2) == "%u")
		 $ar[$k] = iconv("UCS-2","utf-8",pack("H4",substr($v,-4)));
		 elseif(substr($v,0,3) == "")
		 $ar[$k] = iconv("UCS-2","utf-8",pack("H4",substr($v,3,-1)));
		 elseif(substr($v,0,2) == "&#") {
		 echo substr($v,2,-1)."
		";
		 $ar[$k] = iconv("UCS-2","utf-8",pack("n",substr($v,2,-1)));
		 }
		 }
		 return join("",$ar);
	}
	/*******去除标签样式******/
	function del_ys($ys)
	{
		$ys=preg_replace('/<span.*>/siU','<span>',$ys);
		$ys=preg_replace('/<p.*>/siU','<p>',$ys);
		$ys=preg_replace('/<table.*>/siU','<p>',$ys);
		$ys=preg_replace('/<td.*>/siU','<p>',$ys);
		$ys=preg_replace('/<tr.*>/siU','<p>',$ys);
		$ys=preg_replace('/<v.*>/siU','<v>',$ys);
		$ys=preg_replace('/<b.*>/siU','<b>',$ys);
		$ys=preg_replace('/<div.*>/siU','<div>',$ys);
		return $ys;
	}



	function get_webcookie()
	{
		$cnt=$this->vcurl2('http://www.webofknowledge.com/?DestApp=UA','','');
		preg_match_all('/Set-Cookie:(.*)Path/siU',$cnt,$arr);
		$cookievalue=implode('',$arr[1]);
		return $cookievalue;
	}
}





?>