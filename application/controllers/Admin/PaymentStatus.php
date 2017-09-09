<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class PaymentStatus extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("paymentstatusmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("PaymentStatus/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("PaymentStatus/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Title' => $this->input->post('Title'));
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
		$PaymentStatus= $this->omodel->byId($id);
		$this->load->view("PaymentStatus/edit",["PaymentStatus"=> $PaymentStatus]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Title' => $this->input->post('Title'));
			
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
