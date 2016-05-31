<?php
/**
 * Description of Mapi_Ppp_Aaa
 *
 * TOC :
 *	get_all_ppp_aaa
 *	set_ppp_aaa
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPaaa {
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
	 * This method is used to display all ppp aaa
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#Remote_AAA
	 *
	 * @return type array
	 */
	public function get_all_ppp_aaa() {
		$array = $this->_conn->comm("/ppp/aaa/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP AAA To Set, Please Your Add PPP AAA";
	}
	
	/**
	 * This method is used to set ppp aaa
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#Remote_AAA
	 *
	 * @return type array
	 */
	public function set_ppp_aaa($param) {
		$this->_conn->comm("/ppp/aaa/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
