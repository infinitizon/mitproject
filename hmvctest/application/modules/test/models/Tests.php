<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Model{
    // var_dump('Hello');
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
                // var_dump($items);
                // Creates entry into items array with current menu item id ie. $menu['items'][1]
                $menu['items'][$items->r_k] = (array) $items;
                // Creates entry into parents array. Parents array contains a list of all items with children
                $menu['parents'][$items->par_id][] = $items->r_k;
            }
            // echo "<pre>";
            // var_dump($menu);
            // echo "</pre>";
            return $menu; //array("success"=>true, "message"=>$query->result());
        }else {
            return array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}