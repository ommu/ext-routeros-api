<?php
/**
 * Description of Mapi_Ip_Firewall
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpfirewall {
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
	 * This method is used to add the firewall nat
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function add_firewall_nat($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/firewall/nat/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to disable firewall nat by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable_firewall_nat($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/nat/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";	  
	}
	
	/**
	 * This method is used to enable firewall nat by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_firewall_nat($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/nat/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";	  
	}
	
	/**
	 * This method is used to change firewall nat based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_firewall_nat($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/nat/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to remove firewall nat
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_firewall_nat($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/nat/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";	  
	}
	
	/**
	 * This method is used to display all firewall nat
	 * @return type array
	 * 
	 */
	public function get_all_firewall_nat() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/nat/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall NAT To Set, Please Your Add Ip Firewall NAT";
		}
	}
	
	 /**
	 * This method is used to display one firewall nat 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_firewall_nat($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/nat/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall NAT With This id = ".$id;
		}
	}
	
	/**
	 *
	 * @param type $param array
	 * @return type array
	 * This method is used to add the firewall filter
	 */
	public function add_firewall_filter($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/firewall/filter/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to display all firewall filter
	 * @return type array
	 * 
	 */
	public function get_all_firewall_filter() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/filter/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Filter To Set, Please Your Add Ip Firewall Filter";
		}
	}
	
	 /**
	 * This method is used to enable firewall filter by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_firewall_filter($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/filter/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	 /**
	 * This method is used to disable firewall filter by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable_firewall_filter($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/filter/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	 /**
	 * This method is used to remove firewall filter by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_firewall_filter($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/filter/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method is used to change firewall nat based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_firewall_filter($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/filter/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	 /**
	 * This method is used to display one firewall filter
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_firewall_filter($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/filter/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Filter With This id = ".$id;
		}
	}
	
	/**
	 * This method used for add new Ip Firewall Mangle 
	 * @param type $param array
	 * @return type array
	 */
	public function add_firewall_mangle($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/firewall/mangle/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for disable Ip Firewall Mangle
	 * @param type $id string
	 * @return type array
	 */
	public function disable_firewall_mangle($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/mangle/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method used for enable Ip Firewall Mangle
	 * @param type $id string
	 * @return type array
	 */
	public function enable_firewall_mangle($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/mangle/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method used for delete Ip Firewall Mangle
	 * @param type $id string
	 * @return type array
	 */
	public function delete_firewall_mangle($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/mangle/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method used for detail Ip Firewall Mangle
	 * @param type $id string
	 * @return type array
	 */
	public function detail_firewall_mangle($id) {
		 $sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/mangle/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Mangle With This id = ".$id;
		}
	}
	
	/**
	 * This method used for set or edit Ip Firewall Mangle
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_firewall_mangle($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/mangle/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for get all Ip Firewall Mangle
	 * @return type array
	 */
	public function get_all_firewall_mangle() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/mangle/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Mangle To Set, Please Your Add Ip Firewall Mangle";
		}		
	}
	
	/**
	 * This method used for get all firewall connection
	 * @return type array
	 */
	public function get_all_firewall_connection() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/connection/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Connection To Set, Please Your Add Ip Firewall Connection";
		}		
	}
	
	/**
	 * This method used for delete firewall connection
	 * @param type $id string
	 * @return type array
	 */
	public function delete_firewall_connection($id) {
		 $sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/connection/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method used for get all Ip Firewall Service Port
	 * @return type arrray
	 */
	public function get_all_firewall_service_port() {
		 $sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/service-port/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall service-port To Set, Please Your Add Ip Firewall service-port";
		}
	}
	
	/**
	 * This method used for disable Ip Firewall Service Port
	 * @param type $id string
	 * @return type array
	 */
	public function disable_firewall_service_port($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/service-port/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method used for enable Ip Firewall Service Port
	 * @param type $id string
	 * @return type array
	 */
	public function enable_firewall_service_port($id) {
	   $sentence = new SentenceUtil();
		$sentence->addCommand("/ip/firewall/service-port/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 *
	 * @param type $id string 
	 * @return type array
	 * 
	 */
	public function detail_firewall_service_port($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/firewall/service-port/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Firewall Service-Port With This id = ".$id;
		}
	}
	
}


