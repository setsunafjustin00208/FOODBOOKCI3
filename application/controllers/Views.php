<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function result()
	{
		$this->load->view('result');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		$this->load->view('dashboard');
	}

	public function recipe()
	{
		$this->load->view('recipe');
	}

	public function recipe_edit()
	{
		$this->load->view('recipe-edit');
	}
	public function add_user()
	{
		$this->load->view('add-user');
	}
	public function update_user()
	{
		$this->load->view('update-user');
	}

}

/* End of file Views.php */
/* Location: ./application/controllers/Views.php */

 ?>