<?php
class Jabatan extends CI_Model {
	public function selectAll() {
		return $this->db->get('jabatan')->result();
	}
	public function add() {
		$nama = $this->input->post('nama');
		$status = "0";
		$data = array('nama' => $nama,'status' => $status);
		$this->db->insert('jabatan', $data);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id', $id);
		return $this->db->get('jabatan')->row();
	}
	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$data = array('nama' => $nama);
		$this->db->where('id', $id);
		$this->db->update('jabatan', $data);
	}
	public function change($id) {
		$cek1 = $this->db->get_where('jabatan', array('id' => $id))->row();
		$cek2 = $cek1->status;
		if($cek2 == 0) {
			$this->db->where('id', $id);
			$this->db->update('jabatan', array('status' => "1"));
		}else {
			$this->db->where('id', $id);
			$this->db->update('jabatan', array('status' => "0"));
		}
	}
	public function active(){
		$this->db->where('status', "1");
		return $this->db->get('jabatan')->result();
	}
}