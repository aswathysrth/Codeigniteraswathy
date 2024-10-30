<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CheckoutController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>'); 
	       $this->load->model("registermodel");
	    }

		public function index(){
			$userid=$this->session->userdata('login_id');
			if(empty($this->session->userdata('login_id')))
				redirect(base_url()."LoginController",'refresh');
			else{
				echo "checkout";
				//$this->load->view("front_end/login");
			}
			
			
			
		}
		
	}

?>