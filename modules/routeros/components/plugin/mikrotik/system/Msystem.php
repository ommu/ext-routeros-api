<?php
/**
 * Description of Mapi_System
 *
 * TOC :
 *	get_all_clock
 *	get_all_identity
 *	set_identity
 *	get_all_history
 *	get_all_license
 *	reset
 *	get_all_routerboard
 *	save_backup
 *	load_backup 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class Msystem {
	/**
	 *
	 * @var type array
	 */
	private $talker;
	private $_conn;
	
	function __construct($talker, $conn) {
		$this->talker = $talker;
		$this->_conn = $conn;
	}
	
	/**
	 * This method is used to display all system clock
	 * @return type array
	 */
	public function get_all_clock() {
		$array = $this->_conn->comm("/system/clock/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return false;
	}
	
	/**
	 * This method is used to display all system  identiy
	 * @return type array
	 */
	public function get_all_identity() {
		$array = $this->_conn->comm("/system/identity/getall");
		$this->_conn->disconnect();
		return $array;
	}
	
	/**
	 * This method is used to set systemn identity
	 * @param type $name string
	 * @return type array
	 */  
	public function set_identity($param) {
		$this->_conn->comm("/system/identity/set", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all system history
	 * @return type array
	 */
	public function get_all_history() {
		$array = $this->_conn->comm("/system/history/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No History";
	}
	
	/**
	 * This method is used to display all system license
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:License#RouterBOARD_and_PC_license
	 *
	 * @return type array
	 */
	public function get_all_license() {
		$array = $this->_conn->comm("/system/license/print");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return false;
	}
	
	/**
	 * This method is used to system reset configuration
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Configuration_Management#Configuration_Reset
	 *
	 * @return type array
	 */
	public function reset($param) {
		$this->_conn->comm("/system/reset-configuration", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to display all system routerboard
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:RouterBOARD_settings
	 *
	 * @return type array
	 */
	public function get_all_routerboard() {
		$array = $this->_conn->comm("/system/routerboard/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return false;
	}
	
	/**
	 * This method is used to system bacup save
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Configuration_Management#System_Backup
	 *
	 * @return type array
	 */
	public function save_backup($param) {
		$this->_conn->comm("/system/backup/save", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method is used to system backup load
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:Configuration_Management#System_Backup
	 *
	 * @return type array
	 */
	public function load_backup($param) {
		$this->_conn->comm("/system/backup/load", $param);
		$this->_conn->disconnect();
		return "Success";
	}
}
