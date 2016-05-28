<?php
/**
 * Description of Mapi_Interface_Eoip
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfaceeoip {
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
     * This method is used to add interface eoip
     * 
     * Example :
     * 
     * $param = array(
     *                'remote-address'  => '172.17.18.18',
     *                'tunnel-id'       => '0',
     *                'arp'             => 'disabled',
     *                'comment'         => 'krisna-eoip',
     *                'mtu'             => '0',
     *                'name'            => 'krisna',
     *                'mac-address'     => '00:00:00:00:00:00',
     *                'copy-from'       => 'krisna.txt'
     *                'disabled'        => 'no'
     *              );
     * 
     * $this->mikrotik_api->interfaces()->eoip()->add_eoip($param);
     * 
     * @param type $param array
     * @return type array
     */
     public function add_eoip($param) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/interface/eoip/add");
       foreach ($param as $name => $value){
               $sentence->setAttribute($name, $value);
       }       
       $this->talker->send($sentence);
       return "Sucsess";
    }
    
    /**
     * This method is used to display all interface eoip
     * 
     * Example :
     * 
     * print_r($this->mikrotik_api->interfaces()->eoip()->get_all_eoip());
     * @return type array
     */
     public function get_all_eoip() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/eoip/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface EOIP To Set, Please Your Add Interface EOIP";
        }
    }
    
    /**
     * This method is used to enable interface eoip by id
     * 
     * Example :
     * 
     * $this->mikrotik_api->interfaces()->eoip()->enable_eoip('*1');
     * @param type $id string
     * @return type array
     */
     public function enable_eoip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/eoip/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to disable interface eoip by id
     * 
     * Example :
     * 
     * $this->mikrotik_api->interfaces()->eoip()->disable_eoip('*1');
     * @param type $id string
     * @return type array
     */
     public function disable_eoip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/eoip/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to remove interface eoip by id
     * 
     * Example :
     * 
     * $this->mikrotik_api->interfaces()->eoip()->delete_eoip('*1');
     * @param type $id string
     * @return type array
     */
     public function delete_eoip($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/eoip/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }
    
    /**
     * This method is used to set or edit interface eoip by id
     * 
     * Example :
     * 
     * $param = array(
     *                'remote-address'  => '172.17.18.18',
     *                'tunnel-id'       => '0',
     *                'arp'             => 'disabled',
     *                'comment'         => 'krisna-eoip',
     *                'mtu'             => '0',
     *                'name'            => 'krisna',
     *                'mac-address'     => '00:00:00:00:00:00',
     *                'copy-from'       => 'krisna.txt'
     *                'disabled'        => 'no'
     *              );
     * 
     *  $this->mikrotik_api->interfaces()->eoip()->set_eoip($param, '*1');
     * @param type $param array
     * @param type $id string
     * @return type array
     */
      public function set_eoip($param, $id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/eoip/set");
        foreach ($param as $name => $value){
                $sentence->setAttribute($name, $value);
         }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }     
    
    /**
     * This method is used to display one interface eoip 
     * in detail based on the id
     * 
     * Example :
     * 
     * $this->mikrotik_api->interfaces()->eoip()->detail_eoip($param, '*1');
     * @param type $id string
     * @return type array
     */
     public function detail_eoip($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/eoip/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No Interface EOIP With This id = ".$id;
        }
    }
}
