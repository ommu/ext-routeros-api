<?php
/**
 * Description of Mapi_interface_ppp_client
 *
 * TOC :
 *	get_all_ppp_client
 *	add_ppp_client
 *	enable_ppp_client
 *	disable_ppp_client
 *	set_ppp_client
 *	detail_ppp_client
 *	delete_ppp_client 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppclient {
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
	 * This method used for get all interface ppp-client
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function get_all_ppp_client() {
		$array = $this->_conn->comm("/interface/ppp-client/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPP Client To Set, Please Your Add Interface PPP Client";
	}
	
	/**
	 * This method used for add new interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function add_ppp_client($param) {
		$this->_conn->comm("/interface/ppp-client/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function enable_ppp_client($param) {
		$this->_conn->comm("/interface/ppp-client/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function disable_ppp_client($param) {
		$this->_conn->comm("/interface/ppp-client/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function set_ppp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function detail_ppp_client($param) {
		$array = $this->_conn->comm("/interface/ppp-client/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPP Client With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface ppp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPP
	 *
	 * @return type array
	 */
	public function delete_ppp_client($param) {
		$this->_conn->comm("/interface/ppp-client/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

