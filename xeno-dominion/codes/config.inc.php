<?php
//if (!defined('FRAME_PATH')) exit();
return array(
	'DB_TYPE'		=>	'mysql', // 数据库类型
	/*
        'DB_HOST'		=>	'localhost', // 数据库朋务器地址
	'DB_NAME'		=>	'recrazy_xeno', // 数据库名称
	'DB_USER'		=>	'recrazy', // 数据库用户名
	'DB_PWD'		=>	'recrazy', // 数据库密码
	*/
        'DB_HOST'		=>	'10.168.122.105', // 数据库朋务器地址
	'DB_NAME'		=>	'recrazy_xeno', // 数据库名称
	'DB_USER'		=>	'root', // 数据库用户名
	'DB_PWD'		=>	'123456', // 数据库密码
    
        'DB_PREFIX'		=>	'ry_',				//数据库表前缀
	'DB_CHARSET'	=>	'utf8',
	'URL_MODEL'     =>  3,
	'Cache_Data'	=>	SITE_PATH."/data/cache/secache_data",
	'ROUTER_ON'		=>	true,
	'DEBUG_MODE'	=>  false,
	'TS_URL'     	=>  SITE_URL,
	'UPLOAD_PATH'   =>  UPLOAD_PATH,
	'UPLOAD_URL'    =>	UPLOAD_URL,
	//'COOKIE_DOMAIN'	=>	'.bestcms.com',	//cookie域,请替换成你自己的域名 以.开头
	'TOKEN_ON'		=>	true,
	//'TOKEN_NAME'	=>	'bestcms_html_token',
	'TOKEN_TYPE'	=>	'md5',
	//'OTHER_TOKEN'	=>	'js',
	
	'LANG_SWITCH_ON'    => true,        //开启多语言支持开关
	'DEFAULT_LANG'        => 'en-us',    // 默认语言
	'LANG_AUTO_DETECT'    => true,    // 自动侦测语言
	
	'DEFAULT_TIMEZONE'=>'America/Toronto',
	'APP_DEBUG' => true,
	'TMPL_CACHE_ON'   => false,  // 默认开启模板编译缓存 false 的话每次都重新编译模板
	'ACTION_CACHE_ON'  => false,  // 默认关闭Action 缓存
	'HTML_CACHE_ON'   => false,   // 默认关闭静态缓存
	
	//'URL_CASE_INSENSITIVE'=>true,//不识别URL大小写
);
?>