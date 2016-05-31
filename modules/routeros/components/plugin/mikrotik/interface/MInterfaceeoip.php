<?php
/**
 * Description of Mapi_Interface_Eoip
 *
 * TOC :
 *	get_all_eoip
 *	add_eoip
 *	enable_eoip
 *	disable_eoip
 *	set_eoip
 *	detail_eoip
 *	delete_eoip 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfaceeoip {
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
	 * This method is used to display all interface eoip
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function get_all_eoip() {
		$array = $this->_conn->comm("/interface/eoip/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface EOIP To Set, Please Your Add Interface EOIP";
	}
	
	/**
	 * This method is used to add interface eoip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function add_eoip($param) {
		$this->_conn->comm("/interface/eoip/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable interface eoip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function enable_eoip($param) {
		$this->_conn->comm("/interface/eoip/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable interface eoip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function disable_eoip($param) {
		$this->_conn->comm("/interface/eoip/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit interface eoip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function set_eoip($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/eoip/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one interface eoip in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function detail_eoip($param) {
		$array = $this->_conn->comm("/interface/eoip/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface EOIP With This id = ".$param;
	}
	
	/**
	 * This method is used to remove interface eoip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/EoIP
	 *
	 * @return type array
	 */
	public function delete_eoip($param) {
		$this->_conn->comm("/interface/eoip/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
