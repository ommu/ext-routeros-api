<?php
defined('IP_PATH') or define('IP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);

require_once IP_PATH . 'MIphotspot.php';

 /**
 * Description of Mapi_Ip
 *
 */
class MIp {
    /**
     *
     * @var type array
     */
    private $talker;
	private $_conn;
	
    function __construct($talker, $conn) {
	    $this->talker = $talker;	
		$this->_conn = $conn;
	}
	
    /**
     * This method is used toclass Mapi_Ip_Hotspot
     * @return Object of Mapi_Ip_Hotspot class
     */
    public function hotspot() {
		return new MIphotspot($this->talker, $this->_conn);
    }
    
}