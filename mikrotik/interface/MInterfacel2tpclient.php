<?php
/**
 * Description of Mapi_interface_l2tp_client
 *
 * TOC :
 *	get_all_l2tp_client
 *	add_l2tp_client
 *	enable_l2tp_client
 *	disable_l2tp_client
 *	set_l2tp_client
 *	detail_l2tp_client
 *	delete_l2tp_client 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacel2tpclient {
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
	 * This method used for get all l2tp client
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function get_all_l2tp_client() {
		$array = $this->_conn->comm("/interface/l2tp-client/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface L2TP Client To Set, Please Your Add Interface L2TP Client";
	}
	
	/**
	 * This method used for add new l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function add_l2tp_client($param) {
		$this->_conn->comm("/interface/l2tp-client/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function enable_l2tp_client($param) {
		$this->_conn->comm("/interface/l2tp-client/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function disable_l2tp_client($param) {
		$this->_conn->comm("/interface/l2tp-client/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function set_l2tp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	  
	/**
	 * This method used for detail l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function detail_l2tp_client($param) {
		$array = $this->_conn->comm("/ip/address/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface L2TP Client With This id = ".$param;
	}
	 
	/**
	 * This method used for delete l2tp client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/L2TP#L2TP_Client
	 *
	 * @return type array
	 */
	public function delete_l2tp_client($param) {
		$this->_conn->comm("/interface/l2tp-client/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

