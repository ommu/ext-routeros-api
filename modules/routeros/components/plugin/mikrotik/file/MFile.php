<?php
/**
 * Description of Mapi_File
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */

class MFile {
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
	 * This method is used to display all file in mikrotik RouterOs
	 * @return type array
	 */
	public function get_all_file() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/file/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No File";
		}
	}
	
	/**
	 * This method is used to display one file 
	 * in detail based on the id
	 * @param type $id string 
	 * @return type array
	 */
	public function detail_file($id) {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/file/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No File With This id = ".$id;
		}
	}
	
	/**
	 * This method is used to delete file by id
	 * @param type $id string
	 * @return type array
	 */
	public function delete_file($id) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/file/remove");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
	}
}
