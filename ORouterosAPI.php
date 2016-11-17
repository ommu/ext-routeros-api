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
require_once MIKROTIK_PATH . 'interface/OInterfaces.php';

//load child class ppp
require_once MIKROTIK_PATH . 'ppp/OPpp.php';

//load child class ip
require_once MIKROTIK_PATH . 'ip/OIp.php';

//load child class file
require_once MIKROTIK_PATH . 'file/OFile.php';

// load child class system
require_once MIKROTIK_PATH . 'system/OSystem.php';
require_once MIKROTIK_PATH . 'system/OSystemScheduler.php';

//load child class tool
require_once MIKROTIK_PATH . 'tool/OTool.php';

class ORouterosAPI extends RouterosAPI
{
	private $_obj;
	
	public static function getInstance() {
		return new self;		
	}
	
	public function talker() {		
		return $this->connect(Yii::app()->params['Mikrotik'][0]['address'], Yii::app()->params['Mikrotik'][0]['username'], Yii::app()->params['Mikrotik'][0]['password']);
	}
	
	/**
	 * This method for call class OApi Interface
	 * @access public
	 * @return Object of OApi_Interface 
	 */
	public function interfaces() {
		return new MInterfaces($this->talker(), $this);
	}
	
	/**
	 * This method for call class OApi Ppp
	 * @access public
	 * @return Object of OApi_Ppp
	 */
	public function ppp() {
		return new OPpp($this->talker(), $this);
	}
	
	/**
	 * This method for call class OApi IP
	 * @access public
	 * @return Object of OApi_Ip 
	 */
	public function ip() {
		return new OIp($this->talker(), $this);
	}
	
	/**
	 * This method for call class OApi_File
	 * @access public
	 * @return OApi_File 
	 */
	public function file() {
		return new OFile($this->talker(), $this);
	}
	
	/**
	 * This method for call class OApi_System
	 * @access public
	 * @return OApi_System 
	 */
	public function system() {
		return new OSystem($this->talker(), $this);
	}
	
	/**
	 * This metod used call class OApi_System_Scheduler 
	 * @return OApi_System_Scheduler
	 */
	public function system_scheduler() {
		return new OSystemScheduler($this->talker(), $this);
	}	
	
	/**
	 * This metod used call class OApi_Tool
	 * @return OApi_Tool
	 */
	public function tool() {
		return new OTool($this->talker(), $this);
	}	
	
}