<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCategory extends CI_Model{
    function findCategories($clause = array()){
        $this->db->select('*');
        $this->db->from('tbl_00_cat u');
        // echo "<pre>";var_dump($clause);echo "</pre>";
		foreach($clause as $col=>$value){
            // echo $col."<=>".$value."<br>";
			$this->db->where($col, $value);
		}
        // echo $this->db->last_query();
        return $this->db->get();

    }
}