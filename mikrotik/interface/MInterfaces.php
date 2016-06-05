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

require_once INTERFACES_PATH . 'MInterfacebonding.php';
require_once INTERFACES_PATH . 'MInterfacebridge.php';
require_once INTERFACES_PATH . 'MInterfaceeoip.php';
require_once INTERFACES_PATH . 'MInterfaceethernet.php';
require_once INTERFACES_PATH . 'MInterfaceipip.php';
require_once INTERFACES_PATH . 'MInterfacel2tpclient.php';
require_once INTERFACES_PATH . 'MInterfacel2tpserver.php';
require_once INTERFACES_PATH . 'MInterfacepppclient.php';
require_once INTERFACES_PATH . 'MInterfacepppoeclient.php';
require_once INTERFACES_PATH . 'MInterfacepppoeserver.php';
require_once INTERFACES_PATH . 'MInterfacepppserver.php';
require_once INTERFACES_PATH . 'MInterfacepptpclient.php';
require_once INTERFACES_PATH . 'MInterfacepptpserver.php';
require_once INTERFACES_PATH . 'MInterfacevlan.php';
require_once INTERFACES_PATH . 'MInterfacevrrp.php';

class MInterfaces {
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
	 * This method is used to call class Mapi_Interface_Ethetrnet
	 * @return Mapi_Ip 
	 */
	public function ethernet() {
		return new MInterfaceethernet($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Pppoe_Client
	 * @return Mapi_Ip 
	 */
	public function pppoe_client() {
		return new MInterfacepppoeclient($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Pppoe_Server
	 * @return Mapi_Ip 
	 */
	public function pppoe_server() {
		return new MInterfacepppoeserver($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Eoip
	 * @return Mapi_Ip 
	 */
	public function eoip() {
		return new MInterfaceeoip($this->talker, $this->_conn);		
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Ipip
	 * @return Mapi_Ip 
	 */
	public function ipip() {
		return new MInterfaceipip($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Vlan
	 * @return Mapi_Ip 
	 */
	public function vlan() {
		return new MInterfacevlan($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Vrrp
	 * @return Mapi_Ip 
	 */
	public function vrrp() {
		return new MInterfacevrrp($this->talker, $this->_conn);
	}
	
	/**
	 * This method is used to call class Mapi_Interface_Bonding
	 * @return Mapi_Ip 
	 */
	public function bonding() {
		return new MInterfacebonding($this->talker, $this->_conn);
	}
	
	/**
	 * This method for used call class Mapi_Interface_Bridge
	 * @return Mapi_Ip
	 */
	public function bridge() {
		return new MInterfacebridge($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_L2tp_Client 
	 * @return Mapi_Ip
	 */
	public function l2tp_client() {
		return new MInterfacel2tpclient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_L2tp_Server 
	 * @return Mapi_Ip
	 */
	public function l2tp_server() {
		return new MInterfacel2tpserver($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_Ppp_Client 
	 * @return Mapi_Ip
	 */
	public function ppp_client() {
		return new MInterfacepppclient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_Ppp_Server 
	 * @return Mapi_Ip
	 */
	public function ppp_server() {
		return new MInterfacepppserver($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_Pptp_Client 
	 * @return Mapi_Ip
	 */
	public function pptp_client() {
		return new MInterfacepptpclient($this->talker, $this->_conn);
	}
	
	/**
	 * This method used call class Mapi_Interface_Pptp_Server 
	 * @return Mapi_Ip
	 */
	public function pptp_server() {
		return new MInterfacepptpserver($this->talker, $this->_conn);
	}
	
}

