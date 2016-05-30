<?php
/**
 * Description of Mapi_File
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
 
class MInterfaceethernet {
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
	 * This method is used to display all interface
	 * @return type array
	 */
	public function get_all_interface() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		return $rs->getResultArray();
	}
	
	/**
	 * This method is used to enable interface by id
	 * @param type $id string
	 * @return type array
	 */
	public function enable_interface($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/enable");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to disable interface by id
	 * @param type $id string
	 * @return type array
	 */
	public function disable_interface($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/disable");
		$sentence->where(".id", "=", $id);
		$enable = $this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one interface  
	 * in detail based on the id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_interface($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/interface/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to display one interafce 
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 * 
	 */
	public function detail_interface($id) {
	   $sentence = new SentenceUtil();
		$sentence->fromCommand("/interface/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Interface Ethernet With This id = ".$id;
		}
	}
}
