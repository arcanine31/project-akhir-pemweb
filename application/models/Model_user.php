<?php
class Model_user extends CI_Model{
	function checkuser(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$query = $this->db->where('email', $email)
						  ->where('password', $password)
						  ->get ('pembeli');
						  
		if($query->num_rows()>0) {
			$query = $query->row();
			$data = array(
				'id_pembeli'	=>	$query->id_pembeli,
				'email'			=>	$email,
				'loggedin'		=>	TRUE
			);
			$this->session->set_userdata($data);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function adduser(){
		$email			= $this->input->post('email');
		$password		= $this->input->post('password');
		$name			= $this->input->post('name');
		$address		= $this->input->post('address');
		$province		= $this->input->post('province');
		$city			= $this->input->post('city');
		$phone			= $this->input->post('phone');
		
		$data = array(
			'nama_pembeli'	=> $name,
			'alamat'		=> $address,
			'telp'			=> $phone,
			'kota'			=> $city,
			'provinsi'		=> $province,
			'email'			=> $email,
			'password'		=> $password
		);
		
		$this->db->insert('pembeli',$data);
		return true;
	}
}