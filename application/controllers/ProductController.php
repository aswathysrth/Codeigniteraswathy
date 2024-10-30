<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ProductController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
	       $this->load->model("productmodel");
	    }

		public function index(){
			
			$this->form_validation->set_rules("category","Category","required|trim");
			$this->form_validation->set_rules("pro_name","Product Name","required|trim");
			$this->form_validation->set_rules("brand","Brand Name","required|trim");
			$this->form_validation->set_rules("featured","Feature","required|trim");
			$this->form_validation->set_rules("highlights","Highlights","required|trim");
			$this->form_validation->set_rules("description","Desciption","required|trim");
			$this->form_validation->set_rules("meta_title","Feature","required|trim");
			$this->form_validation->set_rules("meta_keywords","Meta Keywords","required|trim");
			$this->form_validation->set_rules("meta_desc","Meta Description","required|trim");
			$this->form_validation->set_rules("stock","Stock","required|trim|numeric");
			$this->form_validation->set_rules("MRP","MRP","required|trim|numeric|greater_than_equal_to[0]");
			$this->form_validation->set_rules("selling_price","Selling Price","required|trim|numeric|greater_than_equal_to[0]");
			$this->form_validation->set_rules("status","Status","required|trim");
			if(empty($_FILES['pro_main_image']['name']))
				$this->form_validation->set_rules("pro_main_image","Prouct Image","required");
			// if(empty($_FILES['gallery_image']['name']))
			// 	$this->form_validation->set_rules("gallery_image","Gallerys Image","required");
			if($this->form_validation->run()){
				$postdata=$this->input->post();

				$config['upload_path']          = './uploads/products';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('pro_main_image'))
                {
                    $data['error'] = array('productimgerror' => $this->upload->display_errors());
                    $this->load->view('product', $data);
                }
                else
                {
                  
                  $producimage= $this->upload->data();
                  $postdata['pro_main_image']=$config['upload_path']."/".$producimage['orig_name'];

                }

				 $postdata['added_on']=date("d m,Y");
				 $postdata['ip_address']= $_SERVER['REMOTE_ADDR'];
				  $postdata['slug']=$this->slugify($postdata['pro_name']);
				// echo "<pre>";
				// print_r($postdata);exit;
				if($this->productmodel->addProduct($postdata)){
					$this->session->set_flashdata("sucessmessage","Product inserted successfully!!");
				}
				else{
					$this->session->set_flashdata("failedmessage","Something went wrong !! Try Again !!");
				}
				redirect(base_url()."ProductController",'refresh');
			}
			else{
				$this->load->model("categorymodel");
				$data['parentcategories']=$this->categorymodel->loadparentCategory();
				$this->load->view('product',$data);

			}
			
		}
		public static function slugify($text, string $divider = '-'){
		  // replace non letter or digits by divider
		  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

		  // transliterate
		  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		  // remove unwanted characters
		  $text = preg_replace('~[^-\w]+~', '', $text);

		  // trim
		  $text = trim($text, $divider);

		  // remove duplicate divider
		  $text = preg_replace('~-+~', $divider, $text);

		  // lowercase
		  $text = strtolower($text);

		  if (empty($text)) {
		    return 'n-a';
		  }

		  return $text;
		}
		
	}

?>