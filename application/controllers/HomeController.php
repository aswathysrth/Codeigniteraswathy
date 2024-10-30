<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index(){
		$this->load->model("homemodel");
		$this->load->model("categorymodel");
		$data['banner']=$this->homemodel->loadBanner();
		$data['category']=$this->homemodel->loadCategory();
		$data['parentcategory']=$this->homemodel->loadparentCategory();
		$data['products']=$this->homemodel->loadProducts();
		// echo '<pre>';
		// print_r($data);echo '</pre>';//exit;

		$this->load->view("front_end/index",$data);
	}
	public function hello($name="")
	{
		$val['name']=$name;
		$this->load->view('hello',$val);
	}
	public function hai($name="")
	{
		
		$this->load->model('homemodel');
		$val=$this->homemodel->hai($name);
		$this->load->view('hai',$val);
		
	}
	public function loaddata(){
		
		$this->load->model('homemodel');
		$data['details']=$this->homemodel->loaddata();

		// echo "<pre>";
		// print_r($data);exit;
		$this->load->view('loaddata',$data);
		
	}
	public function myform(){
	//	$this->load->helper('form'); loaded using autoload.php
		if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[12]|is_unique[data.Name]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|callback_password_check');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[data.Email]');
			if (empty($_FILES['userfile']['name'])){
					 $this->form_validation->set_rules('userfile', 'Document', 'required');
			}
			if ($this->form_validation->run() == FALSE){ 
                    $this->load->view('form');
            }
            else{
				// echo "<pre>";
				// print_r($_FILES['userfile']);
				  	$postdata=$this->input->post();
				if (!empty($_FILES['userfile']['name'])){
					$config['upload_path']          = './uploads/';
		            $config['allowed_types']        = 'gif|jpg|png';
		            $config['max_size']             = 100000;
		        	// $config['max_width']            = 1024;
		            // $config['max_height']           = 768;

		            $this->load->library('upload', $config);
		            if ( ! $this->upload->do_upload('userfile')) {
		                $error = array('error' => $this->upload->display_errors());
						$this->load->view('form',$error);
		            }
		            else
		            {
		            	$filedata1=$this->upload->data();
		            	$postdata['image']=$filedata1['file_name'];
		            	$this->load->model("formmodel");
						$this->formmodel->insertData($postdata);
	                    $this->load->view('form');
		            }

				}
	            
						
						
            }
        }
        else
			$this->load->view("form");
	}
	public function password_check($str){
            if ($str == 'test')
            {
                    $this->form_validation->set_message('password_check', 'The {field} field can not be the word "test"');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }
    public function theme(){

		$this->load->view("theme");
	}
	public function cookie(){
		$this->load->helper('cookie');
		$cookiearray=array('name'=>'name','value'=>'Aswathy','expire'=>3242354235);
		$this->input->set_cookie($cookiearray);

		$cookieData = $this->input->cookie("name");
		echo $cookieData ;
		
		
	}
	public function product($slug){
		$this->load->model("homemodel");
		$data['productdetails']=$this->homemodel->productDetails($slug);
		// echo "<pre>";
		// print_r($data);echo "</pre>";
		$this->load->view("front_end/product",$data);
		
	}
}	

?>