<?php
/**
 * Description of Mapi_interface_l2tp_server
 *
 * TOC :
 *	L2TP Server
 *	  get_all_l2tp_server
 *	  add_l2tp_server
 *	  enable_l2tp_server
 *	  disable_l2tp_server
 *	  set_l2tp_server
 *	  detail_l2tp_server
 *	  delete_l2tp_server
 *	Server configuration
 *	  get_all_l2tp_server_server
 *	  set_l2tp_server_server 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacel2tpserver {
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
	 * This method used for get all l2tp server
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function get_all_l2tp_server() {
		$array = $this->_conn->comm("/interface/l2tp-server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface L2TP Server To Set, Please Your Add Interface L2TP Server";
	}
	
	/**
	 * This method used for add new l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function add_l2tp_server($param) {
		$this->_conn->comm("/interface/l2tp-server/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function enable_l2tp_server($param) {
		$this->_conn->comm("/interface/l2tp-server/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function disable_l2tp_server($param) {
		$this->_conn->comm("/interface/l2tp-server/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function set_l2tp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function detail_l2tp_server($param) {
		$array = $this->_conn->comm("/interface/l2tp-server/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface L2TP Server With This id = ".$param;
	}
	
	/**
	 * This method used for delete l2tp server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Server
	 *
	 * @return type array
	 */
	public function delete_l2tp_server($param) {
		$this->_conn->comm("/interface/l2tp-server/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for get all l2tp server server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#Server_configuration
	 *
	 * @return type array
	 */
	public function get_all_l2tp_server_server() {
		$array = $this->_conn->comm("/interface/l2tp-server/server/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface L2TP Server Server To Set, Please Your Add Interface L2TP Server Server";
	}
	
	/**
	 * This method used for set l2tp server server
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#Server_configuration
	 *
	 * @return type array
	 */
	public function set_l2tp_server_server($param) {
		$this->_conn->comm("/interface/l2tp-server/server/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}


