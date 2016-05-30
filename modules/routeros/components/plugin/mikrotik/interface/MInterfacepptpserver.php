<?php
/**
 * Description of Mapi_Interface_Pptp_Server
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
 
class MInterfacepptpserver {
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
	 * This method used for get all interface pptp-server
	 * @return type array
	 */
	public function get_all_pptp_server() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/pptp-server/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPTP Server To Set, Please Your Add Interface PPTP Server";
		}
	}
	
	/**
	 * This method used for add new interface pptp-server
	 * @param type $param array
	 * @return type array
	 */
	public function add_pptp_server($param){
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/pptp-server/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for enable interface pptp-server
	 * @param type $id string
	 * @return type array
	 */
	public function enable_pptp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for disable interface pptp-server
	 * @param type $id string
	 * @return type array
	 */
	public function disable_pptp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for set or edit interface pptp-server
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_pptp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess"; 
	}
	
	/**
	 * This method used for detail interface pptp-server
	 * @param type $id string
	 * @return type array
	 */
	public function detail_pptp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/pptp-server/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPTP Server With This id = ".$id;
		}
	}
	
	/**
	 * This method used for delete interface pptp-server
	 * @param type $id string
	 * @return type array
	 */
	public function delete_pptp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for get all pptp-server server
	 * @return type array
	 */
	public function get_all_pptp_server_server() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("//interface/pptp-server/server/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface PPTP Server Server To Set, Please Your Add Interface PPTP Server Server";
		}
	}
	
	/**
	 * This method used for set pptp-server server
	 * @param type $param array
	 * @return type array
	 */
	public function set_pptp_server_server($param) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/pptp-server/server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$this->talker->send($sentence);
		return "Sucsess";		
	}
}
