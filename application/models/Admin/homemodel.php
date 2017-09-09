<?php
Class Homemodel extends CI_Model
{
	public function GetDashboard()
	{   
		 //$arraydate = array('Dated >' => date('y/m/d',strtotime('-7 days')));
	     $newdata = array(
				'User'  => $this->db->count_all('User'),
				'Menu'  => $this->db->count_all('Menu'),
				'Role' => $this->db->count_all('Role')
				//,
	     		//'ActiveUser' => $this->db->where("IsActive",true)->count_all_results("User"),
	     		//'InActiveUser' => $this->db->where("IsActive",false)->count_all_results("User"),
	     		//'Gender' => $this->db->count_all('Gender'),
	     		
	     		//'LastweekRegister' => $this->db->where($arraydate)->count_all_results('User'),
		); 
 
		return $newdata;
	}
	
	/*public function GetLastWeekRegisterUser($lastDay)
	{
		$arraydate = array('DATE_FORMAT(Dated, "%Y-%m-%d") =' => $lastDay );
		$newdata = $this->db->where($arraydate)->select('Dated')->count_all_results('User'); 
	 
		return $newdata;
	}*/
	
}