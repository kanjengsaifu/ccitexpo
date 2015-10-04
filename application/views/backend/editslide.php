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
		<a href="<?php echo $this->config->item('backend')?>kelolaslide"> Slide</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Ubah Data Slide
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
									<div style="color:red">Gagal Ubah Slide :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Ubah Slide
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Ubah Slide
										<div style="color:black">Slide Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>ubahDataSlide">
								<?php foreach($slide->result() as $a) { ?>
								<input type="hidden" name="id_slide" value="<?php echo $a->id_slide; ?>"/>
								<input type="hidden" name="id_gambar_tmp" value="<?php echo $a->gambar; ?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Judul</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Judul" name="judul" value="<?php echo $a->judul; ?>" />
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-tags">Isi</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='isi' cols='2' rows='40'>
											<?php echo $a->isi; ?>
										</textarea>
									</div>
								</div>
								<?php } ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Slide</label>

									<div class="controls">
										<input type="checkbox" name="aktifasi" value="cek" onclick="cek();" id="aktifasi1"/>Ubah Slide
										<input type="file" id="file" placeholder="Slide" name="file" value="" disabled />
									</div>
								</div>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Ubah Slide">
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
<script src="<?echo $this->config->item('ckeditor')?>ckfinder/ckfinder.js"></script>

<script language="javascript">
	CKEDITOR.replace( 'editor1');
	CKFinder.setupCKEditor( null, { basePath : '<?echo base_url()?>assets/ckfinder/'} );
	CKEDITOR.config.extraPlugins = 'justify';
</script>