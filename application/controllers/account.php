<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Account extends CI_Controller
{
	public function Login()
	{ 
		if($this->session->userdata('logged_in'))
			return redirect("home");
		
		$this->load->view("account/login"); 
	}
	
	public function Loginhit()
	{ 
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{ 
			$this->load->view("account/login");
		}
		else
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
				
			 $this->load->model("Loginmodel");
			 $loginId=$this->Loginmodel->validUser($username,$password);
			 if($loginId)
			 { 
			 	 $newdata = array(
			 	 		'uname'  => $username,
			 	 		'uid'     => $loginId,
			 	 		'logged_in' => TRUE
			 	 );
			 	 
			 	 $this->session->set_userdata($newdata);
			 	 
			 	 return redirect("home");
			 	  
			 }
			 else
			 {
			 	$this->load->view("account/login");
			 }
			 
		}
		
		
		//
	}
	
	public  function logout()
	{
		$newdata = array(
				'uname'  => '',
				'uid'     => '',
				'logged_in' => ''
		);
		$this->session->unset_userdata($newdata);
		
		return redirect("account/login"); 
	}
	
	
	public  function Register()
	{
		$this->load->view("account/register");
	}
}