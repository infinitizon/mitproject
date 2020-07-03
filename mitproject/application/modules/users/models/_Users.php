<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _Users extends CI_Model{
    
    function getUsers($clauses = []){
        $this->db->select('u.r_k,u.email,u.active,ut.r_k ut_r_k,l.r_k l_r_k,l.val_dsc');
        $this->db->from('users u');
        $this->db->join('users_user_type ut', 'u.r_k = ut.user');
        $this->db->join('t_wb_lov l', 'ut.user_type = l.r_k');
        foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return array("success"=>true, "message"=>$query->result());
        }else {
            return array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}