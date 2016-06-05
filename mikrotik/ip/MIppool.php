<?php
/**
 * Description of Mapi_Ip_Pool
 *
 * TOC :
 *	get_all_pool
 *	add_pool
 *	set_pool
 *	detail_pool
 *	delete_pool 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIppool {
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
	 * This method is used to display all pool
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Pools
	 *
	 * @return type array
	 */
	public function get_all_pool() {
		$array = $this->_conn->comm("/ip/pool/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Pool To Set, Please Your Add Ip Pool";
	}
	
	/**
	 * This method is used to add pool
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Pools
	 *
	 * @return type array
	 */
	public function add_pool($param) {
		$this->_conn->comm("/ip/pool/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to change pool
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Pools
	 *
	 * @return type array
	 */
	public function set_pool($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/pool/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one pool in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Pools
	 *
	 * @return type array
	 */
	public function detail_pool($param) {
		$array = $this->_conn->comm("/ip/pool/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Ip Binding With This Id = ".$param;
	}
	
	/**
	 * This method is used to remove the pool
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:IP/Pools
	 *
	 * @return type array
	 */
	public function delete_pool($param) {
		$this->_conn->comm("/ip/pool/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

