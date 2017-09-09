<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class LedgerAccount extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("ledgeraccountmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("LedgerAccount/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title'],$row ['LedgerAccountTypeId'],$row ['Currency'],$row ['AccountCode'],$row ['AccountColor'],$row ['ParentId']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("LedgerAccount/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LedgerAccountTypeId', 'LedgerAccountTypeId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Currency', 'Currency', 'required|trim|xss_clean');
		$this->form_validation->set_rules('AccountCode', 'AccountCode', 'trim|xss_clean');
		$this->form_validation->set_rules('AccountColor', 'AccountColor', 'trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Title' => $this->input->post('Title'),'LedgerAccountTypeId' => $this->input->post('LedgerAccountTypeId')==NULL?NULL:$this->input->post('LedgerAccountTypeId'),'Currency' => $this->input->post('Currency')==NULL?NULL:$this->input->post('Currency'),'AccountCode' => $this->input->post('AccountCode'),'AccountColor' => $this->input->post('AccountColor'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
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
		$LedgerAccount= $this->omodel->byId($id);
		$this->load->view("LedgerAccount/edit",["LedgerAccount"=> $LedgerAccount]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LedgerAccountTypeId', 'LedgerAccountTypeId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Currency', 'Currency', 'required|trim|xss_clean');
		$this->form_validation->set_rules('AccountCode', 'AccountCode', 'trim|xss_clean');
		$this->form_validation->set_rules('AccountColor', 'AccountColor', 'trim|xss_clean');
		$this->form_validation->set_rules('ParentId', 'ParentId', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Title' => $this->input->post('Title'),'LedgerAccountTypeId' => $this->input->post('LedgerAccountTypeId')==NULL?NULL:$this->input->post('LedgerAccountTypeId'),'Currency' => $this->input->post('Currency')==NULL?NULL:$this->input->post('Currency'),'AccountCode' => $this->input->post('AccountCode'),'AccountColor' => $this->input->post('AccountColor'),'ParentId' => $this->input->post('ParentId')==NULL?NULL:$this->input->post('ParentId'));
			
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
