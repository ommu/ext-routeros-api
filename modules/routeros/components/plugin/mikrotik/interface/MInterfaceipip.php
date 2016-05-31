<?php
/**
 * Description of Mapi_Interface_Ipip
 *
 * TOC :
 *	get_all_ipip
 *	add_ipip
 *	enable_ipip
 *	disable_ipip
 *	set_ipip
 *	detail_ipip
 *	delete_ipip 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfaceipip {
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
	 * This method is used to display all interface ipip
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function get_all_ipip() {
		$array = $this->_conn->comm("/interface/ipip/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface IPIP To Set, Please Your Add Interface IPIP";
	}
	 
	/**
	 * This method is used to add interface ipip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function add_ipip($param) {
		$this->_conn->comm("/interface/ipip/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable interface ipip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function enable_ipip($param) {
		$this->_conn->comm("/interface/ipip/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable interface ipip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function disable_ipip($param) {
		$this->_conn->comm("/interface/ipip/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit interface ipip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function set_ipip($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ipip/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one interface ipip in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function detail_ipip($param) {
		$array = $this->_conn->comm("/interface/ipip/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface IPIP With This id = ".$param;
	}
	
	/**
	 * This method is used to remove interface ipip
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/IPIP
	 *
	 * @return type array
	 */
	public function delete_ipip($param) {
		$this->_conn->comm("/interface/ipip/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}