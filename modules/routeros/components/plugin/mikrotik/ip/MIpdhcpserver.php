<?php
/**
 * Description of Mapi_Ip_Dhcp_Server
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcpserver {
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
     * This methode is used to add ip dhcp server network
     * @param type $param array
     * @return type array
     */
    public function add_dhcp_server_network($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/dhcp-server/network/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This methode is used to add ip dhcp server
     * @param type $param array
     * @return type \array
     */
    public function add_dhcp_server($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/dhcp-server/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This methode is used to set ip dhcp server config
     * @param type $store_leases_disk string
     * @return type array
     */
    public function set_dhcp_server_config($store_leases_disk) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/config/set");
        $sentence->setAttribute("store-leases-disk", $store_leases_disk);
        $this->talker->send($sentence);
        return "Sucsess";
     }
    
    /**
     * This methode is used to set or edit ip dhcp server network
     * by id
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_dhcp_server_network($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/network/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This methode is used to display all ip dhcp server network
     * @return type array
     */
    public function get_all_dhcp_server_network() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/network/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Server Network To Set, Please Your Add Ip Dhcp-Server Network";
        }
    }
    
    /**
     * This methode is used to delete ip dhcp server network by id
     * @param type $id string
     * @return type array
     */
    public function delete_dhcp_server_network($id) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/dhcp-server/network/remove");
       $sentence->where(".id", "=", $id);
       $enable = $this->talker->send($sentence);
       return "Sucsess";
    }
    /**
     * This method is used to display one ip dhcp server network
     * in detail based on the id
     * @param type $id string
     * @return type array
     */
    public function detail_dhcp_server_network($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/network/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Server Network With This id = ".$id;
        }
    }
    
    /**
     * This methode is used to disable ip dhcp server by id
     * @param type $id string
     * @return type array
     */
    public function disable_dhcp_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This methode is used to enable ip dhcp server by id
     * @param type $id string
     * @return type array
     */
    public function enable_dhcp_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This methode is used to remove ip dhcp server by id
     * @param type $id string
     * @return type array
     */
    public function delete_dhcp_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This methode is used to det or edit ip dhcp server by id
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_dhcp_server($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-server/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This methode is used to display all ip dhcp server
     * @return type array
     */
    public function get_all_dhcp_server() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Server To Set, Please Your Add Ip Dhcp-Server";
        }
    }
    
    /**
     * This method is used to display one ip dhcp server
     * in detail based on the id
     * @param type $id string
     * @return type  array
     */
    public function detail_dhcp_server($id) {
         $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Server With This id = ".$id;
        }
    }
    
    public function get_all_dhcp_server_config() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-server/config/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Server Config To Set, Please Your Add Ip Dhcp-Server Config";
        }
    }
    
}
