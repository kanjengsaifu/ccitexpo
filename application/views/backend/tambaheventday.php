<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolajenisevent">Rundown Event</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Tambah Data Rundown Event
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
									<div style="color:red">Gagal Tambah Rundown Event :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Tambah Rundown Event
									</div>
								<?php
								}
								}?>
								
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>tambahDataEventDay">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama Kegiatan</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama" name="nama_kegiatan" value="<?php echo set_value('nama_kegiatan'); ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jam Mulai</label>
									<div class="controls">
										<div class="input-append bootstrap-timepicker">
											<input id="timepicker1" name="jam_mulai" type="text" class="input-small" />
											<span class="add-on">
												<i class="icon-time"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Deskripsi</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='deskripsi' cols='2' rows='40'><?php echo set_value('deskripsi_panjang'); ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Event Day</label>
									<div class="controls">
										<select name="id_eventday" class="span6">
										<?php foreach($event->result() as $a) { ?>
											<option value="<?php echo $a->id_eventday;?>"><?php echo $a->jenis;?></option>
										<?php } ?>
										</select> <i style="color:darkred;">* Nama pemateri harus diinputkan terlebih dahulu.</i>
									</div>
								</div>
								<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Tambah Rundown">
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