<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_database');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_user');
	}

	function index() {
		$data['main_view'] = 'forms';
		$this->load->view('template',$data);
	}
	
	function upload() {
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('pict')) {
			if($this->Model_database->new_product($this->upload->data()) == TRUE ) {
				$this->session->set_flashdata('notif',4);
				redirect('Forms');
			}else{
				$this->session->set_flashdata('notif',5);
				redirect('Forms');
			}
		}else{
			$this->session->set_flashdata('notif',5);
			redirect('Forms');
		}
	}
	
	function add_cat() {
		if($this->Model_database->add_cat() == true){
			$this->session->set_flashdata('notif',4);
			redirect('Forms');
		}else{
			$this->session->set_flashdata('notif',5);
			redirect('Forms');
		}
	}
}
