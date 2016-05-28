<?php
/**
 * Description of Mapi_interface_l2tp_client
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacel2tpclient {
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
     * This method used for add new l2tp client
     * @param type $param array
     * @return type array
     */
    public function add_l2tp_client($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/l2tp-client/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method used for disable l2tp client
     * @param type $id string
     * @return type array
     */
    public function disable_l2tp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-client/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for enable l2tp client
     * @param type $id string
     * @return type array
     */
    public function enable_l2tp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-client/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
     }
     
     /**
      * This method used for delete l2tp client
      * @param type $id string
      * @return type array
      */
    public function delete_l2tp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-client/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
      }
      
      /**
       * This method used for detail l2tp client
       * @param type $id string
       * @return type array
       */
    public function detail_l2tp_client($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-client/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface L2TP Client With This id = ".$id;
        }
    }
    
    /**
     * This method used for set or edit l2tp client
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_l2tp_client($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-client/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for get all l2tp client
     * @return type array
     */
    public function get_all_l2tp_client() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-client/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface L2TP Client To Set, Please Your Add Interface L2TP Client";
        }
    }
}

