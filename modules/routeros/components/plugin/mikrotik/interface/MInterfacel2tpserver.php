<?php
/**
 * Description of Mapi_interface_l2tp_server
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
 
class MInterfacel2tpserver {
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
	 * This method used for get all l2tp server
	 * @return type array
	 */
	public function get_all_l2tp_server() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/l2tp-server/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface L2TP Server To Set, Please Your Add Interface L2TP Server";
		}
	}
	
	/**
	 * This method used for add new l2tp server
	 * @param type $param array
	 * @return type array
	 */
	public function add_l2tp_server($param) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/l2tp-server/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method used for enable l2tp server
	 * @param type $id string
	 * @return type array
	 */
	public function enable_l2tp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-server/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for disable l2tp server
	 * @param type $id string
	 * @return type array
	 */
	public function disable_l2tp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-server/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for set or edit l2tp server
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_l2tp_server($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-server/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for detail l2tp server
	 * @param type $id string
	 * @return type array
	 */
	public function detail_l2tp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/l2tp-server/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface L2TP Server With This id = ".$id;
		}
	}
	
	/**
	 * This method used for delete l2tp server
	 * @param type $id string
	 * @return type array
	 */
	public function delete_l2tp_server($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/l2tp-server/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method used for get all l2tp server server
	 * @return type array
	 */
	public function get_all_l2tp_server_server() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/l2tp-server/server/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface L2TP Server Server To Set, Please Your Add Interface L2TP Server Server";
		}
	}
	
	/**
	 * This method used for set l2tp server server
	 * @param type $param array
	 * @return type array
	 */
	public function set_l2tp_server_server($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/l2tp-server/server/set");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
		
	}
}


