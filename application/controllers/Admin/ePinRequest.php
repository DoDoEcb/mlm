<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ePinRequest extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("epinrequestmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("ePinRequest/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title'],$row ['Qty'],$row ['FromUserId'],$row ['DateAdded'],$row ['IsApproved'],$row ['ApprovedBy']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("ePinRequest/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Qty', 'Qty', 'required|trim|xss_clean');
		$this->form_validation->set_rules('FromUserId', 'FromUserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'trim|xss_clean');
		$this->form_validation->set_rules('ApprovedBy', 'ApprovedBy', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('Title' => $this->input->post('Title'),'Qty' => $this->input->post('Qty')==NULL?NULL:$this->input->post('Qty'),'FromUserId' => $this->input->post('FromUserId')==NULL?NULL:$this->input->post('FromUserId'),'DateAdded' => $this->input->post('DateAdded'),'IsApproved' => $this->input->post('IsApproved'),'ApprovedBy' => $this->input->post('ApprovedBy'));
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
		$ePinRequest= $this->omodel->byId($id);
		$this->load->view("ePinRequest/edit",["ePinRequest"=> $ePinRequest]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Qty', 'Qty', 'required|trim|xss_clean');
		$this->form_validation->set_rules('FromUserId', 'FromUserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateAdded', 'DateAdded', 'trim|xss_clean');
		$this->form_validation->set_rules('ApprovedBy', 'ApprovedBy', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('Title' => $this->input->post('Title'),'Qty' => $this->input->post('Qty')==NULL?NULL:$this->input->post('Qty'),'FromUserId' => $this->input->post('FromUserId')==NULL?NULL:$this->input->post('FromUserId'),'DateAdded' => $this->input->post('DateAdded'),'IsApproved' => $this->input->post('IsApproved'),'ApprovedBy' => $this->input->post('ApprovedBy'));
			
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
