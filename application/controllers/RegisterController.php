<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RegisterController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>'); 
	       $this->load->model("registermodel");
	    }

		public function index(){

			$this->form_validation->set_rules("username","Name","trim|required");
			$this->form_validation->set_rules("email","Email","trim|required|valid_email|is_unique[ec_users.email]");
			$this->form_validation->set_rules("password","Password","trim|required|min_length[6]|max_length[25]");
			$this->form_validation->set_rules("acceptance","Accept Service & Privacy Policy","trim|required");
			$this->form_validation->set_message('is_unique', '%s is already exists');
			if($this->form_validation->run()){
				$postdata=$this->input->post();	
				unset($postdata["acceptance"]);				
				$postdata['user_id']=mt_rand(1111,231212);
				$postdata['password']=password_hash($postdata['password'], PASSWORD_BCRYPT);
				$postdata['status']=1;
				$postdata['ip']= $_SERVER['REMOTE_ADDR'];
				$postdata['added_on']=date("d m,Y");
				if($this->registermodel->createUser($postdata)){
					$this->session->set_flashdata("sucessmessage","Product inserted successfully!!");
				}
				else{
					$this->session->set_flashdata("failedmessage","Something went wrong !! Try Again !!");
				}
				redirect(base_url()."LoginController",'refresh');


			}
			else{
				$userid=$this->session->userdata('login_id');
				if($userid)
					redirect(base_url(),'refresh');
				else
					$this->load->view("front_end/register");

			}

			
			
			
		}
		
	}

?>