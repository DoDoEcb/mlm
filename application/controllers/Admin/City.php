<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class City extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("citymodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("City/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Name'],$row ['Latitude'],$row ['Longitude'],$row ['IsActive'],$row ['StateId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("City/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Name', 'Name', 'trim|xss_clean');
		$this->form_validation->set_rules('Latitude', 'Latitude', 'trim|xss_clean');
		$this->form_validation->set_rules('Longitude', 'Longitude', 'trim|xss_clean');
		$this->form_validation->set_rules('StateId', 'StateId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Name' => $this->input->post('Name'),'Latitude' => $this->input->post('Latitude'),'Longitude' => $this->input->post('Longitude'),'IsActive' => $this->input->post('IsActive'),'StateId' => $this->input->post('StateId')==NULL?NULL:$this->input->post('StateId'));
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
		$City= $this->omodel->byId($id);
		$this->load->view("City/edit",["City"=> $City]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Name', 'Name', 'trim|xss_clean');
		$this->form_validation->set_rules('Latitude', 'Latitude', 'trim|xss_clean');
		$this->form_validation->set_rules('Longitude', 'Longitude', 'trim|xss_clean');
		$this->form_validation->set_rules('StateId', 'StateId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Name' => $this->input->post('Name'),'Latitude' => $this->input->post('Latitude'),'Longitude' => $this->input->post('Longitude'),'IsActive' => $this->input->post('IsActive'),'StateId' => $this->input->post('StateId')==NULL?NULL:$this->input->post('StateId'));
			
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
