<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class RoleUser extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("roleusermodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("RoleUser/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['RoleId'],$row ['UserId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("RoleUser/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('RoleId', 'RoleId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('RoleId' => $this->input->post('RoleId')==NULL?NULL:$this->input->post('RoleId'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'));
			$insert = $this->omodel->save($data);
			 
			echo json_encode(array("status" => true));
		}
		else
		{
			 echo json_encode(array("status" => false,"errors" =>validation_errors())); 
		} 
	}
	
	 
	public function edit($id)
	{
		$RoleUser= $this->omodel->byId($id);
		$this->load->view("RoleUser/edit",["RoleUser"=> $RoleUser]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('RoleId', 'RoleId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('RoleId' => $this->input->post('RoleId')==NULL?NULL:$this->input->post('RoleId'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'));
			
			$this->omodel->update(array('Id' => $this->input->post('Id')), $data);
		
			echo json_encode(array("status" => true));
		}
		else
		{
			echo json_encode(array("status" => false,"errors" =>validation_errors()));
		}
	}
	 
	public function deletehit($id)
	{ 
		$this->omodel->deleteById($id);
		echo json_encode(array("status" => TRUE));
	}
	
}
