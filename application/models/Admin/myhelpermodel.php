<?php
Class Myhelpermodel extends CI_Model
{
	public function GetMenubar()
	{   
		$query = $this->db->query('SELECT m.Id as id,m.MenuText as label,m.MenuURL as link,m.ParentId as parent FROM `MenuPermission` mp INNER JOIN `Menu` m on mp.MenuId=m.Id'.$this->session->userdata('roleid'));
		  
		return $query->result_array();
	}
}