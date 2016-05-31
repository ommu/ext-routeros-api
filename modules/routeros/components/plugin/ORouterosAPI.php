<?php
/**
 * ORouterosAPI class file.
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */

defined('MIKROTIK_PATH') or define('MIKROTIK_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR.'mikrotik'.DIRECTORY_SEPARATOR);

require_once MIKROTIK_PATH . 'routeros_api.class.php';

//load child class interface
require_once MIKROTIK_PATH . 'interface/MInterfaces.php';

//load child class ip
require_once MIKROTIK_PATH . 'ip/MIp.php';

//load child class ppp
require_once MIKROTIK_PATH . 'ppp/MPpp.php';

// load child class system
require_once MIKROTIK_PATH . 'system/MSscheduler.php';
require_once MIKROTIK_PATH . 'system/Msystem.php';

//load child class file
require_once MIKROTIK_PATH . 'file/MFile.php';

class ORouterosAPI extends RouterosAPI
{
	private $_obj;
	
	public static function getInstance() {
		return new self;		
	}
	
	public function talker() {		
		return $this->connect(Yii::app()->params['Mikrotik']['address'], Yii::app()->params['Mikrotik']['username'], Yii::app()->params['Mikrotik']['password']);
	}
	
	/**
	 * This method for call class Mapi Interface
	 * @access public
	 * @return Object of Mapi_Interface 
	 */
	public function interfaces() {
		return new MInterfaces($this->talker(), $this);
	}
	
	/**
	 * This method for call class Mapi IP
	 * @access public
	 * @return Object of Mapi_Ip 
	 */
	public function ip() {
		return new MIp($this->talker(), $this);
	}
	
	/**
	 * This method for call class Mapi Ppp
	 * @access public
	 * @return Object of Mapi_Ppp
	 */
	public function ppp() {
		return new MPpp($this->talker(), $this);
	}
	
	/**
	 * This method for call class Mapi_System
	 * @access public
	 * @return Mapi_System 
	 */
	public function system() {
		return new MSystem($this->talker(), $this);
	}
	
	/**
	 * This method for call class Mapi_File
	 * @access public
	 * @return Mapi_File 
	 */
	public function file() {
		return new MFile($this->talker(), $this);
	}
	
	/**
	 * This metod used call class Mapi_System_Scheduler 
	 * @return Mapi_Ip
	 */
	public function system_scheduler() {
		return new MSscheduler($this->talker(), $this);
	}	
	
}