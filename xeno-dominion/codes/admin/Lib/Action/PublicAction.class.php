<?php
// 本文档自动生成，仅供测试运行
class PublicAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->display();
    }

    public function login()
    {
		//0. Initialization
		//0.1 Global variables
		//0.2 Define Tables
		$tb_users = M("users");
		var_dump($tb_users);
		//1. Table users
		
		
		//10. Display
        $this->display();
    }

}
?>