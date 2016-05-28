<?php
/**
 * Description of Mapi_Interface_Pppoe_Server
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppoeserver {
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
     * This method is used to add pppoe-server
     * @param type $param array
     * @return type array
     * 
     */
    public function add_pppoe_server($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/pppoe-server/server/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to disable pppoe-server by id
     * @param type $id string
     * @return type array
     * 
     */
    public function disable_pppoe_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-server/server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";        
    }
    
    /**
     * This method is used to enable pppoe-server by id
     * @param type $id string
     * @return type array
     * 
     */
    public function enable_pppoe_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-server/server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";        
    }
    
     /**
     * This method is used to set or edit by id
     * @param type $param array
     * @param type $id string
     * @return type array
     * 
     */
    public function set_pppoe_server($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-server/server/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to delete pppoe-server by id
     * @param type $id string
     * @return type array
     * 
     */
    public function delete_pppoe_server($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-server/server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";        
    }
    
    /**
     * This method is used to display all pppoe-server
     * @return type array
     * 
     */
    public function get_all_pppoe_server() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pppoe-server/server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPPoE-Server To Set, Please Your Add Interface PPPoE-Server";
        }
    }
    
     /**
     * This method is used to display one pppoe-server 
     * in detail based on the id
     * @param type $id string
     * @return type array
     * 
     */
    public function detail_pppoe_server($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pppoe-server/server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPPoE-Server With This id = ".$id;
        }
    }
}

