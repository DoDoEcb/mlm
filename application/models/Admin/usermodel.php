<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Usermodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('User');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('User');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('User', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('User', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('User');
	 }
	 
	 //below are dropdowns
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
	 public function ddlLeg()
	 {
	 	$this->db->select('Id, Name'); 
	    $query=$this->db->get('Leg'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Name']);
	    }
	    return $resultArr;
	 }
	 public function ddlMemberShipLevel()
	 {
	 	$this->db->select('Id, Title'); 
	    $query=$this->db->get('MemberShipLevel'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Title']);
	    }
	    return $resultArr;
	 }

}
