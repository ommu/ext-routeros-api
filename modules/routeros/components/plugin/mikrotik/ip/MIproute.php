<?php
/**
 * Description of Mapi_Ip_Route
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIproute {
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
	 * This method is used to display all ip route
	 * @return type array
	 */
	public function get_all_route() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/route/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Route To Set, Please Your Add Ip Route";
		}
		return $this->query('');
	}
	
	/**
	 * This method is used to add ip route gateway
	 * @param type $param array
	 * @return type array
	 */
	public function add_route_gateway($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/route/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * Can change or disable only static routes
	 * @param type $id is not array 
	 * 
	 */
	public function disable_route($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/route/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * Can change or enable only static routes
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_route($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/route/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess"; 
	}
	
	/**
	 * Can change or remove only static routes
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_route($id) {
	   $sentence = new SentenceUtil();
		$sentence->addCommand("/ip/route/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * Can change only static routes
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_route($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/route/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip route
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_route($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/route/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Route With This id = ".$id;
		}
				
	}
}

