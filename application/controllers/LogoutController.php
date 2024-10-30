<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LogoutController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>'); 
	       $this->load->model("registermodel");
	    }

		public function index(){
			session_unset();
			session_destroy();
			redirect(base_url(),'refresh');
		}	
		
	}

?>