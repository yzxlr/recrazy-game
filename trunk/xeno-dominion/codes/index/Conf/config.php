<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=> 'mysql', // 数据库类型
	'DB_HOST'=> 'localhost', // 数据库朋务器地址
	'DB_NAME'=>'recrazy_xeno', // 数据库名称
	'DB_USER'=>'recrazy', // 数据库用户名
	'DB_PWD'=>'recrazy', // 数据库密码
	'DB_PORT'=>'3306', // 数据库端口
	'DB_PREFIX'=>'ry_', // 数据表前缀
	
	'LANG_SWITCH_ON'=>true,
	'DEFAULT_LANGUAGE'=>'en-us',
	'LANG_AUTO_DETECT'    => true,
	
	//jack调试用
	'APP_DEBUG' => true, // 开启调试模式
	'TMPL_CACHE_ON'=>false,//不生缓存模版
	'URL_CASE_INSENSITIVE'=>true,//不识别URL大小写
);
?>