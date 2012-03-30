<?php

class Kw
{
	private $kw;
	private $db_month_kw;
	private $db_total_kw;
	private $today;
	
	//this constructor is used to update month_kw and total_kw
	public function __construct($kw, $cid) {
		$this->kw = $kw;
		$this->today = date("Y-m-d");
		$this->db_month_kw = M("monthKw");
		$this->db_total_kw = M("totalKw");
		//insert/update month_kw
		$this->addCompanyKw($this->kw);
		$this->addTotalKw($this->kw);
	}
	
	//function to insert/update month_kw
	public function addCompanyKw($kw){
		//search if record is found in database for today
		$condition['kw'] = $kw;
		$condition['added'] = $this->today;
		$search_record = $this->db_month_kw->where($condition)->find();
		if(isset($search_record)){
			//found record and start to update
			$id = $search_record['id'];
			$this->db_month_kw->query("UPDATE ry_month_kw SET counter = counter + 1 WHERE id = $id");
		}else{
			//record not found and start to insert
			$data['kw'] = $kw;
			$data['added'] = $this->today;
			$data['counter'] = 1;
			$this->db_month_kw->add($data);
		}
	}
	
	//function to insert/update total_kw
	public function addTotalKw($kw){
		//search if record is found in database
		$condition['kw'] = $kw;
		$search_record = $this->db_total_kw->where($condition)->find();
		if(isset($search_record)){
			//found record and start to update
			$id = $search_record['id'];
			$this->db_total_kw->query("UPDATE ry_total_kw SET counter = counter + 1 WHERE id = $id");
		}else{
			//record not found and start to insert
			$data['kw'] = $kw;
			$data['counter'] = 1;
			$this->db_total_kw->add($data);
		}
	}
	
	/**------------------------------*
	 * getter and setter functions
	 *-------------------------------*/
	//set ip
	public function setKW($kw){
		$this->kw = $kw;
	}
	//get ip
	public function getKW(){
		return $this->kw;
	}
	
	//set cid
	public function setCID($cid){
		$this->cid = $cid;
	}
	//get cid
	public function getCID(){
		return $this->cid;	
	}
}