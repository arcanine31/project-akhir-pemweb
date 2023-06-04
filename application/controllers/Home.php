<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_database');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_user');
		$this->load->library('user_agent');
	}

	function index() { //FRONTPAGE
		$data['main_view'] = 'front';
		$data['product'] = $this->Model_database->product();
		$this->load->view('template',$data);
	}

	function login(){
		if($this->Model_user->checkuser() == TRUE) {
			$this->session->set_flashdata('notif',1);
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('notif',0);
			redirect($this->agent->referrer());
		}
	}
	
	function logout(){
		$data = array(
			'email'	=>$email,
			'loggedin'	=> FALSE
		);
		$this->session->sess_destroy();
		redirect($this->agent->referrer());
	}
	
	function register(){
		$data['main_view'] = 'register';
		$this->load->view('template',$data);
	}
	
	function register_process(){
		if($this->Model_user->adduser() == TRUE ) {
			$this->session->set_flashdata('notif',2);
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('notif',3);
			redirect($this->agent->referrer());
		}
	}
	
	function single() {
		$data['main_view'] = 'single';
		$product = $this->uri->segment(3);
		$data['single'] = $this->Model_database->single($product);
		$this->load->view('template',$data);
	}
	
	function cart() {
		if($this->session->userdata('loggedin') == true ) {
			$data['main_view'] = 'cart';
			$data['cart_list'] = $this->Model_transaksi->cart_list();
			$this->load->view('template',$data);
		}else{
			redirect('home/register');
		}
	}
	
	function add_to_cart() {
		if($this->session->userdata('loggedin') == true ) {
			$id = $this->uri->segment(3);
			$quantity = $this->uri->segment(4);
			$this->Model_transaksi->add_cart($id,$quantity);
			redirect(base_url());
		}else{
			redirect('home/register');
		}
	}
	
	function remove_cart(){
		$id_cart = $this->uri->segment(3);
		$id_pembeli = $this->uri->segment(4);
		$this->Model_transaksi->remove_cart($id_cart,$id_pembeli);
		redirect($this->agent->referrer());
	}
	
	function checkout() {
		if($this->session->userdata('loggedin') == true ) {
			$data['main_view'] = 'checkout';
			$data['price'] = $price = $this->uri->segment(3);
			$this->Model_transaksi->checkout();
			$data['transact'] = $this->Model_transaksi->transaksi_data();
			$this->load->view('template',$data);
		}else{
			redirect('home/register');
		}
	}

	function search() {
		$data['name'] = $name = $this->input->post('search');
		$data['id_cat'] = $id_cat = $this->input->post('cat');
		if(($this->Model_database->search_category($name, $id_cat)) == true ){
			$data['main_view'] = 'front';
			$data['product'] = $this->Model_database->search_category($name, $id_cat);
		}else if(($this->Model_database->get_transact($name)) == true ){
			$data['main_view'] = 'track';
			$data['track'] = $this->Model_database->get_transact($name);
		}else{
			$data['main_view'] = 'fail';
		}
		$this->load->view('template',$data);
	}

}