<?php
/**
 * Description of Mapi_Ppp_Active
 *
 * TOC :
 *	get_all_ppp_active
 *	delete_ppp_active
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPactive {
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
	 * This method is used to display all ppp active
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#Active_Users
	 *
	 * @return type array
	 */
	public function get_all_ppp_active() {
		$array = $this->_conn->comm("/ppp/active/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP Active To Set, Please Your Add PPP Active";
	}
	
	/**
	 * This method is used to delete ppp active
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#Active_Users
	 *
	 * @return type array
	 */
	public function delete_ppp_active($param) {
		$this->_conn->comm("/ppp/active/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
