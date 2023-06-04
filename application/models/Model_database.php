<?php
class Model_database extends CI_Model{
	function product() {
		$this->db->select('*')->from('asesoris');
		$query = $this->db->get();
		return $query->result();
	}
	
	function search_category( $name,  $id_cat ) {
		$this->db->select('*')->from('asesoris');
			if($name!=''){
				$this->db->like('nama_asesoris',$name);
			}else if($id_cat!=''){
				$this->db->where('id_kat_asesoris',$id_cat);
			}
		$query = $this->db->get();
		return $query->result();
		return true;
	}

	function get_transact($id) {
		$this->db->select('*')->from('transaksi');
		$this->db->where('order_id', $id);
		$this->db->join('det_transaksi', 'det_transaksi.id_transaksi = transaksi.id_transaksi');
		$query = $this->db->get();
		return $query->result();
		return true;
	}
	
	function single($product) {
		$this->db->select('*')->from('asesoris');
		$this->db->where('id_asesoris',$product);
		$query = $this->db->get();
		return $query->row();
	}
	
	function new_product($pict) {
		$name		=	$this->input->post('name');
		$desc		=	$this->input->post('desc');
		$price		=	$this->input->post('price');
		$brand		=	$this->input->post('brand');
		$stock		=	$this->input->post('stock');
		$id_cat		=	$this->input->post('id_cat');
		$pict		=	$pict['file_name'];
		
		$data = array(
			'nama_asesoris'		=>	$name,
			'diskripsi'			=>	$desc,
			'harga'				=>	$price,
			'merek'				=>	$brand,
			'stok'				=>	$stock,
			'id_kat_asesoris'	=>	$id_cat,
			'gambar'			=>	$pict
		);
		
		$this->db->insert('asesoris',$data);
		return true;
	}

	function add_cat(){
		$cat_name = $this->input->post('cat_name');
		$data = array(
			'nama_kategori'	=>	$cat_name);
		$this->db->insert('kat_asesoris',$data);
		return true;
	}
	
}