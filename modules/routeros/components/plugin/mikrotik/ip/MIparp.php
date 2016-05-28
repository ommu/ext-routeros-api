<?php
/**
 * Description of Mapi_File
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIparp {
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
	 * This method is used to add arp
	 * @param type $param array
	 * @return type array
	 * j
	 */
	public function add_arp($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/arp/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	 /**
	 * This method is used to delete arp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_arp($id) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/arp/remove");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	 /**
	 * This method is used to enable arp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_arp($id) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/arp/enable");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to disable arp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable($id) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/arp/disable");
	   $sentence->where(".id", "=", $id);
	   $disable = $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	 /**
	 * This method is used to set or edit by id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_arp($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/arp/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display all arp
	 * @return type array
	 * 
	 */
	public function get_all_arp() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/arp/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip ARP To Set, Please Your Add Ip ARP";
		}
	}
	
	 /**
	 * This method is used to display arp
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 *  
	 */
	public function detail_arp($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/arp/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip ARP With This id = ".$id;
		}
				
	}
}
