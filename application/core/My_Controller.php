<?php
Class My_Controller extends CI_Controller
{
	function __construct()
	{
		// Construct our parent class
		parent::__construct(); 
		
		if(!$this->session->userdata('logged_in'))
		{
			return redirect("account/login");
		}
		
	}
}