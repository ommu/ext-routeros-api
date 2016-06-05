<?php
/**
 * Description of Mapi_Ip_Dhcp_Server
 *
 * TOC :
 *	DHCP
 *	  get_all_dhcp_server
 *	  add_dhcp_server
 *	  enable_dhcp_server
 *	  disable_dhcp_server
 *	  set_dhcp_server
 *	  detail_dhcp_server
 *	  delete_dhcp_server
 *	Network
 *	  get_all_dhcp_server_network
 *	  add_dhcp_server_network
 *	  set_dhcp_server_network
 *	  detail_dhcp_server_network
 *	  delete_dhcp_server_network
 *	Leases
 *	  get_all_dhcp_server_config
 *	  set_dhcp_server_config 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcpserver {
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
	 * This methode is used to display all ip dhcp server
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function get_all_dhcp_server() {
		$array = $this->_conn->comm("/ip/dhcp-server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Server To Set, Please Your Add Ip Dhcp-Server";
	}
	
	/**
	 * This methode is used to add ip dhcp server
	 * @param
	 *	name (string; Default: ): Reference name
	 *	interface (string; Default: ): Interface on which server will be running.
	 *	relay (IP; Default: 0.0.0.0): The IP address of the relay this DHCP server should process requests from:
	 *	lease-time (time; Default: 72h): The time that a client may use the assigned address. The client will try to renew this address after a half of this time and will request a new address after time limit expires.
	 *	address-pool (string | static-only; Default: static-only): IP pool, from which to take IP addresses for the clients. If set to static-only, then only the clients that have a static lease (added in lease submenu) will be allowed.
	 *	src-address (IP; Default: 0.0.0.0): The address which the DHCP client must send requests to in order to renew an IP address lease. If there is only one static address on the DHCP server interface and the source-address is left as 0.0.0.0, then the static address will be used. If there are multiple addresses on the interface, an address in the same subnet as the range of given addresses should be used.
	 *	delay-threshold (time | none; Default: none): If secs field in DHCP packet is smaller than delay-threshold, then this packet is ignored. If set to none - there is no threshold (all DHCP packets are processed)
	 *	authoritative (after-10sec-delay | after-2sec-delay | yes | no; Default: after-2sec-delay)	Option changes the way how server responds to DHCP requests:
	 *	bootp-support (none | static | dynamic; Default: static): Support for BOOTP clients:
	 *	lease-script (string; Default: ): Script that will be executed after lease is assigned or de-assigned. Internal "global" variables that can be used in the script:
	 *	add-arp (yes | no; Default: no): Whether to add dynamic ARP entry. If set to no either ARP mode should be enabled on that interface or static ARP entries should be administratively defined in /ip arp submenu.
	 *	always-broadcast (yes | no; Default: no): Always send replies as broadcasts.
	 *	use-radius (yes | no; Default: no): Whether to use RADIUS server for dynamic leases 
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function add_dhcp_server($param) {
		$this->_conn->comm("/ip/dhcp-server/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to enable ip dhcp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function enable_dhcp_server($param) {
		$this->_conn->comm("/ip/dhcp-server/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to disable ip dhcp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function disable_dhcp_server($param) {
		$this->_conn->comm("/ip/dhcp-server/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to det or edit ip dhcp server 
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function set_dhcp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip dhcp server in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function detail_dhcp_server($param) {
		$array = $this->_conn->comm("/ip/dhcp-server/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Server With This id = ".$param;
	}
	
	/**
	 * This methode is used to remove ip dhcp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#General
	 *
	 * @return type array
	 */
	public function delete_dhcp_server($param) {
		$this->_conn->comm("/ip/dhcp-server/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to display all ip dhcp server network
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#Networks
	 *
	 * @return type array
	 */
	public function get_all_dhcp_server_network() {
		$array = $this->_conn->comm("/ip/dhcp-server/network/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Server Network To Set, Please Your Add Ip Dhcp-Server Network";
	}
	
	/** 
	 * This methode is used to add ip dhcp server network
	 * @param
	 *	address (IP/netmask; Default: ): the network DHCP server(s) will lease addresses from
	 *	gateway (IP; Default: 0.0.0.0): The default gateway to be used by DHCP Client.
	 *	netmask (integer: 0..32; Default: 0): The actual network mask to be used by DHCP client. If set to '0' - netmask from network address will be used.
	 *	dns-server (string; Default: ): the DHCP client will use these as the default DNS servers. Two comma-separated DNS servers can be specified to be used by the DHCP client as primary and secondary DNS servers
	 *	domain (string; Default: ): The DHCP client will use this as the 'DNS domain' setting for the network adapter.
	 *	wins-server (IP; Default: ): The Windows DHCP client will use these as the default WINS servers. Two comma-separated WINS servers can be specified to be used by the DHCP client as primary and secondary WINS servers
	 *	ntp-server (IP; Default: ): the DHCP client will use these as the default NTP servers. Two comma-separated NTP servers can be specified to be used by the DHCP client as primary and secondary NTP servers
	 *	caps-manager (string; Default: ): Comma-separated list of IP addresses for one or more CAPsMan system managers.
	 *	next-server (IP; Default: ): IP address of next server to use in bootstrap.
	 *	boot-file-name (string; Default: ): Boot file name
	 *	dhcp-option (string; Default: ): Add additional DHCP options from option list.	 
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#Networks
	 *
	 * @return type array
	 */
	public function add_dhcp_server_network($param) {
		$this->_conn->comm("/ip/dhcp-server/network/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to set or edit ip dhcp server network
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#Networks
	 *
	 * @return type array
	 */
	public function set_dhcp_server_network($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-server/network/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip dhcp server network in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#Networks
	 *
	 * @return type array
	 */
	public function detail_dhcp_server_network($param) {
		$array = $this->_conn->comm("/ip/dhcp-server/network/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Server Network With This id = ".$param;
	}
	
	/**
	 * This methode is used to delete ip dhcp server network
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Server#Networks
	 *
	 * @return type array
	 */
	public function delete_dhcp_server_network($param) {
		$this->_conn->comm("/ip/dhcp-server/network/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to display all ip dhcp server config
	 * @return type array
	 */	
	public function get_all_dhcp_server_config() {
		$array = $this->_conn->comm("/ip/dhcp-server/config/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Server Config To Set, Please Your Add Ip Dhcp-Server Config";
	}
	
	/**
	 * This methode is used to set ip dhcp server config
	 * @param type $store_leases_disk string
	 * @return type array
	 */
	public function set_dhcp_server_config($store_leases_disk) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-server/config/set");
		$sentence->setAttribute("store-leases-disk", $store_leases_disk);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
}
