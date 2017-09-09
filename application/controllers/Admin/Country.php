<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Country extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("countrymodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Country/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Name'],$row ['Code'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Country/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Code', 'Code', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Name' => $this->input->post('Name'),'Code' => $this->input->post('Code'),'IsActive' => $this->input->post('IsActive'));
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
		$Country= $this->omodel->byId($id);
		$this->load->view("Country/edit",["Country"=> $Country]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Code', 'Code', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Name' => $this->input->post('Name'),'Code' => $this->input->post('Code'),'IsActive' => $this->input->post('IsActive'));
			
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
