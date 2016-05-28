<?php
/**
 * Description of Mapi_Ppp_Profile
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPprofile {
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
	 * This method is used to add ppp profile
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function add_ppp_profile($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ppp/profile/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to display all ppp profile
	 * @return type array
	 * 
	 */
	public function get_all_ppp_profile() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ppp/profile/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No PPP Profile To Set, Please Your Add PPP Profile";
		}
	}
	
	/**
	 * This method is used to remove ppp profile by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_ppp_profile($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/profile/remove");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to set or edit ppp profile by id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_ppp_profile($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/profile/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	 /**
	 * This method is used to display one ppp profile
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_ppp_profile($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ppp/profile/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No PPP Profile With This id = ".$id;
		}
	}
	
}

