<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Menumodel extends CI_Model
{
	 public function display()
	 {  
	 	$this->db->from('Menu');
	 	$query=$this->db->get(); 
	 	return $query->result_array();
	 }
	 
	 public function byId($id)
	 {
	 	$this->db->from('Menu');
	 	$this->db->where('Id',$id);
	 	$query = $this->db->get(); 
	 	return $query->row();
	 }
	 
	 public function save($data)
	 {
	 	$this->db->insert('Menu', $data);
	 	return $this->db->insert_id();
	 }
	 
	 public function update($where, $data)
	 {
	 	$this->db->update('Menu', $data, $where);
	 	return $this->db->affected_rows();
	 }
	 
	 public function deleteById($id)
	 {
	 	$this->db->where('Id', $id);
	 	$this->db->delete('Menu');
	 }
	 
	 //below are dropdowns
	 public function ddlMenu()
	 {
	 	$this->db->select('Id, MenuText'); 
	    $query=$this->db->get('Menu'); 
	   
	    $resultArr = array('NULL'=>'-Select-');
	    foreach ($query->result_array() as $row) {
	    	$resultArr[] = array($row ['Id']=>$row ['MenuText']);
	    }
	    return $resultArr;
	 }

}
