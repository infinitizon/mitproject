<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{

    function user_exists($usr_nm, $pwd){
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('users_user_type ut', 'u.r_k = ut.user');
        $this->db->join('t_wb_lov l', 'ut.user_type = l.r_k');
        $this->db->where('u.email', $usr_nm);
        $this->db->where('u.password', $pwd);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->result()[0];
            return array("success"=>true, "message"=>$row);
        }else {
            return array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}