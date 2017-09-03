<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ProductCategory extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("productcategorymodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("ProductCategory/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Name'],$row ['ParentId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("ProductCategory/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Name' => $this->input->post('Name'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
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
		$ProductCategory= $this->omodel->byId($id);
		$this->load->view("ProductCategory/edit",["ProductCategory"=> $ProductCategory]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Name' => $this->input->post('Name'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
			
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
