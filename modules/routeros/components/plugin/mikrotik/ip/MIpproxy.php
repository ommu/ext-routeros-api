<?php
/* Description of Mapi_Ip_Address
 *
 * TOC :
 *	get_all_proxy
 *	set_proxy 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpproxy {
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
	 * This method used for get all Ip Proxi
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Proxy
	 *
	 * @return type array
	 */
	public function get_all_proxy() {
		$array = $this->_conn->comm("/ip/proxy/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Proxi To Set, Please Your Add Ip Proxi";
	}
	
	/**
	 * This method used for set Ip proxy
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Proxy
	 *
	 * @return type array
	 */
	public function set_proxy($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/proxy/set");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";		
	}
}
