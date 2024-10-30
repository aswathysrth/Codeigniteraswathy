<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CartModel extends CI_Model {
		
		public function addtoCart($insertdata){
			
			$q=$this->db->insert('ec_cart',$insertdata);
		
			if($q)
				return true;
			else
				return false;
		}	
		public function cartDetails($user_id){
			$this->db->select('*');
			$this->db->from('ec_cart');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			if($query->num_rows()){
				return $query->result();
			}
			else
				return false;
		}	
		public function getcartTotal($user_id){
			$totalWeight = "SELECT sum(	pro_totalprice) as total FROM ec_cart where user_id=$user_id GROUP BY user_id ";
    		$result = $this->db->query($totalWeight);
    		if($result->num_rows())
    		return $result->row()->total;
    		else
    			return false;
		
		}	

	}

?>
