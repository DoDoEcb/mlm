<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class UserBankInfo extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("userbankinfomodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("UserBankInfo/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['AccountHolderName'],$row ['UserId'],$row ['BankName'],$row ['AccountNumber'],$row ['Branch'],$row ['IFCI_Code'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("UserBankInfo/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('AccountHolderName', 'AccountHolderName', 'trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('BankName', 'BankName', 'trim|xss_clean');
		$this->form_validation->set_rules('AccountNumber', 'AccountNumber', 'trim|xss_clean');
		$this->form_validation->set_rules('Branch', 'Branch', 'trim|xss_clean');
		$this->form_validation->set_rules('IFCI_Code', 'IFCI_Code', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('AccountHolderName' => $this->input->post('AccountHolderName'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'BankName' => $this->input->post('BankName'),'AccountNumber' => $this->input->post('AccountNumber'),'Branch' => $this->input->post('Branch'),'IFCI_Code' => $this->input->post('IFCI_Code'),'IsActive' => $this->input->post('IsActive'));
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
		$UserBankInfo= $this->omodel->byId($id);
		$this->load->view("UserBankInfo/edit",["UserBankInfo"=> $UserBankInfo]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('AccountHolderName', 'AccountHolderName', 'trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('BankName', 'BankName', 'trim|xss_clean');
		$this->form_validation->set_rules('AccountNumber', 'AccountNumber', 'trim|xss_clean');
		$this->form_validation->set_rules('Branch', 'Branch', 'trim|xss_clean');
		$this->form_validation->set_rules('IFCI_Code', 'IFCI_Code', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('AccountHolderName' => $this->input->post('AccountHolderName'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'BankName' => $this->input->post('BankName'),'AccountNumber' => $this->input->post('AccountNumber'),'Branch' => $this->input->post('Branch'),'IFCI_Code' => $this->input->post('IFCI_Code'),'IsActive' => $this->input->post('IsActive'));
			
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
