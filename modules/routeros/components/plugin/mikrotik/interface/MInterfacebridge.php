<?php
/**
 * Description of Mapi_interface_Bridge
 *
 * TOC :
 *	Bridge Interface Setup
 *	  get_all_bridge
 *	  add_bridge
 *	  enable_bridge
 *	  disable_bridge
 *	  set_bridge
 *	  detail_bridge
 *	  delete_bridge
 *	Bridge NAT
 *	  get_all_bridge_nat
 *	  add_bridge_nat
 *	  enable_bridge_nat
 *	  disable_bridge_nat
 *	  set_bridge_nat
 *	  detail_bridge_nat
 *	  delete_bridge_nat
 *	Bridge Settings
 *	  get_all_bridge_settings
 *	  set_bridge_settings 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacebridge {
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
	 * This method used for get all interface bridge
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function get_all_bridge() {
		$array = $this->_conn->comm("/interface/bridge/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bridge To Set, Please Your Add Interface Bridge";
	}
	
	/**
	 * This method used for add new interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function add_bridge($param) {
		$this->_conn->comm("/interface/bridge/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function enable_bridge($param) {
		$this->_conn->comm("/interface/bridge/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function disable_bridge($param) {
		$this->_conn->comm("/interface/bridge/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function set_bridge($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/bridge/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function detail_bridge($param) {
		$array = $this->_conn->comm("/interface/bridge/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bridge With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Interface_Setup
	 *
	 * @return type array
	 */
	public function delete_bridge($param) {
		$this->_conn->comm("/interface/bridge/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all interface bridge
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function get_all_bridge_nat() {
		$array = $this->_conn->comm("/interface/bridge/nat/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bridge NAT To Set, Please Your Add Interface Bridge NAT";
	}
	
	/**
	 * This method used for get all interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function add_bridge_nat($param) {
		$this->_conn->comm("/interface/bridge/nat/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function enable_bridge_nat($param) {
		$this->_conn->comm("/interface/bridge/nat/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function disable_bridge_nat($param) {
		$this->_conn->comm("/interface/bridge/nat/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function set_bridge_nat($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/bridge/nat/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function detail_bridge_nat($param) {
		$array = $this->_conn->comm("/interface/bridge/nat/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bridge NAT With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface bridge
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_NAT
	 *
	 * @return type array
	 */
	public function delete_bridge_nat($param) {
		$this->_conn->comm("/interface/bridge/nat/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all interface Bridge Settings
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Settings
	 *
	 * @return type array
	 */
	public function get_all_bridge_settings() {
		$array = $this->_conn->comm("/interface/bridge/settings/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bridge Settings To Set, Please Your Add Interface Bridge Settings";
	}
	
	/**
	 * This method used for set interface Bridge Settings
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bridge#Bridge_Settings
	 *
	 * @return type array
	 */
	public function set_bridge_settings($param) {
		$this->_conn->comm("/interface/bridge/settings/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

