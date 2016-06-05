<?php
/**
 * Description of Mapi_Ip_Route
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
 
class MIproute {
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
			return "No Ip Route To Set, Please Your Add Ip Route";
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
		return "Success";
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
		return "Success";
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
		return "Success";
	}
	
	/**
	 * Can change only static routes
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Route
	 *
	 * @return type array
	 */
	public function set_route($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/route/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
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
			return "No Ip Route With This id = ".$param;
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
		return "Success";
	}
}

