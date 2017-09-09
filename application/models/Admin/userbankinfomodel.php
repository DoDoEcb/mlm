<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class UserBankInfomodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('UserBankInfo');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('UserBankInfo');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('UserBankInfo', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('UserBankInfo', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('UserBankInfo');
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

}
