<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LoginController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>'); 
	       $this->load->model("registermodel");
	    }

		public function index(){

			$this->form_validation->set_rules("email","Email","trim|required|valid_email");
			$this->form_validation->set_rules("password","Password","trim|required");
			if($this->form_validation->run()){
				$postdata=$this->input->post();	

				$email = $postdata['email'];
				$password = $postdata['password'];
				$userarray=array('email'=>$email,'status'=>1);
		        $query = $this->db
		            ->select("*")
		            ->from("ec_users")
		            ->where($userarray)
		            ->get();

		        if ($query->num_rows() ==1){
		        	
		        	 $row = $query->row();
		      		if (password_verify($password, $row->password)){
		      			$userdata=array('login_id'=>$row->user_id,'username'=>$row->username);
		      			$this->session->set_userdata($userdata);
		      			if($this->session->userdata('userid')){ 
		      				$cid=$this->session->userdata('userid');

							$this->db->set('user_id', $row->user_id);
							$this->db->where('user_id', $cid);
							$this->db->update('ec_cart');
							
		      			}	
		      			

		      			$this->session->set_flashdata("sucessmessage","Welcome Back ".$row->username." !!");
		      		}
		      		else{
		      			$this->session->set_flashdata("failedmessage","Invalid password!! Try Again !!");
		      			redirect(base_url()."LoginController",'refresh');
		      		}
		        }
		        else{
		        	$this->session->set_flashdata("failedmessage","Invalid crecentials!!");
		        	redirect(base_url()."LoginController",'refresh');
		        }
		      	 redirect(base_url(),'refresh');

			}
			else{
				$userid=$this->session->userdata('login_id');
				if($userid)
					redirect(base_url(),'refresh');
				else
					$this->load->view("front_end/login");
			}

			
			
			
		}
		
	}

?>