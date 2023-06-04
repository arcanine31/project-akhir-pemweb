<?php
class Model_transaksi extends CI_Model{
	function cart_list() {
		$this->db->select('*')->from('cart');
		$this->db->join('asesoris', 'asesoris.id_asesoris = cart.id_asesoris');
		$query = $this->db->get();
		return $query->result();
	}
	
	function add_cart($id,$quantity){
		$id_pembeli = $this->session->userdata('id_pembeli');
		$data = array(
			'id_pembeli'	=>	$id_pembeli,
			'id_asesoris'	=>	$id,
			'jumlah'		=>	$quantity
		);
		$this->db->insert('cart',$data);
	}
	
	function remove_cart($id_cart,$id_pembeli){
		$this->db->where('id_cart',$id_cart);
		$this->db->where('id_pembeli',$id_pembeli);
		$this->db->delete('cart');
	}
	
	function transaksi_data(){
		$id = $this->session->userdata('id_pembeli');
		$this->db->select('*')->from('transaksi');
		$this->db->where('id_pembeli',$id);
		$this->db->join('det_transaksi', 'det_transaksi.id_transaksi = transaksi.id_transaksi');
		$query = $this->db->get();
		return $query->row();
	}
	
	function checkout(){
		$id_pembeli = $this->session->userdata('id_pembeli');
		$cart = $this->db->where('id_pembeli',$id_pembeli)
					->join('asesoris', 'asesoris.id_asesoris = cart.id_asesoris')
					->get('cart');
		$order_id = $this->verf_id();
		
		$transaksi = array (
				'id_pembeli'	=> $id_pembeli,
				'tgl_transaksi'	=> date('Y-m-d'),
				'id_verifikator'=> '2',
				'order_id'		=> $order_id
		);
		$this->db->insert('transaksi',$transaksi);
		$lastID = $this->db->insert_id();
		
		foreach($cart->result() as $cart){
			$fp = $cart->harga;
			$q = $cart->jumlah;
			$price = ($fp-($fp/10))*$q;
			$check = array (
				'id_transaksi'	=> $lastID,
				'jumlah_barang'	=> $cart->jumlah,
				'total_harga'	=> $price,
				'id_asesoris'	=> $cart->id_asesoris,
			);
			$this->db->insert('det_transaksi',$check);
		}
	}
	
	function verf_id($maxlength = 8) {
		$chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
						"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
		$return_str = "";
		for ( $x=0; $x<=$maxlength; $x++ ) {
			$return_str .= $chary[rand(0, count($chary)-1)];
		}
		return $return_str;
	}
}