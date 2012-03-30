<?php

class Click
{
	private $ip;
	private $cid; //company id
	private $uid; //user id
	private $pid; //product id
	private $db_month_click;
	private $db_year_company_click;
	private $db_year_product_click;
	private $today;
	
	//public function __construct() {
    // 	$this->ip = $this->get_ip_address(); //get the ip directly from the constructor
    //}
	
	//this constructor is used to update click 
	public function __construct($cid, $pid, $uid, $p_type) {
		$this->ip = $this->get_ip_address();
		$this->cid = $cid;
		$this->uid = $uid;
		$this->today = date("Y-m-d");
		$this->db_month_click = M("monthClick");
		if($p_type == "1"){//record company
			$this->db_year_company_click = M("yearCompanyClick");
			$this->addCompanyRecord($this->ip, $this->cid, $this->uid);
		}else if($p_type == "2"){
			$this->db_year_product_click = M("yearProductClick");
			$this->pid = $pid;
			$this->addProductRecord($this->ip, $this->cid, $this->pid, $this->uid);
		}
	}
	
	//function to get the real IP address from client
	public function get_ip_address() {
    	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        	if (array_key_exists($key, $_SERVER) === true) {
            	foreach (explode(',', $_SERVER[$key]) as $ip_addr) {
                	if (filter_var($ip_addr, FILTER_VALIDATE_IP) !== false) {
						return $ip_addr;
                    	//return $ip;
                	}
            	}
        	}
    	}
	}
	
	//add up company click record in both month_click and year_company_click
	public function addCompanyRecord($ip, $cid, $uid){
		//create record in year_company_click if not found
		$this->createYearCompanyClickRecord($cid);
		//check if record exists or not in month_click
		if(!isset($uid)){
			$search_record = $this->db_month_click->query("SELECT id FROM ry_month_click WHERE ip = '".ip2long($ip)."' AND cid = '$cid' AND uid IS NULL AND p_type = '1' AND added = '$this->today'");
		}else{
			$search_record = $this->db_month_click->query("SELECT id FROM ry_month_click WHERE ip = '".ip2long($ip)."' AND cid = '$cid' AND uid = '$uid' AND p_type = '1' AND added = '$this->today'");
		}
		if(!empty($search_record)){
			//update conter in month_click
			$month_id = $search_record['0']['id'];
			$this->db_month_click->execute("UPDATE ry_month_click SET counter = counter + 1 WHERE id = '$month_id';");
			//update counter in year_company_click
			if(!isset($uid)){
				$this->db_year_company_click->execute("UPDATE ry_year_company_click SET a_click = a_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND added = '$this->today'");
			}else{
				$this->db_year_company_click->execute("UPDATE ry_year_company_click SET u_click = u_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND added = '$this->today'");
			}
		}else{
			//record not found, start to insert to both month_click
			$data['ip'] = ip2long($ip);
			$data['cid'] = $cid;
			$data['uid'] = $uid;
			$data['p_type'] = 1;
			$data['counter'] = 1;
			$data['added'] = $this->today;
			$this->db_month_click->add($data);
			
			//update unique counter and counter in year_company_click
			if(!isset($uid)){
				$this->db_year_company_click->execute("UPDATE ry_year_company_click SET a_unik_click = a_unik_click + 1, click_unik_counter = click_unik_counter + 1, a_click = a_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND added = '$this->today'");
			}else{
				$this->db_year_company_click->execute("UPDATE ry_year_company_click SET u_unik_click = u_unik_click + 1, click_unik_counter = click_unik_counter + 1, u_click = u_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND added = '$this->today'");
			}
		}
	}
	
	//if year company click record is not found based on company id, then create one record
	public function createYearCompanyClickRecord($cid){
		$condition['cid'] = $cid;
		$condition['added'] = $this->today;
		$search_record = $this->db_year_company_click->where($condition)->find();
		if(!isset($search_record)){
			$this->db_year_company_click->add($condition);
		}
	}
	
	//add up product click record in both month_click and year_product_click
	public function addProductRecord($ip, $cid, $pid, $uid){
		//create record in year_product_click if not found
		$this->createYearProductClickRecord($pid, $cid); //echo $pid;
		//check if record exists or not in month_click
		if(!isset($uid)){
			$search_record = $this->db_month_click->query("SELECT id FROM ry_month_click WHERE ip = '".ip2long($ip)."' AND cid = '$cid' AND pid = '$pid' AND uid IS NULL AND p_type = '2' AND added = '$this->today'");
		}else{
			$search_record = $this->db_month_click->query("SELECT id FROM ry_month_click WHERE ip = '".ip2long($ip)."' AND cid = '$cid' AND pid = '$pid' AND uid = '$uid' AND p_type = '2' AND added = '$this->today'");
		}
		if(!empty($search_record)){
			$month_id = $search_record['0']['id'];
			$this->db_month_click->execute("UPDATE ry_month_click SET counter = counter + 1 WHERE id = '$month_id';");
			//update counter in year_product_click
			if(!isset($uid)){
				$this->db_year_product_click->execute("UPDATE ry_year_product_click SET a_click = a_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND pid = '$pid' AND added = '$this->today'");
			}else{
				$this->db_year_product_click->execute("UPDATE ry_year_product_click SET u_click = u_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND pid = '$pid' AND added = '$this->today'");
			}
		}else{
			//record not found, start to insert to both month_click
			$data['ip'] = ip2long($ip);
			$data['cid'] = $cid;
			$data['pid'] = $pid;
			$data['uid'] = $uid;
			$data['p_type'] = 2;
			$data['counter'] = 1;
			$data['added'] = $this->today;
			$this->db_month_click->add($data);
			//update counter in year_product_click
			if(!isset($uid)){
				$this->db_year_product_click->execute("UPDATE ry_year_product_click SET a_unik_click = a_unik_click + 1, click_unik_counter = click_unik_counter + 1, a_click = a_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND pid = '$pid' AND added = '$this->today'");
			}else{
				$this->db_year_product_click->execute("UPDATE ry_year_product_click SET u_unik_click = u_unik_click + 1, click_unik_counter = click_unik_counter + 1, u_click = u_click + 1, click_counter = click_counter + 1 WHERE cid = '$cid' AND pid = '$pid' AND added = '$this->today'");
			}
		}
		
	}
	
	//if year product click record is not found based on company id, then create one record
	public function createYearProductClickRecord($pid, $cid){
		$condition['cid'] = $cid;
		$condition['pid'] = $pid;
		$condition['added'] = $this->today;
		$search_record = $this->db_year_product_click->where($condition)->find();
		if(!isset($search_record)){
			$this->db_year_product_click->add($condition);
		}
	}
	
	/**------------------------------*
	 * getter and setter functions
	 *-------------------------------*/
	//set ip
	public function setIP($ip_addr){
		$this->ip = $ip_addr;
	}
	//get ip
	public function getIP(){
		return $this->ip;
	}
	
	//set cid
	public function setCID($cid){
		$this->cid = $cid;
	}
	//get cid
	public function getCID(){
		return $this->cid;	
	}
	
	//set pid
	public function setPID($pid){
		$this->pid = $pid;
	}
	//get cid
	public function getPID(){
		return $this->pid;	
	}
	
	//set uid
	public function setUID($uid){
		$this->uid = $uid;
	}
	//get cid
	public function getUID(){
		return $this->uid;	
	}
}

?>