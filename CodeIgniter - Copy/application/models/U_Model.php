<?php 
	class U_Model extends CI_Model
	{ 
		public function register_model($user) // User SaveData
		{
			$this->db->insert('users', $user);
		}

		public function CheckExitUser($email) // Check Exit Data user
		{
			$this->db->select('*');
			$this->db->from('users');			
			$this->db->where('email',$email);
			$query = $this->db->get();

			if ($query->num_rows() > 0){
				// return $query->result();
		        return true;
		    }
		    else{
		    	// return $query->result();
		        return false;
		    }
		}

		public function loginFunctionModel($email, $pass) // fetch data for login
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email',$email);
			$this->db->where('password',$pass);

			if ($query = $this->db->get()) 
			{ 
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}

		public function add_new($babyData) // Save Baby Data
		{
			$this->db->insert('baby', $babyData);
		}

		public function CheckExitData($name) // Check Exit Data baby
		{
			$this->db->select('*');
			$this->db->from('baby');			
			$this->db->where('name',$name);
			$query = $this->db->get();

			if ($query->num_rows() > 0){
				// return $query->result();
		        return true;
		    }
		    else{
		    	// return $query->result();
		        return false;
		    }
		}
 
	}
?>