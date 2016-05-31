<?php
/**
 * Description of Mapi_interface_ppp_server
 *
 * TOC :
 *	get_all_ppp_server
 *	add_ppp_server
 *	enable_ppp_server
 *	disable_ppp_server
 *	set_ppp_server
 *	detail_ppp_server
 *	delete_ppp_server 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppserver {
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
	 * This method used for get all interface ppp-sever
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function get_all_ppp_server() {
		$array = $this->_conn->comm("/interface/ppp-server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPP Server To Set, Please Your Add Interface PPP Server";
	}
	
	/**
	 * This method used for add new interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function add_ppp_server($param) {
		$this->_conn->comm("/interface/ppp-server/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function enable_ppp_server($param) {
		$this->_conn->comm("/interface/ppp-server/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function disable_ppp_server($param) {
		$this->_conn->comm("/interface/ppp-server/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function set_ppp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function detail_ppp_server($param) {
		$array = $this->_conn->comm("/interface/ppp-server/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPP Server With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface ppp-sever
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server
	 *
	 * @return type array
	 */
	public function delete_ppp_server($param) {
		$this->_conn->comm("/interface/ppp-server/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
