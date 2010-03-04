<?php

/** 
* Mobile Controller for Stikked
* 
* @author Ben McRedmond <hello@benmcredmond.com>
* @copyright Ben McRedmond
* @package Stikked
*
*/

/** 
* Mobile controller class for stikked.
*
* @author Ben McRedmond <hello@benmcredmond.com>
* @access public
* @copyright Ben McRedmond
* @package Stikked
* @subpackage Controllers
*
*/

class Mobile extends Controller 
{
	
	/** 
	* Class Constructor
	*
	* @return void
	*/
	function __construct() 
	{
		parent::__construct();
		$this->load->model('languages');
	}
	
	
	/** 
	* Displays recent pastes in a mobile optimized version.
	*
	* @return void
	* @access public
	*/
	function index()
	{
		$this->load->model('pastes');
		$data = $this->pastes->getLists('mobile/');
		$this->load->view('mobile/recent', $data);
	}
	
	
	/** 
	* Displays an individual paste in a mobile optimized version.
	*
	* @return void
	* @access public
	*/
	function view()
	{
		$this->load->model('pastes');
		$data = $this->pastes->getPaste(3);
		$this->load->view('mobile/view', $data);
	}
}

?>