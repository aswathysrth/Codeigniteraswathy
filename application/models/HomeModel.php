<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
	
	public function hai($name=""){
		$val['name']='Hai '.$name;
		return $val;
	}
	
	public function loaddata(){
		// $query=$this->db->query("select * from data");
		 $query=$this->db->get("data");
		 echo $query->num_rows();
		 echo $query->num_fields();
		return $query->result();
	}
	public function loadBanner(){
			
		$q=$this->db->where("ban_status",1)->get("ec_banner");
		if($q->num_rows()){
			return $q->result();
		}
		else
			return false;
	}	
	public function loadCategory(){
		$q=$this->db->where("status",1)->get("ec_category");
		if($q->num_rows()){
			return $q->result();
		}
		else
			return false;
	}	
	public function loadparentCategory(){
		$filterarray=array("status"=>1,"parent_id"=>0);
		$q=$this->db->where("status",1)->get("ec_category");
		if($q->num_rows()){
			return $q->result();
		}
		else
			return false;
	}	
	public function loadProducts(){
		$this->db->select('pro_main_image,pro_name,MRP,selling_price,slug,cat_name');
		$this->db->from('ec_product');
		$this->db->join('ec_category', 'ec_product.category = ec_category.cat_id');
		$query = $this->db->get();
		if($query->num_rows()){
			return $query->result();
		}
		else
			return false;
	}	
	public function productDetails($slug=""){
		$this->db->select('ec_product.*,cat_name');
		$this->db->from('ec_product');
		$this->db->join('ec_category', 'ec_product.category = ec_category.cat_id');
		$this->db->where('slug',$slug);
		$query = $this->db->get();
		if($query->num_rows()){
			return $query->row();
		}
		else
			return false;
	}	
}	

?>