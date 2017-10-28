<?php
class User extends CI_Model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		return $this->db->get('user')->result();
	}
	public function add() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		$jabatan_id = $this->input->post('jabatan_id');
		$tingkatan_id = $this->input->post('tingkatan_id');
		$res = implode(",",$akses_id);
		$res1 = implode(",",$jabatan_id);
		$res2 = implode(",",$tingkatan_id);
		$status = "1";
		$data = array('username' => $username,'password' => md5($password), 'akses_id' => $res, 'jabatan_id' => $res1, 'tingkatan_id' => $res2, 'status' => $status);
		$this->db->insert('user', $data);
		$this->db->insert_id();

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah User"." ".$username, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_user', $id);
		$cek = $this->db->get('user')->row();

		$this->db->where('id_user', $id);
		$this->db->update('user', array('status' => "0"));

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete User"." ".$cek->username, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}
	public function update(){
		$id = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		$jabatan_id = $this->input->post('jabatan_id');
		$tingkatan_id = $this->input->post('tingkatan_id');
		$res = implode(",",$akses_id);
		$res1 = implode(",",$jabatan_id);
		$res2 = implode(",",$tingkatan_id);
		$user_id = $this->session->userdata('user_id');
		if ($password == NULL) {
			$data = array('username' => $username, 'akses_id' => $res, 'jabatan_id' => $res1, 'tingkatan_id' => $res2);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		} else {
			$data = array('username' => $username,'password' => md5($password), 'akses_id' => $res, 'jabatan_id' => $res1, 'tingkatan_id' => $res2);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		}
		if ($user_id == $id) {
			$this->session->set_userdata('akses_id', $res);
		}
		if ($user_id == $id) {
			$this->session->set_userdata('jabatan_id', $res1);
		}
		if ($user_id == $id) {
			$this->session->set_userdata('tingkatan_id', $res2);
		}

		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Ubah User"." ".$username, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function updatepass() {
		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('baru', TRUE);
		$data = array('password' => md5($password));
		$this->db->where('id_user', $user_id);
		$this->db->update('user', $data);
	}
}
