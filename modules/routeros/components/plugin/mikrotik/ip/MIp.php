<?php
 /**
 * Description of Mapi_Ip
 *
 * TOC :
 *	address
 *	hotspot
 *	pool
 *	dns
 *	firewall
 *	accounting
 *	arp
 *	dhcp_client
 *	dhcp_relay
 *	dhcp_server
 *	route
 *	service
 *	proxy 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
defined('IP_PATH') or define('IP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once IP_PATH . 'MIpaccounting.php';
require_once IP_PATH . 'MIpaddress.php';
require_once IP_PATH . 'MIparp.php';
require_once IP_PATH . 'MIpdhcpclient.php';
require_once IP_PATH . 'MIpdhcprelay.php';
require_once IP_PATH . 'MIpdhcpserver.php';
require_once IP_PATH . 'MIpdns.php';
require_once IP_PATH . 'MIpfirewall.php';
require_once IP_PATH . 'MIphotspot.php';
require_once IP_PATH . 'MIppool.php';
require_once IP_PATH . 'MIpproxy.php';
require_once IP_PATH . 'MIproute.php';
require_once IP_PATH . 'MIpservice.php';

class MIp {
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
	 * This method is used toclass Mapi_Ip_Address
	 * @return Object of Mapi_Ip_Address class
	 */
	public function address() {
		return new MIpAddress($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Hotspot
	 * @return Object of Mapi_Ip_Hotspot class
	 */
	public function hotspot() {
		return new MIphotspot($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Pool
	 * @return Object of Mapi_Ip_Pool class
	 */
	public function pool() {
		return new MIppool($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Dns
	 * @return Object of Mapi_Ip_Dns class
	 */
	public function dns() {
		return new MIpdns($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Firewall
	 * @return Object of Mapi_Ip_Firewall class
	 */
	public function firewall() {
		return new MIpfirewall($this->talker, $this->_conn);
	}

	/**
	 * This method is used toclass Mapi_Ip_Accounting
	 * @return Object of Mapi_Ip_Accounting class
	 */
	public function accounting() {
		return new MIpAccounting($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Arp
	 * @return Object of Mapi_Ip_Arp class
	 */
	public function arp() {
		return new MIparp($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Dhcp_Client
	 * @return Object of Mapi_Ip _Dhcp_Client class
	 */
	public function dhcp_client() {
		return new MIpdhcpclient($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Dhcp_Relay
	 * @return Object of Mapi_Ip_Dhcp_Relay class
	 */
	public function dhcp_relay(){
		return new MIpdhcprelay($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Dhcp_Server
	 * @return Object of Mapi_Ip_Dhcp_Server class
	 */
	public function dhcp_server() {
		return new MIpdhcpserver($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Route
	 * @return Object if Mapi_Ip_Router class
	 */
	public function route() {
		return new MIproute($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass Mapi_Ip_Service
	 * @return Object of Mapi_Ip_Service class
	 */
	public function service() {
		return new MIpservice($this->talker, $this->_conn);
	}
	
	/**
	 *This method is used to class Mapi_Ip_Proxy
	 * @return object of Mapi_Ip_Proxy class
	 */
	public function proxy() {
		return new MIpproxy($this->talker, $this->_conn);
	}
	
}

