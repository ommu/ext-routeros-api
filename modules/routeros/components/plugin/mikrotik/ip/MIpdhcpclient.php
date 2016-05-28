<?php
/**
 * Description of Mapi_Ip_Dhcp_Client
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MIpdhcpclient{
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
	 * This method is used to add dhcp client
	 * @param type $param array
	 * @return type array
	 */
	public function add_dhcp_client($param) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/dhcp-client/add");
	   foreach ($param as $name => $value){
			   $sentence->setAttribute($name, $value);
	   }	   
	   $this->talker->send($sentence);
	   return "Sucsess";
	}
	
	/**
	 * This method is used to disable dhcp client by id
	 * @param type $id string
	 * @return type array
	 */
	public function disable_dhcp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/disable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to enable dhcp client by id
	 * @param type $id string
	 * @return type array
	 */
	public function enable_dhcp_client($id) {
		 $sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/enable");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to renew dhcp client  by id
	 * @param type $id string
	 * @return type array
	 */
	public function renew_dhcp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/renew");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to release dhcp client by id
	 * @param type $id string
	 * @return type array
	 */
	public function release_dhcp_client($id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/release");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to set or edit dhcp client by id
	 * @param type $param array
	 * @param type $id string
	 * @return type array
	 */
	public function set_dhcp_client($param, $id) {
		$sentence = new SentenceUtil();
		$sentence->addCommand("/ip/dhcp-client/set");
		foreach ($param as $name => $value){
				$sentence->setAttribute($name, $value);
		 }
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		return "Sucsess";
	}
	
	/**
	 * This method is used to remove dhcp client by id
	 * @param type $id string
	 * @return type array
	 */
	public function delete_dhcp_client($id) {
	   $sentence = new SentenceUtil();
	   $sentence->addCommand("/ip/dhcp-client/remove");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
	}

	/**
	 * This method is used to display all dhcp client
	 * @return type array
	 */
	public function get_all_dhcp_client() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dhcp-client/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Dhcp-Client To Set, Please Your Add Ip Dhcp-Client";
		}
	}
	
	/**
	 * This method is used to display one ip dhcp client
	 * in detail based on the id
	 * @param type $id string
	 * @return type array
	 */
	public function detail_dhcp_client($id) {
		  $sentence = new SentenceUtil();
		$sentence->fromCommand("/ip/dhcp-client/print");
		$sentence->where(".id", "=", $id);
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0;
		if($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No Ip Dhcp-Client With This id = ".$id;
		}
	}
}

