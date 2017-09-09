<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Home extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("homemodel","ohome");
	}
	
	public function Index()
	{     
		$home = $this->ohome->GetDashboard();
		 
		$this->load->view("home/index", $home); 
	}
	
	public function GetLastWeekRegister()
	{
		 $lastDay= $this->input->post('lastDay');
		 
		
		
	    /*$json =array();
		for($i=0;$i<$lastDay;$i++)
		{   
			 $year =  date('Y',strtotime('-'.$i.' days'));
			 $month = date('m',strtotime('-'.$i.' days'));
			 $day = date('d',strtotime('-'.$i.' days'));
			
			 
			 $newdate = new DateTime();
			 $newdate->setDate($year, $month, $day);
			 $LastUsers = $this->ohome->GetLastWeekRegisterUser($newdate->format('Y-m-d'));
			 	
			if($LastUsers>0)
			{
				array_push($json,array ( 'label' => $newdate->format('Y-m-d'), 'value' => $LastUsers));
			}
			else 
			{
				array_push($json,array ( 'label' => $newdate->format('Y-m-d'), 'value' => "0" ));
			}
			 
		} 
		 
		 echo json_encode($json);   */
		 
		
	}
}