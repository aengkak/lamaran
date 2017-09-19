<?php
class Tingkatan extends CI_model {
  public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
    $this->db->order_by("ke", "asc");
    return $this->db->get('tingkatan')->result();
  }
  public function add() {
    $status = "1";
		$nama_tingkatan = $this->input->post('nama_tingkatan');
    $ke = $this->input->post('ke');
		$data = array('nama_tingkatan' => $nama_tingkatan, 'ke' => $ke, 'status' => $status);
		$this->db->insert('tingkatan', $data);
		$this->db->insert_id();

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Tingkatan"." ".$nama_tingkatan, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
  }
  public function delete($id){
		$this->db->where('id_tingkatan', $id);
		$this->db->update('tingkatan', array('status' => "0"));

		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_tingkatan', $id);
		$cek = $this->db->get('tingkatan')->row();
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Tingkatan"." ".$cek->nama_tingkatan, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_tingkatan', $id);
		return $this->db->get('tingkatan')->row();
	}
	public function update(){
		$id = $this->input->post('id_tingkatan');
    $ke = $this->input->post('ke');
		$nama_tingkatan = $this->input->post('nama_tingkatan');
		$data = array('nama_tingkatan' => $nama_tingkatan, 'ke' => $ke);
		$this->db->where('id_tingkatan', $id);
		$this->db->update('tingkatan', $data);

		$supplier_id = $this->session->userdata('supplier_id');
		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Ubah Tingkatan"." ".$tingkatan, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
  public function max() {
		$this->db->select_max('ke');
		return $this->db->get('tingkatan')->row();
	}
  public function select($id){
		$this->db->where('ke', $id);
		return $this->db->get('tingkatan')->row();
	}
}
