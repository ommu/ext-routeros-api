<?php
/**
 * Description of Mapi_File
 *
 * TOC :
 *	get_all_file
 *	detail_file
 *	delete_file 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
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
	 * This method is used to display all file
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/File
	 *
	 * @return type array
	 */
	public function get_all_file() {
		$array = $this->_conn->comm("/file/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No File";
	}
	
	/**
	 * This method is used to display one file in detail
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/File
	 *
	 * @return type array
	 */
	public function detail_file($param) {
		$array = $this->_conn->comm("/file/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No File With This id = ".$param;
	}
	
	/**
	 * This method is used to delete file
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/File
	 *
	 * @return type array
	 */
	public function delete_file($param) {
		$this->_conn->comm("/file/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
