<?php
/**
 * Description of Mapi_Ip_Hotspot
 *
 * TOC :
 *	Hotspot
 *	  get_all_hotspot
 *	  setup_hotspot
 *	  enable_hotspot
 *	  disable_hotspot
 *	  set_hotspot
 *	  detail_hotspot
 *	  delete_hotspot
 *	IP Bindings
 *	  get_all_ip_binding
 *	  add_ip_binding
 *	  disable_ip_binding
 *	  enable_ip_binding
 *	  set_ip_binding
 *	  detail_ip_binding
 *	  delete_ip_binding
 *	Direct
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
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
	 * This method is used to display
	 * all hotspot
	 * @return type array 
	 * 
	 */
	public function get_all_hotspot() {
		$this->_conn->write("/ip/hotspot/getall");
		$array = $this->_conn->read();
		$i = 0;
		if($i < count($array))
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
	 * @return type array
	 */
	public function setup_hotspot($param) {
		$this->_conn->comm("/ip/hotspot/add", $param);
		return "Sucsess";
	}
	
	/**
	 * This method is used to activate the hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function enable_hotspot($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	 /**
	 * This method is used to disable hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function disable_hotspot($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to change hotspot based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	  public function set_hotspot($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one hotspot 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function detail_hotspot($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/hotspot/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Hotspot With This Id = ".$id;
		}
		
	}
	
	 /**
	 * This method is used to remove the hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function delete_hotspot($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for get all Ip Hotspot Ip-Binding
	 * @return type array
	 */
	public function get_all_ip_binding() {
		$this->_conn->write("/ip/hotspot/ip-binding/getall");
		$array = $this->_conn->read();
		$i = 0;
		if($i < count($array))
			return $array;
		else
			return "No Ip Binding To Set, Please Your Add Ip Binding";
	}
	
	/**
	 * This method used for add new Ip Hotspot Ip-Binding
	 * @param type $param array
	 * @return type array
	 */
	public function add_ip_binding($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/hotspot/ip-binding/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for disable Ip Hotspot Ip-Binding
	 * @param type $id string
	 * @return type array
	 */
	public function disable_ip_binding($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/ip-binding/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for enable Ip Hotspot Ip-Binding
	 * @param type $id string
	 * @return type array
	 */
	public function enable_ip_binding($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/ip-binding/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for delete Ip Hotspot Ip-Binding
	 * @param type $id string
	 * @return type array
	 */
	public function delete_ip_binding($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/ip-binding/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for set or edit Ip Hotspot Ip-Binding
	 * @param type $param array
	 * @param type $id string
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
		return "Sucsess";
	}
	
	/**
	 * This method used for detail Ip Hotspot Ip-Binding
	 * @param type $id string
	 * @return type array
	 */
	public function detail_ip_binding($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/hotspot/ip-binding/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Binding With This Id = ".$id;
		}
		
	}	
	
	
	/**
	 * This method is used to add the user hotspot
	 * @param type $param array
	 * @return type array
	 * 
	 */
   public function add_hotspot_user($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/hotspot/user/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to disable user hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable_hotspot_user($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to activate the user hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_hotspot_user($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to change users hotspot based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_hotspot_user($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to remove the user hotspot by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_hotspot_user($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/hotspot/user/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display
	 * all users hotspot
	 * @return type array
	 * 
	 */
	public function get_all_hotspot_user() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/hotspot/user/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Hotspot User To Set, Please Your Add Ip Hotspot User";
		}
		
	}
	
	/**
	 * This method is used to display one user hotspot 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_hotspot_user($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/hotspot/user/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Hotspot User With This Id = ".$id;
		}
		
		
	}
}
