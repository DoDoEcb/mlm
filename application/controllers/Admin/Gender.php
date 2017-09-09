<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Gender extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("gendermodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Gender/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Name'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Gender/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Name' => $this->input->post('Name'),'IsActive' => $this->input->post('IsActive'));
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
		$Gender= $this->omodel->byId($id);
		$this->load->view("Gender/edit",["Gender"=> $Gender]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Name' => $this->input->post('Name'),'IsActive' => $this->input->post('IsActive'));
			
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
