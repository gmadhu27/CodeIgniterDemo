<?php
class UserModel extends CI_Model{

	public function getUsers()
	{
		$this->load->database();
		$q=$this->db->query("SELECT * FROM citizen_charter");
		$result=$q->result();
		echo"<pre>";
		print_r($result);
	}
}