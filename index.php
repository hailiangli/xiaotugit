<?php
header("Content-type:text/html;charset=utf-8");
//echo $str = "<meta http-equiv='Refresh' content='2;URL=http://pubmed.xiaotu.cn'>";exit;
//header("location:http://www.taobao.com");
echo headers_sent();exit;
//echo '体统将在秒后进行跳转';exit;
/**
 * URL重定向
 * @param string $url 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 */
//$file = __DIR__.'/cache/zhongwen.txt';
function redirect($url, $time=0, $msg='') {
    //多行URL地址支持
    $url        = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg))
        $msg    = '系统将在'.$time.'秒之后自动跳转到'.$url.'!';
    if (!headers_sent()) {// 如果报头未发送，则发送一个
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}
redirect('http://www.baidu.com');
