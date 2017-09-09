<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class InvoiceTransaction extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("invoicetransactionmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("InvoiceTransaction/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['TransactionId'],$row ['InvoiceId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("InvoiceTransaction/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('TransactionId', 'TransactionId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('InvoiceId', 'InvoiceId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('TransactionId' => $this->input->post('TransactionId')==NULL?NULL:$this->input->post('TransactionId'),'InvoiceId' => $this->input->post('InvoiceId')==NULL?NULL:$this->input->post('InvoiceId'));
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
		$InvoiceTransaction= $this->omodel->byId($id);
		$this->load->view("InvoiceTransaction/edit",["InvoiceTransaction"=> $InvoiceTransaction]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('TransactionId', 'TransactionId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('InvoiceId', 'InvoiceId', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('TransactionId' => $this->input->post('TransactionId')==NULL?NULL:$this->input->post('TransactionId'),'InvoiceId' => $this->input->post('InvoiceId')==NULL?NULL:$this->input->post('InvoiceId'));
			
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
