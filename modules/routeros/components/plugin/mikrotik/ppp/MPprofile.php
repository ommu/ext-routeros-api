<?php
/**
 * Description of Mapi_Ppp_Profile
 *
 * TOC :
 *	get_all_ppp_profile
 *	add_ppp_profile
 *	set_ppp_profile
 *	detail_ppp_profile
 *	delete_ppp_profile 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPprofile {
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
	 * This method is used to display all ppp profile
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Profiles
	 *
	 * @return type array
	 */
	public function get_all_ppp_profile() {
		$array = $this->_conn->comm("/ppp/profile/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP Profile To Set, Please Your Add PPP Profile";
	}
	
	/**
	 * This method is used to add ppp profile
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Profiles
	 *
	 * @return type array
	 */
	public function add_ppp_profile($param) {
		$this->_conn->comm("/ppp/profile/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit ppp profile
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Profiles
	 *
	 * @return type array
	 */
	public function set_ppp_profile($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/profile/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ppp profile in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Profiles
	 *
	 * @return type array
	 */
	public function detail_ppp_profile($param) {
		$array = $this->_conn->comm("/ppp/profile/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP Profile With This id = ".$param;
	}
	
	/**
	 * This method is used to remove ppp profile
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Profiles
	 *
	 * @return type array
	 */
	public function delete_ppp_profile($param) {
		$this->_conn->comm("/ppp/profile/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
}

