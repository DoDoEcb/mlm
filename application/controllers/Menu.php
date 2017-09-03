<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Menu extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("menumodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Menu/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['MenuText'],$row ['MenuURL'],$row ['ParentId'],$row ['SortOrder']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Menu/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('MenuText', 'MenuText', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MenuURL', 'MenuURL', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');
		$this->form_validation->set_rules('SortOrder', 'SortOrder', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('MenuText' => $this->input->post('MenuText'),'MenuURL' => $this->input->post('MenuURL'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'),'SortOrder' => $this->input->post('SortOrder')==NULL?NULL:$this->input->post('SortOrder'));
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
		$Menu= $this->omodel->byId($id);
		$this->load->view("Menu/edit",["Menu"=> $Menu]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('MenuText', 'MenuText', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MenuURL', 'MenuURL', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');
		$this->form_validation->set_rules('SortOrder', 'SortOrder', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('MenuText' => $this->input->post('MenuText'),'MenuURL' => $this->input->post('MenuURL'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'),'SortOrder' => $this->input->post('SortOrder')==NULL?NULL:$this->input->post('SortOrder'));
			
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
