<?php
/**
 * Description of Mapi_Interface_Vrrp
 *
 * TOC :
 *	get_all_vrrp
 *	add_vrrp
 *	enable_vrrp
 *	disable_vrrp
 *	set_vrrp
 *	detail_vrrp
 *	delete_vrrp 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */

class MInterfacevrrp {
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
	 * This method is used to display all vrrp
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function get_all_vrrp() {
		$array = $this->_conn->comm("/interface/vrrp/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface VRRP To Set, Please Your Add Interface VRRP";
	}
	
	/**
	 * This method is used to to add vrrp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function add_vrrp($param) {
		$this->_conn->comm("/interface/vrrp/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to to enable vrrp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function enable_vrrp($param) {
		$this->_conn->comm("/interface/vrrp/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to to disable vrrp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function disable_vrrp($param) {
		$this->_conn->comm("/interface/vrrp/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function set_vrrp($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vrrp/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one vrrp in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function detail_vrrp($param) {
		$array = $this->_conn->comm("/interface/vrrp/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface VRRP With This id = ".$param;
	}
	
	/**
	 * This method is used to to delete vrrp
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/VRRP
	 *
	 * @return type array
	 */
	public function delete_vrrp($param) {
		$this->_conn->comm("/interface/vrrp/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}