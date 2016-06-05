<?php
/**
 * Description of Mapi_Ip_Accounting
 *
 * TOC :
 *	get_all_accounting
 *	set_accounting
 *	get_all_web_access
 *	set_web_access
 *	get_all_uncounted 
 *	get_all_snapshot
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpaccounting {
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
	 * This method is used to display all accounting
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Accounting#Local_IP_Traffic_Accounting
	 *
	 * @return type array
	 */
	public function get_all_accounting() {
		$array = $this->_conn->comm('/ip/accounting/getall');
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Accounting To Set, Please Your Add Ip Accounting";
	}
	
	/**
	 * This method is used to set or edit ip accounting
	 * @param
	 * 	enabled (yes |no; Default: no): whether local IP traffic accounting is enabled
	 *	account-local-traffic (yes |no; Default: no): whether to account the traffic to/from the router itself
	 *	threshold (integer; Default: 256): maximum number of IP pairs in the accounting table (maximal value is 8192)
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Accounting#Local_IP_Traffic_Accounting
	 *
	 * @return type array
	 */
	public function set_accounting($param) {
		$this->_conn->comm("/ip/accounting/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all web-acces
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Accounting#Web_Access_to_the_Local_IP_Traffic_Accounting_Table
	 *
	 * @return type array
	 */
	public function get_all_web_access() {
		$array = $this->_conn->comm("/ip/accounting/web-access/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Accounting web-access To Set, Please Your Add Ip Accounting web-access";
	}
	
	/**
	 * This method is used to ip accounting set web-acces
	 * @param
	 *	accessible-via-web (yes | no; Default: no): whether the snapshot is available via web
	 *	address (IP address/netmask; Default: 0.0.0.0/0): IP address range that is allowed to access the snapshot	
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Accounting#Web_Access_to_the_Local_IP_Traffic_Accounting_Table
	 *
	 * @return type array
	 */
	public function set_web_access($param) {
		$this->_conn->comm("/ip/accounting/web-access/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all uncounted
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Accounting#Uncounted_Connections
	 *
	 * @return type array
	 */
	public function get_all_uncounted() {
		$array = $this->_conn->comm('/ip/accounting/uncounted/getall');
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Accounting Uncounted To Set, Please Your Add Ip Accounting Uncounted";
	}
	
	/**
	 * This method is used to display all snapshot
	 * @return type array
	 */
	public function get_all_snapshot() {
		$array = $this->_conn->comm('/ip/accounting/snapshot/getall');
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Accounting Snapshot To Set, Please Your Add Ip Accounting Snapshot";
	}
}

