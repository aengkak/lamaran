<?php
class Komentar extends CI_Model {
	public function Add() {
    $user_id = $this->session->userdata('user_id');
    $lamaran_id = $this->input->post('lamaran_id');
		$isi = $this->input->post('isi');
    $rate = $this->input->post('rate');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		$user_id = $this->session->userdata('user_id');
		$waktu = date('Y-m-d H:i:s');

		$this->db->where('lamaran_id', $lamaran_id);
		$cek = $this->db->get('komentar')->row();
		$num = $this->db->get('komentar')->num_rows();

		$this->db->select_max('rate');
		$this->db->where('lamaran_id', $lamaran_id);
		$max = $this->db->get('komentar')->row();

		$this->db->where('id_lamaran', $lamaran_id);
		$lamaran = $this->db->get('lamaran')->row();

		if ($num == 0) {
			$sub = substr($rate,0,1);
			if ($sub == "Y") {
				$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
		                  'rate' => $rate."1", 'tgl_komen' => $date);
				$this->db->insert('komentar', $data);
				$this->db->insert_id();

				$data1 = array('level' => $rate."1");
				$this->db->where('id_lamaran', $lamaran_id);
				$this->db->update('lamaran', $data1);
			} else {
				$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
		                  'rate' => $rate."0", 'tgl_komen' => $date);
				$this->db->insert('komentar', $data);
				$this->db->insert_id();

				$data1 = array('level' => $rate."1");
				$this->db->where('id_lamaran', $lamaran_id);
				$this->db->update('lamaran', $data1);
			}
		} else {
			$sub = substr($rate,0,1);
			if ($sub == "Y") {
				$rate1 = $max->rate;
				$a = substr($rate1,1);
				$b = $a + "1";
				$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
		                  'rate' => $rate.$b, 'tgl_komen' => $date);
				$this->db->insert('komentar', $data);
				$this->db->insert_id();

				$data1 = array('level' => $rate.$b);
				$this->db->where('id_lamaran', $lamaran_id);
				$this->db->update('lamaran', $data1);
			} else {
				$rate1 = $max->rate;
				$a = substr($rate1,1);
				$b = $a;
				$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
		                  'rate' => $rate.$b, 'tgl_komen' => $date);
				$this->db->insert('komentar', $data);
				$this->db->insert_id();

				$data1 = array('level' => $rate.$b);
				$this->db->where('id_lamaran', $lamaran_id);
				$this->db->update('lamaran', $data1);
			}
		}
		$datalog = array('user_id' => $user_id, 'ket' => "Mengomentari"." ".$lamaran->nama, 'waktu' => $waktu);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
  }
	public function select($id){
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->join('user', 'komentar.user_id = user.id_user');
		$this->db->where('lamaran_id', $id);
		$this->db->order_by('id_komentar', 'asc');
		return $this->db->get()->result();
	}
	public function max() {
		$this->db->select_max('rate');
		return $this->db->get('komentar')->row();
	}
}
