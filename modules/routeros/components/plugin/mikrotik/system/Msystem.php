<?php
/**
 * Description of Mapi_System
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class Msystem {
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
     * This method is used to set systemn identity
     * @param type $name string
     * @return type array
     */  
    public function set_identity($name) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/system/identity/set");
       $sentence->setAttribute("name", $name);
       $this->talker->send($sentence);
       return "Sucsess";
    }
    /**
     * This method is used to display all system  identiy
     * @return type array
     */
    public function get_all_identity() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/identity/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        return $rs->getResultArray();
    }
    
    /**
     * This method is used to display all system clock
     * @return type array
     */
    public function get_all_clock() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/clock/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
         $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }
    }
    
    /**
     * This method is used to system bacup save
     * @param type $name string
     * @return type array
     */
    public function save_backup($name) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/system/backup/save");
       $sentence->setAttribute("name", $name);
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to system backup load
     * @param type $name string
     * @return type array
     */
    public function load_backup($name) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/system/backup/load");
       $sentence->setAttribute("name", $name);
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to display all system history
     * @return type array
     */
    public function get_all_history() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/history/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
         $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No History";
        }
        
    }
    
    /**
     * This method is used to display all system license
     * @return type array
     */
    public function get_all_license() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/license/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
         $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }
    }
    
    /**
     * This method is used to display all system routerboard
     * @return type array
     */
    public function get_all_routerboard() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/routerboard/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
         $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }
    }
    /**
     * This method is used to system reset configuration
     * @param type $keep_users string (yes or no)
     * @param type $no_defaults string (yes or no)
     * @param type $skip_backup string (yes or no)
     * @return type array
     */
    public function reset($keep_users, $no_defaults, $skip_backup) {
        $sentence = new SentenceUtil();
       $sentence->addCommand("/ip/address/add");
       $sentence->setAttribute("keep-users", $keep_users);
       $sentence->setAttribute("no-defaults", $no_defaults);
       $sentence->setAttribute("skip-backup", $skip_backup);
       $this->talker->send($sentence);
       return "Sucsess";
    }
}
