<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class LedgerAccountType extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("ledgeraccounttypemodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("LedgerAccountType/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title'],$row ['ParentId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("LedgerAccountType/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Title' => $this->input->post('Title'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
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
		$LedgerAccountType= $this->omodel->byId($id);
		$this->load->view("LedgerAccountType/edit",["LedgerAccountType"=> $LedgerAccountType]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Title' => $this->input->post('Title'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
			
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
