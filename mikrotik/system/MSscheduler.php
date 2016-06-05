<?php
/**
 * Description of Mapi_System_Scheduler
 *
 * TOC :
 *	get_all_system_scheduler
 *	add_system_scheduler
 *	enable_system_scheduler
 *	disable_system_scheduler
 *	set_system_scheduler
 *	detail_system_scheduler
 *	delete_system_scheduler 
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MSscheduler {
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
	 * This method used for get all system scheduler
	 * @attr
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function get_all_system_scheduler() {
		$array = $this->_conn->comm("/system/scheduler/getall");
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No System Scheduler To Set, Please Your Add System Scheduler";
	}
	
	/**
	 * This method used for add new system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function add_system_scheduler($param) {
		$this->_conn->comm("/system/scheduler/add", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for enable system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function enable_system_scheduler($param) {
		$this->_conn->comm("/system/scheduler/enable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for disable system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function disable_system_scheduler($param) {
		$this->_conn->comm("/system/scheduler/disable", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
	/**
	 * This method used for set or edit system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function set_system_scheduler($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/system/scheduler/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	  
	/**
	 * This method used for detail system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function detail_system_scheduler($param) {
		$array = $this->_conn->comm("/system/scheduler/print", $param);
		$this->_conn->disconnect();
		if(0 < count($array))
			return $array;
		else
			return "No System Scheduler With This id = ".$param;
	}
	 
	/**
	 * This method used for delete system scheduler
	 * @param
	 *	URL: http://wiki.mikrotik.com/wiki/Manual:System/Scheduler
	 *
	 * @return type array
	 */
	public function delete_system_scheduler($param) {
		$this->_conn->comm("/system/scheduler/remove", $param);
		$this->_conn->disconnect();
		return "Success";
	}
	
}
