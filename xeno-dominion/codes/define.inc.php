<?php
//由于多应用情况下，目录由应用自己设置，核心系统就需要定义主程序的路径
define("CMS_PATH", $_SERVER['DOCUMENT_ROOT'].''); 
// define("CMS_PATH", 'C:/wamp/www/Bestcms/');

//应用跳转到核心需要的路径
define('CMS_URL', 'http://yellow.tk');
define('WEBSITE_DOMAIN','yellow.tk'); 

//兼容旧系统
define('ROOT_PATH',	CMS_PATH);

//ThinkPHP框架目录
define('FRAME_PATH', CMS_PATH.'/ThinkPHP');
//define('THINK_MODE', 'ThinkSNS');

//公共目录和风格目录
define('PUBLIC_PATH', CMS_PATH."/public");
define('PUBLIC_URL'	, CMS_URL."/public");
define('__PUBLIC__'	, CMS_URL."/public");

//附件上传目录
define('UPLOAD_PATH', CMS_PATH."/data/uploads/");	// 结尾有 /
define('UPLOAD_URL'	, CMS_URL."/data/uploads/");		// 结尾有 /

//

?>
