<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormModel extends CI_Model {
	public function insertData($data){
		
		$insertdata['Name']=$data['username'];
		$insertdata['Pass']=$data['password'];
		$insertdata['Email']=$data['email'];
		$insertdata['Image']=$data['image'];

		$this->db->insert('data',$insertdata);
	}	
}

?>
