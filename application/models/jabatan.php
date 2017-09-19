<?php
class Jabatan extends CI_Model {
	public function selectAll() {
		return $this->db->get('jabatan')->result();
	}
	public function add() {
		$nama_jabatan = $this->input->post('nama_jabatan');
		$extra = "0";
		$status = "1";
		$data = array('nama_jabatan' => $nama_jabatan, 'extra' => $extra,'status' => $status);
		$this->db->insert('jabatan', $data);
		$this->db->insert_id();

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Jabatan"." ".$nama_jabatan, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_jabatan', $id);
		return $this->db->get('jabatan')->row();
	}
	public function update(){
		$id = $this->input->post('id_jabatan');
		$nama_jabatan = $this->input->post('nama_jabatan');
		$data = array('nama_jabatan' => $nama_jabatan);
		$this->db->where('id_jabatan', $id);
		$this->db->update('jabatan', $data);

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Ubah Jabatan"." ".$nama_jabatan, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function change($id) {
		$cek1 = $this->db->get_where('jabatan', array('id_jabatan' => $id))->row();
		$cek2 = $cek1->status;
		$nama_jabatan = $cek1->nama_jabatan;
		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		if($cek2 == 0) {
			$this->db->where('id_jabatan', $id);
			$this->db->update('jabatan', array('status' => "1"));

			$datalog = array('user_id' => $user_id, 'ket' => "Ubah Status"." ".$nama_jabatan." "."ke aktif", 'waktu' => $date);
			$this->db->insert('log', $datalog);
			$this->db->insert_id();
		}else {
			$this->db->where('id_jabatan', $id);
			$this->db->update('jabatan', array('status' => "0"));

			$datalog = array('user_id' => $user_id, 'ket' => "Ubah Status"." ".$nama_jabatan." "."ke nonaktif", 'waktu' => $date);
			$this->db->insert('log', $datalog);
			$this->db->insert_id();
		}
	}
	public function change1($id) {
		$cek1 = $this->db->get_where('jabatan', array('id_jabatan' => $id))->row();
		$cek2 = $cek1->extra;
		$nama_jabatan = $cek1->nama_jabatan;
		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		if($cek2 == 0) {
			$this->db->where('id_jabatan', $id);
			$this->db->update('jabatan', array('extra' => "1"));

			$datalog = array('user_id' => $user_id, 'ket' => "Ubah Status tambahan"." ".$nama_jabatan." "."ke aktif", 'waktu' => $date);
			$this->db->insert('log', $datalog);
			$this->db->insert_id();
		}else {
			$this->db->where('id_jabatan', $id);
			$this->db->update('jabatan', array('extra' => "0"));

			$datalog = array('user_id' => $user_id, 'ket' => "Ubah Status tambahan"." ".$nama_jabatan." "."ke nonaktif", 'waktu' => $date);
			$this->db->insert('log', $datalog);
			$this->db->insert_id();
		}
	}
	public function active(){
		$this->db->where('status', "1");
		return $this->db->get('jabatan')->result();
	}
	public function select() {
		$id = $this->input->post('jabatan_id');
		$this->db->where('id_jabatan', $id);
		return $this->db->get('jabatan')->row();
	}
}
