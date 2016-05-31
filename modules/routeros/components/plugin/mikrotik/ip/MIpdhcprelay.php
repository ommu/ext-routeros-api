<?php
/**
 * Description of Mapi_Ip_Dhcp_Relay
 *
 * TOC :
 *	get_all_dhcp_relay
 *	add_dhcp_relay
 *	enable_dhcp_relay
 *	disable_dhcp_relay
 *	set_dhcp_relay
 *	detail_dhcp_relay
 *	delete_dhcp_relay 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcprelay {
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
	 * This method is used to display all ip dhcp relay
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function get_all_dhcp_relay() {
		$array = $this->_conn->comm("/ip/dhcp-relay/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Relay To Set, Please Your Add Ip Dhcp-Relay";
	}
	
	/**
	 * This method is used to ip add dhcp relay
	 * @param
	 *	name (string; Default: ): Descriptive name for the relay
	 *	interface (string; Default: ): Interface name the DHCP relay will be working on.
	 *	dhcp-server (string; Default: ): List of DHCP servers' IP addresses which should the DHCP requests be forwarded to
	 *	delay-threshold (time | none; Default: none): If secs field in DHCP packet is smaller than delay-threshold, then this packet is ignored
	 *	local-address (IP; Default: 0.0.0.0): The unique IP address of this DHCP relay needed for DHCP server to distinguish relays. If set to 0.0.0.0 - the IP address will be chosen automatically
	 *	add-relay-info (yes | no; Default: no): Adds DHCP relay agent information if enabled according to RFC 3046. Agent Circuit ID Sub-option contains mac address of an interface, Agent Remote ID Sub-option contains MAC address of the client from which request was received.
	 *	relay-info-remote-id (string; Default: ): relay will use this string instead of client MAC address when constructing Option 82 to be sent to DHCP-server. Option 82 consist of interface packets was received from + client mac address or relay-info-remote-id	 
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function add_dhcp_relay($param) {
		$this->_conn->comm("/ip/dhcp-relay/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable ip dhcp relay
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function enable_dhcp_relay($param) {
		$this->_conn->comm("/ip/dhcp-relay/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable ip dhcp relay
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function disable_dhcp_relay($param) {
		$this->_conn->comm("/ip/dhcp-relay/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit ip dhcp relay
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function set_dhcp_relay($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-relay/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one interface bonding in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function detail_dhcp_relay($param) {
		$array = $this->_conn->comm("/ip/dhcp-relay/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Relay With This id = ".$param;
	}
	
	/**
	 * This method is used to remove ip dhcp relay
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Relay
	 *
	 * @return type array
	 */
	public function delete_dhcp_relay($param) {
		$this->_conn->comm("/ip/dhcp-relay/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
