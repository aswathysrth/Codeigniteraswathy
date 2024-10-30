<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RegisterModel extends CI_Model {
		
		public function createUser($insertdata){
			
			
			$q=$this->db->insert('ec_users',$insertdata);
		
			if($q)
				return true;
			else
				return false;
		}	
		

	}

?>
