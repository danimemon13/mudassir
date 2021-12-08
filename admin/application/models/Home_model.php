<?php
class Home_model extends CI_Model 
{
	function login_model($username,$password){
		$this->db->select("*");
		$this->db->from("user_login");
		$this->db->where("(user_name = '$username' OR mobile_number = '$username')");
		$this->db->where("password",$password);
		$query = $this->db->get();
		return $query->result_array(); 
	}
}