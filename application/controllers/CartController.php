<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CartController extends CI_Controller {
		 public function __construct() {
	        parent::__construct();

	       $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
	       $this->load->model("cartmodel");
	    }

		public function addtoCart(){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('pro_id', 'Product Id', 'trim|required');
			$this->form_validation->set_rules('pro_qty', 'Quantity', 'trim|required');
			if ($this->form_validation->run() == FALSE){ 
                 $this->session->set_flashdata("errormsg","Somehing went wrong!!");
            }
            else{
            	$postdata=$this->input->post();
            	$pro_id=$postdata['pro_id'];
            	$this->load->model("productmodel");
            	$productdetails=$this->productmodel->productDetails($pro_id);
            
            	//print_r($productdetails);

            	$postdata['cart_id']=mt_rand(11111,23912312);
            	if(!empty($this->session->userdata('login_id'))){ 
            		$userid=$this->session->userdata('login_id');

            	}
            	else if(empty($this->session->userdata('userid'))){ 
            		$userid=mt_rand(11111,4232434);
            		$the_session = array("userid" => $userid);
            		$this->session->set_userdata($the_session);
            	}
            	else{
            		$userid=$this->session->userdata('userid'); 
            	}
            		
            	$postdata['user_id']=$userid;
            	$postdata['pro_name']=$productdetails->pro_name;
            	$postdata['pro_price']=$productdetails->selling_price;
            	$postdata['pro_totalprice']=$productdetails->selling_price*$postdata['pro_qty'];
            	$postdata['slug']=$productdetails->slug;
            	$postdata['pro_image']=$productdetails->pro_main_image;
            	$postdata['added_on	']=date("d m,Y");

            	$this->cartmodel->addtoCart($postdata);
            }
             $this->session->set_flashdata("sucessmessage","Cart updated successfully!!");
            
           redirect(base_url()."CartController/cart",'refresh');			
			
		}
		public function cart(){
			if(!empty($this->session->userdata('login_id'))){ 
        		$userid=$this->session->userdata('login_id');

        	}
        	else if(empty($this->session->userdata('userid'))){ 
        		$userid=mt_rand(11111,4232434);
        		$the_session = array("userid" => $userid);
        		$this->session->set_userdata($the_session);
        	}
        	else{
        		$userid=$this->session->userdata('userid'); 
        	}

			//$userid=$this->session->userdata('login_id'); 
			//$userid=$this->session->userdata('userid'); 

			$data['cartdetails']=$this->cartmodel->cartDetails($userid);
			$data['subtotal']=$this->cartmodel->getcartTotal($userid);

			if($data['subtotal']>499){
				$data['shipping_charge']=0.00;
			}
            else{
            	$data['shipping_charge']=40.00;
            }
            $data['total']=$data['subtotal']+$data['shipping_charge'];
            //	print_r($data);exit;

			$this->load->view("front_end/cart",$data);
		}	
		public function updateCart(){
			$this->load->model("productmodel");
			
            $postdata=$this->input->post();
        	$product=$postdata['product'];
        	$cart_id=$postdata['cart_id'];
        	$qty=$postdata['qty'];
        	for($i=0;$i<count($product);$i++){
        		$productdetails=$this->productmodel->productDetails($product[$i]);
        		
        		$totalprice=$productdetails->selling_price* $qty[$i];
        		$update = array('pro_qty' => $qty[$i],'pro_totalprice'=>$totalprice,'pro_price'=>$productdetails->selling_price);    
				

        		$array = array('pro_id' => $product[$i], 'cart_id' =>  $cart_id[$i]);
				$this->db->where($array);
				$this->db->update('ec_cart', $update); 

				//echo $this->db->last_query();exit;
			}
			
			$this->session->set_flashdata("sucessmessage","Cart updated successfully!!");
            
           redirect(base_url()."CartController/cart",'refresh');
			
		}
		public function deletefromCart($cartid,$pdtid){

			$array = array('pro_id' => $pdtid, 'cart_id' =>  $cartid);

			$this->db->where($array);
			$this->db->delete('ec_cart');
            	
			$this->session->set_flashdata("sucessmessage","Product removed from the cart!!");
            
           redirect(base_url()."CartController/cart",'refresh');
		
			
			
		}
	}

?>