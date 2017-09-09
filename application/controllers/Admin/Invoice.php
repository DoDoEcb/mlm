<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Invoice extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("invoicemodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Invoice/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['BillDate'],$row ['DueDate'],$row ['PaymentStatusId'],$row ['LastEmailed'],$row ['OtherInvoiceCode'],$row ['ClientId'],$row ['CreatedBy']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Invoice/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('BillDate', 'BillDate', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DueDate', 'DueDate', 'trim|xss_clean');
		$this->form_validation->set_rules('PaymentStatusId', 'PaymentStatusId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LastEmailed', 'LastEmailed', 'trim|xss_clean');
		$this->form_validation->set_rules('OtherInvoiceCode', 'OtherInvoiceCode', 'trim|xss_clean');
		$this->form_validation->set_rules('ClientId', 'ClientId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('CreatedBy', 'CreatedBy', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('BillDate' => $this->input->post('BillDate'),'DueDate' => $this->input->post('DueDate'),'PaymentStatusId' => $this->input->post('PaymentStatusId')==NULL?NULL:$this->input->post('PaymentStatusId'),'LastEmailed' => $this->input->post('LastEmailed'),'OtherInvoiceCode' => $this->input->post('OtherInvoiceCode'),'ClientId' => $this->input->post('ClientId')==NULL?NULL:$this->input->post('ClientId'),'CreatedBy' => $this->input->post('CreatedBy'));
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
		$Invoice= $this->omodel->byId($id);
		$this->load->view("Invoice/edit",["Invoice"=> $Invoice]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('BillDate', 'BillDate', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DueDate', 'DueDate', 'trim|xss_clean');
		$this->form_validation->set_rules('PaymentStatusId', 'PaymentStatusId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LastEmailed', 'LastEmailed', 'trim|xss_clean');
		$this->form_validation->set_rules('OtherInvoiceCode', 'OtherInvoiceCode', 'trim|xss_clean');
		$this->form_validation->set_rules('ClientId', 'ClientId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('CreatedBy', 'CreatedBy', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('BillDate' => $this->input->post('BillDate'),'DueDate' => $this->input->post('DueDate'),'PaymentStatusId' => $this->input->post('PaymentStatusId')==NULL?NULL:$this->input->post('PaymentStatusId'),'LastEmailed' => $this->input->post('LastEmailed'),'OtherInvoiceCode' => $this->input->post('OtherInvoiceCode'),'ClientId' => $this->input->post('ClientId')==NULL?NULL:$this->input->post('ClientId'),'CreatedBy' => $this->input->post('CreatedBy'));
			
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
