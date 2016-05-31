<?php
/**
 * Description of Mapi_File
 *
 * TOC :
 *	get_all_interface
 *	enable_interface
 *	disable_interface
 *	set_interface
 *	detail_interface 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfaceethernet {
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
	 * This method is used to display all interface
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function get_all_interface() {
		$array = $this->_conn->comm("/interface/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return false;
	}
	
	/**
	 * This method is used to enable interface
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function enable_interface($param) {
		$this->_conn->comm("/interface/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable interface
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function disable_interface($param) {
		$this->_conn->comm("/interface/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display one interface in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function set_interface($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one interafce in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Ethernet
	 *
	 * @return type array
	 */
	public function detail_interface($param) {
		$array = $this->_conn->comm("/interface/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Ethernet With This id = ".$param;
	}
}
