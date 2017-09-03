<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Role extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("rolemodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Role/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['RoleName'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Role/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('RoleName', 'RoleName', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('RoleName' => $this->input->post('RoleName'),'IsActive' => $this->input->post('IsActive'));
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
		$Role= $this->omodel->byId($id);
		$this->load->view("Role/edit",["Role"=> $Role]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('RoleName', 'RoleName', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('RoleName' => $this->input->post('RoleName'),'IsActive' => $this->input->post('IsActive'));
			
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
