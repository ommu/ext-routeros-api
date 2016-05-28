<?php
/**
 * Description of Mapi_Ppp_Active
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPactive {
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
	 * This method is used to display all ppp active
	 * @return type array
	 */
	public function get_all_ppp_active() {
		$sentence = new SentenceUtil();
		$sentence->fromCommand("/ppp/active/getall");
		$this->talker->send($sentence);
		$rs = $this->talker->getResult();
		$i = 0 ;
		if ($i < $rs->size()){
			return $rs->getResultArray();
		}  else {
			return "No PPP Active To Set, Please Your Add PPP Active";
		}
	}
	
	/**
	 * This method is used to delete ppp active
	 * @param type $id string
	 * @return type array
	 */
	public function delete_ppp_active($id) {
		$sentence = new SentenceUtil();
	   $sentence->addCommand("/ppp/active/remove");
	   $sentence->where(".id", "=", $id);
	   $enable = $this->talker->send($sentence);
	   return "Sucsess";
	}
}
