<?php
class Login extends CI_model {
	function log() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array('username'=>$username, 'password'=>md5($password));
		$cek = $this->db->get_where('user', $data)->row();
		$cek1 = $this->db->get_where('user', $data)->num_rows();
		if($cek1 > 0) {
				$data_session = array( 'user_id' => $cek->id_user,
										'username' => $cek->username,
										'akses_id' => $cek->akses_id,
										'jabatan_id' => $cek->jabatan_id,
										'tingkatan_id' => $cek->tingkatan_id,
										'status' => "login" );
			$this->session->set_userdata($data_session);
		}
	}
}
