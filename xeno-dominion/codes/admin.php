<?php
//开发时的一半配置
//http://www.ciphp.com/2010/05/436

//jack调试用 （另外的调试设置在 admin/conf/config.php中的末尾）
define('NO_CACHE_RUNTIME',True);//不生成runtime文件
//firePHP
require_once('./public/FirePHPCore/FirePHP.class.php');
$firephp = FirePHP::getInstance(true);
$var = array('i'=>10, 'j'=>20);
//$firephp->log($var, 'Iterators');
require_once('./public/FirePHPCore/fb.php');
//FB::send("These two messages came from /admin.php");
//firePHP ends

define("CMS_PATH", $_SERVER['DOCUMENT_ROOT'].''); 


// 定丿ThinkPHP框架路徂
define('THINK_PATH', './ThinkPHP/');
//定丿项目名称和路徂
define('APP_NAME', 'Myapp');
define('APP_PATH', './admin');
// 加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");
//实例化一个网站应用实例
App::run();
?>