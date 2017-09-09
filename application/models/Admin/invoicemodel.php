<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Invoicemodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('Invoice');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('Invoice');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('Invoice', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('Invoice', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('Invoice');
	 }
	 
	 //below are dropdowns
	 public function ddlPaymentStatus()
	 {
	 	$this->db->select('Id, Title'); 
	    $query=$this->db->get('PaymentStatus'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Title']);
	    }
	    return $resultArr;
	 }

}
