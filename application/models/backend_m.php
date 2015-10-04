<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_m extends CI_MODEL { 
	function __construct(){
   		parent::__construct();

	}
	public function get_admin(){
		$q = "select * from tb_admin order by level";
		return $this->db->query($q);
	}
	public function get_event(){
		$q = "select * from tb_eventday";
		return $this->db->query($q);
	}
	public function get_jenisevent(){
		$q = "select * from tb_jenisevent";
		return $this->db->query($q);
	}
	public function get_rundown(){
		$q = "select A.*,B.jenis,B.id_eventday from tb_rundown A,tb_eventday B 
			where A.tb_eventday_id_eventday = B.id_eventday order by B.id_eventday";
		return $this->db->query($q);
	}
	public function get_jenisevent_id($id){
		$q = "select * from tb_jenisevent where id_jenisevent=$id";
		return $this->db->query($q);
	}
	public function get_event_id($id){
		$q = "select * from tb_eventday where id_eventday=$id";
		return $this->db->query($q);
	}
	public function get_sponsor_id($id){
		$q = "select * from tb_sponsor where id_sponsor=$id";
		return $this->db->query($q);
	}
	public function get_slide(){
		$q = "select a.*,b.nama from tb_slide a,tb_admin b where a.tb_admin_id_admin = b.id_admin order by a.judul";
		return $this->db->query($q);
	}
	public function get_admin_id($id){
		$q = "select * from tb_admin where id_admin=$id";
		return $this->db->query($q);
	}
	public function get_game_id($id){
		$q = "select * from tb_game where id_game=$id";
		return $this->db->query($q);
	}
	public function get_slide_id($id){
		$q = "select * from tb_slide where id_slide=$id";
		return $this->db->query($q);
	}
	public function get_peserta(){
		$q = "select * from tb_peserta";
		return $this->db->query($q);
	}
	public function get_sponsor(){
		$q = "select * from tb_sponsor";
		return $this->db->query($q);
	}
	public function get_peserta_by_kategori($kat){
		$q = "select * from tb_peserta";
		if($kat==2)
			$q = "select A.* from tb_peserta A,tb_gamedetail B where A.id_peserta = B.tb_peserta_id_peserta group by A.username";
		else if($kat==2)
			$q = "select A.* from tb_peserta A,tb_seminardetail B where A.id_peserta = B.tb_peserta_id_peserta group by A.username";
		else if($kat==3)
			$q = "select A.* from tb_peserta A,tb_project B where A.id_peserta = B.id_peserta group by A.username";	
		return $this->db->query($q);
	}
	public function get_peserta_id($id){
		$q = "select * from tb_peserta where id_peserta = $id";
		return $this->db->query($q);
	}
	public function ambil_user($username,$pass){
		$q = "select * from tb_admin where username='$username' and password='$pass'";
		return $this->db->query($q);
	}
	function getallgame()
	{
		$q = "select * from tb_game";
		$get = $this->db->query($q);
		return $get;
	}
	public function get_peserta_seminar($id){
		$q = "select A.judul,A.harga_tiket,B.id_seminardetail,B.status_bayar,B.qrcode,C.id_peserta,C.firstname,
			C.lastname,C.email,B.nama_rekening,B.nama_bank,B.bukti_transfer 
			from tb_seminar A,tb_seminardetail B, tb_peserta C where A.id_seminar=B.tb_seminar_id_seminar 
			AND B.tb_peserta_id_peserta = $id AND C.id_peserta = B.tb_peserta_id_peserta" ;
		return $this->db->query($q);
	}
	public function get_peserta_game($id){
		$q = "select A.nama,A.harga_pendaftaran,B.id_gamedetail,B.status_bayar,B.nama_rekening,B.nama_bank,
			B.bukti_transfer,B.qrcode,C.id_peserta,C.firstname,C.lastname,C.email 
			from tb_game A,tb_gamedetail B, tb_peserta C where A.id_game=B.tb_game_id_game 
			AND B.tb_peserta_id_peserta = $id AND C.id_peserta = B.tb_peserta_id_peserta" ;
		return $this->db->query($q);
	}
	public function get_peserta_proyek($id){
		$q = "select B.id_project,B.judul,B.nama_ketua,B.file,B.anggota_1,B.anggota_2,B.anggota_3,
			B.qrcode,C.id_peserta,C.firstname,C.lastname,C.email 
			from tb_project B, tb_peserta C where B.id_peserta = $id AND 
			C.id_peserta = B.id_peserta" ;
		return $this->db->query($q);
	}
	public function ubahqrcode($jenis,$idactivity,$qrcode){
		if($jenis==1) //jika seminar
			$q = "update tb_seminardetail set qrcode='$qrcode' where id_seminardetail=$idactivity";
		if($jenis==2) //jika game
			$q = "update tb_gamedetail set qrcode='$qrcode' where id_gamedetail=$idactivity";
		if($jenis==3) //jika projek
			$q = "update tb_project set qrcode='$qrcode' where id_project=$idactivity";
		return $this->db->query($q);
	}
	public function sudahbayar($jenis,$idactivity){
		if($jenis==1) //jika seminar
			$q = "update tb_seminardetail set status_bayar=1 where id_seminardetail=$idactivity";
		if($jenis==2) //jika game
			$q = "update tb_gamedetail set status_bayar=1 where id_gamedetail=$idactivity";
		if($jenis==3) //jika projek
			$q = "update tb_project set status_bayar=1 where id_project=$idactivity";
		return $this->db->query($q);
	}
	public function tambah_admin($foto){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		return $this->db->query("insert into tb_admin(username,password,level,nama,foto) values('$username','$password','$level','$nama','$foto')");
	}
	public function tambah_sponsor($foto){
		$a = $this->input->post('nama_sponsor');
		$b = $this->input->post('link_sponsor');
		$c = $this->input->post('kategori');
		$id = $this->session->userdata('id_user');
		return $this->db->query("insert into tb_sponsor(nama_sponsor,logo_sponsor,link_sponsor,tb_admin_id_admin,kategori) 
			values('$a','$foto','$b','$id','$c')");
	}
	public function tambah_event(){
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		return $this->db->query("insert into tb_eventday(jenis,tanggal,deskripsi) values('$jenis','$tanggal','$deskripsi')");
	}
	public function tambah_eventday(){
		$a = $this->input->post('nama_kegiatan');
		$b = $this->input->post('jam_mulai');
		$c = $this->input->post('deskripsi');
		$d = $this->input->post('id_eventday');
		return $this->db->query("insert into tb_rundown(nama_kegiatan,jam_mulai,deskripsi,tb_eventday_id_eventday) 
			values('$a','$b','$c','$d')");
	}
	public function tambah_slide($gambar){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		return $this->db->query("insert into tb_slide(judul,isi,gambar,tb_admin_id_admin) values('$judul','$isi','$gambar',1)");
	}
	public function tambah_game($gambar){
		$nama = $this->input->post('nama');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_akhir = $this->input->post('jam_akhir');
		$deskripsi = $this->input->post('deskripsi');
		$longtitude = $this->input->post('longtitude');
		$latitude = $this->input->post('latitude');
		$tempat = $this->input->post('tempat');
		$harga_pendaftaran = $this->input->post('harga_pendaftaran');
		$id = $this->session->userdata('id_login');
		return $this->db->query("insert into tb_game(nama,tanggal_mulai,tanggal_akhir,jam_mulai,
			jam_akhir,deskripsi,longtitude,latitude,tempat,harga_pendaftaran,tb_admin_id_admin,foto) 
			values('$nama','$tanggal_mulai','$tanggal_akhir','$jam_mulai','$jam_akhir'
			,'$deskripsi','$longtitude','$latitude','$tempat','$harga_pendaftaran','$id','$gambar')");
	}
	public function ubah_admin($pass){
		if($pass) //jika ubah password
			$password = md5($this->input->post('password'));
		else
		{
			$password = $this->input->post('password_ori');
		}
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		$id_admin = $this->input->post('id_admin');
		return $this->db->query("update tb_admin set password='$password',level=$level,nama='$nama' where id_admin = $id_admin");
	}
	public function ubahDataPeserta($pass){
		if($pass) //jika ubah password
			$password = md5($this->input->post('password'));
		else
		{
			$password = $this->input->post('password_ori');
		}
		$id_peserta = $this->input->post('id_peserta');
		return $this->db->query("update tb_peserta set password='$password' where id_peserta= $id_peserta");
	}
	public function ubah_admin_foto($foto,$pass){
		if($pass) //jika ubah password
			$password = md5($this->input->post('password'));
		else
		{
			$password = $this->input->post('password_ori');
		}
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		$id_admin = $this->input->post('id_admin');
		return $this->db->query("update tb_admin set password='$password',level=$level,nama='$nama',foto = '$foto' where id_admin = $id_admin");
	}
	public function ubah_slide(){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$id_slide = $this->input->post('id_slide');
		return $this->db->query("update tb_slide set judul='$judul',isi='$isi' where id_slide = $id_slide");
	}
	public function ubah_slide_foto($foto){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$id_slide = $this->input->post('id_slide');
		return $this->db->query("update tb_slide set judul='$judul',isi='$isi',gambar='$foto' where id_slide = $id_slide");
	}
	public function ubah_event(){
		$id = $this->input->post('id_event');
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		return $this->db->query("update tb_eventday set jenis='$jenis',tanggal='$tanggal',deskripsi='$deskripsi' where id_eventday=$id");
	}
	public function ubah_jenisevent(){
		$id = $this->input->post('id_jenisevent');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$deskripsi_panjang = $this->input->post('deskripsi_panjang');
		$cara_bayar = $this->input->post('cara_bayar');
		return $this->db->query("update tb_jenisevent set nama='$nama',deskripsi='$deskripsi',deskripsi_panjang='$deskripsi_panjang',cara_bayar='$cara_bayar' where id_jenisevent=$id");
	}
	public function ubah_game(){
		$nama = $this->input->post('nama');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_akhir = $this->input->post('jam_akhir');
		$deskripsi = $this->input->post('deskripsi');
		$longtitude = $this->input->post('longtitude');
		$latitude = $this->input->post('latitude');
		$tempat = $this->input->post('tempat');
		$harga_pendaftaran = $this->input->post('harga_pendaftaran');
		$id_game = $this->input->post('id_game');
		return $this->db->query("update tb_game set nama='$nama',tanggal_mulai='$tanggal_mulai',tanggal_akhir='$tanggal_akhir',
			jam_mulai='$jam_mulai',jam_akhir='$jam_akhir',deskripsi='$deskripsi',longtitude='$longtitude',latitude='$latitude',
			tempat='$tempat',harga_pendaftaran=$harga_pendaftaran where id_game = $id_game");
	}
	public function ubah_game_foto($foto){
		$nama = $this->input->post('nama');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_akhir = $this->input->post('jam_akhir');
		$deskripsi = $this->input->post('deskripsi');
		$longtitude = $this->input->post('longtitude');
		$latitude = $this->input->post('latitude');
		$tempat = $this->input->post('tempat');
		$harga_pendaftaran = $this->input->post('harga_pendaftaran');
		$id_game = $this->input->post('id_game');
		return $this->db->query("update tb_game set nama='$nama',tanggal_mulai='$tanggal_mulai',tanggal_akhir='$tanggal_akhir',
			jam_mulai='$jam_mulai',jam_akhir='$jam_akhir',deskripsi='$deskripsi',longtitude='$longtitude',latitude='$latitude',
			tempat='$tempat',harga_pendaftaran=$harga_pendaftaran,foto='$foto' where id_game = $id_game");
	}
	function deleteadmin($id)
	{
		$query = "delete from tb_admin where id_admin = $id";
		$set = $this->db->query($query);
	}
	function deletesponsor($id)
	{
		$query = "delete from tb_sponsor where id_sponsor = $id";
		$set = $this->db->query($query);
	}
	function deletegame($id)
	{
		$query = "delete from tb_game where id_game = $id";
		$set = $this->db->query($query);
	}
	function deleteeventday($id)
	{
		$query = "delete from tb_rundown where id_rundown = $id";
		$set = $this->db->query($query);
	}
	function deleteslide($id)
	{
		$query = "delete from tb_slide where id_slide = $id";
		$set = $this->db->query($query);
	}
	function deleteevent($id)
	{
		$query = "delete from tb_eventday where id_eventday = $id";
		$set = $this->db->query($query);
	}
	//
	function inputblog(&$data)
	{
		$insert = array(
				'id_blog' => $data['idkonten'],
				'judul' => $data['judul'],
				'isi' => $data['konten'],
				'tanggal' => $data['tanggal'],
				'gambar' => $data['file_name'],
				'tb_admin_id_admin' => 1
			);
		$this->db->insert('tb_blog',$insert);
	}

	function inputblognogambar(&$data)
	{
		$insert = array(
				'id_blog' => $data['idkonten'],
				'judul' => $data['judul'],
				'isi' => $data['konten'],
				'tanggal' => $data['tanggal'],
				'tb_admin_id_admin' => 1
			);
		$this->db->insert('tb_blog',$insert);
	}

	function getallcontentblog()
	{
		$query = "select * from tb_blog a join tb_admin b on a.tb_admin_id_admin = b.id_admin";
		$get = $this->db->query($query);
		return $get;
	}

	function deleteproses($id_blog)
	{
		$query = "delete from tb_blog where id_blog = $id_blog";
		$set = $this->db->query($query);
	}

	function inputseminarproses(&$data)
	{
		$insert = array (
			'id_seminar' => $data['id_seminar'],
			'judul' => $data['judul'],
			'kategori' => $data['kategori'],
			'tanggal' => $data['tanggal'],
			'jam_mulai' => $data['jam_mulai'],
			'jam_selesai' => $data['jam_selesai'],
			'deskripsi' => $data['deskripsi'],
			'tempat' => $data['tempat'],
			'longtitude' => $data['longtitude'],
			'latitude' => $data['latitude'],
			'harga_tiket' => $data['harga_tiket'],
			'tb_speaker_id_speaker' => $data['tb_speaker_id_speaker'],
			'tb_admin_id_admin' => $data['tb_admin_id_admin']
		);
		$this->db->insert('tb_seminar',$insert);
	}

	function prosesinputpemateri(&$data)
	{
		$insert = array(
				'id_speaker' => $data['id_speaker'],
				'nama' => $data['nama'],
				'biodata' => $data['biodata'],
				'pekerjaan' => $data['pekerjaan'],
				'pengalaman' => $data['pengalaman'],
				'facebook' => $data['facebook'],
				'twitter' => $data['twitter'],
				'foto' => $data['file_name']
			);
		$this->db->insert('tb_speaker',$insert);
	}

	function prosesinputpematerinogambar(&$data)
	{
		$insert = array(
				'id_speaker' => $data['id_speaker'],
				'nama' => $data['nama'],
				'biodata' => $data['biodata'],
				'pekerjaan' => $data['pekerjaan'],
				'pengalaman' => $data['pengalaman'],
				'facebook' => $data['facebook'],
				'twitter' => $data['twitter'],
				'foto' => "nophoto.gif"
			);
		$this->db->insert('tb_speaker',$insert);
	}

	function getallseminar()
	{
		$query = "select * from tb_seminar a join tb_speaker b on a.tb_speaker_id_speaker = b.id_speaker order by tanggal desc";
		$get = $this->db->query($query);
		return $get;
	}

	function getallpemateri()
	{
		$query = "select * from tb_speaker";
		$get = $this->db->query($query);
		return $get;
	}

	function deletepemateri($idspeaker)
	{
		$query = "delete from tb_speaker where id_speaker = $idspeaker";
		$set = $this->db->query($query);
	}

	function getpemateriforcombo()
	{
		$q = "select id_speaker, nama, pekerjaan from tb_speaker";
		$get = $this->db->query($q);
		return $get;
	}

	function deleteseminar($id)
	{
		$q = "delete from tb_seminar where id_seminar = $id";
		$set = $this->db->query($q);
	}

	function getpemateribyid($id)
	{
		$q = "select * from tb_speaker where id_speaker = $id";
		$get = $this->db->query($q);
		return $get;
	}

	function editpemateri(&$data)
	{
		$update = array(
				'id_speaker' => $data['id_speaker'],
				'nama' => $data['nama'],
				'biodata' => $data['biodata'],
				'pekerjaan' => $data['pekerjaan'],
				'pengalaman' => $data['pengalaman'],
				'facebook' => $data['facebook'],
				'twitter' => $data['twitter'],
				'foto' => $data['file_name']
			);
		$this->db->where('id_speaker',$data['id_speaker']);
		$this->db->update('tb_speaker',$update);
	}

	function editpematerinophoto(&$data)
	{
		$update = array(
				'id_speaker' => $data['id_speaker'],
				'nama' => $data['nama'],
				'biodata' => $data['biodata'],
				'pekerjaan' => $data['pekerjaan'],
				'pengalaman' => $data['pengalaman'],
				'facebook' => $data['facebook'],
				'twitter' => $data['twitter']
			);
		$this->db->where('id_speaker',$data['id_speaker']);
		$this->db->update('tb_speaker',$update);
	}

	function getseminarbyid($id)
	{
		$q = "select * from tb_seminar where id_seminar = $id";
		$get = $this->db->query($q);
		return $get;
	}

	function editseminar(&$data)
	{
		$update = array (
			'id_seminar' => $data['id_seminar'],
			'judul' => $data['judul'],
			'kategori' => $data['kategori'],
			'tanggal' => $data['tanggal'],
			'jam_mulai' => $data['jam_mulai'],
			'jam_selesai' => $data['jam_selesai'],
			'deskripsi' => $data['deskripsi'],
			'tempat' => $data['tempat'],
			'longtitude' => $data['longtitude'],
			'latitude' => $data['latitude'],
			'harga_tiket' => $data['harga_tiket'],
			'tb_speaker_id_speaker' => $data['tb_speaker_id_speaker']
		);
		$this->db->where('id_seminar',$data['id_seminar']);
		$this->db->update('tb_seminar',$update);
	}

	function getblogbyid($id)
	{
		$q = "select * from tb_blog where id_blog = $id";
		$get = $this->db->query($q);
		return $get;
	}

	function editblog(&$data)
	{
		$update = array(
				'id_blog' => $data['idkonten'],
				'judul' => $data['judul'],
				'isi' => $data['konten'],
				'tanggal' => $data['tanggal'],
				'gambar' => $data['file_name']
			);
		$this->db->where('id_blog',$data['idkonten']);
		$this->db->update('tb_blog',$update);
	}

	function editblognogambar(&$data)
	{
		$update = array(
				'id_blog' => $data['idkonten'],
				'judul' => $data['judul'],
				'isi' => $data['konten'],
				'tanggal' => $data['tanggal']
			);
		$this->db->where('id_blog',$data['idkonten']);
		$this->db->update('tb_blog',$update);
	}

	function inputbazar(&$data)
	{
		$insert = array(
				'id_bazar' => $data['id'],
				'nama' => $data['nama'],
				'deskripsi' => $data['deskripsi'],
				'foto' => $data['file_name'],
				'tb_admin_id_admin' => 1
			);
		$this->db->insert('tb_bazar',$insert);
	}

	function inputbazarnophoto(&$data)
	{
		$insert = array(
				'id_bazar' => $data['id'],
				'nama' => $data['nama'],
				'deskripsi' => $data['deskripsi'],
				'tb_admin_id_admin' => 1,
				'foto' => "nophoto.gif"
			);
		$this->db->insert('tb_bazar',$insert);
	}

	function getallbazar()
	{
		$q = "select * from tb_bazar";
		$get = $this->db->query($q);
		return $get;
	}

	function deletebazar($id)
	{
		$q = "delete from tb_bazar where id_bazar = $id";
		$set = $this->db->query($q);
	}

	function getbazarbyid($id)
	{
		$q = "select * from tb_bazar where id_bazar = $id";
		$get = $this->db->query($q);
		return $get;
	}

	function editbazar(&$data)
	{
		$update = array(
				'id_bazar' => $data['id'],
				'nama' => $data['nama'],
				'deskripsi' => $data['deskripsi'],
				'foto' => $data['file_name']
			);
		$this->db->where('id_bazar',$data['id']);
		$this->db->update('tb_bazar',$update);
	}

	function editbazarnophoto(&$data)
	{
		$update = array(
				'id_bazar' => $data['id'],
				'nama' => $data['nama'],
				'deskripsi' => $data['deskripsi']
			);
		$this->db->where('id_bazar',$data['id']);
		$this->db->update('tb_bazar',$update);
	}
}
?>