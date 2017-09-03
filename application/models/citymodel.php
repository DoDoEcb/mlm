<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Citymodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('City');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('City');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('City', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('City', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('City');
	 }
	 
	 //below are dropdowns
	 public function ddlState()
	 {
	 	$this->db->select('Id, Name'); 
	    $query=$this->db->get('State'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['Name']);
	    }
	    return $resultArr;
	 }

}
