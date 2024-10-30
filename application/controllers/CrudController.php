<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CrudController extends CI_Controller {
		function __construct() {
	        parent::__construct();
	        $this->load->model("crudmodel");
	        date_default_timezone_set('Asia/Dubai');

	    }
		public function index(){
		//this->session->set_userdata('name','Aswathy');
			$this->load->view('crudforms');
		}
		public function addData(){
			if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|alpha');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|integer');
				$this->form_validation->set_rules('language', 'Language', 'trim|required');
				if (empty($_FILES['image']['name'])){
					 $this->form_validation->set_rules('image', 'Image', 'required');
				}
				if ($this->form_validation->run() == FALSE){ 

                    $this->load->view('crudforms');
		
	            }
	            else{
	            	
	            	if (!empty($_FILES['image']['name'])){ 
	            		$config['upload_path']          = './uploads/';
			            $config['allowed_types']        = 'gif|jpg|png';
			            $config['max_size']             = 10000000;
			            // $config['max_width']            = 1024;
		            	// $config['max_height']           = 768;
			            $this->load->library('upload', $config);
			            if ( ! $this->upload->do_upload('image')) {
		                	$error = array('error' => $this->upload->display_errors());
							$this->load->view('crudforms',$error);
			            }
			            else
			            {
			            	
			            	$filedata=$this->upload->data();

			            	$postdata=$this->input->post();
			            	$postdata['image']=$filedata['file_name'];
			            	if(is_array($postdata['qualification']))
			            	$postdata['qualification']=implode(',', $postdata['qualification']);
			            	$postdata['added_on']=date('Y-m-d H:i:s',time());
			            	
							if($this->crudmodel->addData($postdata)){
								$this->session->set_flashdata('Sucessmessage',"Data is added sucessfully !!");
								redirect( base_url().'CrudController/viewData', 'refresh');
							}
							else{
								$error['error']="Something went wrong!!";
		                    	$this->load->view('crudforms',$error);
							}
			            	
			            }
	            	}	
	            	
	            	
				}	
			}
		}
		public function viewData(){
			// $name= $this->session->userdata('name');
			// echo $name;
			
			$data['data']=$this->crudmodel->viewData();
			$this->load->view('viewcruddata',$data);
			
		}	
		public function updateData($id){
			$data['data']=$this->crudmodel->viewData($id);
			if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
				$postdata=$this->input->post();
				$data['data'] = (object) $postdata;

				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|alpha');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|integer');
				$this->form_validation->set_rules('language', 'Language', 'trim|required');
				// if (empty($_FILES['image']['name'])){
				// 	 $this->form_validation->set_rules('image', 'Image', 'required');
				// }
				if ($this->form_validation->run() == FALSE){ 
                    $this->load->view('crudforms',$data);
		
	            }
	            else{
	            	
	            	if (!empty($_FILES['image']['name'])){ 
	            		$config['upload_path']          = './uploads/';
			            $config['allowed_types']        = 'gif|jpg|png';
			            $config['max_size']             = 10000000;
			            // $config['max_width']            = 1024;
		            	// $config['max_height']           = 768;
			            $this->load->library('upload', $config);
			            if ( ! $this->upload->do_upload('image')) {
			            	$data['error']=$this->upload->display_errors();
		                	//$error = array('error' => $this->upload->display_errors());
							$this->load->view('crudforms',$data);
			            }
			            else{
			            	$filedata=$this->upload->data();
			            
			            }
	            	}

	            	
	            	if(isset($filedata))
	            	$postdata['image']=$filedata['file_name'];
	            	$postdata['qualification']=implode(',', $postdata['qualification']);
	            	$postdata['updated_on']=date('Y-m-d H:i:s',time());
	   
					if($this->crudmodel->updateData($postdata,$id)){
						$this->session->set_flashdata('Sucessmessage',"Data has been updated sucessfully !!");
						redirect( base_url().'CrudController/viewData', 'refresh');
					}
					else{
						$data['error']="Something went wrong!!";
                    	$this->load->view('crudforms',$data);
					}
			     	
				}	
			}
			else{
				$data['data']=$this->crudmodel->viewData($id);
				$this->load->view('crudforms',$data);
			}
			
		}
		public function deleteData($id){
			if($id){
				if($this->crudmodel->deleteData($id)){
					$this->session->set_flashdata('Sucessmessage',"Data has been deleted sucessfully !!");
					redirect( base_url().'CrudController/viewData', 'refresh');
				}
				else{
					$data['error']="Something went wrong!!";
                	$this->load->view('crudforms',$data);
				}
			}
		}	
	}
?>		