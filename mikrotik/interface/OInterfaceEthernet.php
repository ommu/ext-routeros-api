<?php
/**
 * Description of OApi_File
 *
 * TOC :
 *	get_all_interface
 *	enable_interface
 *	disable_interface
 *	set_interface
 *	detail_interface 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class OInterfaceEthernet {
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
	 * This method is used to display all interface
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function get_all_interface() {
		$array = $this->_conn->comm("/interface/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return array();
	}
	
	/**
	 * This method is used to enable interface
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function enable_interface($param) {
		$this->_conn->comm("/interface/enable", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * This method is used to disable interface
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function disable_interface($param) {
		$this->_conn->comm("/interface/disable", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * This method is used to display one interface in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function set_interface($param) {
		$this->_conn->comm("/interface/set", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * This method is used to display one interafce in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function detail_interface($param) {
		$array = $this->_conn->comm("/interface/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return array();
	}
}
