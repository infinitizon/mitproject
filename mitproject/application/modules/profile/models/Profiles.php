<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Model{
    // echo "Hello";
    function multi_menu() {
        $this->db->select('*');
        $this->db->from('cms');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // Create a multidimensional array to conatin a list of items and parents
            $menu = array(
                'items' => array(),
                'parents' => array()
            );
            // Builds the array lists with data from the menu table
            foreach ($query->result() as $items)
            {
                // Creates entry into items array with current menu item id ie. $menu['items'][1]
                $menu['items'][$items->r_k] = (array) $items;
                // Creates entry into parents array. Parents array contains a list of all items with children
                $menu['parents'][$items->par_id][] = $items->r_k;
            }
            return $menu; //array("success"=>true, "message"=>$query->result());
        }else {
            return array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
    
    function get_home_content() {
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where('icon', 'home');
        $query = $this->db->get();
        $row = $query->result();
        // echo $this->db->last_query();
        if ($query->num_rows() == 1) {
            $row = $query->result()[0];
            return (object) array("success"=>true, "message"=>$row);
        }else {
            return (object) array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}