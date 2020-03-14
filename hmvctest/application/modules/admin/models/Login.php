<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{

    function user_exists($usr_nm, $pwd){
        $this->db->select('u.r_k,u.email,ut.r_k ut_r_k,l.val_dsc');
        $this->db->from('users u');
        $this->db->join('users_user_type ut', 'u.r_k = ut.user');
        $this->db->join('t_wb_lov l', 'ut.user_type = l.r_k');
        $this->db->where('u.email', $usr_nm);
        $this->db->where('u.password', $pwd);
        $this->db->where('u.active', 1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->result()[0];
            return array("success"=>true, "message"=>$row);
        }else {
            return array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}