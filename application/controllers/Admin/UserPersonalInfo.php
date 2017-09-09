<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class UserPersonalInfo extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("userpersonalinfomodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("UserPersonalInfo/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['FirstName'],$row ['LastName'],$row ['GenderId'],$row ['About'],$row ['ProfileImage'],$row ['DateJoin'],$row ['UserId'],$row ['MiddleName'],$row ['EmailId'],$row ['FatherAndSpouseName'],$row ['DOB'],$row ['MotherName'],$row ['NomineName'],$row ['CityId'],$row ['ZipCode'],$row ['PanNumber'],$row ['EducationDetail'],$row ['LastEmployeeFirm'],$row ['LastEmployeeYear'],$row ['LastEmployeeAnualIncome'],$row ['IsActive']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("UserPersonalInfo/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('FirstName', 'FirstName', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LastName', 'LastName', 'trim|xss_clean');
		$this->form_validation->set_rules('GenderId', 'GenderId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('About', 'About', 'trim|xss_clean');
		$this->form_validation->set_rules('DateJoin', 'DateJoin', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MiddleName', 'MiddleName', 'trim|xss_clean');
		$this->form_validation->set_rules('EmailId', 'EmailId', 'trim|xss_clean');
		$this->form_validation->set_rules('FatherAndSpouseName', 'FatherAndSpouseName', 'trim|xss_clean');
		$this->form_validation->set_rules('DOB', 'DOB', 'trim|xss_clean');
		$this->form_validation->set_rules('MotherName', 'MotherName', 'trim|xss_clean');
		$this->form_validation->set_rules('NomineName', 'NomineName', 'trim|xss_clean');
		$this->form_validation->set_rules('CityId', 'CityId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ZipCode', 'ZipCode', 'trim|xss_clean');
		$this->form_validation->set_rules('PanNumber', 'PanNumber', 'trim|xss_clean');
		$this->form_validation->set_rules('EducationDetail', 'EducationDetail', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeFirm', 'LastEmployeeFirm', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeYear', 'LastEmployeeYear', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeAnualIncome', 'LastEmployeeAnualIncome', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			$file_name = $_FILES["ProfileImage"]["name"];
		    $file_tmp =$_FILES['ProfileImage']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('ProfileImage1'); //In Create Hit Then comment This line.
			}

		  
			$data = array('FirstName' => $this->input->post('FirstName'),'LastName' => $this->input->post('LastName'),'GenderId' => $this->input->post('GenderId')==NULL?NULL:$this->input->post('GenderId'),'About' => $this->input->post('About'),'ProfileImage' => $file_name,'DateJoin' => $this->input->post('DateJoin'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'MiddleName' => $this->input->post('MiddleName'),'EmailId' => $this->input->post('EmailId'),'FatherAndSpouseName' => $this->input->post('FatherAndSpouseName'),'DOB' => $this->input->post('DOB'),'MotherName' => $this->input->post('MotherName'),'NomineName' => $this->input->post('NomineName'),'CityId' => $this->input->post('CityId')==NULL?NULL:$this->input->post('CityId'),'ZipCode' => $this->input->post('ZipCode'),'PanNumber' => $this->input->post('PanNumber'),'EducationDetail' => $this->input->post('EducationDetail'),'LastEmployeeFirm' => $this->input->post('LastEmployeeFirm'),'LastEmployeeYear' => $this->input->post('LastEmployeeYear'),'LastEmployeeAnualIncome' => $this->input->post('LastEmployeeAnualIncome'),'IsActive' => $this->input->post('IsActive'));
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
		$UserPersonalInfo= $this->omodel->byId($id);
		$this->load->view("UserPersonalInfo/edit",["UserPersonalInfo"=> $UserPersonalInfo]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('FirstName', 'FirstName', 'required|trim|xss_clean');
		$this->form_validation->set_rules('LastName', 'LastName', 'trim|xss_clean');
		$this->form_validation->set_rules('GenderId', 'GenderId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('About', 'About', 'trim|xss_clean');
		$this->form_validation->set_rules('DateJoin', 'DateJoin', 'required|trim|xss_clean');
		$this->form_validation->set_rules('UserId', 'UserId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MiddleName', 'MiddleName', 'trim|xss_clean');
		$this->form_validation->set_rules('EmailId', 'EmailId', 'trim|xss_clean');
		$this->form_validation->set_rules('FatherAndSpouseName', 'FatherAndSpouseName', 'trim|xss_clean');
		$this->form_validation->set_rules('DOB', 'DOB', 'trim|xss_clean');
		$this->form_validation->set_rules('MotherName', 'MotherName', 'trim|xss_clean');
		$this->form_validation->set_rules('NomineName', 'NomineName', 'trim|xss_clean');
		$this->form_validation->set_rules('CityId', 'CityId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ZipCode', 'ZipCode', 'trim|xss_clean');
		$this->form_validation->set_rules('PanNumber', 'PanNumber', 'trim|xss_clean');
		$this->form_validation->set_rules('EducationDetail', 'EducationDetail', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeFirm', 'LastEmployeeFirm', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeYear', 'LastEmployeeYear', 'trim|xss_clean');
		$this->form_validation->set_rules('LastEmployeeAnualIncome', 'LastEmployeeAnualIncome', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			$file_name = $_FILES["ProfileImage"]["name"];
		    $file_tmp =$_FILES['ProfileImage']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('ProfileImage1'); //In Create Hit Then comment This line.
			}

 
			$data = array('FirstName' => $this->input->post('FirstName'),'LastName' => $this->input->post('LastName'),'GenderId' => $this->input->post('GenderId')==NULL?NULL:$this->input->post('GenderId'),'About' => $this->input->post('About'),'ProfileImage' => $file_name,'DateJoin' => $this->input->post('DateJoin'),'UserId' => $this->input->post('UserId')==NULL?NULL:$this->input->post('UserId'),'MiddleName' => $this->input->post('MiddleName'),'EmailId' => $this->input->post('EmailId'),'FatherAndSpouseName' => $this->input->post('FatherAndSpouseName'),'DOB' => $this->input->post('DOB'),'MotherName' => $this->input->post('MotherName'),'NomineName' => $this->input->post('NomineName'),'CityId' => $this->input->post('CityId')==NULL?NULL:$this->input->post('CityId'),'ZipCode' => $this->input->post('ZipCode'),'PanNumber' => $this->input->post('PanNumber'),'EducationDetail' => $this->input->post('EducationDetail'),'LastEmployeeFirm' => $this->input->post('LastEmployeeFirm'),'LastEmployeeYear' => $this->input->post('LastEmployeeYear'),'LastEmployeeAnualIncome' => $this->input->post('LastEmployeeAnualIncome'),'IsActive' => $this->input->post('IsActive'));
			
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
