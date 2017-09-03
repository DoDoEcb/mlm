<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class LedgerAccountTypemodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('LedgerAccountType');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('LedgerAccountType');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('LedgerAccountType', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('LedgerAccountType', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('LedgerAccountType');
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

}
