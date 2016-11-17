<?php
/**
 * Description of Mapi Interfaces
 *
 * TOC :
 *	ethernet
 *	pppoe_client
 *	pppoe_server
 *	eoip
 *	ipip
 *	vlan
 *	vrrp
 *	bonding
 *	bridge
 *	l2tp_client
 *	l2tp_server
 *	ppp_client
 *	ppp_server
 *	pptp_client
 *	pptp_server 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
defined('INTERFACES_PATH') or define('INTERFACES_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once INTERFACES_PATH . 'OInterfaceBonding.php';
require_once INTERFACES_PATH . 'OInterfaceBridge.php';
require_once INTERFACES_PATH . 'OInterfaceEoip.php';
require_once INTERFACES_PATH . 'OInterfaceEthernet.php';
require_once INTERFACES_PATH . 'OInterfaceIpip.php';
require_once INTERFACES_PATH . 'OInterfaceL2tpClient.php';
require_once INTERFACES_PATH . 'OInterfaceL2tpServer.php';
require_once INTERFACES_PATH . 'OInterfacePppClient.php';
require_once INTERFACES_PATH . 'OInterfacePppServer.php';
require_once INTERFACES_PATH . 'OInterfacePppoeClient.php';
require_once INTERFACES_PATH . 'OInterfacePppoeServer.php';
require_once INTERFACES_PATH . 'OInterfacePptpClient.php';
require_once INTERFACES_PATH . 'OInterfacePptpServer.php';
require_once INTERFACES_PATH . 'OInterfaceVlan.php';
require_once INTERFACES_PATH . 'OInterfaceVrrp.php';

class OInterfaces {
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
	 * This method is used to call class OApi_Interface_Bonding
	 * @return OApi_Ip 
	 */
	public function bonding() {
		return new OInterfaceBonding($this->talker, $this->_conn);
	}
	
	/**
	 * This method for used call class OApi_Interface_Bridge
	 * @return OApi_Ip
	 */
	public function bridge() {
		return new OInterfaceBridge($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Eoip
	 * @return OApi_Ip 
	 */
	public function eoip() {
		return new OInterfaceEoip($this->talker, $this->_conn);		
	}
	
	/**
	 * This method is used to call class OApi_Interface_Ethetrnet
	 * @return OApi_Ip 
	 */
	public function ethernet() {
		return new OInterfaceEthernet($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Ipip
	 * @return OApi_Ip 
	 */
	public function ipip() {
		return new OInterfaceIpip($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_L2tp_Client 
	 * @return OApi_Ip
	 */
	public function l2tp_client() {
		return new OInterfaceL2tpClient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_L2tp_Server 
	 * @return OApi_Ip
	 */
	public function l2tp_server() {
		return new OInterfaceL2tpServer($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_Ppp_Client 
	 * @return OApi_Ip
	 */
	public function ppp_client() {
		return new OInterfacePppClient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_Ppp_Server 
	 * @return OApi_Ip
	 */
	public function ppp_server() {
		return new OInterfacePppServer($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Pppoe_Client
	 * @return OApi_Ip 
	 */
	public function pppoe_client() {
		return new OInterfacePppoeClient($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Pppoe_Server
	 * @return OApi_Ip 
	 */
	public function pppoe_server() {
		return new OInterfacePppoeServer($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_Pptp_Client 
	 * @return OApi_Ip
	 */
	public function pptp_client() {
		return new OInterfacePptpClient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class OApi_Interface_Pptp_Server 
	 * @return OApi_Ip
	 */
	public function pptp_server() {
		return new OInterfacePptpServer($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Vlan
	 * @return OApi_Ip 
	 */
	public function vlan() {
		return new OInterfaceVlan($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class OApi_Interface_Vrrp
	 * @return OApi_Ip 
	 */
	public function vrrp() {
		return new OInterfaceVrrp($this->talker, $this->_conn);
	}	
}

