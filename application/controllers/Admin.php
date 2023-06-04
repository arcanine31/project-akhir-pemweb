<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_database');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_user');
		$this->load->library('user_agent');
	}
}