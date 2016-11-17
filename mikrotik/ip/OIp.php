<?php
 /**
 * Description of OApi_Ip
 *
 * TOC :
 *	arp
 *	accounting
 *	address
 *	dhcp_client
 *	dhcp_relay
 *	dhcp_server
 *	dns
 *	firewall
 *	hotspot
 *	pool
 *	proxy 
 *	route
 *	service
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
defined('IP_PATH') or define('IP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once IP_PATH . 'OIpArp.php';
require_once IP_PATH . 'OIpAccounting.php';
require_once IP_PATH . 'OIpAddress.php';
require_once IP_PATH . 'OIpDhcpClient.php';
require_once IP_PATH . 'OIpDhcpRelay.php';
require_once IP_PATH . 'OIpDhcpServer.php';
require_once IP_PATH . 'OIpDns.php';
require_once IP_PATH . 'OIpFirewall.php';
require_once IP_PATH . 'OIpHotspot.php';
require_once IP_PATH . 'OIpPool.php';
	require_once IP_PATH . 'OIpProxy.php';
require_once IP_PATH . 'OIpRoute.php';
require_once IP_PATH . 'OIpService.php';

class OIp {
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
	 * This method is used toclass OApi_Ip_Arp
	 * @return Object of OApi_Ip_Arp class
	 */
	public function arp() {
		return new OIpArp($this->talker, $this->_conn);
	}

	/**
	 * This method is used toclass OApi_Ip_Accounting
	 * @return Object of OApi_Ip_Accounting class
	 */
	public function accounting() {
		return new OIpAccounting($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Address
	 * @return Object of OApi_Ip_Address class
	 */
	public function address() {
		return new OIpAddress($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Dhcp_Client
	 * @return Object of OApi_Ip _Dhcp_Client class
	 */
	public function dhcp_client() {
		return new OIpDhcpClient($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Dhcp_Relay
	 * @return Object of OApi_Ip_Dhcp_Relay class
	 */
	public function dhcp_relay(){
		return new OIpDhcpRelay($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Dhcp_Server
	 * @return Object of OApi_Ip_Dhcp_Server class
	 */
	public function dhcp_server() {
		return new OIpDhcpServer($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Dns
	 * @return Object of OApi_Ip_Dns class
	 */
	public function dns() {
		return new OIpDns($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Firewall
	 * @return Object of OApi_Ip_Firewall class
	 */
	public function firewall() {
		return new OIpFirewall($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Hotspot
	 * @return Object of OApi_Ip_Hotspot class
	 */
	public function hotspot() {
		return new OIpHotspot($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Pool
	 * @return Object of OApi_Ip_Pool class
	 */
	public function pool() {
		return new OIpPool($this->talker, $this->_conn);
	}
	
	/**
	 *This method is used to class OApi_Ip_Proxy
	 * @return object of OApi_Ip_Proxy class
	 */
	public function proxy() {
		return new OIpProxy($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Route
	 * @return Object if OApi_Ip_Router class
	 */
	public function route() {
		return new OIpRoute($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used toclass OApi_Ip_Service
	 * @return Object of OApi_Ip_Service class
	 */
	public function service() {
		return new OIpService($this->talker, $this->_conn);
	}
	
}

