<?php
/**
 * Description of Mapi_interface_Bonding
 *
 * TOC :
 *	get_all_bonding
 *	add_bonding
 *	enable_bonding
 *	disable_bonding
 *	set_bonding
 *	detail_bonding
 *	delete_bonding 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacebonding {
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
	 * This method is used to display all interface bonding
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function get_all_bonding() {
		$array = $this->_conn->comm("/interface/bonding/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bonding To Set, Please Your Add Interface Bonding";
	}
	
	/**
	 * This method is used to add interface bonding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function add_bonding($param) {
		$this->_conn->comm("/interface/bonding/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable interface bonding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function enable_bonding($param) {
		$this->_conn->comm("/interface/bonding/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable interface bonding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function disable_bonding($param) {
		$this->_conn->comm("/interface/bonding/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	  
	/**
	 * This method is used to set or edit interface bonding
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function set_bonding($param, $id) {
		  $sentence = new SentenceUtil();
		$sentence->addCommand("/interface/bonding/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one interface bonding in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function detail_bonding($param) {
		$array = $this->_conn->comm("/interface/bonding/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface Bonding With This id = ".$param;
	}
	
	/**
	 * This method is used to delete interface bonding 
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/Bonding
	 *
	 * @return type array
	 */
	public function delete_bonding($param) {
		$this->_conn->comm("/interface/bonding/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}