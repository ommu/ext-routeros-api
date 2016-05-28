<?php
/**
 * Description of Mapi_Interface_Pppoe_Client
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppoeclient {
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
     * This method is used to add pppoe-client
     * @param type $param array
     * @return type array
     * 
     */
    public function add_pppoe_client($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/pppoe-client/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to display all pppoe-client 
     * @return type array
     * 
     */
    public function get_all_pppoe_client() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pppoe-client/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPPoE-Client To Set, Please Your Add PPPoE-Client";
        }
    }
    
    /**
     * This method is used to enable pppoe-client by id
     * @param type $id string
     * @return type array
     * 
     */
    public function enable_pppoe_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-client/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to disable pppoe-client by id
     * @param type $id string
     * @return type array
     * 
     */
     public function disable_pppoe_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-client/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
   }
    
    /**
     * This method is used to delete pppoe-client by id
     * @param type $id string
     * @return type array
     * 
     */
     public function delete_pppoe_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-client/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
   
    /**
     * This method is used to set or edit by id
     * @param type $param array
     * @param type $id string
     * @return type array
     * 
     */
     public function set_pppoe_client($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pppoe-client/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }     
    
     /**
     * This method is used to display one pppoe-client
     * in detail based on the id
     * @param type $id string
     * @return type array
     */
    public function detail_pppoe_client($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pppoe-client/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPPoE-Client With This id = ".$id;
        }
                
    }
}


