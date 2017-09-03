<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Reward extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("rewardmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Reward/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Title'],$row ['Detail'],$row ['Picture'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Reward/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Detail', 'Detail', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			$file_name = $_FILES["Picture"]["name"];
		    $file_tmp =$_FILES['Picture']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('Picture1'); //In Create Hit Then comment This line.
			}

		  
			$data = array('Title' => $this->input->post('Title'),'Detail' => $this->input->post('Detail'),'Picture' => $file_name,'IsActive' => $this->input->post('IsActive'));
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
		$Reward= $this->omodel->byId($id);
		$this->load->view("Reward/edit",["Reward"=> $Reward]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Title', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Detail', 'Detail', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			$file_name = $_FILES["Picture"]["name"];
		    $file_tmp =$_FILES['Picture']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('Picture1'); //In Create Hit Then comment This line.
			}

 
			$data = array('Title' => $this->input->post('Title'),'Detail' => $this->input->post('Detail'),'Picture' => $file_name,'IsActive' => $this->input->post('IsActive'));
			
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
