<?php

class Click
{
	private $ip;
	private $cid; //company id
	private $uid; //user id
	private $pid; //product id
	private $db_month_click;
	
	//public function __construct() {
    // 	$this->ip = $this->get_ip_address(); //get the ip directly from the constructor
    //}
	
	//this constructor is used to update company click 
	public function __construct($cid, $uid, $p_type) {
		$this->ip = $this->get_ip_address();
		$this->cid = $cid;
		$this->uid = $uid;
		$this->db_month_click = M("monthClick");
		if($p_type == "1"){//record company
			$this->addCompanyRecord($this->ip, $this->cid, $this->uid);
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
	
	//
	public function addCompanyRecord($ip, $cid, $uid){
		//check if record exists or not.
		$search_condition['ip'] = ip2long($ip);
		$search_condition['cid'] = $cid;
		$search_condition['uid'] = $uid;
		$search_condition['p_type'] = "1";
		$search_condition['added'] = date("Y-m-d");
		$search_record = $this->db_month_click->where($search_condition)->find();
		if(isset($search_record)){
			
			var_dump($search_record);echo "found";
		}else{
			echo "no record";
			$data['ip'] = ip2long($ip);
			$data['cid'] = $cid;
			$data['uid'] = $uid;
			$data['p_type'] = "1";
			$data['counter'] = "1";
			$data['added'] = date("Y-m-d");
			$this->db_month_click->add($data);
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