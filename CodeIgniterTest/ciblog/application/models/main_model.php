<?php

class Main_model extends CI_Model{
	public function test_main(){
		echo "This is model func";
	}

	function insert_data($data){
		$this->db->insert("comments", $data);
	}
	function fetch_data($num = 20, $start = 0){
		$this->db->select()->from('comments')->where('active', 1)->order_by('id', 'desc')->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_comments_count(){
		$this->db->select('id')->from('comments')->where('active', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_comment($commentId){
		$this->db->select()->from('comments')->where('active', 1);
		$query = $this->db->get();
		return $query->first_row('array');
	}
}
?>