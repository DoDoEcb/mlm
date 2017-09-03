<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class LedgerAccountmodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('LedgerAccount');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('LedgerAccount');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('LedgerAccount', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('LedgerAccount', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('LedgerAccount');
	 }
	 
	 //below are dropdowns
	 public function ddlLedgerAccountType()
	 {
	 	$this->db->select('Id, Title'); 
	    $query=$this->db->get('LedgerAccountType'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Title']);
	    }
	    return $resultArr;
	 }
	 public function ddlLedgerAccount()
	 {
	 	$this->db->select('Id, Title'); 
	    $query=$this->db->get('LedgerAccount'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Title']);
	    }
	    return $resultArr;
	 }

}
