<?php
/**
 * Description of Mapi_Interface_Pppoe_Client
 *
 * TOC :
 *	get_all_address
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppoeclient {
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
	 * This method is used to display all pppoe-client
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function get_all_pppoe_client() {
		$array = $this->_conn->comm("/interface/pppoe-client/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPPoE-Client To Set, Please Your Add PPPoE-Client";
	}
	
	/**
	 * This method is used to add pppoe-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function add_pppoe_client($param) {
		$this->_conn->comm("/interface/pppoe-client/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable pppoe-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function enable_pppoe_client($param) {
		$this->_conn->comm("/interface/pppoe-client/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable pppoe-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function disable_pppoe_client($param) {
		$this->_conn->comm("/interface/pppoe-client/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
   
	/**
	 * This method is used to set or edit
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function set_pppoe_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pppoe-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one pppoe-client in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function detail_pppoe_client($param) {
		$array = $this->_conn->comm("/interface/pppoe-client/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No Interface PPPoE-Client With This id = ".$param;
	}
	
	/**
	 * This method is used to delete pppoe-client
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Interface/PPPoE#PPPoE_Client
	 *
	 * @return type array
	 */
	public function delete_pppoe_client($param) {
		$this->_conn->comm("/interface/pppoe-client/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}


