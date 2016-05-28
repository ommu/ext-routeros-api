<?php
/**
 * Description of Mapi_System_Scheduler
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MSscheduler {
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
     * This method used for add new system scheduler
     * @param type $param array
     * @return type array
     */
    public function add_system_scheduler($param) {
        $sentence = new SentenceUtil();
       $sentence->addCommand("/system/scheduler/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method used for disable system scheduler
     * @param type $id string
     * @return type array
     */
    public function disable_system_scheduler($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for enable system scheduler
     * @param type $id string
     * @return type array
     */
    public function enable_system_scheduler($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
     }
     
     /**
      * This method used for delete system scheduler
      * @param type $id string
      * @return type array
      */
    public function delete_system_scheduler($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
      }
      
      /**
       * This method used for detail system scheduler
       * @param type $id string
       * @return type array
       */
    public function detail_system_scheduler($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/scheduler/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No System Scheduler With This id = ".$id;
        }
    }
    
    /**
     * This method used for set or edit system scheduler
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set_system_scheduler($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method used for get all system scheduler
     * @return type array
     */
    public function get_all_system_scheduler() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/scheduler/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No System Scheduler To Set, Please Your Add System Scheduler";
        }
    }
}
