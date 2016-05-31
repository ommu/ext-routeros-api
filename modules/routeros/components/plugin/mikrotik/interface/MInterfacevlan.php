<?php
/**
 * Description of Mapi_Interface_Vlan
 *
 * TOC :
 *	get_all_vlan
 *	add_vlan
 *	enable_vlan
 *	disable_vlan
 *	set_vlan
 *	detail_vlan
 *	delete_vlan 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacevlan {
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
	 * This method is used to display all vlan
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function get_all_vlan() {
		$array = $this->_conn->comm("/interface/vlan/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface VLAN To Set, Please Your Add Ip Address";
	}
	
	/**
	 * This method is used to add vlan
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function add_vlan($param) {
		$this->_conn->comm("/interface/vlan/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}	
	 
	/**
	 * This method is used to enable vlan by id
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function enable_vlan($param) {
		$this->_conn->comm("/interface/vlan/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable vlan
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function disable_vlan($param) {
		$this->_conn->comm("/interface/vlan/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function set_vlan($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vlan/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one vlan in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function detail_vlan($param) {
		$array = $this->_conn->comm("/interface/vlan/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface VLAN With This id = ".$param;
	}
	
	/**
	 * This method is used to delete vlan
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VLAN
	 *
	 * @return type array
	 */
	public function delete_vlan($param) {
		$this->_conn->comm("/interface/vlan/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

