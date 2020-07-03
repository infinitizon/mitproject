<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{ 
    
    function findUsers($usr_id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_01_usr u');
        $this->db->join('tb_00_aut r', 'u.tb_00_aut_id = r.aut_id');
        if($usr_id)
            $this->db->where('u.usr_id', $usr_id);
        
        return $this->db->get();
    }
}