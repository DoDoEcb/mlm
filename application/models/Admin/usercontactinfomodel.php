<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class UserContactInfomodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('UserContactInfo');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('UserContactInfo');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('UserContactInfo', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('UserContactInfo', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('UserContactInfo');
	 }
	 
	 //below are dropdowns
	 public function ddlContactType()
	 {
	 	$this->db->select('Id, TypeName'); 
	    $query=$this->db->get('ContactType'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['TypeName']);
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
