<?php 
header("Content-type:text/html;charset=utf-8");
set_time_limit(0);
//ob_end_clean();
error_reporting("all~notice");
require_once __DIR__ . '/data.php';

//echo $filename;exit;
$obj = new data();
$enurl = isset($_GET['url']) ? $_GET['url'] : '';
$from = isset($_GET['from']) ? $_GET['from'] : 'auto';
$to = isset($_GET['to']) ? $_GET['to'] : 'zh-CN';
$url = 'https://translate.google.com.hk/translate?hl=zh-CN&ie=UTF8&prev=_t&sl='.$from.'&tl='.$to.'&u='.$enurl;
$google =$obj->vcurl($url);
//echo $google;exit;
preg_match_all('/src="(.*)"/siU', $google, $arr);
//echo $arr[1][1];exit;
$zhurl = $obj->vcurl($arr[1][1]);
//echo $zhurl;exit;
preg_match_all('/href="(.*)"/siU', $zhurl, $arr2);
//print_r($arr2[1][0]);exit;
//$str = ['sl=en','&amp;'];
//$replace = ['sl=auto','&'];
$newurl = str_replace('&amp;', '&', $arr2[1][0]);
//echo $newurl;exit;
$data = $obj->vcurl($newurl);
preg_match_all('/<\/iframe>(.*)<\/html>/siU', $data, $arr3);
if(empty($arr[1][0])){
	echo $data;
}else{
	print_r($arr3[1][0]);
}

//preg_match_all('/<\/iframe>(.*)<\/html>/siU', $data, $arr3);
//$filename = __DIR__.'/cache/'.rand(000000,999999).'.html';
//$filenames = str_replace('C:\phpStudy\WWW\fan', 'http://47.52.57.61/fan', $filename);
//echo $filename;exit;
//echo $arr3[1][0];exit;
//$datas = $obj->vcurl($arr3[1][0]);


