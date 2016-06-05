<?php
/**
 * Description of Mapi_Interface_Pppoe_Server
 *
 * TOC :
 *	get_all_pppoe_server
 *	add_pppoe_server
 *	enable_pppoe_server
 *	disable_pppoe_server
 *	set_pppoe_server
 *	detail_pppoe_server
 *	delete_pppoe_server 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppoeserver {
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
	 * This method is used to display all pppoe-server
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function get_all_pppoe_server() {
		$array = $this->_conn->comm("/interface/pppoe-server/server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPPoE-Server To Set, Please Your Add Interface PPPoE-Server";
	}
	
	/**
	 * This method is used to add pppoe-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function add_pppoe_server($param) {
		$this->_conn->comm("/interface/pppoe-server/server/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable pppoe-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function enable_pppoe_server($param) {
		$this->_conn->comm("/interface/pppoe-server/server/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable pppoe-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function disable_pppoe_server($param) {
		$this->_conn->comm("/interface/pppoe-server/server/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function set_pppoe_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pppoe-server/server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one pppoe-server in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function detail_pppoe_server($param) {
		$array = $this->_conn->comm("/interface/pppoe-server/server/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPPoE-Server With This id = ".$param;
	}
	
	/**
	 * This method is used to delete pppoe-server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Server_Setup_.28Access_Concentrator.29
	 *
	 * @return type array
	 */
	public function delete_pppoe_server($param) {
		$this->_conn->comm("/interface/pppoe-server/server/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

