<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Model{
    // var_dump('Hello');
    function multi_menu() {
        $this->db->select("c.r_k, c.par_id, c.link, c.icon, c.record_type
            , (CASE WHEN c.record_type=20200141 THEN CONCAT('Quiz: ',q.quiz_name) ELSE c.menu_name END)menu_name
            , (CASE WHEN c.record_type=20200141 THEN c.menu_name ELSE NULL END)quiz")
            ->from('cms c')
            ->join('quiz q', 'c.menu_name=q.r_k', 'left');
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
    // var_dump('Hello');
    function get_home_content($link = 'home') {
        $this->db->select('*');
        $this->db->from('cms');
        if(!$this->uri->segment(2)){
                $this->db->where('icon', $this->uri->segment(1)?$this->uri->segment(1):'home');
        }else {
            $this->db->where('link', $link);
        }
        $query = $this->db->get();
        $row = $query->result();
        if ($query->num_rows() == 1) {
            $row = $query->result()[0];
            return (object) array("success"=>true, "message"=>$row);
        }else {
            return (object) array("success"=>false, "message"=>'Incorrect username or password');
        }
    }
}