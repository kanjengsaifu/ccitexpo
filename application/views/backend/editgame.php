<script>
	function cek()
	{
		if(document.getElementById('aktifasi1').checked==true)
		{
			document.getElementById('file').removeAttribute('disabled');
		}
		else
		{
			document.getElementById('file').setAttribute('disabled','disabled');
		}
	}
	</script>	
<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>listgame"> Game</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Ubah Data Game
		</small>
	</h1>
</div><!--/.page-header-->

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
									<div style="color:red">Gagal Ubah Game :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Ubah Game
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Ubah Game
										<div style="color:black">Foto Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>ubahDataGame">
								<?php foreach($game->result() as $a) { ?>
								<input type="hidden" name="id_game" value="<?php echo $a->id_game; ?>"/>
								<input type="hidden" name="id_gambar_tmp" value="<?php echo $a->foto; ?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama" name="nama" value="<?php echo $a->nama; ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Tanggal Mulai</label>

									<div class="controls">
										<input type="date" id="form-field-1" placeholder="Tanggal Mulai" name="tanggal_mulai" value="<?php echo $a->tanggal_mulai; ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Tanggal Akhir</label>

									<div class="controls">
										<input type="date" id="form-field-1" placeholder="Tanggal Akhir" name="tanggal_akhir" value="<?php echo $a->tanggal_akhir; ?>" />
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jam Mulai</label>
									<div class="controls">
										<div class="input-append bootstrap-timepicker">
											<input id="timepicker1" name="jam_mulai" type="text" class="input-small" value="<?php echo $a->jam_mulai; ?>" />
											<span class="add-on">
												<i class="icon-time"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jam Akhir</label>
									<div class="controls">
										<div class="input-append bootstrap-timepicker">
											<input id="timepicker2" name="jam_akhir" type="text" class="input-small" value="<?php echo $a->jam_akhir; ?>"/>
											<span class="add-on">
												<i class="icon-time"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Deskripsi</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='deskripsi' cols='2' rows='40'><? echo $a->deskripsi?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Foto</label>

									<div class="controls">
										<input type="checkbox" name="aktifasi" value="cek" onclick="cek();" id="aktifasi1"/>Ubah Foto
										<input type="file" id="file" placeholder="Foto" name="file" value="" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Longtitude</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Longtitude" name="longtitude" value="<?php echo $a->longtitude; ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Latitude</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Latitude" name="latitude" value="<?php echo $a->latitude; ?>" />
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Tempat</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="tempat" name="tempat" value="<?php echo $a->tempat; ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Harga</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">
												Rp.
											</span>
											<input type="text" id="form-field-1" placeholder="Harga" name="harga_pendaftaran" value="<?php echo $a->harga_pendaftaran; ?>" />
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Ubah Game">
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
<script src="<?echo $this->config->item('ckeditor')?>ckeditor/ckeditor.js"></script>

<script language="javascript">
	CKEDITOR.replace( 'editor1');
	CKFinder.setupCKEditor( null, { basePath : '<?echo base_url()?>assets/ckfinder/'} );
	CKEDITOR.config.extraPlugins = 'justify';
</script>
        
<script type="text/javascript" src="<?echo $this->config->item('css')?>backend/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/date-time/bootstrap-datepicker.min.js"></script>


<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
    $('#datepicker').datepicker();
</script>