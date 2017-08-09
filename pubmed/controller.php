<?php
//echo phpinfo();exit;
session_start();
set_time_limit(0);
ob_end_clean();
//error_reporting("all~notice");
//閰嶇疆鏂囦欢
//include_once('config.php');
//鏂规硶鍏敤妯″潡  鍏敤鐨勬柟娉曟斁鍒拌繖涓噷闈�
$ipath	= dirname(__FILE__);
include_once($ipath.'/base.php');
//鏂囦欢澶瑰悕 (閫氳繃鏂囦欢澶瑰悕鍙互鐪嬪嚭鏈璁块棶鎺ュ彛鏄共鍢涚殑)
$control	= $_REQUEST['control'];
//鏂规硶鍚�
$action		= $_REQUEST['action'];
//鏂囦欢鍚嶅拰绫诲悕閮界敤control
//echo $ipath.'/'.$control.'/control.php';exit;
include_once($ipath.'/'.$control.'/control.php');
$obj		= new control();
$obj->$action();

//print_R(json_encode($obj));
//exit;
?>