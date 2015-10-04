<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolaslide"> Slide</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Tambah Data Slide
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
									<div style="color:red">Gagal Tambah Slide :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Tambah Slide
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Tambah Slide
										<div style="color:black">Gambar Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>tambahDataSlide">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Judul</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Judul" name="judul" value="<?php echo set_value('judul'); ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Isi</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='isi' cols='2' rows='40'>
											<?php echo set_value('isi'); ?>
										</textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Gambar</label>

									<div class="controls">
										<input type="file" id="form-field-1" placeholder="gambar" name="file" value="<?php echo set_value('file'); ?>"/>
									</div>
								</div>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Tambah Slide">
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