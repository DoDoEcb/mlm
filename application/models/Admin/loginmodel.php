<?php
Class Loginmodel extends CI_Model
{
	 public function validUser($username,$password)
	 { 
	 	 $q= $this->db->where(['UserName'=>$username,'Password'=>$password])
	 	 ->get('User'); 
	 	 
	    if($q->num_rows())
	 	{ 
	 		return $q->row()->Id;
	 	}
	 	else 
	 	{
	 		return false;
	 	} 
	 }
	 public function GetRoleId($UserId)
	 {
	 	$q= $this->db->where(['UserId'=>$UserId])->limit(1)->get('RoleUser');
	 
	 	if($q->num_rows())
	 	{
	 		return $q->row()->RoleId;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }
}