<?php
class Komentar extends CI_Model {
	public function selectAll() {
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->join('user', 'komentar.user_id = user.id_user');
		$this->db->join('lamaran', 'komentar.lamaran_id = lamaran.id_lamaran');
		$this->db->order_by('id_komentar', 'desc');
		return $this->db->get()->result();
	}
	public function Add() {
    $user_id = $this->session->userdata('user_id');
    $lamaran_id = $this->input->post('lamaran_id');
	  $isi = $this->input->post('isi');
    $rate = $this->input->post('rate');
		$clulus = $this->input->post('clulus');
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


		$config['upload_path']   = './files/';
		$config['file_name'] = $lamaran->nama;
    $config['allowed_types'] = '*';
   	$config['max_size']      = 0;
   	$config['max_width']     = 0;
   	$config['max_height']    = 0;
   	$this->load->library('upload', $config);
         // script upload file pertama
				$this->upload->do_upload('file');
		 		$foto = $this->upload->data();
		 		$size = $foto['file_size'];
				$foto1 = $foto['file_name'];
		 		if ($size != NULL) {
		 			if ($lamaran->kepribadian != NULL) {
						unlink('files/'.$lamaran->kepribadian);
						$data1 = array('kepribadian' => $foto1);
						$this->db->where('id_lamaran', $lamaran_id);
						$this->db->update('lamaran', $data1);
		 			} else {
						$data1 = array('kepribadian' => $foto1);
						$this->db->where('id_lamaran', $lamaran_id);
						$this->db->update('lamaran', $data1);
		 			}
		 		}

		if ($isi != NULL) {
			if ($num == 0) {
				$sub = substr($rate,0,1);
				if ($rate != NULL) {
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
					$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
												'rate' => "C0", 'tgl_komen' => $date);
					$this->db->insert('komentar', $data);
					$this->db->insert_id();
				}

			} else {
				if ($rate == "Lulus") {
					$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
												'rate' => $rate, 'tgl_komen' => $date);
					$this->db->insert('komentar', $data);
					$this->db->insert_id();

					$data1 = array('tgl_diterima' => $date, 'level' => $rate);
					$this->db->where('id_lamaran', $lamaran_id);
					$this->db->update('lamaran', $data1);
				} elseif($rate == "Keluar") {
					$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
												'rate' => $rate, 'tgl_komen' => $date);
					$this->db->insert('komentar', $data);
					$this->db->insert_id();

					$data1 = array('tgl_diterima' => $date, 'level' => $rate);
					$this->db->where('id_lamaran', $lamaran_id);
					$this->db->update('lamaran', $data1);
				} else {
					if($clulus == "CLulus") {
						$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
													'rate' => $clulus, 'tgl_komen' => $date);
						$this->db->insert('komentar', $data);
						$this->db->insert_id();
					} else {
						$sub = substr($rate,0,1);
					if ($rate != NULL) {
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
					} else {
						$rate1 = $max->rate;
						$a = substr($rate1,1);
						$b = $a;
						$data = array('user_id' => $user_id, 'lamaran_id' => $lamaran_id, 'isi' => $isi,
													'rate' => "C".$b, 'tgl_komen' => $date);
						$this->db->insert('komentar', $data);
						$this->db->insert_id();
					}
					}
				}
			}
			$this->db->where('lamaran_id', $lamaran_id);
			$notif = $this->db->get('komentar')->result();
			if ($num != 0) {
				$userp = array();
				foreach ($notif as $keynotif) {
					if ($keynotif->user_id != $user_id) {
						$userp[] = $keynotif->user_id;
					}
				} $clear_array = array_unique($userp);
				foreach ($clear_array as $keyc => $valuec) {
					$datanotif = array('lamaran_id' => $lamaran_id, 'user_parent' => $valuec, 'user_comment' => $user_id, 'date' => $date, 'cek' => 0);
					$this->db->insert('notif', $datanotif);
					$this->db->insert_id();
				}
			}
			$datalog = array('user_id' => $user_id, 'ket' => "Mengomentari"." ".$lamaran->nama, 'waktu' => $waktu);
			$this->db->insert('log', $datalog);
			$this->db->insert_id();
		}

  }
	public function select($id) {
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
	public function notif(){
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->join('user', 'komentar.user_id = user.id_user');
		$this->db->join('lamaran', 'komentar.lamaran_id = lamaran.id_lamaran');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('id_komentar', 'desc');
		return $this->db->get()->result();
	}
}
