<?php
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