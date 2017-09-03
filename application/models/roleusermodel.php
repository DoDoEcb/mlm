<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class RoleUsermodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('RoleUser');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('RoleUser');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('RoleUser', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('RoleUser', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('RoleUser');
	 }
	 
	 //below are dropdowns
	 public function ddlRole()
	 {
	 	$this->db->select('Id, RoleName'); 
	    $query=$this->db->get('Role'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['RoleName']);
	    }
	    return $resultArr;
	 }
	 public function ddlUser()
	 {
	 	$this->db->select('Id, Username'); 
	    $query=$this->db->get('User'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Username']);
	    }
	    return $resultArr;
	 }

}
