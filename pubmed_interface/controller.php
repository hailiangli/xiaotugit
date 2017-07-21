<?php
error_reporting("all~notice");
session_start();
set_time_limit(0);
ob_end_clean();

include_once("base.php");
//echo '<meta http-equiv="content-type" content="text/html;charset=utf-8">';
$control	= $_REQUEST['control'];
$action		= $_REQUEST['action'];
//echo $control,$action;exit;
//file_put_contents('sbseudd.html',$_SERVER['QUERY_STRING']);
//echo $action;exit;
include_once($control.'\\'.'control.php');
$obj		= new control();
$obj->$action();
$callback = $_GET['callback'] ? $_GET['callback'] : $_POST['callback'];
if($callback){
	echo $callback."(".json_encode($obj).")";
}else{
	echo json_encode($obj);
}
?>