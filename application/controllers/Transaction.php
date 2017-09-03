<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Transaction extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("transactionmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Transaction/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title'],$row ['DateAdded'],$row ['AddedBy'],$row ['DebitLedgerAccountId'],$row ['DebitAmount'],$row ['CreditLedgerAccountId'],$row ['CreditAmount'],$row ['TransactionDate']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Transaction/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'required|trim|xss_clean');
		$this->form_validation->set_rules('AddedBy', 'AddedBy', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DebitLedgerAccountId', 'DebitLedgerAccountId', 'trim|xss_clean');
		$this->form_validation->set_rules('DebitAmount', 'DebitAmount', 'trim|xss_clean');
		$this->form_validation->set_rules('CreditLedgerAccountId', 'CreditLedgerAccountId', 'trim|xss_clean');
		$this->form_validation->set_rules('CreditAmount', 'CreditAmount', 'trim|xss_clean');
		$this->form_validation->set_rules('TransactionDate', 'TransactionDate', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Title' => $this->input->post('Title'),'DateAdded' => $this->input->post('DateAdded'),'AddedBy' => $this->input->post('AddedBy'),'DebitLedgerAccountId' => $this->input->post('DebitLedgerAccountId')==NULL?NULL:$this->input->post('DebitLedgerAccountId'),'DebitAmount' => $this->input->post('DebitAmount'),'CreditLedgerAccountId' => $this->input->post('CreditLedgerAccountId')==NULL?NULL:$this->input->post('CreditLedgerAccountId'),'CreditAmount' => $this->input->post('CreditAmount'),'TransactionDate' => $this->input->post('TransactionDate'));
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
		$Transaction= $this->omodel->byId($id);
		$this->load->view("Transaction/edit",["Transaction"=> $Transaction]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'required|trim|xss_clean');
		$this->form_validation->set_rules('AddedBy', 'AddedBy', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DebitLedgerAccountId', 'DebitLedgerAccountId', 'trim|xss_clean');
		$this->form_validation->set_rules('DebitAmount', 'DebitAmount', 'trim|xss_clean');
		$this->form_validation->set_rules('CreditLedgerAccountId', 'CreditLedgerAccountId', 'trim|xss_clean');
		$this->form_validation->set_rules('CreditAmount', 'CreditAmount', 'trim|xss_clean');
		$this->form_validation->set_rules('TransactionDate', 'TransactionDate', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Title' => $this->input->post('Title'),'DateAdded' => $this->input->post('DateAdded'),'AddedBy' => $this->input->post('AddedBy'),'DebitLedgerAccountId' => $this->input->post('DebitLedgerAccountId')==NULL?NULL:$this->input->post('DebitLedgerAccountId'),'DebitAmount' => $this->input->post('DebitAmount'),'CreditLedgerAccountId' => $this->input->post('CreditLedgerAccountId')==NULL?NULL:$this->input->post('CreditLedgerAccountId'),'CreditAmount' => $this->input->post('CreditAmount'),'TransactionDate' => $this->input->post('TransactionDate'));
			
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
