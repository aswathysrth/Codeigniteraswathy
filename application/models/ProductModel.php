<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ProductModel extends CI_Model {
		
		public function addCategory($insertdata){
			
			$insertdata['cat_id']=mt_rand(111111,3343434);
			$insertdata['added_on']=date('d M, Y');
			$q=$this->db->insert('ec_category',$insertdata);
		
			if($q)
				return true;
			else
				return false;
		}	
		public function loadparentCategory(){
			$array = ['status' => 1, 'parent_id' => 0];
			$query = $this->db->where($array)->select('cat_id, cat_name')->get('ec_category');
			if($query->num_rows()){
				return $query->result();
			}
			else
				return false;

		}	
		public function addProduct($data){
			if($this->db->insert('ec_product',$data)){
				return true;
			}
			else
				return false;
		}	
		public function productDetails($pro_id){
			$this->db->select('ec_product.*');
			$this->db->from('ec_product');
			$this->db->where('pro_id',$pro_id);
			$query = $this->db->get();
			if($query->num_rows()){
				return $query->row();
			}
			else
				return false;
		}	

	}

?>
