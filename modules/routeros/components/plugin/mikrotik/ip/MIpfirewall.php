<?php
/**
 * Description of Mapi_Ip_Firewall
 *
 * TOC :
 *	Filter Rules
 *	  get_all_firewall_filter
 *	  add_firewall_filter
 *	  enable_firewall_filter
 *	  disable_firewall_filter
 *	  set_firewall_filter
 *	  detail_firewall_filter
 *	  delete_firewall_filter
 *	NAT
 *	  get_all_firewall_nat
 *	  add_firewall_nat
 *	  enable_firewall_nat
 *	  disable_firewall_nat
 *	  set_firewall_nat
 *	  detail_firewall_nat
 *	  delete_firewall_nat
 *	Mangle
 *	  get_all_firewall_mangle
 *	  add_firewall_mangle
 *	  enable_firewall_mangle
 *	  disable_firewall_mangle
 *	  set_firewall_mangle
 *	  detail_firewall_mangle
 *	  delete_firewall_mangle
 *	Connections
 *	  get_all_firewall_connection
 *	  delete_firewall_connection
 *	Service Ports
 *	  get_all_firewall_service_port
 *	  enable_firewall_service_port
 *	  disable_firewall_service_port
 *	  detail_firewall_service_port 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
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
	 * This method is used to display all firewall filter
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
	 */
	public function get_all_firewall_filter() {
		$array = $this->_conn->comm("/ip/firewall/filter/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Filter To Set, Please Your Add Ip Firewall Filter";
	}
	
	/**
	 *
	 * @param type $param array
	 * @return type array
	 * This method is used to add the firewall filter
	 */
	public function add_firewall_filter($param) {
		$this->_conn->comm("/ip/firewall/filter/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	 /**
	 * This method is used to enable firewall filter
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
	 */
	public function enable_firewall_filter($param) {
		$this->_conn->comm("/ip/firewall/filter/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	 /**
	 * This method is used to disable firewall filter
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
	 */
	public function disable_firewall_filter($param) {
		$this->_conn->comm("/ip/firewall/filter/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change firewall nat
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
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
	 * This method is used to display one firewall filter in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
	 */
	public function detail_firewall_filter($param) {
		$array = $this->_conn->comm("/ip/firewall/filter/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Filter With This id = ".$param;
	}
	
	 /**
	 * This method is used to remove firewall filter
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Filter
	 *
	 * @return type array
	 */
	public function delete_firewall_filter($param) {
		$this->_conn->comm("/ip/firewall/filter/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all firewall nat
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function get_all_firewall_nat() {
		$array = $this->_conn->comm("/ip/firewall/nat/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall NAT To Set, Please Your Add Ip Firewall NAT";
	}
	
	/**
	 * This method is used to add the firewall nat
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function add_firewall_nat($param) {
		$this->_conn->comm("/ip/firewall/nat/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable firewall nat
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function enable_firewall_nat($param) {
		$this->_conn->comm("/ip/firewall/nat/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable firewall nat
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function disable_firewall_nat($param) {
		$this->_conn->comm("/ip/firewall/nat/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change firewall nat
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
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
	 * This method is used to display one firewall nat in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function detail_firewall_nat($param) {
		$array = $this->_conn->comm("/ip/firewall/nat/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall NAT With This id = ".$param;
	}
	
	/**
	 * This method is used to remove firewall nat
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/NAT
	 *
	 * @return type array
	 */
	public function delete_firewall_nat($param) {
		$this->_conn->comm("/ip/firewall/nat/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all Ip Firewall Mangle
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function get_all_firewall_mangle() {
		$array = $this->_conn->comm("/ip/firewall/mangle/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Mangle To Set, Please Your Add Ip Firewall Mangle";
	}
	
	/**
	 * This method used for add new Ip Firewall Mangle 
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function add_firewall_mangle($param) {
		$this->_conn->comm("/ip/firewall/mangle/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable Ip Firewall Mangle
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function enable_firewall_mangle($param) {
		$this->_conn->comm("/ip/firewall/mangle/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable Ip Firewall Mangle
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function disable_firewall_mangle($param) {
		$this->_conn->comm("/ip/firewall/mangle/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit Ip Firewall Mangle
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
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
	 * This method used for detail Ip Firewall Mangle
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function detail_firewall_mangle($param) {
		$array = $this->_conn->comm("/ip/firewall/mangle/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Mangle With This id = ".$param;
	}
	
	/**
	 * This method used for delete Ip Firewall Mangle
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Mangle
	 *
	 * @return type array
	 */
	public function delete_firewall_mangle($param) {
		$this->_conn->comm("/ip/firewall/mangle/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all firewall connection
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Connection_tracking
	 *
	 * @return type array
	 */
	public function get_all_firewall_connection() {
		$array = $this->_conn->comm("/ip/firewall/connection/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Connection To Set, Please Your Add Ip Firewall Connection";
	}
	
	/**
	 * This method used for delete firewall connection
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Firewall/Connection_tracking
	 *
	 * @return type array
	 */
	public function delete_firewall_connection($param) {
		$this->_conn->comm("/ip/firewall/connection/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all Ip Firewall Service Port
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services#Service_Ports
	 *
	 * @return type array
	 */
	public function get_all_firewall_service_port() {
		$array = $this->_conn->comm("/ip/firewall/service-port/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall service-port To Set, Please Your Add Ip Firewall service-port";
	}
	
	/**
	 * This method used for enable Ip Firewall Service Port
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services#Service_Ports
	 *
	 * @return type array
	 */
	public function enable_firewall_service_port($param) {
		$this->_conn->comm("/ip/firewall/service-port/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable Ip Firewall Service Port
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services#Service_Ports
	 *
	 * @return type array
	 */
	public function disable_firewall_service_port($param) {
		$this->_conn->comm("/ip/firewall/service-port/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for detail Firewall Service Port
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services#Service_Ports
	 *
	 * @return type array
	 */
	public function detail_firewall_service_port($param) {
		$array = $this->_conn->comm("/ip/firewall/service-port/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Firewall Service-Port With This id = ".$param;
	}
	
}


