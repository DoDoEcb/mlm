<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ePinCode extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("epincodemodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("ePinCode/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['ePinRequestId'],$row ['PCode'],$row ['DateAdded']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("ePinCode/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('ePinRequestId', 'ePinRequestId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('PCode', 'PCode', 'trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('ePinRequestId' => $this->input->post('ePinRequestId')==NULL?NULL:$this->input->post('ePinRequestId'),'PCode' => $this->input->post('PCode'),'DateAdded' => $this->input->post('DateAdded'));
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
		$ePinCode= $this->omodel->byId($id);
		$this->load->view("ePinCode/edit",["ePinCode"=> $ePinCode]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('ePinRequestId', 'ePinRequestId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('PCode', 'PCode', 'trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('ePinRequestId' => $this->input->post('ePinRequestId')==NULL?NULL:$this->input->post('ePinRequestId'),'PCode' => $this->input->post('PCode'),'DateAdded' => $this->input->post('DateAdded'));
			
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
