<?php

/**
 * ORouterosAPI class file.
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */

defined('MIKROTIK_PATH') or define('MIKROTIK_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR.'mikrotik'.DIRECTORY_SEPARATOR);

require_once MIKROTIK_PATH . 'routeros_api.class.php';

//load child class ip
require_once MIKROTIK_PATH . 'ip/MIp.php';

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
     * This method for call class Mapi IP
     * @access public
     * @return Object of Mapi_Ip 
     */
    public function ip() {
		return new MIp($this->talker(), $this);
    }
	
}