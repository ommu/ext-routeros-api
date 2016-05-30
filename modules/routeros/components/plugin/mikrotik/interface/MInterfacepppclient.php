<?php
/**
 * Description of Mapi_interface_ppp_client
 *
 * TOC :
 *	get_all_address
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppclient {
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
	 * This method used for get all interface ppp-client
	 * @return type array
	 */
	public function get_all_ppp_client() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/ppp-client/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPP Client To Set, Please Your Add Interface PPP Client";
		}
	}
	
	/**
	 * This method used for add new interface ppp-client
	 * @param type $param array
	 * @return type array
	 */
	public function add_ppp_client($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/ppp-client/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for enable interface ppp-client
	 * @param type $id string
	 * @return type array
	 */
	public function enable_ppp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-client/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for disable interface ppp-client
	 * @param type $id string
	 * @return type array
	 */
	public function disable_ppp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-client/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for set or edit interface ppp-client
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_ppp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface ppp-client
	 * @param type $id string
	 * @return type array
	 */
	public function detail_ppp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/ppp-client/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPP Client With This id = ".$id;
		}
	}
	
	/**
	 * This method used for delete interface ppp-client
	 * @param type $id string
	 * @return type array
	 */
	public function delete_ppp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-client/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
}

