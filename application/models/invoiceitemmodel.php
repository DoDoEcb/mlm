<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class InvoiceItemmodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('InvoiceItem');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('InvoiceItem');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('InvoiceItem', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('InvoiceItem', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('InvoiceItem');
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
