<?php
/**
 * Description of Mapi_Interface_Pptp_Server
 *
 * TOC :
 *	PPTP Server
 *	  get_all_pptp_server
 *	  add_pptp_server
 *	  enable_pptp_server
 *	  disable_pptp_server
 *	  set_pptp_server
 *	  detail_pptp_server
 *	  delete_pptp_server
 *	Server configuration
 *	  get_all_pptp_server_server
 *	  set_pptp_server_server
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepptpserver {
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
	 * This method used for get all interface pptp-server
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function get_all_pptp_server() {
		$array = $this->_conn->comm("/interface/pptp-server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPTP Server To Set, Please Your Add Interface PPTP Server";
	}
	
	/**
	 * This method used for add new interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function add_pptp_server($param) {
		$this->_conn->comm("/interface/pptp-server/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function enable_pptp_server($param) {
		$this->_conn->comm("/interface/pptp-server/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function disable_pptp_server($param) {
		$this->_conn->comm("/interface/pptp-server/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function set_pptp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess"; 
	}
	
	/**
	 * This method used for detail interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function detail_pptp_server($param) {
		$array = $this->_conn->comm("/interface/pptp-server/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPTP Server With This id = ".$param;
	}
	
	/**
	 * This method used for delete interface pptp-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#PPTP_Server
	 *
	 * @return type array
	 */
	public function delete_pptp_server($param) {
		$this->_conn->comm("/interface/pptp-server/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all pptp-server server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#Server_configuration
	 *
	 * @return type array
	 */
	public function get_all_pptp_server_server() {
		$array = $this->_conn->comm("/interface/pptp-server/server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPTP Server Server To Set, Please Your Add Interface PPTP Server Server";
	}
	
	/**
	 * This method used for set pptp-server server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPTP#Server_configuration
	 *
	 * @return type array
	 */
	public function set_pptp_server_server($param) {
		$this->_conn->comm("/interface/pptp-server/server/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
