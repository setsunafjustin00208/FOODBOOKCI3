<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {
	public function __construct() {

		parent::__construct();

		$this->load->library('table');
		$this->load->library('image_lib');
		$this->load->library('javascript');
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');

	}

	public function login()
	{
		$username = $_POST['Username'];
		$password = $_POST['Password'];

		$queryLogin = $this->db->query("SELECT * FROM users where username= '{$username}' and password='{$password}'");

		if ($queryLogin->num_rows() > 0) {

			$row = $queryLogin->row();
			$userdata = array('userID' => $row->userID, 'Fname' => $row->Fname, 'Mi' => $row->Mi, 'Lname' => $row->Lname, 'logged_in' => TRUE);
			$this->session->set_userdata($userdata);
			redirect('views/dashboard');
		}else {
			
				$_SESSION['wrongLogIn'] = "Invalid Username Or Password!!";
				redirect('views/login');
			
		}

	}
	public function post()
	{
		if(isset($_POST['Vegetables']))
		{
			$Vegetables = $_POST['Vegetables'];
		}

		else
		{
			$Vegetables = "";
		}

		if(isset($_POST['Chicken']))
		{
			$Chicken = $_POST['Chicken'];
		}

		else
		{
			$Chicken = "";
		}
		if(isset($_POST['Soup']))
		{
			$Soup = $_POST['Soup'];
		}

		else
		{
			$Soup = "";
		}
		if(isset($_POST['Pork']))
		{
			$Pork = $_POST['Pork'];
		}

		else
		{
			$Pork = "";
		}
		if(isset($_POST['Broth']))
		{
			$Broth = $_POST['Broth'];
		}

		else
		{
			$Broth = "";
		}
		if(isset($_POST['Beef']))
		{
			$Beef = $_POST['Beef'];
		}

		else
		{
			$Beef = "";
		}

		$recipe_title = $_POST['recipetitle'];
		$recipie_ingredients =  $_POST['recipeingredients'];
		$recipe_instructions = $_POST['recipeinstructions'];
		$userID = $_POST['userID'];
		$recipe_date = $_POST['recipe_date'];
		$category = $Vegetables." ".$Chicken." ".$Beef." ".$Pork." ".$Soup." ".$Broth;
			
		

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->form_validation->set_error_delimiters();
		$this->upload->initialize($config);

		if($this->upload->do_upload('userfile'))
		{
			$data = $this->input->post();
			$info = $this->upload->data();
			$image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);

			$insert_post = array('userID' => $userID, 'recipe_title' =>$recipe_title,'recipe_ingredients ' => $recipie_ingredients, 'recipe_instructions' => $recipe_instructions, 'recipe_category ' => $category, 'recipe_date' => $recipe_date,'recipe_image' => $image_path);
			$this->db->insert('recipe', $insert_post);
			$_SESSION['success'] = "Posted Successfully!";
			redirect('views/dashboard');
			
		}
		else
		{
			 $_SESSION['error'] = array('error' => $this->upload->display_errors());
			 redirect('views/dashboard');
			
		}


		
		
	}

	public function update_post()
	{

		$update_recipe_title = $_POST['recipetitle'];
		$update_recipie_ingredients =  $_POST['recipeingredients'];
		$update_recipe_instructions = $_POST['recipeinstructions'];
		$update_recipe_date = $_POST['recipe_date'];
		$recipeID = $_POST['recipeID'];
		

		$config2['upload_path'] = './uploads/';
		$config2['allowed_types'] = 'gif|jpg|png';

		$this->form_validation->set_error_delimiters();
		$this->upload->initialize($config2);

		if($this->upload->do_upload('userfile1'))
		{
			$update_data = $this->input->post();
			$update_info = $this->upload->data();
			$update_image_path = base_url("uploads/".$update_info['raw_name'].$update_info['file_ext']);

			$update_post = array('recipe_title' =>$update_recipe_title,'recipe_ingredients ' => $update_recipie_ingredients, 'recipe_instructions' => $update_recipe_instructions,'recipe_date' => $update_recipe_date,'recipe_image' => $update_image_path);
			$this->db->where('recipeID', $recipeID);
			$this->db->update('recipe', $update_post);
			redirect('views/recipe-edit');
			
		}
		else
		{
			 $_SESSION['update_error'] = array('error' => $this->upload->display_errors());
			 redirect('views/dashboard');
			
		}


		
		
	}

	public function delete_post()
	{
		$delete_recipeID = $this->uri->segment(3);
		$this->db->where('recipeID', $delete_recipeID);
		$this->db->delete('recipe');
		redirect('views/dashboard');
	}

	public function add_user()
	{
		$this->db->insert('users', $_POST);
		redirect('views/dashboard');
	}
	public function update_user()
	{
		$updateID = $_POST['userID'];
		$update_Fname = $_POST['Fname'];
		$update_Mi = $_POST['Mi'];
		$update_Lname = $_POST['Lname'];
		$update_username = $_POST['username'];
		$update_password = $_POST['password'];
		$update_date = $_POST['date_created'];

		$update_credentials = array('Fname'=>$update_Fname,'Mi'=>$update_Mi,'Lname'=>$update_Lname,'username'=>$update_username,'password'=>$update_password,'date_created'=>$update_date);
		$this->db->where('userID', $updateID);
		$this->db->update('users', $update_credentials);
		redirect('views/dashboard');
	}
	public function delete_user()
	{
		$deleteID = $this->uri->segment(3);
		$this->db->where('userID', $deleteID);
		$this->db->delete('users');

		$deleteID2 = $this->uri->segment(3);
		$this->db->where('userID', $deleteID2);
		$this->db->delete('recipe');

		redirect('views/dashboard');
	}
	public function search()
	{
		if(isset($_POST['Vegetables']))
		{
			$Vegetables1 = $_POST['Vegetables'];
		}

		else
		{
			$Vegetables1 = "";
		}

		if(isset($_POST['Chicken']))
		{
			$Chicken1 = $_POST['Chicken'];
		}

		else
		{
			$Chicken1 = "";
		}
		if(isset($_POST['Soup']))
		{
			$Soup1 = $_POST['Soup'];
		}

		else
		{
			$Soup1 = "";
		}
		if(isset($_POST['Pork']))
		{
			$Pork1 = $_POST['Pork'];
		}

		else
		{
			$Pork1 = "";
		}
		if(isset($_POST['Broth']))
		{
			$Broth1 = $_POST['Broth'];
		}

		else
		{
			$Broth1 = "";
		}
		if(isset($_POST['Beef']))
		{
			$Beef1 = $_POST['Beef'];
		}

		else
		{
			$Beef1 = "";
		}	

		$category = $Vegetables1." ".$Chicken1." ".$Beef1." ".$Pork1." ".$Soup1." ".$Broth1;

		$_SESSION['Vegetables'] = $Vegetables1;
		$_SESSION['Chicken'] = $Chicken1;
		$_SESSION['Beef'] = $Beef1;
		$_SESSION['Pork'] = $Pork1;
		$_SESSION['Soup'] = $Soup1;
		$_SESSION['Broth'] = $Broth1;
		redirect("views/result");
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("views/index");
	}
}

/* End of file Database.php */
/* Location: ./application/controllers/Database.php */

 ?>