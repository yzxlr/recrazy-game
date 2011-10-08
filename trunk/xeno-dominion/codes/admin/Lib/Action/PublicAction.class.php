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
		/*
        //0. Initialization
		//0.1 Global variables
		$user = array();
		//0.2 Define Tables
		$tb_users = M("users");
		//0.4 Condition
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table users
		//1.1 Update
		//1.2 Select
		$user = $tb_users -> where() -> select();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
        $this->display();
		
		//*/
    }

    public function login()
    {
		//0. Initialization
		//0.1 Global variables
		$user = array();
		//0.2 Define Tables
		$tb_users = M("users");
		//0.4 Condition
		$condition = array();
		//0.8 Error: error pool
		$error_pool = array();
		//0.9 massenger
		$msg = array("title"=>"Login"); 
		//1. Table users
		//1.1 Update
		//1.2 Select
		$user = $tb_users -> where() -> select();
		
		//10. Display
		$this->assign("error_pool",$error_pool);
		$this->assign("msg",$msg);
        $this->display();
    }
	
	public function add(){
	}
	
	public function edit(){
	}
	
	public function del(){
	}














}
?>