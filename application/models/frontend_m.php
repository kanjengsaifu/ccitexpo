<?php if (!defined('BASEPATH')) exit('No direct script access allowed');class Frontend_m extends CI_MODEL {    function __construct() {        parent::__construct();    }    function getslider()    {        $q = "select * from tb_slide";        $get = $this->db->query($q);        return $get;    }        function getspeaker()    {        $q = "select nama, pekerjaan, pengalaman, foto, biodata, facebook, twitter from tb_speaker";        $get = $this->db->query($q);        return $get;    }    function getworkshop()    {    	$q = "select a.judul, a.tanggal, a.jam_mulai, a.jam_selesai, a.foto, a.deskripsi, a.tempat, 			b.nama,b.foto as fotos,b.facebook,b.twitter from tb_seminar a join tb_speaker b on a.tb_speaker_id_speaker = b.id_speaker";    	$get = $this->db->query($q);    	return $get;    }    function getblog()    {        $q = "select id_blog, judul, isi, tanggal, gambar from tb_blog";        $get = $this->db->query($q);        return $get;    }    function geteventday()    {        $q = "select * from tb_eventday";        $get = $this->db->query($q);        return $get;    }    function getsponsor1()    {        $q = "select * from tb_sponsor where kategori = 1";        $get = $this->db->query($q);        return $get;    }    function getsponsor2()    {        $q = "select * from tb_sponsor where kategori = 2";        $get = $this->db->query($q);        return $get;    }    function getsponsor3()    {        $q = "select * from tb_sponsor where kategori = 3";        $get = $this->db->query($q);        return $get;    }    function getgamedesc()    {        $q = "select deskripsi from tb_jenisevent where id_jenisevent = 3";        $get = $this->db->query($q);        return $get;    }    function getjenisevent()    {        $q = "select * from tb_jenisevent";        $get = $this->db->query($q);        return $get;    }    function getbazaar()    {        $q = "select foto, link from tb_bazar";        $get = $this->db->query($q);        return $get;    }    function getaboutdesc()    {        $q = "select * from tb_about";        $get = $this->db->query($q);        return $get;    }		    function tambahuser()    {		$a = $this->input->post('username');		$b = md5($this->input->post('password'));		$c = $this->input->post('firstname');		$d = $this->input->post('lastname');		$e = $this->input->post('email');		$f = $this->input->post('phone');        $q = "insert into tb_peserta(username,password,firstname,lastname,email,phone,status_peserta)			values('$a','$b','$c','$d','$e','$f',2)";        $get = $this->db->query($q);        return $get;    }	function tambahseminar()    {		$a = $this->input->post('id_seminar');		$id = $this->session->userdata('id_user');        $q = "insert into tb_seminardetail(status_bayar,tb_peserta_id_peserta,tb_seminar_id_seminar,isKonfirm)			values(2,$id,$a,0)";        $get = $this->db->query($q);        return $get;    }	function tambahgame()    {		$a = $this->input->post('id_game');		$id = $this->session->userdata('id_user');        $q = "insert into tb_gamedetail(status_bayar,tb_peserta_id_peserta,tb_game_id_game)			values(2,$id,$a)";        $get = $this->db->query($q);        return $get;    }	function tambahprokom()    {		$a = $this->input->post('nama_ketua');		$b = $this->input->post('anggota_1');		$c = $this->input->post('anggota_2');		$d = $this->input->post('anggota_3');		$e = $this->input->post('judul');		$id = $this->session->userdata('id_user');        $q = "insert into tb_project(judul,nama_ketua,anggota_1,anggota_2,anggota_3,id_peserta)			values('$e','$a','$b','$c','$d','$id')";        $get = $this->db->query($q);        return $get;    }    function ubahakun()    {		$id = $this->input->post('id_peserta');		$b = $this->input->post('password');		if($b!="")			$b = md5($b);		$c = $this->input->post('firstname');		$d = $this->input->post('lastname');		$e = $this->input->post('email');		$f = $this->input->post('phone');        if($b=="")			$q = "update tb_peserta set firstname='$c',lastname='$d',email='$e',phone='$f' where id_peserta=$id";		else			$q = "update tb_peserta set password='$b',firstname='$c',lastname='$d',email='$e',phone='$f' where id_peserta=$id";        $get = $this->db->query($q);        return $get;    }	function ambil_user($username,$password)	{		$q = "select * from tb_peserta where username = '$username' and password='$password'";        $get = $this->db->query($q);        return $get;	}    function getseminar()    {        /*$q = "select A.*,B.nama from tb_seminar A,tb_speaker B where A.tb_speaker_id_speaker = B.id_speaker		order by A.tanggal";*/		$id = $this->session->userdata('id_user');		$q = "select A.* from tb_seminar A  where NOT EXISTS (select tb_seminar_id_seminar B from tb_seminardetail			where A.id_seminar = tb_seminar_id_seminar AND tb_peserta_id_peserta = $id)" ;        $get = $this->db->query($q);        return $get;    }    function getgame()    {        //$q = "select * from tb_game order by tanggal_mulai";		$id = $this->session->userdata('id_user');		if($this->session->userdata('isLoginPeserta')) {			$q = "select A.* from tb_game A  where NOT EXISTS (select tb_game_id_game B from tb_gamedetail			where A.id_game = tb_game_id_game AND tb_peserta_id_peserta = $id)" ;		}		else if(!$this->session->userdata('isLoginPeserta'))		{			$q = "select * from tb_game";		}        $get = $this->db->query($q);        return $get;    }    function gettiket($id,$event)    {		if($event==1)			$q = "select A.firstname,A.lastname,B.qrcode,C.judul,C.tanggal,C.jam_mulai,C.jam_selesai,C.tempat				from tb_peserta A,tb_seminardetail B,tb_seminar C where A.id_peserta = B.tb_peserta_id_peserta				AND B.tb_seminar_id_seminar = C.id_seminar and B.qrcode='$id'";		if($event==2)			$q = "select A.firstname,A.lastname,B.qrcode,C.nama as judul,C.tanggal_mulai as tanggal,C.jam_mulai,C.jam_akhir as jam_selesai,C.tempat				from tb_peserta A,tb_gamedetail B,tb_game C where A.id_peserta = B.tb_peserta_id_peserta				AND B.tb_game_id_game = C.id_game and B.qrcode='$id'";		if($event==3)			$q = "select A.firstname,A.lastname,B.qrcode,B.judul,B.nama_ketua,B.anggota_1,B.anggota_2,B.anggota_3				from tb_peserta A,tb_project B where A.id_peserta = B.id_peserta				and B.qrcode='$id'";        $get = $this->db->query($q);        return $get;    }	public function ambilakun($id){		$q = "select * from tb_peserta where id_peserta=$id" ;		return $this->db->query($q);	}	public function getseminarsaya($id){		$q = "select A.*,B.* from tb_seminar A, tb_seminardetail B where A.id_seminar = B.tb_seminar_id_Seminar AND			B.tb_peserta_id_peserta=$id" ;		return $this->db->query($q);	}	public function getgamesaya($id){		$q = "select A.*,B.* from tb_game A, tb_gamedetail B where A.id_game = B.tb_game_id_game AND			B.tb_peserta_id_peserta=$id" ;		return $this->db->query($q);	}	public function getprokomsaya($id){		$q = "select * from tb_project where id_peserta=$id" ;		return $this->db->query($q);	}	function konfirmasi_bayar($gambar)    {		$a = $this->input->post('nama_bank');		$b = $this->input->post('nama_rekening');		$venue = $this->input->post('konfirm_venue');		if($venue==1)		{			$id = $this->input->post('id_seminardetail');			$q = "update tb_seminardetail set nama_rekening='$b', nama_bank='$a', bukti_transfer='$gambar',isKonfirm=1			where id_seminardetail=$id";        }		if($venue==2)		{			$id = $this->input->post('id_gamedetail');			$q = "update tb_gamedetail set nama_rekening='$b', nama_bank='$a', bukti_transfer='$gambar'			where id_gamedetail=$id";		}		$get = $this->db->query($q);        return $get;    }	function konfirmasi_project($file)    {		$a = $this->input->post('nama_ketua');		$b = $this->input->post('anggota_1');		$c = $this->input->post('anggota_2');		$d = $this->input->post('anggota_3');		$e = $this->input->post('judul');		$id = $this->input->post('id_project');		$q = "update tb_project set nama_ketua='$a', anggota_1='$b', anggota_2='$c',anggota_3='$d',		judul='$e', file='$file' where id_project=$id";		$get = $this->db->query($q);        return $get;    }}?>