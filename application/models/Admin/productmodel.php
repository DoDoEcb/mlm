<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Productmodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('Product');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('Product');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('Product', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('Product', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('Product');
	 }
	 
	 //below are dropdowns
	 public function ddlProductCategory()
	 {
	 	$this->db->select('Id, Name'); 
	    $query=$this->db->get('ProductCategory'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Name']);
	    }
	    return $resultArr;
	 }

}
