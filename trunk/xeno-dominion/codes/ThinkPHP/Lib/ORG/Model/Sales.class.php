<?php

class Sales
{
	
	private $uid; //user id
	private $sales_earning_rate;
	private $referral_earning_rate;
	private $db_sales_default_machine;
	private $db_sales_special_machine;
	private $db_sales;
	private $db_sales_record;
	private $db_sales_total_earning;
	
	public function __construct($uid) {
		$this->uid = $uid;
		$this->db_sales = M("Sales");
		$this->db_sales_record = M("salesRecord");
		$this->db_sales_total_earning = M("salesTotalEarning");
	}
	
	public function fetchSalesByRefCode($sales_referral_code){
		$sales_condition['sales_referral_code'] = $sales_referral_code;
		$parent_uid_fetch = $this->db_sales->where($sales_condition)->find();
		return $parent_uid_fetch['uid'];
	}
	
	public function insertNewSalesRecord($uid, $parent_id){
		$data['uid'] = $uid;
		$data['parent_id'] = $parent_id;
		$data['reg_date'] = date("Y-m-d H:i:s");
		if($lastInsId = $this->db_sales_record->add($data)){
			echo "Sales Reg. Info. $lastInsId is successfully inserted.";
		}else{
			$this->error("Sales Record Insertion Failed. [ <a href='javascript:history.back()'>Return</a> ]");
		}
	}
	
	public function updateSalesRecord($condition, $data){
		$result = $this->db_sales_record->where($condition)->save($data);
		if($result !== false){
        	echo 'Sales Record Update Succeed';
    	}else{
       		echo 'Sales Record Update Failed';
   		}
	}
	
	//function to get sales_earning_rate
	public function getSalesEarningRate($uid){
		$sales_condition['uid'] = $uid;
		$sales_earning_rate_fetch = $this->db_sales->field(array('sales_earning_rate'))->where($sales_condition)->find();
		return $sales_earning_rate_fetch['sales_earning_rate'];
	}
	
	//function to get referral_earning_rate
	public function getReferralEarningRate($uid){
		$sales_condition['uid'] = $uid;
		$referral_earning_rate_fetch = $this->db_sales->field(array('referral_earning_rate'))->where($sales_condition)->find();
		return $referral_earning_rate_fetch['referral_earning_rate'];
	}
	
	//function to fetch stuff from ry_sales
	public function fetchSales($field, $condition){
		return $this->db_sales->field($field)->where($condition)->find();
	}
	//function to fetch stuff from ry_sales
	public function fetchSalesAll($field, $condition){
		return $this->db_sales->field($field)->where($condition)->select();
	}
	
	//function to insert stuff into ry_sales_total_earning
	public function insertSalesTotalEarning($data){
		return $this->db_sales_total_earning->add($data);
	}
	
	//function to fetch stuff from ry_sales_total_earning
	public function fetchSalesTotalEarning($field, $condition){
		return $this->db_sales_total_earning->field($field)->where($condition)->find();
	}
	
	//function to update ry_sales_total_earning
	public function updateSalesTotalEarning($condition, $field){
		
	}
	
	//function to update sales_earning in sales_total_earning
	public function updateSalesEarning($uid, $amount, $date){
		//fetch from sales_total_earning
		$sales_total_earning_fetch = $this->db_sales_total_earning->query("SELECT id FROM ry_sales_total_earning WHERE uid = '$uid' AND added = '$date'");
		var_dump($sales_total_earning_fetch);
		
		$add_data['uid'] = $uid;
		$add_data['sales_earning'] = $amount;
		$add_data['total'] = $amount;
		$add_data['added'] = date("Y-m-d H:i:s");
		//try insert, otherwise update
		if(empty($sales_total_earning_fetch)){
			//insert done
			echo "insert";
			$this->insertSalesTotalEarning($add_data);
		}else{
			//update
			echo "update";
			$this->db_sales_total_earning->query("UPDATE ry_sales_total_earning SET sales_earning = sales_earning + $amount, total = total + $amount WHERE uid = '$uid' AND added = '$date'");
		}
	}
	
	//function to update referral_earning in sales_total_earning after sales_earning update
	public function updateReferralEarning($uid, $amount, $date){
		$this->db_sales_total_earning->query("UPDATE ry_sales_total_earning SET referral_earning = referral_earning + $amount, total = total + $amount WHERE uid = '$uid' AND added LIKE '".$date."%'");
	}
	
	//
}

?>