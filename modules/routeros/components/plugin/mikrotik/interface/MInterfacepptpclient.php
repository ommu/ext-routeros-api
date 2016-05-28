<?php
/**
 * Description of Mapi_interface_pptp_client
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepptpclient {
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
     * This method used for add new interface pptp-client
     * @param type $param array
     * @return type array
     */
    public function add_pptp_client($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/pptp-client/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method used for disable interface pptp-client
     * @param type $id string
     * @return type array
     */
    public function disable_pptp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-client/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for enable interface pptp-client
     * @param type $id string
     * @return type array
     */
    public function enable_pptp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-client/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for delete interface pptp-client
     * @param type $id string
     * @return type array
     */
    public function delete_pptp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-client/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for detail interface pptp-client
     * @param type $id string
     * @return type array
     */
    public function detail_pptp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pptp-client/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPTP Client With This id = ".$id;
        }
    }
    
    /**
     * This method used for set or edit interface pptp-client
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_pptp_client($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-client/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for get all interface pptp-client
     * @return type array
     */
    public function get_all_pptp_client() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pptp-client/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface PPTP Client To Set, Please Your Add Interface PPTP Client";
        }
    }
}


