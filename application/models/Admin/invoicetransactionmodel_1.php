<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class InvoiceTransactionmodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('InvoiceTransaction');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('InvoiceTransaction');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('InvoiceTransaction', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('InvoiceTransaction', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('InvoiceTransaction');
	 }
	 
	 //below are dropdowns
	 public function ddlInvoice()
	 {
	 	$this->db->select('Id, OtherInvoiceCode'); 
	    $query=$this->db->get('Invoice'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['OtherInvoiceCode']);
	    }
	    return $resultArr;
	 }

}
