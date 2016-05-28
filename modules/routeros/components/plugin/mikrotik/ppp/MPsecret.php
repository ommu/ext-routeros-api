<?php
/**
 * Description of Mapi_Ppp_Secret
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPsecret {
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
	 * This method is used to add ppp secret
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function add_ppp_secret($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ppp/secret/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to disable ppp secret
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable_ppp_secret($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/secret/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";   
	}
	
	/**
	 * This method is used to enable ppp secret
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_ppp_secret($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/secret/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess"; 
	}
	
	/**
	 * This method is used to set or edit ppp secret
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_ppp_secret($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/secret/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to delete ppp secret
	 * @param type $id string
	 * @return type array
	 */
	public function delete_ppp_secret($id) {
		 $sentence = new SentenceUtil();
		$sentence->addCommand("/ppp/secret/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess"; 
	}
	
	/**
	 * This method is used to display all ppp secret
	 * @return type array
	 * 
	 */
	public function get_all_ppp_secret() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ppp/secret/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No PPP Secret To Set, Please Your Add PPP Secret";
		}
		 return $this->query('');
	}
	
	 /**
	 * This method is used to display one ppp secret 
	 * in detail based on the id
	 * @param type $id not array, harus di deklarasikan
	 * @return type array
	 * 
	 */
	public function detail_ppp_secret($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ppp/secret/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No PPP Secret With This id = ".$id;
		}
	}
}

