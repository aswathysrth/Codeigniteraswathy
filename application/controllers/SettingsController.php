<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SettingsController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
	       $this->load->model("settingsmodel");
	    }

		public function index(){
			
			$this->form_validation->set_rules("pincode","Pincode","required|trim|integer");
			$this->form_validation->set_rules("delivery_charge","Delivery Charge","required|trim|numeric|greater_than_equal_to[0]");
			$this->form_validation->set_rules("status","Status","required|trim");
			if($this->form_validation->run()){
				$postdata=$this->input->post();
				
				if($this->settingsmodel->addPincode($postdata)){
					$this->session->set_flashdata("sucessmessage","Pincode added successfully!!");
				}
				else{
					$this->session->set_flashdata("failedmessage","Something went wrong !! Try Again !!");
				}
				redirect(base_url()."SettingsController",'refresh');
			}
			else{
				$this->load->view('settings');

			}
			
		}
		public function banner(){
			if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
				$postdata=$this->input->post();
			}	
			
			$this->form_validation->set_rules("ban_status","Status","required|trim");
			if(empty($_FILES['bannerimage']['name'])){
				 $this->form_validation->set_rules('bannerimage', 'Banner Image', 'required');
			}
			if($this->form_validation->run()){
				if(!empty($_FILES['bannerimage']['name'])){
					$config['upload_path']          = './uploads/banner/';
		            $config['allowed_types']        = 'gif|jpg|png';
		            $config['max_size']             = 10000000;
		            // $config['max_width']            = 1024;
	            	// $config['max_height']           = 768;
		            $this->load->library('upload', $config);
		            if ( ! $this->upload->do_upload('bannerimage')) {
	                	$error = array('error' => $this->upload->display_errors());
						$this->load->view('banner',$error);
		            }
		            else
		            {
		            	
		            	$filedata=$this->upload->data();

		            	$postdata=$this->input->post();
		            	$postdata['ban_image']=$config['upload_path'].$filedata['file_name'];
		            	
						if($this->settingsmodel->addBanner($postdata)){
							$this->session->set_flashdata('sucessmessage',"Data is added sucessfully !!");
							
						}
						else{
							$this->session->set_flashdata("failedmessage","Something went wrong !! Try Again !!");
						}
						redirect( base_url().'SettingsController/banner', 'refresh');
		            	
		            }
				}
			}
			else{
				$this->load->view('banner');

			}
			
		}
		
	}

?>