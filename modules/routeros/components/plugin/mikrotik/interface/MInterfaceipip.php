<?php
/**
 * Description of Mapi_Interface_Ipip
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfaceipip {
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
     * This method is used to add interface ipip
     * @param type $param array
     * @return type array
     */
     public function add_ipip($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/ipip/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to display all interface ipip
     * @return type array
     */
     public function get_all_ipip() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/ipip/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface IPIP To Set, Please Your Add Interface IPIP";
        }
    }
    
    /**
     * This method is used to enable interface ipip by id
     * @param type $id string
     * @return type array
     */
     public function enable_ipip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/ipip/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to disable interface ipip by id
     * @param type $id string
     * @return type array
     */
     public function disable_ipip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/ipip/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to remove interface ipip
     * @param type $id string
     * @return type array
     */
     public function delete_ipip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/ipip/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to set or edit interface ipip by id
     * @param type $param array
     * @param type $id string
     * @return type 
     */
    public function set_ipip($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/ipip/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }     
    
    /**
     * This method is used to display one interface ipip 
     * in detail based on the id
     * @param type $id string
     * @return type array
     */
    public function detail_ipip($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/ipip/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface IPIP With This id = ".$id;
        }
                
    }
}