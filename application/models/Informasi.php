<?php
class Informasi extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
    return $this->db->get('informasi')->result();
  }
  public function add() {
		$status = "1";
		$informasi = $this->input->post('informasi');
		$data = array('informasi' => $informasi, 'status' => $status);
		$this->db->insert('informasi', $data);
		$this->db->insert_id();

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Informasi"." ".$informasi, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_informasi', $id);
		$this->db->update('informasi', array('status' => "0"));

		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_informasi', $id);
		$cek = $this->db->get('informasi')->row();
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete informasi"." ".$cek->informasi, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_informasi', $id);
		return $this->db->get('informasi')->row();
	}
	public function update(){
		$id = $this->input->post('id_informasi');
		$informasi = $this->input->post('informasi');
		$data = array('informasi' => $informasi);
		$this->db->where('id_informasi', $id);
		$this->db->update('informasi', $data);

		$supplier_id = $this->session->userdata('supplier_id');
		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Ubah Informasi"." ".$informasi, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
}
