<?php
/**
 * Description of Mapi_Ip_Service
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpservice {
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
	 * This methode is used to display all ip service
	 * @return type array
	 */
	public function get_all_service() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/service/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Service To Set, Please Your Add Ip Service";
		}
	}
	
	/**
	 * This methode is used to enable ip service by id
	 * @param type $id string
	 * @return type array
	 */
	public function enable_service($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/service/enable");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This methode is used to disable ip service by id
	 * @param type $id string
	 * @return type array
	 */
	public function disable_service($id) {
	   $sentence = new SentenceUtil();
		$sentence->addCommand("/ip/service/disable");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one ip service
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 */
	public function detail_service($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/service/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Service With This id = ".$id;
		}
	}	
	
	public function set_service($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/service/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
}

