<?php
class Akses extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by("akses", "asc");
    return $this->db->get('akses')->result();
  }
  public function add() {
		$status = "1";
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses, 'status' => $status);
		$this->db->insert('akses', $data);
		$this->db->insert_id();

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Akses"." ".$akses, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_akses', $id);
		$this->db->update('akses', array('status' => "0"));

		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_akses', $id);
		$cek = $this->db->get('akses')->row();
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Akses"." ".$cek->akses, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_akses', $id);
		return $this->db->get('akses')->row();
	}
	public function update(){
		$id = $this->input->post('id_akses');
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses);
		$this->db->where('id_akses', $id);
		$this->db->update('akses', $data);

		$supplier_id = $this->session->userdata('supplier_id');
		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Ubah Akses"." ".$akses, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function cek($value){
		$this->db->where('id_akses', $value);
		return $this->db->get('akses')->row();
	}
}
