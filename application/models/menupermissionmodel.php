<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class MenuPermissionmodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('MenuPermission');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('MenuPermission');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('MenuPermission', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('MenuPermission', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('MenuPermission');
	 }
	 
	 //below are dropdowns
	 public function ddlMenu()
	 {
	 	$this->db->select('Id, MenuText'); 
	    $query=$this->db->get('Menu'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['MenuText']);
	    }
	    return $resultArr;
	 }
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
