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
		$this->load->model('Csv');
		$this->load->model('Notif');
		$this->load->model('Informasi');
		$this->perPage = 4;
	}
	public function index() {
		if($_POST==NULL) {
			date_default_timezone_set('Asia/Jakarta');
			$date = date("Y-m-d");
			$date1 = date ("Y-m-d", strtotime("-17 year", strtotime($date)));
			$data['date'] = $date1;
			$data['jabatan'] = $this->Jabatan->active();
			$data['informasi'] = $this->Informasi->selectAll();
			$data['data'] = array(
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
			$this->load->view('apply', $data);
		} else {
			$ceklagi = $this->Lamaran->add();
			if ($ceklagi == 0) {
				echo "<script>alert('Terima Kasih, Data Telah Kami Terima')
					  location.replace('')</script>";
			} else {
				echo "<script>alert('Anda Sudah Melamar')
					  location.replace('')</script>";
			}
		}
	}
	public function wa() {
		$wa = $this->input->post('wa', TRUE);
		if ($wa == "N") {
			$this->load->view('modal/wa');
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
	public function selectj1() {
		$data['c'] = $this->Jabatan->select();
		$c = $data['c']->extra;
		if ($c == 0) {
			$data['cek'] = "0";
		} else {
			$data['cek'] = "1";
		}
		$this->load->view('modal/apply1', $data);
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
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['pengirim'] = $this->Lamaran->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
		$data['keluar'] = $this->Lamaran->keluar();
		$data['lulus'] = $this->Lamaran->likel();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['likeno'] = $this->Lamaran->likeno();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $menu);
	}
	function ajaxPaginationData() {
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        //total rows count
        $totalRec = count($this->Notif->getRows());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
				$config['page']    = $page;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['posts'] = $this->Notif->getRows(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
        $this->load->view('modal/ajax-pagination-data', $data, false);
  }
	public function user() {
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$menu['akses'] = $this->Akses->selectAll();
		$menu['level'] = $this->Komentar->max();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
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
			$this->load->view('template/footer', $menu);
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
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$menu['akses'] = $this->Akses->selectAll();
		$menu['level'] = $this->Komentar->max();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
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
			$this->load->view('template/footer', $menu);
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
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d");
		$date1 = date ("Y-m-d", strtotime("-17 year", strtotime($date)));
		$data['date'] = $date1;
		$u = $this->uri->segment('2');
		if ($u != NULL) {
			$data['ur'] = $u;
		} else {
			$data['ur'] = 0;
		}
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['jabatan'] = $this->Jabatan->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('pengirim', $data);
		$this->load->view('template/footer', $menu);
	}
	public function hapus() {
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d");
		$date1 = date ("Y-m-d", strtotime("-17 year", strtotime($date)));
		$data['date'] = $date1;
		$u = $this->uri->segment('2');
		if ($u != NULL) {
			$data['ur'] = $u;
		} else {
			$data['ur'] = 0;
		}
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['jabatan'] = $this->Jabatan->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->selecttrash();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('hapus', $data);
		$this->load->view('template/footer', $menu);
	}
	public function ditolak() {
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d");
		$date1 = date ("Y-m-d", strtotime("-17 year", strtotime($date)));
		$data['date'] = $date1;
		$u = $this->uri->segment('2');
		if ($u != NULL) {
			$data['ur'] = $u;
		} else {
			$data['ur'] = 0;
		}
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['jabatan'] = $this->Jabatan->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['pengirim'] = $this->Lamaran->ditolak();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('ditolak', $data);
		$this->load->view('template/footer', $menu);
	}
	public function excel() {
		$data['pengirim'] = $this->Lamaran->excel();
		$this->load->view('modal/excel', $data);
	}
	public function addlamaran($id) {
		$data['id'] = $id;
		$data['jabatan'] = $this->Jabatan->active();
		$data['informasi'] = $this->Informasi->selectAll();
		$this->load->view('modal/addlamaran', $data);
	}
	public function addlamaran1() {
		$this->Lamaran->add();
	}
	public function editlamaran($id) {
		$data['pengirim'] = $this->Lamaran->select($id);
		$this->load->view('modal/editlamaran', $data);
	}
	public function updatelamaran() {
		$this->Lamaran->updatelamaran();
	}
	public function csv() {
		$this->load->view('modal/csv');
	}
	public function importcsv() {
		$this->Csv->import();
	}
	public function rate($id) {
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate',$data);
	}
	public function rate1($id) {
		$data['max'] = $this->Tingkatan->max();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate1',$data);
	}
	public function foto($id) {
		$data['max'] = $this->Tingkatan->max();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/foto',$data);
	}
	public function rate2($id) {
		$data['max'] = $this->Tingkatan->max();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate2',$data);
	}
	public function rate3($id) {
		$data['max'] = $this->Tingkatan->max();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate3',$data);
	}
	public function rate4($id) {
		$data['max'] = $this->Tingkatan->max();
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['rate'] = $this->Komentar->select($id);
		$this->load->view('modal/rate4',$data);
	}
	public function modalfoot($id) {
		$data['rate'] = $this->Komentar->select($id);
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$this->load->view('modal/simpan',$data);
	}
	public function modalfoot1($id) {
		$data['rate'] = $this->Komentar->select($id);
		$data['jabatan'] = $this->Jabatan->selectAll();
		$data['tingkatan'] = $this->Tingkatan->selectAll();
		$data['lamaran'] = $this->Lamaran->select($id);
		$this->load->view('modal/simpan1',$data);
	}
	public function addrate() {
		$this->Komentar->add();
	}
	public function ldelete($id) {
		$this->Lamaran->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ldelete1($id) {
		$this->Lamaran->delete1($id);
		echo json_encode(array("status" => TRUE));
	}
	public function akses() {
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $data['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$data['notif'] = $this->Notif->selectAll();
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
		$this->load->view('template/footer', $data);
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
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
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
		$this->load->view('template/footer', $menu);
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
	public function tingkat() {
			$data['ur'] = $this->uri->segment('2');
			$data['ke'] = $this->uri->segment('3');
			$id = $this->uri->segment('3');
			//total rows count
	    $totalRec = count($this->Notif->getRows());
			//pagination configuration
	    $config['target']      = '#postList';
	    $config['base_url']    = base_url().'ajaxPaginationData';
	    $config['total_rows']  = $totalRec;
	    $config['per_page']    = $this->perPage;
	    $this->ajax_pagination->initialize($config);
			//get the posts data
	    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
			$menu['level'] = $this->Komentar->max();
			$menu['akses'] = $this->Akses->selectAll();
			$menu['tingkatan'] = $this->Tingkatan->selectAll();
			$menu['notif'] = $this->Notif->selectAll();
			$data['max'] = $this->Tingkatan->max();
			$data['jabatan'] = $this->Jabatan->selectAll();
			$data['pengirim'] = $this->Lamaran->level($id);
			$data['tingkatan'] = $this->Tingkatan->select($id);
			$data['komentar'] = $this->Komentar->level($id);
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('level', $data);
			$this->load->view('template/footer', $menu);
	}
	public function karyawan() {
			$data['ur'] = $this->uri->segment('2');
			$id = $this->uri->segment('2');
			//total rows count
	    $totalRec = count($this->Notif->getRows());
			//pagination configuration
	    $config['target']      = '#postList';
	    $config['base_url']    = base_url().'ajaxPaginationData';
	    $config['total_rows']  = $totalRec;
	    $config['per_page']    = $this->perPage;
	    $this->ajax_pagination->initialize($config);
			//get the posts data
	    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
			$menu['level'] = $this->Komentar->max();
			$menu['akses'] = $this->Akses->selectAll();
			$menu['tingkatan'] = $this->Tingkatan->selectAll();
			$menu['notif'] = $this->Notif->selectAll();
			$data['max'] = $this->Tingkatan->max();
			$data['jabatan'] = $this->Jabatan->selectAll();
			$data['pengirim'] = $this->Lamaran->likel();
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('karyawan', $data);
			$this->load->view('template/footer', $menu);
	}
	public function kkeluar() {
			$data['ur'] = $this->uri->segment('2');
			$id = $this->uri->segment('2');
			//total rows count
	    $totalRec = count($this->Notif->getRows());
			//pagination configuration
	    $config['target']      = '#postList';
	    $config['base_url']    = base_url().'ajaxPaginationData';
	    $config['total_rows']  = $totalRec;
	    $config['per_page']    = $this->perPage;
	    $this->ajax_pagination->initialize($config);
			//get the posts data
	    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
			$menu['level'] = $this->Komentar->max();
			$menu['akses'] = $this->Akses->selectAll();
			$menu['tingkatan'] = $this->Tingkatan->selectAll();
			$menu['notif'] = $this->Notif->selectAll();
			$data['max'] = $this->Tingkatan->max();
			$data['jabatan'] = $this->Jabatan->selectAll();
			$data['pengirim'] = $this->Lamaran->keluar();
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('kkeluar', $data);
			$this->load->view('template/footer', $menu);
	}
		public function print($id) {
			$data['print'] = $this->Lamaran->select($id);
			$this->load->view('cv', $data);
		}
	public function tes() {
		$user_id = $this->session->userdata('user_id');
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['pengirim'] = $this->Lamaran->selectAll();
		$menu['komentar'] = $this->Komentar->selectAll();
		$menu['notif'] = $this->Komentar->notif();
		$a = array();
		foreach ($menu['notif'] as $key) {
			foreach ($menu['komentar'] as $keyk) {
				if ($key->lamaran_id == $keyk->lamaran_id) {
					if ($keyk->user_id != $user_id) {
						$a[]=$keyk->lamaran_id;
					}
				}
			}
		} $clear_array = array_unique($a); print_r($clear_array);
	}
	public function updatenotif() {
		$this->Notif->update();
	}
	public function updatenotif1() {
		$this->Notif->update1();
	}
	public function cekpass() {
		$data = $this->Login->cekpass();
		echo $data;
	}
	public function updatepass() {
		$this->User->updatepass();
	}
	public function informasi() {
		//total rows count
    $totalRec = count($this->Notif->getRows());
		//pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $this->ajax_pagination->initialize($config);
		//get the posts data
    $menu['posts'] = $this->Notif->getRows(array('limit'=>$this->perPage));
		$menu['level'] = $this->Komentar->max();
		$menu['akses'] = $this->Akses->selectAll();
		$menu['tingkatan'] = $this->Tingkatan->selectAll();
		$menu['notif'] = $this->Notif->selectAll();
		$data['informasi'] = $this->Informasi->selectAll();

		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if ($cek->akses == "informasi") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('informasi', $data);
		$this->load->view('template/footer', $menu);
	}else {
			redirect(base_url('home'));
		}
	}
	public function modalinf() {
		$data['cek'] = "1";
		$this->load->view('modal/informasi', $data);
	}
	public function infadd() {
		$this->Informasi->add();
		echo json_encode(array("status" => TRUE));
	}
	public function infedit($id) {
		$data['cek'] = "0";
		$data['informasi'] = $this->Informasi->edit($id);
		$this->load->view('modal/informasi', $data);
	}
	public function infdelete($id) {
		$this->Informasi->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function infupdate() {
		$this->Informasi->update();
		echo json_encode(array("status" => TRUE));
	}
	public function selectinf() {
		$cek = $this->input->post('informasi');
		if ($cek == "kosong") {
			$this->load->view('modal/inf');
		}
	}
	public function checkses() {
		$ses = $this->session->userdata('status');
		if ($ses != "login") {
			echo 0;
		} else {
			echo 1;
		}
	}
	public function bataltolak($id) {
		$this->Komentar->bataltolak($id);
	}
}
