<?php
/**
 * Description of Mapi_Ip_Dhcp_Client
 *
 * TOC :
 *	get_all_address
 *	get_all_dhcp_client
 *	add_dhcp_client
 *	enable_dhcp_client
 *	disable_dhcp_client
 *	renew_dhcp_client
 *	release_dhcp_client
 *	set_dhcp_client
 *	detail_dhcp_client
 *	delete_dhcp_client 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcpclient{
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
	 * This method is used to display all dhcp client
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function get_all_dhcp_client() {
		$array = $this->_conn->comm("/ip/dhcp-client/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Client To Set, Please Your Add Ip Dhcp-Client";
	}
	
	/**
	 * This method is used to add dhcp client
	 * @param
	 *	interface (string; Default: ): Interface on which DHCP client will be running.
	 *		use-peer-dns (yes | no; Default: yes): Whether to accept the DNS settings advertised by DHCP Server. (Will override the settings put in the /ip dns submenu.
	 *		use-peer-ntp (yes | no; Default: yes): Whether to accept the NTP settings advertised by DHCP Server. (Will override the settings put in the /system ntp client submenu)
	 *	add-default-route (yes | no | special-classless; Default: yes): Whether to install default route in routing table received from dhcp server. By default RouterOS client complies to RFC and ignores option 3 if classless option 121 is received. To force client not to ignore option 3 set special-classless. This parameter is available in v6rc12+
	 *		yes - adds classless route if received, if not then add default route (old behavior)
	 *		special-classless - adds both classless route if received and default route (MS style)
	 *	default-route-distance (integer:0..255; Default: ): Distance of default route. Applicable if add-default-route is set to yes.
	 *	client-id (string; Default: ): Corresponds to the settings suggested by the network administrator or ISP. If not specified, client's MAC address will be sent
	 *	comment (string; Default: ): Short description of the client
	 *	disabled (yes | no; Default: yes)	
	 *	host-name (string; Default: ): Host name of the client sent to a DHCP server. If not specified, client's system identity will be used.	 
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function add_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function enable_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function disable_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to renew dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function renew_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/renew", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to release dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function release_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/release", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function set_dhcp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip dhcp client in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function detail_dhcp_client($param) {
		$array = $this->_conn->comm("/ip/dhcp-client/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Dhcp-Client With This id = ".$param;
	}
	
	/**
	 * This method is used to remove dhcp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DHCP_Client
	 *
	 * @return type array
	 */
	public function delete_dhcp_client($param) {
		$this->_conn->comm("/ip/dhcp-client/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

