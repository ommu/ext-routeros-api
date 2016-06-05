<?php
/**
 * Description of Mapi_Ppp
 *
 * TOC :
 *	ppp_profile
 *	ppp_secret
 *	ppp_aaa
 *	ppp_active 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
defined('PPP_PATH') or define('PPP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once PPP_PATH . 'MPaaa.php';
require_once PPP_PATH . 'MPactive.php';
require_once PPP_PATH . 'MPprofile.php';
require_once PPP_PATH . 'MPsecret.php';
 
class MPpp {
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
	 * This method for call class Mapi_Ppp_Profile
	 * @return Object of Mapi_Ppp_Profile class
	 */
	public function ppp_profile() {
		return new MPprofile($this->talker, $this->_conn);
	}
	
	/**
	 * This method for call class Mapi_Ppp_Secret
	 * @return Object of Mapi_Ppp_Secret
	 */
	public function ppp_secret() {
		return new MPsecret($this->talker, $this->_conn);
	}	
	
	/**
	 * This method for call class Mapi_Ppp_Aaa
	 * @access public
	 * @return object of Mapi_Ppp_Aaa class
	 */
	public function ppp_aaa() {
		return new MPaaa($this->talker, $this->_conn);
	}
	
	/**
	 * This method for call class Mapi_Ppp_Active
	 * @return Object of Mapi_Ppp_Active class
	 */
	public function ppp_active() {
		return new MPactive($this->talker, $this->_conn);
	}
}