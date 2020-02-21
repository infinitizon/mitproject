<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {

	private $table;
	function __construct() {
		parent::__construct();
	}
	function getTable() {
		return $this->table;
	}
	public function setTable($table){
		$this->table = $table;
	}
	function get($order_by) {
		$this->db->order_by($order_by);
		$query=$this->db->get($this->getTable());
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by);
		$query=$this->db->get($this->getTable());
		return $query;
	}

	function get_where($clauses=[]) {
		foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
		$query=$this->db->get($this->getTable());
		return $query;
	}

	function _insert($data) {
		$this->db->insert($this->getTable(), $data);
	}
	function _insert_batch($data) {
		$this->db->insert_batch($this->getTable(), $data);
	}

	function _insert_on_duplicate_update_batch($data) {
		$this->db->insert_on_duplicate_update_batch($this->getTable(), $data);
	}
	function _insert_on_duplicate_update($data) {
		$this->db->insert_on_duplicate_update($this->getTable(), $data);
	}

	function _update($clauses, $data) {
		foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
		$this->db->update($this->getTable(), $data);
	}

	function _delete($clauses) {
		foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
		$this->db->delete($this->getTable());
	}

	function count_where($clauses) {
		foreach($clauses as $col=>$value){
			$this->db->where($col, $value);
		}
		$query=$this->db->get($this->getTable());
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all() {
		$query=$this->db->get($this->getTable());
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max() {
		$this->db->select_max('id');
		$query = $this->db->get($this->getTable());
		$row=$query->row();
		$id=$row->id;
		return $id;
	}

	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

	function prepareInsertArrayFromTableInfo($table,$POST_ARR){
		$q_fields = $this->db->query("DESCRIBE {$table}");
		$r_fields = $q_fields->result();
		$result = array();
        foreach ($r_fields as $fields) {
			if(isset($POST_ARR[$fields->Field]))
				$result[$fields->Field]= $POST_ARR[$fields->Field];
		}
		return $result;
	}
}
