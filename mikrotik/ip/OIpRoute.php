<?php
/**
 * Description of OApi_Ip_Route
 *
 * TOC :
 *	get_all_route
 *	add_route_gateway
 *	enable_route
 *	disable_route
 *	set_route
 *	detail_route
 *	delete_route 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class OIpRoute {
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
	 * This method is used to display all ip route
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function get_all_route() {
		$array = $this->_conn->comm("/ip/route/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return array();
	}
	
	/**
	 * This method is used to add ip route gateway
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function add_route_gateway($param) {
		$this->_conn->comm("/ip/route/add", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * Can change or enable only static routes
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function enable_route($param) {
		$this->_conn->comm("/ip/route/enable", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * Can change or disable only static routes
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function disable_route($param) {
		$this->_conn->comm("/ip/route/disable", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * Can change only static routes
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function set_route($param) {
		$this->_conn->comm("/ip/route/set", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
	
	/**
	 * This method is used to display one ip route in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function detail_route($param) {
		$array = $this->_conn->comm("/ip/route/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return array();
	}
	
	/**
	 * Can change or remove only static routes
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function delete_route($param) {
		$this->_conn->comm("/ip/route/remove", $param);
		$this->_conn->disconnect();
		return array('success'=>1);
	}
}

