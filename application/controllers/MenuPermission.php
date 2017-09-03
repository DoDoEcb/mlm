<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class MenuPermission extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("menupermissionmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("MenuPermission/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['MenuId'],$row ['RoleId'],$row ['UserId'],$row ['SortOrder']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("MenuPermission/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('MenuId', 'MenuId', 'trim|xss_clean');
		$this->form_validation->set_rules('RoleId', 'RoleId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'trim|xss_clean');
		$this->form_validation->set_rules('SortOrder', 'SortOrder', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('MenuId' => $this->input->post('MenuId')==NULL?NULL:$this->input->post('MenuId'),'RoleId' => $this->input->post('RoleId')==NULL?NULL:$this->input->post('RoleId'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'SortOrder' => $this->input->post('SortOrder')==NULL?NULL:$this->input->post('SortOrder'));
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
		$MenuPermission= $this->omodel->byId($id);
		$this->load->view("MenuPermission/edit",["MenuPermission"=> $MenuPermission]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('MenuId', 'MenuId', 'trim|xss_clean');
		$this->form_validation->set_rules('RoleId', 'RoleId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'trim|xss_clean');
		$this->form_validation->set_rules('SortOrder', 'SortOrder', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('MenuId' => $this->input->post('MenuId')==NULL?NULL:$this->input->post('MenuId'),'RoleId' => $this->input->post('RoleId')==NULL?NULL:$this->input->post('RoleId'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'SortOrder' => $this->input->post('SortOrder')==NULL?NULL:$this->input->post('SortOrder'));
			
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
