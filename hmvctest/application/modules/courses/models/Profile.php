<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Model{

  function _findAllRoles(){
    return $this->db->get("tb_00_aut");
  }
  function _findUserById($usr_id) {
    $this->db->select('*');
    $this->db->from('tbl_01_usr u');
    $this->db->join('tb_00_aut r', 'u.tb_00_aut_id = r.aut_id');
    $this->db->where('u.usr_id', $usr_id);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
        $row = $query->result()[0];
        return array("success"=>true, "message"=>$row);
    }else {
        return array("success"=>false, "message"=>'Problem Updating user');
    }
  }
	function _update($clauses, $data) {
		foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
		$this->db->update("tbl_01_usr", $data);
	}
}