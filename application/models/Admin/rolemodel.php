<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Rolemodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('Role');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('Role');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('Role', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('Role', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('Role');
	 }
	 
	 //below are dropdowns

}
