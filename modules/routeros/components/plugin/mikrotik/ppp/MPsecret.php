<?php
/**
 * Description of Mapi_Ppp_Secret
 *
 * TOC :
 *	get_all_ppp_secret
 *	add_ppp_secret
 *	enable_ppp_secret
 *	disable_ppp_secret
 *	detail_ppp_secret
 *	set_ppp_secret
 *	delete_ppp_secret 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPsecret {
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
	 * This method is used to display all ppp secret
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function get_all_ppp_secret() {
		$array = $this->_conn->comm("/ppp/secret/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP Secret To Set, Please Your Add PPP Secret";
	}
	
	/**
	 * This method is used to add ppp secret
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function add_ppp_secret($param) {
		$this->_conn->comm("/ppp/secret/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to enable ppp secret
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function enable_ppp_secret($param) {
		$this->_conn->comm("/ppp/secret/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to disable ppp secret
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function disable_ppp_secret($param) {
		$this->_conn->comm("/ppp/secret/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to set or edit ppp secret
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function set_ppp_secret($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/secret/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ppp secret in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function detail_ppp_secret($param) {
		$array = $this->_conn->comm("/ppp/secret/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No PPP Secret With This id = ".$param;
	}
	
	/**
	 * This method is used to delete ppp secret
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:PPP_AAA#User_Database
	 *
	 * @return type array
	 */
	public function delete_ppp_secret($param) {
		$this->_conn->comm("/ppp/secret/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}

