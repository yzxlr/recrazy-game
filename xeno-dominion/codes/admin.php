<?php
//载入全局定义
require 'define.inc.php';

//载入ThinkSNS模式定义文件

define('APP_NAME'	, 'admin');
define('APP_PATH'	, CMS_PATH.'/'.APP_NAME);
define('APP_URL'	, CMS_URL.'/'.APP_NAME);
define('APP_ROOT'	, CMS_URL);
define('BESTCMS'	, true);

//载入核心文件
require(FRAME_PATH."/ThinkPHP.php");

//实例化一个网站应用实例
App::run();

?>