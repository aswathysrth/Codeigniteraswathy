<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SettingsModel extends CI_Model {
		
		public function addPincode($insertdata){
			
			$insertdata['pin_id']=mt_rand(111111,3343434);
			$q=$this->db->insert('ec_pincode',$insertdata);
		
			if($q)
				return true;
			else
				return false;
		}
		public function addBanner($insertdata){
			
			$insertdata['ban_id']=mt_rand(111111,3343434);
			$insertdata['ban_addedon']=date('d M,Y');
			$q=$this->db->insert('ec_banner',$insertdata);
		
			if($q)
				return true;
			else
				return false;
		}	
			
		
	}

?>
