<?php
/**
 * Description of Mapi_Interface_Vrrp
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */

class MInterfacevrrp {
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
	 * This method is used to to add vrrp
	 * @param type $param array
	 * @return type array
	 * 
	 */
	public function add_vrrp($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/interface/vrrp/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to display all vrrp
	 * @return type array
	 * 
	 */
	public function get_all_vrrp() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/vrrp/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface VRRP To Set, Please Your Add Interface VRRP";
		}
	}
	
	/**
	 * This method is used to to enable vrrp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function enable_vrrp($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vrrp/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to to disable vrrp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function disable_vrrp($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vrrp/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to to delete vrrp by id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function delete_vrrp($id) {
		 $sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vrrp/remove");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to change based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function set_vrrp($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/vrrp/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}	 
	
	/**
	 * This method is used to display one vrrp
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	 public function detail_vrrp($id) {
		 $sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/vrrp/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface VRRP With This id = ".$id;
		}
	}
}