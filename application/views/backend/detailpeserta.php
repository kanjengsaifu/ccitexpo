<script>
	function cek2()
	{
		if(document.getElementById('aktifasi2').checked==true)
		{
			document.getElementById('password').removeAttribute('disabled');
			document.getElementById('password_konfirm').removeAttribute('disabled');
		}
		else
		{
			document.getElementById('password').setAttribute('disabled','disabled');
			document.getElementById('password_konfirm').setAttribute('disabled','disabled');
		}
	}
	</script>	
<div class="page-header position-relative">
	<h1>
		<a href="#"> Detail Semua Peserta</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Detail Peserta
		</small>
	</h1>
</div><!--/.page-header-->
<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)){ ?>
<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid">
						<div class="span12">
							<?php 
								foreach($konfirmasi_tambah as $b){ 
								if($b==1) {
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Ubah Peserta :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Ubah Peserta
									</div>
								<?php
								}
								}?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>ubahDataPeserta">
								<?php foreach($peserta->result() as $a) {?>
								<input type="hidden" name="password_ori" value="<?php echo $a->password; ?>"/>
								<input type="hidden" name="id_peserta" value="<?php echo $a->id_peserta?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Username</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Username" name="username" value="<?php echo $a->username; ?>" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
										<input type="checkbox" name="aktifasi2" value="cek" onclick="cek2();" id="aktifasi2"/>Ubah Password
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Password</label>

									<div class="controls">
										<input type="password" id="password" placeholder="Password" name="password" value="" disabled />
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Konfirmasi Password</label>

									<div class="controls">
										<input type="password" id="password_konfirm" placeholder="Password" name="password_konfirm" value="" disabled />
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Firstname</label>

									<div class="controls">
										<input type="text" id="password_konfirm" placeholder="Nama Depan" name="namadepan" value="<?php echo $a->firstname; ?>" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Lastname</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama Depan" name="namadepan" value="<?php echo $a->lastname; ?>" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama Depan" name="namadepan" value="<?php echo $a->email; ?>" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Phone</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama Depan" name="namadepan" value="<?php echo $a->phone; ?>" disabled />
									</div>
								</div>
								<?php }?>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Ubah">
									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php $info = "";?>
<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)OR ($this->session->userdata('level')==3)){ ?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Seminar</h3>
	<div class="table-header">
		Berikut Merupakan Detail Peserta Seminar
	</div>
	<table id="tabelblog2" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Judul Seminar</th>
				<th>Status Bayar</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($seminar->num_rows!=0)
				{
					$x=1;
					foreach ($seminar->result() as $k) {
						?>
							<tr>
								<td class="center span1">
									<?php echo $x?>
								</td>

								<td>
									<?php echo $k->firstname?> <?php echo $k->lastname?>
								</td>
								<td>
									<?php echo $k->judul?>
								</td>
								<td>
									<?php if ($k->status_bayar==1) echo "Lunas"; 
										else if (($k->status_bayar==2)&&($k->bukti_transfer==""))echo "Belum Bayar";
										else if (($k->bukti_transfer!="")&&($k->status_bayar==2)) echo "Sudah Upload Bukti, Approve!"?>
								</td>
								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<?php if(($k->status_bayar==1)&&($k->qrcode=='')){ ?>
										<a class="green" id="cekqr2" href="<?echo $this->config->item('backend')?>generateqrcode/1/<?echo $k->id_seminardetail?>/<?echo $k->id_peserta?>">
											<i class="icon-barcode bigger-130"></i>
										</a><?php } ?>
										<?php if($k->status_bayar==2){ ?>
										<a class="green" id="alert2" href="<?echo $this->config->item('backend')?>sudahBayar/1/<?echo $k->id_seminardetail?>/<?echo $k->id_peserta?>">
											<i class="icon-check bigger-130"></i>
										</a>
										<?php } ?>
										<?php 
										$barcode = $this->config->item("uploads")."/barcode/".$k->qrcode;
										$bukti = $this->config->item("uploads")."/bukti_transfer/".$k->bukti_transfer;
										$info = "
										<table>
										<tr>
											<td>Nama  : </td><td>$k->firstname $k->lastname</td>
										</tr>
										<tr>
											<td>Email : </td><td>$k->email</td> 
										</tr>
										<tr>
											<td>Harga : </td><td>Rp.".number_format($k->harga_tiket)."</td> 
										</tr>
										<tr>
											<td>Nama Rekening : </td><td>$k->nama_rekening</td> 
										</tr>
										<tr>
											<td>Nama Bank : </td><td>$k->nama_bank</td> 
										</tr>
										<tr>
											<td>Bukti Bayar : </td><td><img src='$bukti'/></td> 
										</tr>
										<tr>
											<td>Barcode : </td>
											<td>
												<img src='$barcode'/>
											</td>
										</tr>"
										?>
										<a class="green" id="selengkapnya2" href="#" value="<?php echo $info?>">
											<i class="icon-info-sign bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						<?
						$x++;
					}
				}
			?>
			
		</tbody>
	</table>
</div>
<?php } ?>
<?php $info2 = "";?>
<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)OR ($this->session->userdata('level')==4)){ ?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Game</h3>
	<div class="table-header">
		Berikut Merupakan Detail Peserta Game
	</div>
	<table id="tabelblog" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Judul Game</th>
				<th>Status Bayar</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($game->num_rows!=0)
				{
					$x=1;
					foreach ($game->result() as $k) {
						?>
							<tr>
								<td class="center span1">
									<?php echo $x?>
								</td>

								<td>
									<?php echo $k->firstname?> <?php echo $k->lastname?>
								</td>
								<td>
									<?php echo $k->nama?>
								</td>
								<td>
									<?php if ($k->status_bayar==1) echo "Lunas"; 
										else if (($k->status_bayar==2)&&($k->bukti_transfer==""))echo "Belum Bayar";
										else if (($k->bukti_transfer!="")&&($k->status_bayar==2)) echo "Sudah Upload Bukti, Approve!"?>
								</td>
								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<?php if(($k->status_bayar==1)&&($k->qrcode=='')){ ?>
										<a class="green" id="cekqr" href="<?echo $this->config->item('backend')?>generateqrcode/2/<?echo $k->id_gamedetail?>/<?echo $k->id_peserta?>">
											<i class="icon-barcode bigger-130"></i>
										</a><?php } ?>
										<?php if($k->status_bayar==2){ ?>
										<a class="green" id="alert" href="<?echo $this->config->item('backend')?>sudahBayar/2/<?echo $k->id_gamedetail?>/<?echo $k->id_peserta?>">
											<i class="icon-check bigger-130"></i>
										</a>
										<?php } ?>
										<?php 
										$barcode = $this->config->item("uploads")."/barcode/".$k->qrcode;
										$bukti = $this->config->item("uploads")."/bukti_transfer/".$k->bukti_transfer;
										$info2 = "
										<table>
										<tr>
											<td>Nama  : </td><td>$k->firstname $k->lastname</td>
										</tr>
										<tr>
											<td>Email : </td><td>$k->email</td> 
										</tr>
										<tr>
											<td>Harga : </td><td>Rp.".number_format($k->harga_pendaftaran)."</td> 
										</tr>
										<tr>
											<td>Nama Rekening : </td><td>$k->nama_rekening</td> 
										</tr>
										<tr>
											<td>Nama Bank : </td><td>$k->nama_bank</td> 
										</tr>
										<tr>
											<td>Bukti Bayar : </td><td><img src='$bukti'/></td> 
										</tr>
										<tr>
											<td>Barcode : </td>
											<td>
												<img src='$barcode'/>
											</td>
										</tr>"
										?>
										<a class="green" id="selengkapnya" href="#" value="<?php echo $info2?>">
											<i class="icon-info-sign bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						<?
						$x++;
					}
				}
			?>
			
		</tbody>
	</table>
</div>
<?php } ?>
<?php $info3 = "";?>
<?php if (($this->session->userdata('level')==1) OR ($this->session->userdata('level')==2)OR ($this->session->userdata('level')==5)){ ?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Project</h3>
	<div class="table-header">
		Berikut Merupakan Detail Project Competition
	</div>
	<table id="tabelblog3" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Judul Proyek</th>
				<th>Nama Ketua</th>
				<th>Status</th>
				<th>File</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?
				if($proyek->num_rows!=0)
				{
					$x=1;
					foreach ($proyek->result() as $k) {
						?>
							<tr>
								<td class="center span1">
									<?php echo $x?>
								</td>

								<td>
									<?php echo $k->firstname?> <?php echo $k->lastname?>
								</td>
								<td>
									<?php echo $k->judul?>
								</td>
								<td>
									<?php echo $k->nama_ketua?>
								</td>
								<td>
									<?php if ($k->file=="") echo "Belum Lengkap"; else echo "Sudah Lengkap";?>
								</td>
								<td>
									<a href="<?echo $this->config->item('uploads')?>project/<?php echo $k->file?>">
									Download </a>
								</td>
								<td>
									<div class="hidden-phone visible-desktop action-buttons">
										<?php if(($k->file!="")&&($k->qrcode=="")){ ?>
										<a class="green" id="cekqr3" href="<?echo $this->config->item('backend')?>generateqrcode/3/<?echo $k->id_project?>/<?echo $k->id_peserta?>">
											<i class="icon-barcode bigger-130"></i>
										</a><?php } ?>
										<?php 
										$barcode = $this->config->item("uploads")."/barcode/".$k->qrcode;
										$info3 = "
										<table>
										<tr>
											<td>Nama  : </td><td>$k->firstname $k->lastname</td>
										</tr>
										<tr>
											<td>Email : </td><td>$k->email</td> 
										</tr>
										<tr>
											<td>Nama Ketua : </td><td>$k->nama_ketua</td> 
										</tr>
										<tr>
											<td>Anggota 1 : </td><td>$k->anggota_1</td> 
										</tr>
										<tr>
											<td>Anggota 2 : </td><td>$k->anggota_2</td> 
										</tr>
										<tr>
											<td>Anggota 3 : </td><td>$k->anggota_3</td> 
										</tr>
										<tr>
											<td>Barcode : </td>
											<td>
												<img src='$barcode'/>
											</td>
										</tr>"
										?>
										<a class="green" id="selengkapnya3" href="#" value="<?php echo $info3?>">
											<i class="icon-info-sign bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						<?
						$x++;
					}
				}
			?>
			
		</tbody>
	</table>
</div>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/bootstrap.min.js"></script>

<!-- bootbox code -->
<script src="<?echo $this->config->item('css')?>backend/assets/js/bootbox.min.js"></script>
<script>
	$(document).on("click", "#cekqr", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Generate QRCode?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
	$(document).on("click", "#cekqr2", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Generate QRCode?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
	$(document).on("click", "#cekqr3", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Generate QRCode?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
    $(document).on("click", "#alert", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Sudah Bayar?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
	$(document).on("click", "#alert2", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Sudah Bayar?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
	$(document).on("click", "#alert3", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Sudah Bayar?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
    $(document).on("click", "#selengkapnya", function(e) {
    	var link = $(this).attr("value");
           bootbox.dialog(link, {
			    "label": "OK",
			    "callback": function() {
			        console.log("callback");
			    }
			});
        });
	$(document).on("click", "#selengkapnya2", function(e) {
    	var link = $(this).attr("value");
           bootbox.dialog(link, {
			    "label": "OK",
			    "callback": function() {
			        console.log("callback");
			    }
			});
        });
	$(document).on("click", "#selengkapnya3", function(e) {
    	var link = $(this).attr("value");
           bootbox.dialog(link, {
			    "label": "OK",
			    "callback": function() {
			        console.log("callback");
			    }
			});
        });
</script>