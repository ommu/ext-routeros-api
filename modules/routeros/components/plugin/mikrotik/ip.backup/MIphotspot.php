<?php
/**
 * Description of Mapi_Ip_Hotspot
 *
 * @author      Krisna Pranata krisna.pranata@gmail.com <http://vthink.web.id>
 * @author      Lalu Erfandi Maula Yusnu nunenuh@gmail.com <http://vthink.web.id>
 * @copyright   Copyright (c) 2011, Virtual Think Team.
 * @license     http://opensource.org/licenses/gpl-license.php GNU Public License
 * @category	Libraries
 */
class MIphotspot {
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
     * This method is used to display
     * all users hotspot
     * @return type array
     * 
     */
    public function get_all_hotspot_user() {
		$array = $this->_conn->comm("/interface/getall");
		print_r($array);
		$this->_conn->disconnect();
		exit();
    }
}
