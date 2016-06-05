<?php
/**
 * Description of_Ip_ARP
 *
 * TOC :
 *	get_all_arp
 *	add_arp
 *	enable_arp
 *	disable_arp
 *	set_arp
 *	detail_arp
 *	delete_arp 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
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
	 * This method is used to display all arp
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function get_all_arp() {
		$array = $this->_conn->comm("/ip/arp/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip ARP To Set, Please Your Add Ip ARP";
	}
	
	/**
	 * This method is used to add arp
	 * @param
	 *	address (IP; Default: ): IP address to be mapped
	 *	mac-address (MAC; Default: 00:00:00:00:00:00): MAC address to be mapped to
	 *	interface (string; Default: ): Interface name the IP address is assigned to	 
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function add_arp($param) {
		$this->_conn->comm("/ip/arp/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable arp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function enable_arp($param) {
		$this->_conn->comm("/ip/arp/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable arp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function disable_arp($param) {
		$this->_conn->comm("/ip/arp/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
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
	 * This method is used to display arp in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function detail_arp($param) {
		$array = $this->_conn->comm("/ip/arp/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip ARP With This id = ".$param;
	}
	
	/**
	 * This method is used to delete arp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/ARP
	 *
	 * @return type array
	 */
	public function delete_arp($param) {
		$this->_conn->comm("/ip/arp/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
