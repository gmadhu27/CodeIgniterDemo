<?php
class Blog extends CI_Controller{

	public function index()
	{
		$this->load->model('abc');
		echo"controller blog";
	}

	public function add()
	{
		echo"add function of bloger";
	}
}