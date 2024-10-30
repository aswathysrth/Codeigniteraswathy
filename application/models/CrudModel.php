<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CrudModel extends CI_Model {
		public function addData($data){
			if($this->db->insert('register',$data)){
				return true;
			}
			else
				return false;
		}	
		public function viewData($id=''){
			if($id){

				// $sql="Select * from my_table where 1";    
			    // $query = $this->db->query($sql);
			    // return $query->result_array();
				$query = $this->db->where('Id', $id)->get('register');
				if($query->num_rows()){
					return $query->row();
				}
				else
					return false;
			}
			else{
				$query = $this->db->order_by('Id')->get('register');
				if($query->num_rows()){
					return $query->result();
				}
				else
					return false;
			}	
		}	
		public function updateData($data,$id){

			$this->db->set($data);
			$this->db->where('Id',$id);
			if($this->db->update('register')){
				return true;
			}
			else
				return false;
		}	
		public function deleteData($id){

			$this->db->where('Id', $id);
			if($this->db->delete('register')){
				return true;
			}
			else
				return false;
		}	
	}

?>
