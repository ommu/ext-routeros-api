<?php
/**
 * Description of Mapi_Ip_Address
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpaddress {
	/**
	 * @access private
	 * @var type array
	 */
	private $talker;
	private $_conn;
	
	function __construct($talker, $conn) {
		$this->talker = $talker;
		$this->_conn = $conn;
	}

	 /**
	  * This method is used to add the ip address
	  * @param type $address string
	  * @param type $interface string
	  * @param type $comment string
	  * @return type array
	  */
	public function add_address($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/address/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	/**
	 * This method is used to display all ip address
	 * @return type array
	 * 
	 */
	public function get_all_address() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/address/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Address To Set, Please Your Add Ip Address";
		}
	}
	
	/**
	 * This method is used to activate the ip address by id
	 * @param type $id is not an array
	 * @return type array
	 * 
	 * 
	 */
	public function enable_address($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/address/enable");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	  }
	
	/**
	 * This method is used to disable ip address by id
	 * @param type $id string 
	 * @return type array
	 * 
	 * 
	 */
	public function disable_address($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/address/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to remove the ip address by id
	 * @param type $id is not an array
	 * @return type array
	 * 
	 */
	public function delete_address($id) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/address/remove");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
   }
	
	/**
	 * This method is used to set or edit by id
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function set_address($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/address/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	   
	
	/**
	 * This method is used to display one ip address 
	 * in detail based on the id
	 * @param type $id not array
	 * @return type array
	 * 
	 */
	public function detail_address($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/address/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Address With This id = ".$id;
		}
				
	}
}
