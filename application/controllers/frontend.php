<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Frontend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('frontend_m','front');
    }

    function index() {
        $data['slider'] = $this->front->getslider();
        $data['speakers'] = $this->front->getspeaker();
        $data['workshops'] = $this->front->getworkshop();
        $data['blog'] = $this->front->getblog();
        $data['eventday'] = $this->front->geteventday();
        $data['about'] = $this->front->getjenisevent();
        $data['gamedesc'] = $this->front->getgamedesc();
        $data['sponsor1'] = $this->front->getsponsor1();
        $data['sponsor2'] = $this->front->getsponsor2();
        $data['sponsor3'] = $this->front->getsponsor3();
        $data['game'] = $this->front->getgame();
        $data['bazaar'] = $this->front->getbazaar();
        $data['aboutdesc'] = $this->front->getaboutdesc();
		if($this->session->userdata('isLoginPeserta')) {
			$id = $this->session->userdata('id_user');
			$data['akun'] = $this->front->ambilakun($id);
			$data['seminar'] = $this->front->getseminar();
			$data['game'] = $this->front->getgame();
			$data['gamesaya'] = $this->front->getgamesaya($id);
			$data['seminarsaya'] = $this->front->getseminarsaya($id);
			$data['prokomsaya'] = $this->front->getprokomsaya($id);
			$data['jenisevent'] = $this->front->getjenisevent();
		}
		$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
		$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
		$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
        $this->load->view('frontend/main',$data);
    }
	public function tambahprokom(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul Project', 'required');
		$this->form_validation->set_rules('nama_ketua', 'Nama Ketua', 'required');
		$this->form_validation->set_rules('anggota_1', 'Nama Anggota 1', 'required');
		$this->form_validation->set_rules('anggota_2', 'Nama Anggota 2', 'required');
		$this->form_validation->set_rules('anggota_3', 'Nama Desainer', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "1");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			if($this->front->tambahprokom())
			{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "2");
				$this->load->view('frontend/main',$data);
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "1");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function tambahseminar(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_seminar', 'Seminar', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "3");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			if($this->front->tambahseminar())
			{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "4");
				$this->load->view('frontend/main',$data);
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "3");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function tambahgame(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_game', 'Game', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "5");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			if($this->front->tambahgame())
			{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "6");
				$this->load->view('frontend/main',$data);
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "5");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function tambahuser(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_peserta.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password]|min_length[8]');
		if ($this->form_validation->run() == FALSE)
		{
			$data['speakers'] = $this->front->getspeaker();
			$data['workshops'] = $this->front->getworkshop();
			$data['blog'] = $this->front->getblog();
			$data['eventday'] = $this->front->geteventday();
			$data['about'] = $this->front->getjenisevent();
			$data['sponsor1'] = $this->front->getsponsor1();
			$data['sponsor2'] = $this->front->getsponsor2();
			$data['sponsor3'] = $this->front->getsponsor3();
			$data['sponsor3'] = $this->front->getsponsor3();
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1");
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			if($this->front->tambahuser())
			{
				$data['speakers'] = $this->front->getspeaker();
				$data['workshops'] = $this->front->getworkshop();
				$data['blog'] = $this->front->getblog();
				$data['eventday'] = $this->front->geteventday();
				$data['about'] = $this->front->getjenisevent();
				$data['sponsor1'] = $this->front->getsponsor1();
				$data['sponsor2'] = $this->front->getsponsor2();
				$data['sponsor3'] = $this->front->getsponsor3();
				$data['sponsor3'] = $this->front->getsponsor3();
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2");
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
			else{
				$data['speakers'] = $this->front->getspeaker();
				$data['workshops'] = $this->front->getworkshop();
				$data['blog'] = $this->front->getblog();
				$data['eventday'] = $this->front->geteventday();
				$data['about'] = $this->front->getjenisevent();
				$data['sponsor1'] = $this->front->getsponsor1();
				$data['sponsor2'] = $this->front->getsponsor2();
				$data['sponsor3'] = $this->front->getsponsor3();
				$data['sponsor3'] = $this->front->getsponsor3();
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1");
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");				
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function konfirmasi_bayar(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required');
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "1");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			$allowedExts = array("jpg", "jpeg", "gif", "png", "pdf");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaGambar = date("YmdHis").".".$extension;
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
				move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/bukti_transfer/" . $namaGambar);
				if($this->frontend_m->konfirmasi_bayar($namaGambar))
				{
					if($this->session->userdata('isLoginPeserta')) {
						$id = $this->session->userdata('id_user');
						$data['akun'] = $this->front->ambilakun($id);
						$data['seminar'] = $this->front->getseminar();
						$data['game'] = $this->front->getgame();
						$data['gamesaya'] = $this->front->getgamesaya($id);
						$data['seminarsaya'] = $this->front->getseminarsaya($id);
						$data['prokomsaya'] = $this->front->getprokomsaya($id);
						$data['jenisevent'] = $this->front->getjenisevent();
					}
					else
						redirect('frontend/index');
					$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "2");
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");				
					$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
					$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
					$this->load->view('frontend/main',$data);
				}
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();	
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "3");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");				
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function konfirmasi_project(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul Project', 'required');
		$this->form_validation->set_rules('nama_ketua', 'Nama Ketua', 'required');
		$this->form_validation->set_rules('anggota_1', 'Nama Anggota 1', 'required');
		$this->form_validation->set_rules('anggota_2', 'Nama Anggota 2', 'required');
		$this->form_validation->set_rules('anggota_3', 'Nama Desainer', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "4");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			$allowedExts = array("doc", "pdf","docx","zip","rar");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaProject = date("YmdHis").".".$extension;
			if (($_FILES["file"]["size"] < 100000000)&& in_array($extension, $allowedExts)){
				move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/project/" . $namaProject);
				if($this->frontend_m->konfirmasi_project($namaProject))
				{
					if($this->session->userdata('isLoginPeserta')) {
						$id = $this->session->userdata('id_user');
						$data['akun'] = $this->front->ambilakun($id);
						$data['seminar'] = $this->front->getseminar();
						$data['game'] = $this->front->getgame();
						$data['gamesaya'] = $this->front->getgamesaya($id);
						$data['seminarsaya'] = $this->front->getseminarsaya($id);
						$data['prokomsaya'] = $this->front->getprokomsaya($id);
						$data['jenisevent'] = $this->front->getjenisevent();
					}
					else
						redirect('frontend/index');
					$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "5");
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");					
					$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
					$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
					$this->load->view('frontend/main',$data);
				}
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "6");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");				
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	public function ubahakun(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		if($this->input->post('password')!=""){
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password]|min_length[8]');
		}
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('isLoginPeserta')) {
				$id = $this->session->userdata('id_user');
				$data['akun'] = $this->front->ambilakun($id);
				$data['seminar'] = $this->front->getseminar();
				$data['game'] = $this->front->getgame();
				$data['gamesaya'] = $this->front->getgamesaya($id);
				$data['seminarsaya'] = $this->front->getseminarsaya($id);
				$data['prokomsaya'] = $this->front->getprokomsaya($id);
				$data['jenisevent'] = $this->front->getjenisevent();
			}
			else
				redirect('frontend/index');
			$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
			$data['konfirmasi_akun'] = array('konfirmasi_akun' => "1");
			$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
			$this->load->view('frontend/main',$data);
		}
		else
		{
			if($this->front->ubahakun())
			{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "2");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
			else{
				if($this->session->userdata('isLoginPeserta')) {
					$id = $this->session->userdata('id_user');
					$data['akun'] = $this->front->ambilakun($id);
					$data['seminar'] = $this->front->getseminar();
					$data['game'] = $this->front->getgame();
					$data['gamesaya'] = $this->front->getgamesaya($id);
					$data['seminarsaya'] = $this->front->getseminarsaya($id);
					$data['prokomsaya'] = $this->front->getprokomsaya($id);
					$data['jenisevent'] = $this->front->getjenisevent();
				}
				else
					redirect('frontend/index');
				$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0");
				$data['konfirmasi_akun'] = array('konfirmasi_akun' => "3");
				$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
				$this->load->view('frontend/main',$data);
			}
		}
	}
	function loginuser() {
		$username = $this->input->post('username');
		$pass = md5($this->input->post('password'));
		$data['data_user'] = $this->frontend_m->ambil_user($username,$pass);
		foreach($data['data_user']->result() as $a)
		{
				$b = $a->username;
				$c = $a->password;
				$d = $a->firstname;
				$e = $a->lastname;
				$id = $a->id_peserta;
				if(($username==$b)&&($pass==$c))
				{
					$session_data = array
					(
						'username' => $b,
						'password' => $c,
						'firstname' => $d,
						'lastname' => $e,
						'id_user' => $id,
						'isLoginPeserta' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect("frontend/index");
				}
		}
		$data['speakers'] = $this->front->getspeaker();
		$data['workshops'] = $this->front->getworkshop();
		$data['blog'] = $this->front->getblog();
		$data['eventday'] = $this->front->geteventday();
		$data['about'] = $this->front->getjenisevent();
		$data['sponsor1'] = $this->front->getsponsor1();
		$data['sponsor2'] = $this->front->getsponsor2();
		$data['sponsor3'] = $this->front->getsponsor3();
		$data['sponsor3'] = $this->front->getsponsor3();
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3");
		$data['konfirmasi_bayar'] = array('konfirmasi_bayar' => "0");		
		$data['konfirmasi_akun'] = array('konfirmasi_akun' => "0");
		$data['konfirmasi_daftar'] = array('konfirmasi_daftar' => "0");
		$this->load->view('frontend/main',$data);
    }
	function logout(){
		if(!$this->session->userdata('isLoginPeserta'))
			redirect('frontend/index');
		$this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('firstname');
        $this->session->unset_userdata('lastname');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('isLoginPeserta');
        session_destroy();
        redirect('frontend/index');
	}
	function error(){
		redirect('frontend/index');
	}
	function tiket($id,$event){
		$data['tiket'] = $this->front->gettiket($id,$event);
		$data['jenis'] = array('jenis' => $event);
		$this->load->view('frontend/tiket',$data);
	}
}
?>