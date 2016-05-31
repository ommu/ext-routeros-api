<?php
/**
 * Description of Mapi_interface_pptp_client
 *
 * TOC :
 *	get_all_pptp_client
 *	add_pptp_client
 *	enable_pptp_client
 *	disable_pptp_client
 *	set_pptp_client
 *	detail_pptp_client
 *	delete_pptp_client 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepptpclient {
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
	 * This method used for get all interface pptp-client
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function get_all_pptp_client() {
		$array = $this->_conn->comm("/interface/pptp-client/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPTP Client To Set, Please Your Add Interface PPTP Client";
	}
	
	/**
	 * This method used for add new interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function add_pptp_client($param) {
		$this->_conn->comm("/interface/pptp-client/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function enable_pptp_client($param) {
		$this->_conn->comm("/interface/pptp-client/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function disable_pptp_client($param) {
		$this->_conn->comm("/interface/pptp-client/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function set_pptp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function detail_pptp_client($param) {
		$array = $this->_conn->comm("/interface/pptp-client/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPTP Client With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface pptp-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Client
	 *
	 * @return type array
	 */
	public function delete_pptp_client($param) {
		$this->_conn->comm("/interface/pptp-client/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}


