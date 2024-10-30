<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CategoryModel extends CI_Model {
		
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
		public function loadallCategories(){
			$array = ['status' => 1];
			$query = $this->db->where($array)->select('cat_id, cat_name')->get('ec_category');
			if($query->num_rows()){
				return $query->result();
			}
			else
				return false;

		}
		public function getSubCategory($cat_id){
			$array = ['status' => 1, 'parent_id' => $cat_id];
			$query = $this->db->where($array)->select('cat_id, cat_name')->get('ec_category');
			if($query->num_rows()){
				return $query->result();
			}
			else
				return false;

		}		

	}

?>
