<?php
/**
 * Description of Mapi_Interface_Vlan
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacevlan {
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
     * This method is used to add vlan
     * @param type $param array
     * @return type array
     * 
     */
     public function add_vlan($param) {
        $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/vlan/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
     /**
     * This method is used to display all vlan
     * @return type array
     * 
     */
     public function get_all_vlan() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/vlan/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface VLAN To Set, Please Your Add Ip Address";
        }
    }
    
     
    /**
     * This method is used to enable vlan by id
     * @param type $id string
     * @return type array
     * 
     */
     public function enable_vlan($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/vlan/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to disable vlan by id
     * @param type $id string
     * @return type array
     * 
     */
     public function disable_vlan($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/vlan/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to delete vlan by id
     * @param type $id string
     * @return type array
     * 
     */
     public function delete_vlan($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/vlan/remove");
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
      public function set_vlan($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/vlan/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }     
    
     /**
     * This method is used to display one vlan
     * in detail based on the id
     * @param type $id string
     * @return type array
     * 
     */
     public function detail_vlan($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/vlan/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface VLAN With This id = ".$id;
        }
    }
}

