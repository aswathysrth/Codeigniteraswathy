<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CategoryController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
	       $this->load->model("categorymodel");
	    }

		public function index(){
			$this->form_validation->set_rules("cat_name","Category Name","required|trim");
			$this->form_validation->set_rules("status","Status","required|trim");
			if(empty($_FILES['categoryimage']['name']))
				$this->form_validation->set_rules("categoryimage","Category Image","required|trim");
			if($this->form_validation->run()){

				$postdata=$this->input->post();
				$config['upload_path']          = './uploads/category/';
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['max_size']             = 100000;
	        	// $config['max_width']            = 1024;
	            // $config['max_height']           = 768;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('categoryimage')) {
	                $data['error'] = array('error' => $this->upload->display_errors());
					$this->load->view('category',$data);
	            }
	            else
	            {
	            	$filedata1=$this->upload->data();
	            	$postdata['cat_image']=$config['upload_path'].$filedata1['file_name'];
	            	
	            }
			
				if($this->categorymodel->addCategory($postdata)){
					$this->session->set_flashdata("sucessmessage","Category added successfully!!");
				}
				else{
					$this->session->set_flashdata("failedmessage","Something went wrong !! Try Again !!");
				}
				redirect(base_url()."CategoryController",'refresh');
			}
			else{
				$data['parentcategories']=$this->categorymodel->loadparentCategory();
				// echo "<pre>";
				// print_r($data);exit;
				$this->load->view('category',$data);

			}
			
		}
		public function getSubCategory(){
			$cat_id=$this->input->post('cat_id');
			$data['success']=0;
			if($cat_id){
				if($subcat=$this->categorymodel->getSubCategory($cat_id)){
					$data['success']=1;
					$output="";
					foreach($subcat as $sc){
						$output=$output."<option value=". $sc->cat_id.">".$sc->cat_name."</option>";
					}

					$data['subcat']=$output;
				}
				else{
					
					$data['message']="Something went wrong";
				}
			}
			echo json_encode($data);
			exit;

		}	
		
	}

?>