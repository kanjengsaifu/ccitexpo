<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Backend extends CI_Controller {

	function __construct(){
   		parent::__construct();
   		$this->load->library('image_lib');
		$this->load->model('backend_m','back');
	}

	function index()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->beranda();
	}

	function beranda(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->template->load('backend/template','backend/beranda');
	}
	function logout(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('isLogin');
        session_destroy();
        redirect('backend/index');
	}
	function login($status){
		$data['status'] = array('status' => $status); //0 : kosong, 1: gagal
		$this->load->view('backend/login',$data);
	}
	function cobaLogin() {
		$username = $this->input->post('username');
		$pass = md5($this->input->post('password'));
		$data['data_user'] = $this->backend_m->ambil_user($username,$pass);
		foreach($data['data_user']->result() as $a)
		{
				$b = $a->username;
				$c = $a->password;
				$d = $a->level;
				$e = $a->nama;
				$f = $a->foto;
				$id = $a->id_admin;
				if(($username==$b)&&($pass==$c))
				{
					$session_data = array
					(
						'username' => $b,
						'password' => $c,
						'level' => $d,
						'nama' => $e,
						'foto' => $f,
						'id_user' => $id,
						'isLogin' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect("backend/index");
				}
		}
		redirect("backend/login/1");
    }
	function error(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->template->load('backend/template','backend/error');
	}
	
	public function kelolaadmin(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['admin'] = $this->backend_m->get_admin();
		$this->template->load('backend/template','backend/admin',$data);
	}
	public function kelolaevent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['event'] = $this->backend_m->get_event();
		$this->template->load('backend/template','backend/event',$data);
	}
	public function kelolajenisevent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['event'] = $this->backend_m->get_jenisevent();
		$this->template->load('backend/template','backend/jenisevent',$data);
	}
	public function kelolarundown(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['event'] = $this->backend_m->get_rundown();
		$this->template->load('backend/template','backend/rundown',$data);
	}
	public function kelolaslide(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['slide'] = $this->backend_m->get_slide();
		$this->template->load('backend/template','backend/slide',$data);
	}
	public function kelolagame(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahgame',$data);
	}
	public function kelolasponsor(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahsponsor',$data);
	}
	public function datapeserta(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['peserta'] = $this->backend_m->get_peserta();
		$this->template->load('backend/template','backend/peserta',$data);
	}
	public function pesertaKategori($kat){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['peserta'] = $this->backend_m->get_peserta_by_kategori($kat);
		$data['posisi'] = array('posisi' => $kat); //1  gagal
		$this->template->load('backend/template','backend/pesertaKategori',$data);
	}
	function listgame()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konten'] = $this->back->getallgame();
		$this->template->load('backend/template','backend/listgame',$data);
	}
	function listsponsor()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['sponsor'] = $this->back->get_sponsor();
		$this->template->load('backend/template','backend/sponsor',$data);
	}
	public function detailpeserta($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['peserta'] = $this->backend_m->get_peserta_id($id);
		$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
		$data['game'] = $this->backend_m->get_peserta_game($id);
		$data['proyek'] = $this->backend_m->get_peserta_proyek($id);
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/detailpeserta',$data);
	}
	public function kelolapesertaseminar($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
		$this->template->load('backend/template','backend/pesertaseminar',$data);
	}
	public function kelolapesertagame($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['game'] = $this->backend_m->get_peserta_seminar($id);
		$this->template->load('backend/template','backend/pesertagame',$data);
	}
	public function sudahbayar($jenis,$idactivity,$idPeserta){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		if($this->backend_m->sudahbayar($jenis,$idactivity))
		{
			redirect('backend/detailpeserta/'.$idPeserta);
		}
	}
	public function editAdmin($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['admin'] = $this->backend_m->get_admin_id($id);
		$this->template->load('backend/template','backend/editadmin',$data);
	}
	public function editSponsor($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['sponsor'] = $this->backend_m->get_sponsor_id($id);
		$this->template->load('backend/template','backend/editsponsor',$data);
	}
	
	public function editevent($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['event'] = $this->backend_m->get_event_id($id);
		$this->template->load('backend/template','backend/editevent',$data);
	}
	public function editjenisevent($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['event'] = $this->backend_m->get_jenisevent_id($id);
		$this->template->load('backend/template','backend/editjenisevent',$data);
	}
	public function editGame($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['game'] = $this->backend_m->get_game_id($id);
		$this->template->load('backend/template','backend/editgame',$data);
	}
	public function editSlide($id){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$data['slide'] = $this->backend_m->get_slide_id($id);
		$this->template->load('backend/template','backend/editSlide',$data);
	}
	function deleteAdmin($id,$foto)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper('file');
		$hapus_gambar =  APPPATH.'../uploads/foto_admin/'.$foto;
		unlink($hapus_gambar);
		$this->back->deleteadmin($id);
		$this->kelolaadmin();
	}
	function deleteSponsor($id,$foto)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper('file');
		$hapus_gambar =  APPPATH.'../assets/gambar_blog/sponsors/'.$foto;
		unlink($hapus_gambar);
		$this->back->deletesponsor($id);
		$this->kelolasponsor();
	}
	function deleteslide($id,$slide)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper('file');
		$hapus_gambar =  APPPATH.'../uploads/slide/'.$slide;
		unlink($hapus_gambar);
		$this->back->deleteslide($id);
		$this->kelolaslide();
	}
	function deletegame($id,$foto)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper('file');
		$hapus_gambar =  APPPATH.'../uploads/game/'.$foto;
		unlink($hapus_gambar);
		$this->back->deletegame($id);
		$this->listgame();
	}
	
	function deleteevent($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deleteevent($id);
		$this->kelolaevent();
	}
	public function tambahadmin(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahadmin',$data);
	}
	public function tambahevent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahevent',$data);
	}
	public function tambahjenisevent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahjenisevent',$data);
	}
	public function tambahrundown(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['event'] = $this->backend_m->get_event();
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambaheventday',$data);
	}
	public function tambahslide(){
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "0"); //1  gagal
		$this->template->load('backend/template','backend/tambahslide',$data);
	}
	public function generateqrcode($jenis,$idActivity,$idPeserta)
	{
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$qrcode = md5(date("YmdHis").$idPeserta).".png";
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = $qrcode;
		$params['level'] = 'H';
		$params['size'] = 6;
		$params['savename'] = FCPATH.'/uploads/barcode/'.$qrcode;
		$this->ciqrcode->generate($params);
		if($this->backend_m->ubahqrcode($jenis,$idActivity,$qrcode))
		{
			redirect('backend/detailpeserta/'.$idPeserta);
		}
	}
	
	public function ubahDataSlide()
	{
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$bool1 = false;
		$id_slide = $this->input->post('id_slide');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'isi', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['slide'] = $this->backend_m->get_slide_id($id_slide);
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/editslide',$data);
		}
		else
		{
			if($this->input->post("aktifasi")=="cek")
			{
				$bool1 = true;
			}
			if($bool1) //jika upload foto
			{
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$extension = end(explode(".", $_FILES["file"]["name"]));
				$namaGambar = date("YmdHis").".".$extension;
				if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
					if ($_FILES["file"]["error"] > 0){
						$data['slide'] = $this->backend_m->get_slide_id($id_slide);
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
						$this->template->load('backend/template','backend/editslide',$data);	
					}
					else{
						if (file_exists("uploads/slide/" . $namaGambar)){
							$data['slide'] = $this->backend_m->get_slide_id($id_slide);
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //1  gagal
							$this->template->load('backend/template','backend/editslide',$data);
						}
						else{
							move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/slide/" . $namaGambar);
							//Hapus File Lama
							$this->load->helper('file');
							$foto_tmp = $this->input->post('id_gambar_tmp');
							$hapus_gambar =  APPPATH.'../uploads/slide/'.$foto_tmp;
							unlink($hapus_gambar);
							if($this->backend_m->ubah_slide_foto($namaGambar))
							{
								$data['slide'] = $this->backend_m->get_slide_id($id_slide);
								$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 Berhasil
								$this->template->load('backend/template','backend/editslide',$data);
							}
						}
					}
				}
				else{
					$data['slide'] = $this->backend_m->get_slide_id($id_slide);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
					$this->template->load('backend/template','backend/editslide',$data);
				}
			}
			else //jika tidak upload foto
			{
				if($this->backend_m->ubah_slide())
				{
					$data['slide'] = $this->backend_m->get_slide_id($id_slide);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 Berhasil
					$this->template->load('backend/template','backend/editslide',$data);
				}
			}
		}
	}
	public function ubahDataGame()
	{
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$bool1 = false;
		$id_game = $this->input->post('id_game');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_akhir', 'Jam Akhir', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('longtitude', 'Longtitude', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('harga_pendaftaran', 'Harga Pendaftaran', 'required|numeric');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$data['game'] = $this->backend_m->get_game_id($id_game);
			$this->template->load('backend/template','backend/editgame',$data);
		}
		else
		{
			if($this->input->post("aktifasi")=="cek")
			{
				$bool1 = true;
			}
			if($bool1) //jika upload foto
			{
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$extension = end(explode(".", $_FILES["file"]["name"]));
				$namaGambar = date("YmdHis").".".$extension;
				if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
					if ($_FILES["file"]["error"] > 0){
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
						$data['game'] = $this->backend_m->get_game_id($id_game);
						$this->template->load('backend/template','backend/editgame',$data);	
					}
					else{
						if (file_exists("uploads/game/" . $namaGambar)){
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
							$data['game'] = $this->backend_m->get_game_id($id_game);
							$this->template->load('backend/template','backend/editgame',$data);
						}
						else{
							move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/game/" . $namaGambar);
							//Hapus File Lama
							$this->load->helper('file');
							$foto_tmp = $this->input->post('id_gambar_tmp');
							$hapus_gambar =  APPPATH.'../uploads/game/'.$foto_tmp;
							unlink($hapus_gambar);
							if($this->backend_m->ubah_game_foto($namaGambar))
							{
								$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
								$data['game'] = $this->backend_m->get_game_id($id_game);
								$this->template->load('backend/template','backend/editgame',$data);
							}
							else
							{
								$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
								$data['game'] = $this->backend_m->get_game_id($id_game);
								$this->template->load('backend/template','backend/editgame',$data);
							}
						}
					}
				}
				else{
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
					$data['game'] = $this->backend_m->get_game_id($id_game);
					$this->template->load('backend/template','backend/editgame',$data);
				}
			}
			else //jika tidak upload foto
			{
				if($this->backend_m->ubah_game())
				{
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
					$data['game'] = $this->backend_m->get_game_id($id_game);
					$this->template->load('backend/template','backend/editgame',$data);
				}
			}
		}
	}
	public function tambahDataSlide(){
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'isi', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambahslide',$data);
		}
		else
		{
			$allowedExts = array("jpg", "jpeg", "gif", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaGambar = date("YmdHis").".".$extension;
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
				if ($_FILES["file"]["error"] > 0){
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //3  gagal
					$this->template->load('backend/template','backend/tambahslide',$data);	
				}
				else{
					if (file_exists("uploads/slide/" . $namaGambar)){
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //4  gagal
						$this->template->load('backend/template','backend/tambahslide',$data);
					}
					else{
						move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/slide/" . $namaGambar);
						if($this->backend_m->tambah_slide($namaGambar))
						{
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 berhasil
							$this->template->load('backend/template','backend/tambahslide',$data);
						}
					}
				}
			}
			else{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //3  gagal
				$this->template->load('backend/template','backend/tambahslide',$data);
			}
		}
	}
	public function tambahDataGame(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'required');
		$this->form_validation->set_rules('tanggal_akhir', 'tanggal_akhir', 'required');
		$this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
		$this->form_validation->set_rules('jam_akhir', 'jam_akhir', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('longtitude', 'longtitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('harga_pendaftaran', 'harga_pendaftaran', 'required|numeric');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambahgame',$data);
		}
		else
		{
			$allowedExts = array("jpg", "jpeg", "gif", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaGambar = date("YmdHis").".".$extension;
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
				if ($_FILES["file"]["error"] > 0){
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
					$this->template->load('backend/template','backend/tambahgame',$data);	
				}
				else{
					if (file_exists("uploads/game/" . $namaGambar)){
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //1  gagal
						$this->template->load('backend/template','backend/tambahgame',$data);
					}
					else{
						move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/game/" . $namaGambar);
						if($this->backend_m->tambah_game($namaGambar))
						{
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
							$this->template->load('backend/template','backend/tambahgame',$data);
						}
					}
				}
			}
			else{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
				$this->template->load('backend/template','backend/tambahgame',$data);
			}
		}
	}
	public function tambahDataEvent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambahevent',$data);
		}
		else
		{
			if($this->backend_m->tambah_event())
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
				$this->template->load('backend/template','backend/tambahevent',$data);
			}
			else
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
				$this->template->load('backend/template','backend/tambahevent',$data);
			}
		}
	}
	public function tambahDataEventDay(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('id_eventday', 'Event Day', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['event'] = $this->backend_m->get_event();
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambaheventday',$data);
		}
		else
		{
			if($this->backend_m->tambah_eventday())
			{
				$data['event'] = $this->backend_m->get_event();
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
				$this->template->load('backend/template','backend/tambaheventday',$data);
			}
			else
			{
				$data['event'] = $this->backend_m->get_event();
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
				$this->template->load('backend/template','backend/tambaheventday',$data);
			}
		}
	}
	public function ubahDataEvent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$id = $this->input->post('id_event');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$data['event'] = $this->backend_m->get_event_id($id);
			$this->template->load('backend/template','backend/editevent',$data);
		}
		else
		{
			if($this->backend_m->ubah_event())
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
				$data['event'] = $this->backend_m->get_event_id($id);
				$this->template->load('backend/template','backend/editevent',$data);
			}
			else
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
				$data['event'] = $this->backend_m->get_event_id($id);
				$this->template->load('backend/template','backend/editevent',$data);
			}
		}
	}
	public function ubahDataJenisEvent(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$id = $this->input->post('id_jenisevent');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('deskripsi_panjang', 'Deskripsi Panjang', 'required');
		$this->form_validation->set_rules('cara_bayar', 'Cara Bayar', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$data['event'] = $this->backend_m->get_jenisevent_id($id);
			$this->template->load('backend/template','backend/editjenisevent',$data);
		}
		else
		{
			if($this->backend_m->ubah_jenisevent())
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
				$data['event'] = $this->backend_m->get_jenisevent_id($id);
				$this->template->load('backend/template','backend/editjenisevent',$data);
			}
			else
			{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
				$data['event'] = $this->backend_m->get_jenisevent_id($id);
				$this->template->load('backend/template','backend/editjenisevent',$data);
			}
		}
	}
	public function tambahDataAdmin(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password]|min_length[8]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambahadmin',$data);
		}
		else
		{
			$allowedExts = array("jpg", "jpeg", "gif", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaGambar = date("YmdHis").".".$extension;
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
				if ($_FILES["file"]["error"] > 0){
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //3  gagal
					$this->template->load('backend/template','backend/tambahadmin',$data);	
				}
				else{
					if (file_exists("uploads/foto_admin/" . $namaGambar)){
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //4  gagal
						$this->template->load('backend/template','backend/tambahadmin',$data);
					}
					else{
						move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/foto_admin/" . $namaGambar);
						if($this->backend_m->tambah_admin($namaGambar))
						{
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 berhasil
							$this->template->load('backend/template','backend/tambahadmin',$data);
						}
					}
				}
			}
			else{
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //3  gagal
				$this->template->load('backend/template','backend/tambahadmin',$data);
			}
		}
	}
	public function tambahDataSponsor(){
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_sponsor', 'nama_sponsor', 'required');
		$this->form_validation->set_rules('link_sponsor', 'link_sponsor', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/tambahsponsor',$data);
		}
		else
		{
			$allowedExts = array("jpg", "jpeg", "gif", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$namaGambar = date("YmdHis").".".$extension;
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
				if ($_FILES["file"]["error"] > 0){
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
					$this->template->load('backend/template','backend/tambahsponsor',$data);
				}
				else{
					if (file_exists("assets/gambar_blog/sponsors/" . $namaGambar)){
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //1  gagal
						$this->template->load('backend/template','backend/tambahsponsor',$data);
					}
					else{
						move_uploaded_file($_FILES["file"]["tmp_name"],"assets/gambar_blog/sponsors/" . $namaGambar);
						if($this->backend_m->tambah_sponsor($namaGambar))
						{
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
							$this->template->load('backend/template','backend/tambahsponsor',$data);
						}
					}
				}
			}
			else{
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
							$this->template->load('backend/template','backend/tambahsponsor',$data);
			}
		}
	}
	public function ubahDataAdmin()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$bool1 = false;
		$bool2 = false;
		$id_admin = $this->input->post('id_admin');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if($this->input->post("aktifasi2")=="cek") {
			$bool2 = true;
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password]|min_length[8]');
		}
		if ($this->form_validation->run() == FALSE)
		{
			$data['admin'] = $this->backend_m->get_admin_id($id_admin);
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
			$this->template->load('backend/template','backend/editadmin',$data);
		}
		else
		{
			if($this->input->post("aktifasi")=="cek")
			{
				$bool1 = true;
			}
			if($bool1) //jika upload foto
			{
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$extension = end(explode(".", $_FILES["file"]["name"]));
				$namaGambar = date("YmdHis").".".$extension;
				if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 50000000)&& in_array($extension, $allowedExts)){
					if ($_FILES["file"]["error"] > 0){
						$data['admin'] = $this->backend_m->get_admin_id($id_admin);
						$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
						$this->template->load('backend/template','backend/editadmin',$data);	
					}
					else{
						if (file_exists("uploads/foto_admin/" . $namaGambar)){
							$data['admin'] = $this->backend_m->get_admin_id($id_admin);
							$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "4"); //1  gagal
							$this->template->load('backend/template','backend/editadmin',$data);
						}
						else{
							move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/foto_admin/" . $namaGambar);
							//Hapus File Lama
							$this->load->helper('file');
							$foto_tmp = $this->input->post('id_foto_tmp');
							$hapus_gambar =  APPPATH.'../uploads/foto_admin/'.$foto_tmp;
							unlink($hapus_gambar);
							if($this->backend_m->ubah_admin_foto($namaGambar,$bool2))
							{
								$data['admin'] = $this->backend_m->get_admin_id($id_admin);
								$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 Berhasil
								$this->template->load('backend/template','backend/editadmin',$data);
							}
						}
					}
				}
				else{
					$data['admin'] = $this->backend_m->get_admin_id($id_admin);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "3"); //1  gagal
					$this->template->load('backend/template','backend/editadmin',$data);
				}
			}
			else //jika tidak upload foto
			{
				if($this->backend_m->ubah_admin($bool2))
				{
					$data['admin'] = $this->backend_m->get_admin_id($id_admin);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //2 Berhasil
					$this->template->load('backend/template','backend/editadmin',$data);
				}
			}
		}
	}
	public function ubahDataPeserta(){
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		if($this->input->post("aktifasi2")=="cek") {
			$bool2 = false;
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$bool2 = true;
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password]|min_length[8]');
			if ($this->form_validation->run() == FALSE)
			{
				$id = $this->input->post('id_peserta');
				$data['peserta'] = $this->backend_m->get_peserta_id($id);
				$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
				$data['game'] = $this->backend_m->get_peserta_game($id);
				$data['proyek'] = $this->backend_m->get_peserta_proyek($id);
				$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
				$this->template->load('backend/template','backend/detailpeserta',$data);
			}
			else
			{
				if($this->backend_m->ubahDataPeserta($bool2))
				{
					$id = $this->input->post('id_peserta');
					$data['peserta'] = $this->backend_m->get_peserta_id($id);
					$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
					$data['game'] = $this->backend_m->get_peserta_game($id);
					$data['proyek'] = $this->backend_m->get_peserta_proyek($id);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
					$this->template->load('backend/template','backend/detailpeserta',$data);
				}
				else
				{
					$id = $this->input->post('id_peserta');
					$data['peserta'] = $this->backend_m->get_peserta_id($id);
					$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
					$data['game'] = $this->backend_m->get_peserta_game($id);
					$data['proyek'] = $this->backend_m->get_peserta_proyek($id);
					$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "1"); //1  gagal
					$this->template->load('backend/template','backend/detailpeserta',$data);
				}
			}
		}
		else
		{
			$id = $this->input->post('id_peserta');
			$data['peserta'] = $this->backend_m->get_peserta_id($id);
			$data['seminar'] = $this->backend_m->get_peserta_seminar($id);
			$data['game'] = $this->backend_m->get_peserta_game($id);
			$data['proyek'] = $this->backend_m->get_peserta_proyek($id);
			$data['konfirmasi_tambah'] = array('konfirmasi_tambah' => "2"); //1  gagal
			$this->template->load('backend/template','backend/detailpeserta',$data);
		}
	}
	function kelolablogg()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->template->load('backend/template','backend/blog');
	}

	function blogcontent()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konten'] = $this->back->getallcontentblog();
		$this->template->load('backend/template','backend/blogcontent', $data);
	}

	function deleteblog($id_blog)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deleteproses($id_blog);
		$this->blogcontent();
	}
	function deleteeventday($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deleteeventday($id);
		$this->kelolarundown();
	}
	function inputblog()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('konten', 'Konten Blog', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!"; //1  gagal
			$this->template->load('backend/template','backend/blog',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors(); //error upload
					$this->template->load('backend/template','backend/blog',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['idkonten'] = $this->input->post('idkonten');
						$data['judul'] = $this->input->post('judul');
						$data['tanggal'] = $this->input->post('tanggal');
						$data['konten'] = $this->input->post('konten');
						$this->back->inputblog($data);

						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/inputbazar',$data);
					}
				}
			}
			else
			{
				$data['idkonten'] = $this->input->post('idkonten');
				$data['judul'] = $this->input->post('judul');
				$data['tanggal'] = $this->input->post('tanggal');
				$data['konten'] = $this->input->post('konten');
				$this->back->inputblognogambar($data);

				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/inputbazar',$data);
			}
		}
		
		
	}

	function inputseminar()
	{
	if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['combopemateri'] = $this->back->getpemateriforcombo();
		$this->template->load('backend/template','backend/inputseminar',$data);
	}

	function deleteseminar($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deleteseminar($id);
		$this->listseminar();
	}

	function inputseminarproses()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!";
			$this->template->load('backend/template','backend/inputseminar',$data);
		}
		else
		{
			$data['id_seminar'] = $this->input->post('id_seminar');
			$data['judul'] = $this->input->post('judul');
			list($a,$b,$c) = explode("-", $this->input->post('tanggal'));
			$data['tanggal'] = $c."-".$b."-".$a;
			$data['jam_mulai'] = $this->input->post('jam_mulai');
			$data['jam_selesai'] = $this->input->post('jam_selesai');
			$data['tempat'] = $this->input->post('tempat');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['longtitude'] = $this->input->post('longtitude');
			$data['latitude'] = $this->input->post('latitude');
			$data['harga_tiket'] = $this->input->post('harga');
			$data['tb_admin_id_admin'] = 1;

			$pemateri = $this->input->post('pemateri');
			$kategori = $this->input->post('kategori');

			if($pemateri=="-- Pilih --")
			{
				$data['errorcombo'] = "You have to select at least one option in Nama Pemateri field.";

				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
			else if($kategori == "-- Pilih --")
			{
				$data['errorcombo'] = "You have to select at least one option in Kategori field.";

				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
			else
			{
				$data['tb_speaker_id_speaker'] = $pemateri;
				$data['kategori'] = $kategori;
				$this->back->inputseminarproses($data);
				
				$data['successmessage'] = "Data has been successfully saved.";
				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
		}
	}

	function inputpemateri()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->template->load('backend/template','backend/inputpemateri');
	}

	function prosesinputpemateri()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required');
		$this->form_validation->set_rules('biodata', 'Biodata', 'required');
		$this->form_validation->set_rules('twitter', 'Twitter', 'required');
		$this->form_validation->set_rules('facebook', 'Facebook', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!"; //1  gagal
			$this->template->load('backend/template','backend/inputpemateri',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors(); //error upload
					$this->template->load('backend/template','backend/inputpemateri',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['id_speaker'] = $this->input->post('id_speaker');
						$data['nama'] = $this->input->post('nama');
						$data['biodata'] = $this->input->post('biodata');
						$data['pekerjaan'] = $this->input->post('pekerjaan');
						$data['pengalaman'] = $this->input->post('pengalaman');
						$data['twitter'] = $this->input->post('twitter');
						$data['facebook'] = $this->input->post('facebook');
						$this->back->prosesinputpemateri($data);
						
						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/inputpemateri',$data);
					}
				}
			}
			else
			{
				$data['id_speaker'] = $this->input->post('id_speaker');
				$data['nama'] = $this->input->post('nama');
				$data['biodata'] = $this->input->post('biodata');
				$data['pekerjaan'] = $this->input->post('pekerjaan');
				$data['pengalaman'] = $this->input->post('pengalaman');
				$data['twitter'] = $this->input->post('twitter');
				$data['facebook'] = $this->input->post('facebook');
				$this->back->prosesinputpematerinogambar($data);
				
				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/inputpemateri',$data);
			}
		}
	}

	function listseminar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konten'] = $this->back->getallseminar();
		$this->template->load('backend/template','backend/listseminar', $data);
	}

	function listpemateri()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konten'] = $this->back->getallpemateri();
		$this->template->load('backend/template','backend/listpemateri', $data);
	}

	function deletepemateri($idspeaker)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deletepemateri($idspeaker);
		$this->listpemateri();
	}

	function bindingpemateri($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['binding'] = $this->back->getpemateribyid($id);
		$this->template->load('backend/template','backend/inputpemateri', $data);
	}


	function editpemateri()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required');
		$this->form_validation->set_rules('biodata', 'Biodata', 'required');
		$this->form_validation->set_rules('facebook', 'facebook', 'required');
		$this->form_validation->set_rules('twitter', 'twitter', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!"; //1  gagal
			$this->template->load('backend/template','backend/inputpemateri',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors(); //error upload
					$this->template->load('backend/template','backend/inputpemateri',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['id_speaker'] = $this->input->post('id_speaker');
						$data['nama'] = $this->input->post('nama');
						$data['biodata'] = $this->input->post('biodata');
						$data['pekerjaan'] = $this->input->post('pekerjaan');
						$data['pengalaman'] = $this->input->post('pengalaman');
						$data['facebook'] = $this->input->post('facebook');
						$data['twitter'] = $this->input->post('twitter');
						$this->back->editpemateri($data);
						
						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/inputpemateri',$data);
					}
				}
			}
			else
			{
				$data['id_speaker'] = $this->input->post('id_speaker');
				$data['nama'] = $this->input->post('nama');
				$data['biodata'] = $this->input->post('biodata');
				$data['pekerjaan'] = $this->input->post('pekerjaan');
				$data['pengalaman'] = $this->input->post('pengalaman');
				$data['facebook'] = $this->input->post('facebook');
				$data['twitter'] = $this->input->post('twitter');
				$this->back->editpematerinophoto($data);
				
				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/inputpemateri',$data);
			}
		}
	}

	function bindingseminar($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['combopemateri'] = $this->back->getpemateriforcombo();
		$data['binding'] = $this->back->getseminarbyid($id);
		$this->template->load('backend/template','backend/inputseminar',$data);
	}

	function editseminar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!";
			$this->template->load('backend/template','backend/inputseminar',$data);
		}
		else
		{
			$data['id_seminar'] = $this->input->post('id_seminar');
			$data['judul'] = $this->input->post('judul');
			list($a,$b,$c) = explode("-", $this->input->post('tanggal'));
			$data['tanggal'] = $c."-".$b."-".$a;
			$data['jam_mulai'] = $this->input->post('jam_mulai');
			$data['jam_selesai'] = $this->input->post('jam_selesai');
			$data['tempat'] = $this->input->post('tempat');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['longtitude'] = $this->input->post('longtitude');
			$data['latitude'] = $this->input->post('latitude');
			$data['harga_tiket'] = $this->input->post('harga');
			$data['tb_admin_id_admin'] = 1;

			$pemateri = $this->input->post('pemateri');
			$kategori = $this->input->post('kategori');

			if($pemateri=="-- Pilih --")
			{
				$data['errorcombo'] = "You have to select at least one option in Nama Pemateri field.";

				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
			else if($kategori == "-- Pilih --")
			{
				$data['errorcombo'] = "You have to select at least one option in Kategori field.";

				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
			else
			{
				$data['tb_speaker_id_speaker'] = $pemateri;
				$data['kategori'] = $kategori;
				$this->back->editseminar($data);
				
				$data['successmessage'] = "Data has been successfully saved.";
				$data['combopemateri'] = $this->back->getpemateriforcombo();
				$this->template->load('backend/template','backend/inputseminar',$data);
			}
		}
	}

	function bindingblog($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['binding'] = $this->back->getblogbyid($id);
		$this->template->load('backend/template','backend/blog',$data);
	}

	function editblog()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('konten', 'Konten Blog', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!"; //1  gagal
			$this->template->load('backend/template','backend/blog',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors(); //error upload
					$this->template->load('backend/template','backend/blog',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['idkonten'] = $this->input->post('idkonten');
						$data['judul'] = $this->input->post('judul');
						$data['tanggal'] = $this->input->post('tanggal');
						$data['konten'] = $this->input->post('konten');
						$this->back->editblog($data);

						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/blog',$data);
					}
				}
			}
			else
			{
				$data['idkonten'] = $this->input->post('idkonten');
				$data['judul'] = $this->input->post('judul');
				$data['tanggal'] = $this->input->post('tanggal');
				$data['konten'] = $this->input->post('konten');
				$this->back->editblognogambar($data);

				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/blog',$data);
			}
		}
		
	}

	function kelolabazaar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->template->load('backend/template','backend/inputbazar');
	}

	function inputbazar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!";
			$this->template->load('backend/template','backend/inputbazar',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors();
					$this->template->load('backend/template','backend/inputbazar',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['id'] = $this->input->post('id');
						$data['nama'] = $this->input->post('nama');
						$data['deskripsi'] = $this->input->post('deskripsi');
						$this->back->inputbazar($data);

						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/inputbazar',$data);
					}
				}
			}
			else
			{
				$data['id'] = $this->input->post('id');
				$data['nama'] = $this->input->post('nama');
				$data['deskripsi'] = $this->input->post('deskripsi');
				$this->back->inputbazarnophoto($data);

				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/inputbazar',$data);
			}
		}
		
		
	}

	function listbazar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['konten'] = $this->back->getallbazar();
		$this->template->load('backend/template','backend/listbazar',$data);
	}

	function deletebazar($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->back->deletebazar($id);
		$this->listbazar();
	}

	function bindingbazar($id)
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$data['binding'] = $this->back->getbazarbyid($id);
		$this->template->load('backend/template','backend/inputbazar',$data);
	}

	function editbazar()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['cekerror'] = "setted!";
			$this->template->load('backend/template','backend/inputbazar',$data);
		}
		else
		{
			if (!empty($_FILES['userfile']['tmp_name'])) 
			{
				$config['upload_path'] = './assets/gambar_blog/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '100000';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['errorupload'] = $this->upload->display_errors();
					$this->template->load('backend/template','backend/inputbazar',$data);
				}
				else
				{
					$data = $this->upload->data();

					// code for creating thumbnails
					$config2['image_library'] = 'gd2';
					$config2['source_image']	= $data['file_path'].$data['file_name'];
					$config2['new_image'] = './assets/gambar_blog/thumb/';
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width']	= 100;
					$config2['height']	= 100;

					$this->image_lib->initialize($config2);
					if ( ! $this->image_lib->resize())
					{
					    echo $this->image_lib->display_errors();
					}
					// end of creating thumbnails
					
					if(!empty($_POST))
					{
						$data['id'] = $this->input->post('id');
						$data['nama'] = $this->input->post('nama');
						$data['deskripsi'] = $this->input->post('deskripsi');
						$this->back->editbazar($data);

						$data['successmessage'] = "Data has been successfully saved.";
						$this->template->load('backend/template','backend/inputbazar',$data);
					}
				}
			}
			else
			{
				$data['id'] = $this->input->post('id');
				$data['nama'] = $this->input->post('nama');
				$data['deskripsi'] = $this->input->post('deskripsi');
				$this->back->editbazarnophoto($data);

				$data['successmessage'] = "Data has been successfully saved.";
				$this->template->load('backend/template','backend/inputbazar',$data);
			}
		}
		
	}

	function test()
	{
		if(!$this->session->userdata('isLogin'))
			redirect('backend/login/0');
		$this->load->view('backend/test');
	}
}