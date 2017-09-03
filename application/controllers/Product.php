<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Product extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("productmodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("Product/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['Name'],$row ['PurchaseCost'],$row ['SalePrice'],$row ['ProductCategoryId'],$row ['IsActive'],$row ['ProductImage'],$row ['BareCode'],$row ['Description'],$row ['ReOrderValue'],$row ['Stock'],$row ['MinStockValue'],$row ['Manufacturer']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("Product/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('PurchaseCost', 'PurchaseCost', 'required|trim|xss_clean');
		$this->form_validation->set_rules('SalePrice', 'SalePrice', 'trim|xss_clean');
		$this->form_validation->set_rules('ProductCategoryId', 'ProductCategoryId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('BareCode', 'BareCode', 'trim|xss_clean');
		$this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('ReOrderValue', 'ReOrderValue', 'trim|xss_clean');
		$this->form_validation->set_rules('Stock', 'Stock', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MinStockValue', 'MinStockValue', 'trim|xss_clean');
		$this->form_validation->set_rules('Manufacturer', 'Manufacturer', 'trim|xss_clean');

		if ($this->form_validation->run())
		{
			$file_name = $_FILES["ProductImage"]["name"];
		    $file_tmp =$_FILES['ProductImage']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('ProductImage1'); //In Create Hit Then comment This line.
			}

		  
			$data = array('Name' => $this->input->post('Name'),'PurchaseCost' => $this->input->post('PurchaseCost'),'SalePrice' => $this->input->post('SalePrice'),'ProductCategoryId' => $this->input->post('ProductCategoryId')==NULL?NULL:$this->input->post('ProductCategoryId'),'IsActive' => $this->input->post('IsActive'),'ProductImage' => $file_name,'BareCode' => $this->input->post('BareCode'),'Description' => $this->input->post('Description'),'ReOrderValue' => $this->input->post('ReOrderValue')==NULL?NULL:$this->input->post('ReOrderValue'),'Stock' => $this->input->post('Stock')==NULL?NULL:$this->input->post('Stock'),'MinStockValue' => $this->input->post('MinStockValue')==NULL?NULL:$this->input->post('MinStockValue'),'Manufacturer' => $this->input->post('Manufacturer')==NULL?NULL:$this->input->post('Manufacturer'));
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
		$Product= $this->omodel->byId($id);
		$this->load->view("Product/edit",["Product"=> $Product]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('Name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('PurchaseCost', 'PurchaseCost', 'required|trim|xss_clean');
		$this->form_validation->set_rules('SalePrice', 'SalePrice', 'trim|xss_clean');
		$this->form_validation->set_rules('ProductCategoryId', 'ProductCategoryId', 'required|trim|xss_clean');
		$this->form_validation->set_rules('BareCode', 'BareCode', 'trim|xss_clean');
		$this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('ReOrderValue', 'ReOrderValue', 'trim|xss_clean');
		$this->form_validation->set_rules('Stock', 'Stock', 'required|trim|xss_clean');
		$this->form_validation->set_rules('MinStockValue', 'MinStockValue', 'trim|xss_clean');
		$this->form_validation->set_rules('Manufacturer', 'Manufacturer', 'trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			$file_name = $_FILES["ProductImage"]["name"];
		    $file_tmp =$_FILES['ProductImage']['tmp_name'];
		    
			if ($file_name != '') {
			 	move_uploaded_file($file_tmp, "./uploads/" . $file_name); 
			}
			else
			{
				$file_name = $this->input->post('ProductImage1'); //In Create Hit Then comment This line.
			}

 
			$data = array('Name' => $this->input->post('Name'),'PurchaseCost' => $this->input->post('PurchaseCost'),'SalePrice' => $this->input->post('SalePrice'),'ProductCategoryId' => $this->input->post('ProductCategoryId')==NULL?NULL:$this->input->post('ProductCategoryId'),'IsActive' => $this->input->post('IsActive'),'ProductImage' => $file_name,'BareCode' => $this->input->post('BareCode'),'Description' => $this->input->post('Description'),'ReOrderValue' => $this->input->post('ReOrderValue')==NULL?NULL:$this->input->post('ReOrderValue'),'Stock' => $this->input->post('Stock')==NULL?NULL:$this->input->post('Stock'),'MinStockValue' => $this->input->post('MinStockValue')==NULL?NULL:$this->input->post('MinStockValue'),'Manufacturer' => $this->input->post('Manufacturer')==NULL?NULL:$this->input->post('Manufacturer'));
			
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
