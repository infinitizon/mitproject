<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProducts extends CI_Model{
    
    
    function findProducts($where = array()){
        $this->db->select('*');
        $this->db->from('tbl_str_prd p');
		foreach($where as $col=>$value){
			$this->db->where($col, $value);
		}
        
        return $this->db->get();
    }
    function findCurrecies($where = array()){
        $this->db->select('*');
        $this->db->from('t_wb_lov curr');
        $this->db->where('def_id', 'CURR-CNV');
		foreach($where as $col=>$value){
			$this->db->where($col, $value);
		}
        
        return $this->db->get();
    }
}