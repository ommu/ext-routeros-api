<?php
/**
 * Description of Mapi_Ip_Service
 *
 * TOC :
 *	get_all_service
 *	enable_service
 *	disable_service
 *	set_service
 *	detail_service 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpservice {
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
	 * This methode is used to display all ip service
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services
	 *
	 * @return type array
	 */
	public function get_all_service() {
		$array = $this->_conn->comm("/ip/service/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Service To Set, Please Your Add Ip Service";
	}
	
	/**
	 * This methode is used to enable ip service
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services
	 *
	 * @return type array
	 */
	public function enable_service($param) {
		$this->_conn->comm("/ip/service/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used to disable ip service
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services
	 *
	 * @return type array
	 */
	public function disable_service($param) {
		$this->_conn->comm("/ip/service/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This methode is used for set ip service
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services
	 *
	 * @return type array
	 */
	public function set_service($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/service/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip service in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Services
	 *
	 * @return type array
	 */
	public function detail_service($param) {
		$array = $this->_conn->comm("/ip/service/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Service With This id = ".$param;
	}	
}

