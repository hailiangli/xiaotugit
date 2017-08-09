<?php 
header("Content-type:text/html;charset=utf-8");
set_time_limit(0);
ob_end_clean();
error_reporting("all~notice");
require_once __DIR__ . '/data.php';
$obj = new data();
$enurl = isset($_GET['url']) ? $_GET['url'] : '';
$from = isset($_GET['from']) ? $_GET['from'] : 'auto';
$to = isset($_GET['to']) ? $_GET['to'] : 'zh-CN';
$url = 'https://translate.google.com.hk/translate?hl=zh-CN&ie=UTF8&prev=_t&sl='.$from.'&tl='.$to.'&u='.$enurl;
//$url = 'https://translate.google.com.hk/translate?hl=zh-CN&ie=UTF8&prev=_t&sl=auto&tl=zh-CN&u='.$enurl;
//$url = 'https://translate.google.com.hk/translate?hl=zh-CN&ie=UTF8&prev=_t&sl=en&tl=zh-CN&u='.$enurl;
$google =$obj->vcurl($url);
//echo $google;exit;
preg_match_all('/src="(.*)"/siU', $google, $arr);
$zhurl = $obj->vcurl($arr[1][1]);
preg_match_all('/href="(.*)"/siU', $zhurl, $arr2);
//$str = ['sl=en','&amp;'];
//$replace = ['sl=auto','&'];
//$newurl = str_replace($str, $replace, $arr2[1][0]);
$newurl = str_replace('&amp;', '&', $arr2[1][0]);
$data = $obj->vcurl($newurl);
preg_match_all('/<\/iframe>(.*)<\/html>/siU', $data, $arr3);
if(empty($arr[1][0])){
	echo $data;
}else{
	print_r($arr3[1][0]);
}
//print_r($arr3[1][0]);

