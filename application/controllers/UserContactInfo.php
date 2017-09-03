<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class UserContactInfo extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("usercontactinfomodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("UserContactInfo/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['ContactTypeId'],$row ['ContactDetail'],$row ['UserId'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("UserContactInfo/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('ContactTypeId', 'ContactTypeId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ContactDetail', 'ContactDetail', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('ContactTypeId' => $this->input->post('ContactTypeId')==NULL?NULL:$this->input->post('ContactTypeId'),'ContactDetail' => $this->input->post('ContactDetail'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'IsActive' => $this->input->post('IsActive'));
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
		$UserContactInfo= $this->omodel->byId($id);
		$this->load->view("UserContactInfo/edit",["UserContactInfo"=> $UserContactInfo]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('ContactTypeId', 'ContactTypeId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ContactDetail', 'ContactDetail', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('ContactTypeId' => $this->input->post('ContactTypeId')==NULL?NULL:$this->input->post('ContactTypeId'),'ContactDetail' => $this->input->post('ContactDetail'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'IsActive' => $this->input->post('IsActive'));
			
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
