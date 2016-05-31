<?php
/**
 * Description of Mapi_Ip_Dns
 *
 * TOC :
 *	get_all_dns
 *	set_dns
 *	get_all_static_dns
 *	add_dns_static
 *	set_static_dns
 *	detail_static_dns
 *	get_all_dns_cache
 *	detail_dns_cache
 *	get_all_dns_cache_all
 *	detail_dns_cache_all 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdns {
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
	 * This method is used to display all dns
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS
	 *
	 * @return type array
	 */
	public function get_all_dns() {
		$array = $this->_conn->comm("/ip/dns/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip DNS To Set, Please Your Add Ip DNS";
	}
	
	/**
	 * This method is used to configure dns
	 * @param type $servers string example : '192.168.1.1,192.168.2.1'
	 * @return type array
	 */
	public function set_dns($servers) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dns/set");
		$sentence->setAttribute("servers", $servers);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display all static dns
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Static_DNS_Entries
	 *
	 * @return type array
	 */
	public function get_all_static_dns() {
		$array = $this->_conn->comm("/ip/dns/static/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Static DNS To Set, Please Your Add Ip Static DNS";
	}
	 
	/**
	 * This method is used to add the static dns
	 * @param
	 *	address (IP address): IP address to resolve domain name with
	 *	name (text): DNS name to be resolved to a given IP address. May be a regular expression
	 *	ttl (time): time-to-live of the DNS record
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Static_DNS_Entries
	 *
	 * @return type array
	 */
	public function add_dns_static($param) {
		$this->_conn->comm("/ip/dns/static/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change static dns
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Static_DNS_Entries
	 *
	 * @return type array
	 */
	public function set_static_dns($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dns/static/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one static dns in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Static_DNS_Entries
	 *
	 * @return type array
	 */
	 public function detail_static_dns($param) {
		$array = $this->_conn->comm("/ip/dns/static/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Static DNS With This Id = ".$param;
	}

	/**
	 * This method is used to display all dns cache
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Cache_Monitoring
	 *
	 * @return type array
	 */
	public function get_all_dns_cache() {
		$array = $this->_conn->comm("/ip/dns/cache/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip DNS Cache To Set, Please Your Add Ip DNS Cache";
	}
	
	/**
	 * This method is used to display one dns cache in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#Cache_Monitoring
	 *
	 * @return type array
	 */
	 public function detail_dns_cache($param) {
		$array = $this->_conn->comm("/ip/dns/cache/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip DNS Cache With This Id = ".$param;
	}
	
	/**
	 * This method is used to display all dns cache all cache
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#All_DNS_Entries
	 *
	 * @return type array
	 */
	public function get_all_dns_cache_all() {
		$array = $this->_conn->comm("/ip/dns/cache/all/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip DNS Cache All To Set, Please Your Add Ip DNS Cache All";
	}
	
	/**
	 * This method is used to display one dns cache all in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/DNS#All_DNS_Entries
	 *
	 * @return type array
	 */
	 public function detail_dns_cache_all($param) {
		$array = $this->_conn->comm("/ip/dns/cache/all/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip DNS Cache All With This Id = ".$param;
	}
}
