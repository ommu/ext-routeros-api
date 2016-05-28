<?php
/**
 * Description of Mapi_interface_ppp_server
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MInterfacepppserver {
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
	 * This method used for add new interface ppp-sever
	 * @param type $param array
	 * @return type array
	 */
	public function add_ppp_server($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/ppp-server/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for disable interface ppp-sever
	 * @param type $id string
	 * @return type array
	 */
	public function disable_ppp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-server/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for enable interface ppp-sever
	 * @param type $id string
	 * @return type array
	 */
	public function enable_ppp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-server/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for delete interface ppp-sever
	 * @param type $id string
	 * @return type array
	 */
	public function delete_ppp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-server/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail interface ppp-sever
	 * @param type $id string
	 * @return type array
	 */
	public function detail_ppp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/ppp-server/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPP Server With This id = ".$id;
		}
	}
	
	/**
	 * This method used for set or edit interface ppp-sever
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_ppp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/ppp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for get all interface ppp-sever
	 * @return type array
	 */
	public function get_all_ppp_server() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/ppp-server/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPP Server To Set, Please Your Add Interface PPP Server";
		}
	}
}
