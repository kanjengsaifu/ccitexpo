<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolajenisevent"> Jenis Event</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Ubah Data Jenis Event
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
									<div style="color:red">Gagal Ubah Jenis Event :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Ubah Jenis Event
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>ubahDataJenisEvent">
								<?php foreach($event->result() as $a) { ?>
								<input type="hidden" name="id_jenisevent" value="<?php echo $a->id_jenisevent; ?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama Jenis Event</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama" name="nama" value="<?php echo $a->nama; ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Deskripsi Singkat</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='deskripsi' cols='2' rows='40'><?php echo $a->deskripsi; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Deskripsi Panjang</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor2' name='deskripsi_panjang' cols='2' rows='40'><?php echo $a->deskripsi_panjang; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Cara Bayar</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor3' name='cara_bayar' cols='2' rows='40'><?php echo $a->cara_bayar; ?></textarea>
									</div>
								</div>
								<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Ubah Jenis Event">
									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>
								<?php } ?>
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
<script language="javascript">
	CKEDITOR.replace( 'editor2');
	CKFinder.setupCKEditor( null, { basePath : '<?echo base_url()?>assets/ckfinder/'} );
	CKEDITOR.config.extraPlugins = 'justify';
</script>
<script language="javascript">
	CKEDITOR.replace( 'editor3');
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