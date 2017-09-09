<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class InvoiceItem extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("invoiceitemmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("InvoiceItem/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['InvoiceId'],$row ['Description'],$row ['Title'],$row ['Quantity'],$row ['UnitPrice'],$row ['UnitName'],$row ['Total']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("InvoiceItem/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('InvoiceId', 'InvoiceId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Quantity', 'Quantity', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UnitPrice', 'UnitPrice', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UnitName', 'UnitName', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Total', 'Total', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('InvoiceId' => $this->input->post('InvoiceId')==NULL?NULL:$this->input->post('InvoiceId'),'Description' => $this->input->post('Description'),'Title' => $this->input->post('Title'),'Quantity' => $this->input->post('Quantity'),'UnitPrice' => $this->input->post('UnitPrice'),'UnitName' => $this->input->post('UnitName')==NULL?NULL:$this->input->post('UnitName'),'Total' => $this->input->post('Total'));
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
		$InvoiceItem= $this->omodel->byId($id);
		$this->load->view("InvoiceItem/edit",["InvoiceItem"=> $InvoiceItem]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('InvoiceId', 'InvoiceId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Quantity', 'Quantity', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UnitPrice', 'UnitPrice', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UnitName', 'UnitName', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Total', 'Total', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('InvoiceId' => $this->input->post('InvoiceId')==NULL?NULL:$this->input->post('InvoiceId'),'Description' => $this->input->post('Description'),'Title' => $this->input->post('Title'),'Quantity' => $this->input->post('Quantity'),'UnitPrice' => $this->input->post('UnitPrice'),'UnitName' => $this->input->post('UnitName')==NULL?NULL:$this->input->post('UnitName'),'Total' => $this->input->post('Total'));
			
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
