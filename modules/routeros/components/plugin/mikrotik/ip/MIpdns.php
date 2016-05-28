<?php
/**
 * Description of Mapi_Ip_Dns
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
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
	* This method is used to configure dns
	* @param type $servers string example : '192.168.1.1,192.168.2.1'
	* @return type array
	* 
	*/
	public function set_dns($servers) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dns/set");
		$sentence->setAttribute("servers", $servers);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display
	 * all dns
	 * @return type array
	 * 
	 */
	public function get_all_dns() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}else{
			return "No Ip DNS To Set, Please Your Add Ip DNS";
		}
	}
	 
	/**
	 * This method is used to add the static dns
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function add_dns_static($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/dns/static/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
   /**
	* This method is used to display
	* all static dns
	* @return type array
	* 
	*/
	public function get_all_static_dns() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/static/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}else{
			return "No Ip Static DNS To Set, Please Your Add Ip Static DNS";
		}
	}
	
	/**
	 * This method is used to display one static dns 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function detail_static_dns($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/static/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Static DNS With This Id = ".$id;
		}
	}
	
	/**
	 * This method is used to change based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
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
	 * This method is used to display
	 * all dns cache
	 * @return type array
	 * 
	 */
	public function get_all_dns_cache() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/cache/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}else{
			return "No Ip DNS Cache To Set, Please Your Add Ip DNS Cache";
		}
	}
	
	/**
	 * This method is used to display one dns cache 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function detail_dns_cache($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/cache/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip DNS Cache With This Id = ".$id;
		}
	}
	
	/**
	 * This method is used to display
	 * all dns cache all cache
	 * @return type array
	 * 
	 */
	public function get_all_dns_cache_all() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/cache/all/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}else{
			return "No Ip DNS Cache All To Set, Please Your Add Ip DNS Cache All";
		}
	}
	
	 /**
	 * This method is used to display one dns cache all 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function detail_dns_cache_all($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dns/cache/all/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip DNS Cache All With This Id = ".$id;
		}
	}
}
