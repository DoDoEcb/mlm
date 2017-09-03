<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("usermodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("User/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Username'],$row ['Password'],$row ['ParentId'],$row ['LegId'],$row ['MemberShipLevelId'],$row ['RegisterPin']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("User/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Password', 'Password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');
		$this->form_validation->set_rules('LegId', 'LegId', 'trim|xss_clean');
		$this->form_validation->set_rules('MemberShipLevelId', 'MemberShipLevelId', 'trim|xss_clean');
		$this->form_validation->set_rules('RegisterPin', 'RegisterPin', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Username' => $this->input->post('Username'),'Password' => $this->input->post('Password'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'),'LegId' => $this->input->post('LegId')==NULL?NULL:$this->input->post('LegId'),'MemberShipLevelId' => $this->input->post('MemberShipLevelId')==NULL?NULL:$this->input->post('MemberShipLevelId'),'RegisterPin' => $this->input->post('RegisterPin'));
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
		$User= $this->omodel->byId($id);
		$this->load->view("User/edit",["User"=> $User]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Password', 'Password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');
		$this->form_validation->set_rules('LegId', 'LegId', 'trim|xss_clean');
		$this->form_validation->set_rules('MemberShipLevelId', 'MemberShipLevelId', 'trim|xss_clean');
		$this->form_validation->set_rules('RegisterPin', 'RegisterPin', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Username' => $this->input->post('Username'),'Password' => $this->input->post('Password'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'),'LegId' => $this->input->post('LegId')==NULL?NULL:$this->input->post('LegId'),'MemberShipLevelId' => $this->input->post('MemberShipLevelId')==NULL?NULL:$this->input->post('MemberShipLevelId'),'RegisterPin' => $this->input->post('RegisterPin'));
			
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
