<?php
/**
 * Description of Mapi_Ppp_Aaa
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com> <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 26 May 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 */
 
class MPaaa {
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
     * This method is used to display all ppp aaa
     * @return type array
     */
    public function get_all_ppp_aaa() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/aaa/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0 ;
        if ($i < $rs->size()){
            return $rs->getResultArray();
        }  else {
            return "No PPP AAA To Set, Please Your Add PPP AAA";
        }
    }
    
    /**
     * This method is used to set ppp aaa
     * @param type $use_radius string
     * @param type $accounting string
     * @param type $interim_update string
     * @return type array
     */
    public function set_ppp_aaa($use_radius, $accounting, $interim_update) {
       $sentence = new SentenceUtil();
       $sentence->addCommand("/ppp/aaa/set");
       $sentence->setAttribute("use-radius", $use_radius);
       $sentence->setAttribute("accounting", $accounting);
       $sentence->setAttribute("interim-update", $interim_update); 
       $this->talker->send($sentence);
       return "Sucsess";
    }
}
