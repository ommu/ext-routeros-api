<?php
/**
 * Description of Mapi_Ip_Hotspot
 *
 * TOC :
 *	Servers
 *	  get_all_hotspot
 *	  setup_hotspot
 *	  enable_hotspot
 *	  disable_hotspot
 *	  set_hotspot
 *	  detail_hotspot
 *	  delete_hotspot
 *	Users
 *	  get_all_hotspot_user
 *	  add_hotspot_user
 *	  enable_hotspot_user
 *	  disable_hotspot_user
 *	  set_hotspot_user
 *	  detail_hotspot_user
 *	  delete_hotspot_user 
 *	IP Bindings
 *	  get_all_ip_binding
 *	  add_ip_binding
 *	  enable_ip_binding
 *	  disable_ip_binding
 *	  set_ip_binding
 *	  detail_ip_binding
 *	  delete_ip_binding
 *	Direct
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIphotspot {
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
	 * This method is used to display all hotspot
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	public function get_all_hotspot() {
		$array = $this->_conn->comm("/ip/hotspot/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Hotspot Setup, Please Your Setup Ip Hotspot";
	}
	
	/**
	 * This function is used to add hotspot
	 * @param
	 *	name (text): HotSpot server's name or identifier
	 *	interface (name of interface): interface to run HotSpot on
	 *	address-pool (name / none; default: none): address space used to change HotSpot client any IP address to a valid address. Useful for providing public network access to mobile clients that are not willing to change their networking settings
	 *	profile (name; default: default): HotSpot server default HotSpot profile, which is located in /ip hotspot profile
	 *	idle-timeout (time / none; default: 5m): period of inactivity for unauthorized clients. When there is no traffic from this client (literally client computer should be switched off), once the timeout is reached, user is dropped from the HotSpot host list, its used address becomes available
	 *	keepalive-timeout (time / none; default: none): Value of how long host can stay out of reach to be removed from the HotSpot.
	 *	login-timeout (time / none; default: none): period of time after which if host hasn't been authorized it self with system the host entry gets deleted from host table. Loop repeats until host logs in the system. Enable if there are situations where host cannot login after being to long in host table unauthorized.
	 *	addresses-per-mac (integer / unlimited; default: 2): number of IP addresses allowed to be bind with the MAC address, when multiple HotSpot clients connected with one MAC-address
	 *	ip-of-dns-name
	 *	proxy-status
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	public function setup_hotspot($param) {
		$this->_conn->comm("/ip/hotspot/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to activate the hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	 public function enable_hotspot($param) {
		$this->_conn->comm("/ip/hotspot/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	 public function disable_hotspot($param) {
		$this->_conn->comm("/ip/hotspot/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	  public function set_hotspot($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Success";
	}	 
	
	/**
	 * This method is used to display one hotspot in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	 public function detail_hotspot($param) {
		$array = $this->_conn->comm("/ip/hotspot/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Hotspot With This Id = ".$param;
	}
	
	/**
	 * This method is used to remove the hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot
	 *
	 * @return type array
	 */
	 public function delete_hotspot($param) {
		$this->_conn->comm("/ip/hotspot/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all users hotspot
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function get_all_hotspot_user() {
		$array = $this->_conn->comm("/ip/hotspot/user/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Hotspot User To Set, Please Your Add Ip Hotspot User";		
	}
	
	/**
	 * This method is used to add the user hotspot
	 * @param
	 *	server (string | all; Default: all): HotSpot server's name to which user is allowed login
	 *	name (string; Default: ): HotSpot login page username, when MAC-address authentication is used name is configured as client's MAC-address
	 *	password (string; Default: ): User password
	 *	address (IP; Default: 0.0.0.0): IP address, when specified client will get the address from the HotSpot one-to-one NAT translations. Address does not restrict HotSpot login only from this address
	 *	mac-address (MAC; Default: 00:00:00:00:00:00): Client is allowed to login only from the specified MAC-address. If value is 00:00:00:00:00:00, any mac address is allowed.
	 *	profile (string; Default: default): User profile configured in /ip hotspot user profile
	 *	routes (string; Default: ): Routes added to HotSpot gateway when client is connected. The route format dst-address gateway metric (for example, 192.168.1.0/24 192.168.0.1 1)
	 *	email (string; Default: ): HotSpot client's e-mail, informational value for the HotSpot user
	 *	comment (string; Default: ): descriptive information for HotSpot user, it might be used for scripts to change parameters for specific clients
	 *	limit-uptime (time; Default: 0): Uptime limit for the HotSpot client, user is disconnected from HotSpot as soon as uptime is reached.
	 *	limit-bytes-in (integer; Default: 0): Maximal amount of bytes that can be received from the user. User is disconnected from HotSpot after the limit is reached.
	 *	limit-bytes-out (integer; Default: 0): Maximal amount of bytes that can be transmitted from the user. User is disconnected from HotSpot after the limit is reached.
	 *	limit-bytes-total (integer; Default: 0): (limit-bytes-in+limit-bytes-out). User is disconnected from HotSpot after the limit is reached.
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
   public function add_hotspot_user($param) {
		$this->_conn->comm("/ip/hotspot/user/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to activate the user hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function enable_hotspot_user($param) {
		$this->_conn->comm("/ip/hotspot/user/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable user hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function disable_hotspot_user($param) {
		$this->_conn->comm("/ip/hotspot/user/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change users hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function set_hotspot_user($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Success";
	}
	
	/**
	 * This method is used to display one user hotspot in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function detail_hotspot_user($param) {
		$array = $this->_conn->comm("/ip/hotspot/user/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Hotspot User With This Id = ".$param;
	}
	
	/**
	 * This method is used to remove the user hotspot
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot/User
	 *	 
	 * @return type array
	 */
	public function delete_hotspot_user($param) {
		$this->_conn->comm("/ip/hotspot/user/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all Ip Hotspot Ip-Binding
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function get_all_ip_binding() {
		$array = $this->_conn->comm("/ip/hotspot/ip-binding/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Binding To Set, Please Your Add Ip Binding";
	}
	
	/**
	 * This method used for add new Ip Hotspot Ip-Binding
	 * @param
	 *	address (IP Range; Default: ""): The original IP address of the client
	 *	mac-address (MAC; Default: ""): MAC address of the client
	 *	server (string | all; Default: "all"): Name of the HotSpot server. all - will be applied to all hotspot servers
	 *	to-address (IP; Default: ""): New IP address of the client, translation occurs on the router (client does not know anything about the translation)
	 *	type (blocked | bypassed | regular; Default: ""): Type of the IP-binding action. regular - performs One-to-One NAT according to the rule, translates address to to-address, bypassed - performs the translation, but excludes client from login to the HotSpot, blocked - translation is not performed and packets from host are dropped
	 *
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function add_ip_binding($param) {
		$this->_conn->comm("/ip/hotspot/ip-binding/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable Ip Hotspot Ip-Binding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function enable_ip_binding($param) {
		$this->_conn->comm("/ip/hotspot/ip-binding/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable Ip Hotspot Ip-Binding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function disable_ip_binding($param) {
		$this->_conn->comm("/ip/hotspot/ip-binding/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit Ip Hotspot Ip-Binding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function set_ip_binding($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/ip-binding/set");
		foreach ($param as $name => $value){
			$sentence->setAttribute($name, $value);
		}
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Success";
	}
	
	/**
	 * This method used for detail Ip Hotspot Ip-Binding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function detail_ip_binding($param) {
		$array = $this->_conn->comm("/ip/hotspot/ip-binding/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Binding With This Id = ".$param;
	}	
	
	/**
	 * This method used for delete Ip Hotspot Ip-Binding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Hotspot#IP_Bindings
	 *
	 * @return type array
	 */
	public function delete_ip_binding($param) {
		$this->_conn->comm("/ip/hotspot/ip-binding/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
