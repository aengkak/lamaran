<?php
class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('login');
		$this->load->model('user');
		$this->load->model('jabatan');
		$this->load->model('lamaran');
	}
	public function index() {
		if($_POST==NULL) {
			$data['jabatan'] = $this->jabatan->active();
			$this->load->view('apply', $data);
		} else {
			$this->lamaran->add();
			echo "<script>alert('Berhasil')
				  location.replace('')</script>";
		}
	}
	public function login() {
		if($_POST==NULL) {
			$this->load->view('login');
		}else {
			$this->login->log();
			$q = $this->session->userdata('status');
			if($q == 'login'){
				redirect('home');
			}else{
				echo "<script>alert('Username/Password salah')
				  location.replace('home')</script>";
			}
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}
	public function home() {
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('home');
		$this->load->view('template/footer');
	}
	public function user() {
			$data['user'] = $this->user->selectAll();
			$this->load->view('template/header');
			$this->load->view('template/menu');
			$this->load->view('user', $data);
			$this->load->view('template/footer');
		
	}
	public function datauser() {
					$data['user'] = $this->user->selectAll();
					$this->load->view('data/user',$data);
	}
	public function useradd() {
		$this->user->add();
		echo json_encode(array("status" => TRUE));
	}
	public function useredit($id) {
		$data = $this->user->edit($id);
		echo json_encode($data);
	}
	public function userdelete($id) {
		$this->user->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function userupdate() {
		$this->user->update();
		echo json_encode(array("status" => TRUE));
	}
	public function jabatan() {
		$data['jabatan'] = $this->jabatan->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('jabatan', $data);
		$this->load->view('template/footer');
	}
	public function jadd() {
		$this->jabatan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function jedit($id) {
		$data = $this->jabatan->edit($id);
		echo json_encode($data);
	}
	public function jchange($id) {
		$this->jabatan->change($id);
		echo json_encode(array("status" => TRUE));
	}
	public function jupdate() {
		$this->jabatan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function pengirim() {
		$data['pengirim'] = $this->lamaran->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('pengirim', $data);
		$this->load->view('template/footer');
	}
	public function view($id) {	
		$data['lamaran'] = $this->lamaran->select($id);
		$this->load->view('view',$data);
	}
	public function ldelete($id) {
		$this->lamaran->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function downfoto($id) {
		$data = $this->lamaran->select($id);
		$foto = $data->foto;
		force_download('files/'.$foto,NULL);
	}
	public function downcv($id) {
		$data = $this->lamaran->select($id);
		$cv = $data->cv;
		force_download('files/'.$cv,NULL);
	}
	public function downktp($id) {
		$data = $this->lamaran->select($id);
		$ktp = $data->ktp;
		force_download('files/'.$ktp,NULL);
	}  
}