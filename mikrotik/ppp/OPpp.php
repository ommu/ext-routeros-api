<?php
/**
 * Description of OApi_Ppp
 *
 * TOC :
 *	ppp_secret
 *	ppp_profile
 *	ppp_active 
 *	ppp_aaa
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
defined('PPP_PATH') or define('PPP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once PPP_PATH . 'OPppSecret.php';
require_once PPP_PATH . 'OPppProfile.php';
require_once PPP_PATH . 'OPppActive.php';
	require_once PPP_PATH . 'OPppAaa.php';
 
class OPpp {
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
	 * This method for call class OApi_Ppp_Secret
	 * @return Object of OApi_Ppp_Secret
	 */
	public function ppp_secret() {
		return new OPppSecret($this->talker, $this->_conn);
	}	
		
	/**
	 * This method for call class OApi_Ppp_Profile
	 * @return Object of OApi_Ppp_Profile class
	 */
	public function ppp_profile() {
		return new OPppProfile($this->talker, $this->_conn);
	}
	
	/**
	 * This method for call class OApi_Ppp_Active
	 * @return Object of OApi_Ppp_Active class
	 */
	public function ppp_active() {
		return new OPppActive($this->talker, $this->_conn);
	}
	
	/**
	 * This method for call class OApi_Ppp_Aaa
	 * @access public
	 * @return object of OApi_Ppp_Aaa class
	 */
	public function ppp_aaa() {
		return new OPppAaa($this->talker, $this->_conn);
	}
}