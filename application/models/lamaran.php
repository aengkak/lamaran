<?php
class Lamaran extends CI_Model {
	public function selectAll() {
		return $this->db->get('lamaran')->result();
	}
	public function add() {
		$no_identitas = $this->input->post('no_identitas');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_telp = $this->input->post('no_telp');
		$no_wa = $this->input->post('no_wa');
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');

		$config['upload_path']   = './files/'; 
         $config['allowed_types'] = '*';
         $config['max_size']      = 1024; 
         $config['max_width']     = 1366; 
         $config['max_height']    = 1366;  
         $this->load->library('upload', $config);
         // script upload file pertama
         $this->upload->do_upload('foto');
         $foto = $this->upload->data();
         $foto1 = $foto['file_name'];
         
         // script uplaod file kedua
         $this->upload->do_upload('cv');
         $cv = $this->upload->data();
         $cv1 = $cv['file_name'];
         // script uplaod file kedua
         $this->upload->do_upload('ktp');
         $ktp = $this->upload->data();
         $ktp1 = $ktp['file_name'];

		$data = array('no_identitas' => $no_identitas,'nama' => $nama, 'alamat' => $alamat,
						'tgl_lahir' => $tgl_lahir, 'no_telp' => $no_telp, 'no_wa' => $no_wa,
						'email' => $email, 'jabatan' => $jabatan, 'foto' => $foto1, 'cv' => $cv1, 'ktp' => $ktp1);
		$this->db->insert('lamaran', $data);
		$this->db->insert_id();
	}
	public function select($id){
		$this->db->where('id', $id);
		return $this->db->get('lamaran')->row();
	}
	public function delete($id){
		$this->db->where('id', $id);
		$cek = $this->db->get('lamaran')->row();
		$foto = $cek->foto;
		$cv = $cek->cv;
		$ktp = $cek->ktp;
		unlink('files/'.$foto);
		unlink('files/'.$cv);
		unlink('files/'.$ktp);
		$this->db->delete('lamaran', array('id' => $id));
	}
}