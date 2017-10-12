<?php
class Lamaran extends CI_Model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function selecttrash() {
		$status = "0";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function add() {
		$user_id = $this->session->userdata('user_id');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$gender = $this->input->post('gender');
		$agama = $this->input->post('agama');
		$al = $this->input->post('alamat');
		if ($al == NULL) {
			$alamat = NULL;
		} else {
			$alamat = $al;
		}
		$kota = $this->input->post('kota');
		$pendidikan = $this->input->post('pendidikan');
		$no_telp = $this->input->post('no_telp');
		$wa = $this->input->post('wa');
		if ($wa == "Y") {
			$no_wa = $this->input->post('no_telp');
		} elseif ($wa == "N") {
			$no_wa = $this->input->post('no_wa');
		} else {
			$no_wa = 0;
		}
		$em = $this->input->post('email');
		if ($em == NULL) {
			$email = NULL;
		} else {
			$email = $em;
		}
		$jabatan_id = $this->input->post('jabatan_id');
		$ket = $this->input->post('ket');
		$level = $this->input->post('level');
		$status = "1";
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');

		/*$this->db->like('nama', $nama);
		$this->db->like('tgl_lahir', $tgl_lahir);
		$num = $this->db->get('lamaran')->num_rows();*/

		$config['upload_path']   = './files/';
		$config['file_name'] = $nama;
    $config['allowed_types'] = '*';
    $config['max_size']      = 0;
    $config['max_width']     = 0;
    $config['max_height']    = 0;
    $this->load->library('upload', $config);
         // script upload file pertama
         $this->upload->do_upload('foto');
         $foto = $this->upload->data();
				 $size = $foto['file_size'];
				 if ($size == NULL) {
				 		$foto1 = NULL;
				 } else {
				 	$foto1 = $foto['file_name'];
				 }
         // script uplaod file
         $this->upload->do_upload('cv');
         $cv = $this->upload->data();
				 $size1 = $cv['file_size'];
				 if ($size1 == NULL) {
				 		$cv1 = NULL;
				 } else {
				 	$cv1 = $cv['file_name'];
				 }
         // script uplaod file
         $this->upload->do_upload('ktp');
         $ktp = $this->upload->data();
				 $size2 = $ktp['file_size'];
				 if ($size2 == NULL) {
				 		$ktp1 = NULL;
				 } else {
				 	$ktp1 = $ktp['file_name'];
				 }

				 /*if ($num == 0) {*/
					if ($level == NULL) {
						if ($_FILES['dll']['size']['0'] == 0) {
  						$data = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender,
  						 							'agama' => $agama, 'alamat' => $alamat, 'kota' => $kota ,'pendidikan' => $pendidikan,
  													 'no_telp' => $no_telp, 'no_wa' => $no_wa,'email' => $email,
  													 'jabatan_id' => $jabatan_id, 'foto' => $foto1, 'cv' => $cv1, 'ktp' => $ktp1,
 													 'ket' => $ket, 'tgl' => $date, 'level' => "0", 'status' => $status);
  						$this->db->insert('lamaran', $data);
  						$this->db->insert_id();
  					} else {
 							$dll = $_FILES['dll'];
 							$u = $this->upload->do_multi_upload('dll');
 							foreach ($u as $key => $value) {
 								$a[] = $value['file_name'];
 							}$res = implode(",",$a);

  						$data = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender,
  						 							'agama' => $agama, 'alamat' => $alamat, 'kota' => $kota, 'pendidikan' => $pendidikan,
  													 'no_telp' => $no_telp, 'no_wa' => $no_wa,'email' => $email,
  													 'jabatan_id' => $jabatan_id, 'foto' => $foto1, 'cv' => $cv1, 'ktp' => $ktp1, 'dll' => $res,
 													 'ket' => $ket,'tgl' => $date, 'level' => "0", 'status' => $status);
  						$this->db->insert('lamaran', $data);
  						$this->db->insert_id();
  					}
					} else {
						if ($_FILES['dll']['size']['0'] == 0) {
  						$data = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender,
  						 							'agama' => $agama, 'alamat' => $alamat, 'kota' => $kota ,'pendidikan' => $pendidikan,
  													 'no_telp' => $no_telp, 'no_wa' => $no_wa,'email' => $email,
  													 'jabatan_id' => $jabatan_id, 'foto' => $foto1, 'cv' => $cv1, 'ktp' => $ktp1,
 													 'ket' => $ket, 'tgl' => $date, 'level' => $level, 'status' => $status);
  						$this->db->insert('lamaran', $data);
  						$next = $this->db->insert_id();
							$data1 = array('user_id' => $user_id, 'lamaran_id' => $next, 'isi' => "Manual",
					                  'rate' => $level, 'tgl_komen' => $date);
							$this->db->insert('komentar', $data1);
							$this->db->insert_id();
  					} else {
 							$dll = $_FILES['dll'];
 							$u = $this->upload->do_multi_upload('dll');
 							foreach ($u as $key => $value) {
 								$a[] = $value['file_name'];
 							}$res = implode(",",$a);

  						$data = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender,
  						 							'agama' => $agama, 'alamat' => $alamat, 'kota' => $kota, 'pendidikan' => $pendidikan,
  													 'no_telp' => $no_telp, 'no_wa' => $no_wa,'email' => $email,
  													 'jabatan_id' => $jabatan_id, 'foto' => $foto1, 'cv' => $cv1, 'ktp' => $ktp1, 'dll' => $res,
 													 'ket' => $ket,'tgl' => $date, 'level' => $level, 'status' => $status);
  						$this->db->insert('lamaran', $data);
							$next = $this->db->insert_id();
							$data1 = array('user_id' => $user_id, 'lamaran_id' => $next, 'isi' => "Manual",
					                  'rate' => $level, 'tgl_komen' => $date);
							$this->db->insert('komentar', $data1);
							$this->db->insert_id();
  					}
					}
		 		/*} else {
		 			echo "error";
		 		}*/
	}
	public function select($id){
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('id_lamaran', $id);
		return $this->db->get()->row();
	}
	public function delete($id){
		$this->db->where('id_lamaran', $id);
		$this->db->update('lamaran', array('status' => "0"));

		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_lamaran', $id);
		$cek = $this->db->get('lamaran')->row();
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete lamaran"." ".$cek->nama, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete1($id){
		$this->db->where('id_lamaran', $id);
		$this->db->update('lamaran', array('status' => "1"));

		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_lamaran', $id);
		$cek = $this->db->get('lamaran')->row();
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "Cancel Delete lamaran"." ".$cek->nama, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function filter($value1) {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->where('lamaran.jabatan_id', $value1);
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function level($id) {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->like('lamaran.level', $id);
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function excel() {
		$id = $this->input->post('id_lamaran');
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where_in('lamaran.id_lamaran', $id);
		return $this->db->get()->result();
	}
	public function likeno() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->like('lamaran.level', "N");
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function likel() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->where('lamaran.level', "Lulus");
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function keluar() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('lamaran');
		$this->db->join('jabatan', 'lamaran.jabatan_id = jabatan.id_jabatan');
		$this->db->where('lamaran.status', $status);
		$this->db->where('lamaran.level', "Keluar");
		$this->db->order_by("id_lamaran", "desc");
    return $this->db->get()->result();
	}
	public function updatelamaran() {
		$id_lamaran = $this->input->post('id_lamaran');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$gender = $this->input->post('gender');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$pendidikan = $this->input->post('pendidikan');
		$no_telp = $this->input->post('no_telp');
		$no_wa = $this->input->post('no_wa');
		$email = $this->input->post('email');
		$tgl_diterima = $this->input->post('tgl_diterima');
		$mulai = $this->input->post('mulai');

		$config['upload_path']   = './files/';
		$config['file_name'] = $nama;
    $config['allowed_types'] = '*';
    $config['max_size']      = 0;
    $config['max_width']     = 0;
    $config['max_height']    = 0;
    $this->load->library('upload', $config);
         // script upload file pertama
         $this->upload->do_upload('foto');
         $foto = $this->upload->data();
				 $size = $foto['file_size'];
				 if ($size == NULL) {
				 		$foto1 = NULL;
				 } else {
				 	$foto1 = $foto['file_name'];
				 }
		if ($foto1 == NULL) {
			$data1 = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender, 'agama' => $agama,
										'alamat' => $alamat, 'kota' => $kota, 'pendidikan' => $pendidikan, 'no_telp' => $no_telp,
										'no_wa' => $no_wa, 'email' => $email, 'mulai' => $mulai);
			$this->db->where('id_lamaran', $id_lamaran);
			$this->db->update('lamaran', $data1);
		} else {
			$this->db->where('id_lamaran', $id_lamaran);
			$file = $this->db->get('lamaran')->row();
			unlink('files/'.$file->foto);
			$data1 = array('nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'gender' => $gender, 'agama' => $agama,
										'alamat' => $alamat, 'kota' => $kota, 'pendidikan' => $pendidikan, 'no_telp' => $no_telp,
										'no_wa' => $no_wa, 'email' => $email, 'foto' => $foto1, 'mulai' => $mulai);
			$this->db->where('id_lamaran', $id_lamaran);
			$this->db->update('lamaran', $data1);
		}

		$user_id = $this->session->userdata('user_id');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$datalog = array('user_id' => $user_id, 'ket' => "update Karyawan"." ".$nama, 'waktu' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();

	}
}
