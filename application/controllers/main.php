<?php
class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('User');
		$this->load->model('Jabatan');
		$this->load->model('Lamaran');
		$this->load->model('Komentar');
		$this->load->model('Akses');
		$this->load->model('Tingkatan');
	}
	public function index() {
		if($_POST==NULL) {
			$data['jabatan'] = $this->Jabatan->active();
			$this->load->view('apply', $data);
		} else {
			$this->Lamaran->add();
			echo "<script>alert('Terima Kasih, Data Telah Kami Terima')
				  location.replace('')</script>";
		}
	}
	public function selectj() {
		$data['c'] = $this->Jabatan->select();
		$c = $data['c']->extra;
		if ($c == 0) {
			$data['cek'] = "0";
		} else {
			$data['cek'] = "1";
		}
		$this->load->view('modal/apply', $data);
	}
	public function login() {
		if($_POST==NULL) {
			$this->load->view('login');
		}else {
			$this->Login->log();
			$q = $this->session->userdata('status');
			if($q == 'login'){
				redirect('home');
			}else{
				echo "<script>alert('Username/Password salah')
				  location.replace('')</script>";
			}
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}
	public function home() {
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
	public function user() {
		$menu['akses'] = $this->Akses->selectAll();
		$menu['level'] = $this->Komentar->max();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['user'] = $this->User->selectAll();

		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if ($cek->akses == "user") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('user', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	public function datauser() {
		$data['user'] = $this->User->selectAll();
		$this->load->view('data/user',$data);
	}
	public function modaluser() {
		$data['akses'] = $this->Akses->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['cek'] = "1";
		$this->load->view('modal/user', $data);
	}
	public function useradd() {
		$this->User->add();
		echo json_encode(array("status" => TRUE));
	}
	public function useredit($id) {
		$data['user'] = $this->User->edit($id);
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['cek'] = "0";
		$data['akses'] = $this->Akses->selectAll();
		$this->load->view('modal/user', $data);
	}
	public function userdelete($id) {
		$this->User->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function userupdate() {
		$this->User->update();
		echo json_encode(array("status" => TRUE));
	}
	public function jabatan() {
		$menu['akses'] = $this->Akses->selectAll();
		$menu['level'] = $this->Komentar->max();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();

		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if ($cek->akses == "jabatan") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('jabatan', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	public function modalj() {
		$data['cek'] = "1";
		$this->load->view('modal/jabatan', $data);
	}
	public function jadd() {
		$this->Jabatan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function jedit($id) {
		$data['cek'] = "0";
		$data['jabatan'] = $this->Jabatan->edit($id);
		$this->load->view('modal/jabatan', $data);
	}
	public function jchange($id) {
		$this->Jabatan->change($id);
		echo json_encode(array("status" => TRUE));
	}
	public function jchange1($id) {
		$this->Jabatan->change1($id);
		echo json_encode(array("status" => TRUE));
	}
	public function jupdate() {
		$this->Jabatan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function lamaran() {
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->selectAll();$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('pengirim', $data);
		$this->load->view('template/footer');
	}
	public function addlamaran() {
		$data['jabatan'] = $this->Jabatan->active();
		$this->load->view('modal/addlamaran', $data);
	}
	public function addlamaran1() {
		$this->Lamaran->add();
	}
	public function rate($id) {
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate',$data);
	}
	public function rate1($id) {
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate1',$data);
	}
	public function modalfoot($id) {
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$this->load->view('modal/simpan',$data);
	}
	public function modalfoot1($id) {
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$this->load->view('modal/simpan1',$data);
	}
	public function addrate() {
		$this->Komentar->add();
	}
	public function ldelete($id) {
		echo json_encode(array("status" => TRUE));
		$this->Lamaran->delete($id);
	}
	public function akses() {
		$data['level'] = $this->Komentar->max();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['akses'] = $this->Akses->selectAll();

		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if ($cek->akses == "akses") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$this->load->view('template/header');
		$this->load->view('template/menu', $data);
		$this->load->view('akses', $data);
		$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	public function modalakses() {
		$data['cek'] = "1";
		$this->load->view('modal/akses', $data);
	}
	public function aksesadd() {
		$this->Akses->add();
		echo json_encode(array("status" => TRUE));
	}
	public function aksesedit($id) {
		$data['cek'] = "0";
		$data['akses'] = $this->Akses->edit($id);
		$this->load->view('modal/akses', $data);
	}
	public function aksesdelete($id) {
		$this->Akses->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function aksesupdate() {
		$this->Akses->update();
		echo json_encode(array("status" => TRUE));
	}
	public function tingkatan() {
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();

		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if ($cek->akses == "tingkatan") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('tingkatan', $data);
		$this->load->view('template/footer');
	}else {
			redirect(base_url('home'));
		}
	}
	public function modalt() {
		$data['cek'] = "1";
		$data['max'] = $this->Tingkatan->max();
		$this->load->view('modal/tingkatan', $data);
	}
	public function tadd() {
		$this->Tingkatan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function tedit($id) {
		$data['cek'] = "0";
		$data['tingkatan'] = $this->Tingkatan->edit($id);
		$this->load->view('modal/tingkatan', $data);
	}
	public function tdelete($id) {
		$this->Tingkatan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function tupdate() {
		$this->Tingkatan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function tingkat($id) {
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->level($id);
		$data['tingkatan'] = $this->Tingkatan->select($id);
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('level', $data);
		$this->load->view('template/footer');
	}
	/*public function downfoto($id) {
		$data = $this->Lamaran->select($id);
		$foto = $data->foto;
		force_download('files/'.$foto,NULL);
	}
	public function downcv($id) {
		$data = $this->Lamaran->select($id);
		$cv = $data->cv;
		force_download('files/'.$cv,NULL);
	}
	public function downktp($id) {
		$data = $this->Lamaran->select($id);
		$ktp = $data->ktp;
		force_download('files/'.$ktp,NULL);
	}*/
}
