<?php
/**
 * Description of Mapi_Ip_Dhcp_Relay
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcprelay {
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
     * This method is used to ip add dhcp relay
     * @param type $param array 
     * @return type array
     */
    public function add_dhcp_relay($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/dhcp-relay/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to disable ip dhcp relay by id
     * @param type $id string
     * @return type array
     */
    public function disable_dhcp_relay($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-relay/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to enable ip dhcp relay by id
     * @param type $id string
     * @return type array
     */
    public function enable_dhcp_relay($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-relay/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to set or edit ip dhcp relay by id
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_dhcp_relay($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-relay/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to remove ip dhcp relay by id
     * @param type $id string
     * @return type array
     */
    public function delete_dhcp_relay($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/dhcp-relay/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to display one interface bonding
     * in detail based on the id
     * @param type $id string
     * @return type array
     */
    public function detail_dhcp_relay($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-relay/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Relay With This id = ".$id;
        }
    }
    
    /**
     * This method is used to display all ip dhcp relay
     * @return type array
     */
    public function get_all_dhcp_relay() {
         $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/dhcp-relay/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Dhcp-Relay To Set, Please Your Add Ip Dhcp-Relay";
        }
    }
}
