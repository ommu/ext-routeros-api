<?php
/**
 * Description of Mapi_Ip_Address
 *
 * TOC :
 *	get_all_address
 *	add_address
 *	enable_address
 *	disable_address
 *	set_address
 *	detail_address
 *	delete_address 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
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
	 * This method is used to display all ip address
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	 */
	public function get_all_address() {
		$array = $this->_conn->comm("/ip/address/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Address To Set, Please Your Add Ip Address";
	}

	/**
	 * This method is used to add the ip address
	 * @param
	 *	address (IP/Mask; Default: ): IP address
	 *	network (IP; Default: 0.0.0.0): IP address for the network. For point-to-point links it should be the address of the remote end. Starting from v5RC6 this parameter is configurable only for addresses with /32 netmask (point to point links)
	 *	interface (name; Default: ): Interface name the IP address is assigned to
	 *	broadcast (IP; Default: 255.255.255.255): roadcasting IP address, calculated by default from an IP address and a network mask. Starting from v5RC6 this parameter is removed
	 *	netmask (IP; Default: 0.0.0.0): Delimits network address part of the IP address from the host part	
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	  */
	public function add_address($param) {
		$this->_conn->comm("/ip/address/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to activate the ip address
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	 */
	public function enable_address($param) {
		$this->_conn->comm("/ip/address/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable ip address
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	 */
	public function disable_address($param) {
		$this->_conn->comm("/ip/address/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit by id
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
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
	 * This method is used to display one ip address in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	 */
	public function detail_address($param) {
		$array = $this->_conn->comm("/ip/address/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Address With This id = ".$param;
	}
	
	/**
	 * This method is used to remove the ip address
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Address
	 *
	 * @return type array
	 */
	public function delete_address($param) {
		$this->_conn->comm("/ip/address/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
