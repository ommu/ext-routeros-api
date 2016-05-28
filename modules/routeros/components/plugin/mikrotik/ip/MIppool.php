<?php
/**
 * Description of Mapi_Ip_Pool
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIppool {
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
     * This method is used to add pool
     * @param type $param array
     * @return type array
     * 
     */
    public function add_pool($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/pool/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to display
     * all pool
     * @return type array
     * 
     */
    public function get_all_pool() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand('/ip/pool/getall');
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }else{
            return "No Ip Pool To Set, Please Your Add Ip Pool";
        }
    }
    
    /**
     * This method is used to remove the pool by id
     * @param type $id string
     * @return type array
     * 
     */
    public function delete_pool($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/pool/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to change pool based on the id
     * @param type $param array
     * @param type $id string
     * @return type array
     * 
     */
    public function set_pool($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/pool/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
     /**
     * This method is used to display one pool 
     * in detail based on the id
     * @param type $id string
     * @return type array
     * 
     */
    public function detail_pool($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/pool/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Ip Binding With This Id = ".$id;
        }
    }
}

