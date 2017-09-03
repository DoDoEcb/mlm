<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class UserReward extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("userrewardmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("UserReward/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['UserId'],$row ['RewardId'],$row ['DateRewarded'],$row ['AddedBy']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("UserReward/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('RewardId', 'RewardId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateRewarded', 'DateRewarded', 'trim|xss_clean');
		$this->form_validation->set_rules('AddedBy', 'AddedBy', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'RewardId' => $this->input->post('RewardId')==NULL?NULL:$this->input->post('RewardId'),'DateRewarded' => $this->input->post('DateRewarded'),'AddedBy' => $this->input->post('AddedBy'));
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
		$UserReward= $this->omodel->byId($id);
		$this->load->view("UserReward/edit",["UserReward"=> $UserReward]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('RewardId', 'RewardId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('DateRewarded', 'DateRewarded', 'trim|xss_clean');
		$this->form_validation->set_rules('AddedBy', 'AddedBy', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'RewardId' => $this->input->post('RewardId')==NULL?NULL:$this->input->post('RewardId'),'DateRewarded' => $this->input->post('DateRewarded'),'AddedBy' => $this->input->post('AddedBy'));
			
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
