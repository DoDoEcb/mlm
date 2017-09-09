<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class UserPersonalInfomodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('UserPersonalInfo');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('UserPersonalInfo');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('UserPersonalInfo', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('UserPersonalInfo', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('UserPersonalInfo');
	 }
	 
	 //below are dropdowns
	 public function ddlGender()
	 {
	 	$this->db->select('Id, Name'); 
	    $query=$this->db->get('Gender'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Name']);
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
	 public function ddlCity()
	 {
	 	$this->db->select('Id, Name'); 
	    $query=$this->db->get('City'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Name']);
	    }
	    return $resultArr;
	 }

}
