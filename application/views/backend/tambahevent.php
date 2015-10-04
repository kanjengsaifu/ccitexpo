<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolavent">Jadwal Event</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Tambah Data Jadwal Event
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
									<div style="color:red">Gagal Tambah Event :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Tambah Event
									</div>
								<?php
								}
								}?>
								
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>tambahDataEvent">
								
								
								<div class="control-group">
									<label class="control-label" for="form-field-2">Jenis</label>

									<div class="controls">
										<select name="jenis">
											<option value="1st">Hari 1</option>
											<option value="2nd">Hari 2</option>
											<option value="3rd">Hari 3</option>
											<option value="4th">Hari 4</option>
											<option value="5th">Hari 5</option>
										</select>
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="form-field-1">Tanggal</label>
								<div class="controls input-append" style="margin-left:20px;">
									<input class="span10 date-picker" name='tanggal' id="datepicker" type="text" data-date-format="yyyy-mm-dd" 
									value= "<?
										echo set_value('Tanggal');
									?>"
									/>
									<span class="add-on">
										<i class="icon-calendar"></i>
									</span>
								</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-tags">Deskripsi</label>

									<div class="controls" style="padding-right:50px;">
										<textarea id='editor1' name='deskripsi' cols='2' rows='40'><?php echo set_value('Tanggal'); ?></textarea>
									</div>
								</div>
								<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Tambah Event">
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
</div><script src="<?echo $this->config->item('ckeditor')?>ckeditor/ckeditor.js"></script>

<script language="javascript">
	CKEDITOR.replace( 'editor1');
	CKFinder.setupCKEditor( null, { basePath : '<?echo base_url()?>assets/ckfinder/'} );
	CKEDITOR.config.extraPlugins = 'justify';
</script>
        
<script type="text/javascript" src="<?echo $this->config->item('css')?>backend/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?echo $this->config->item('css')?>backend/assets/js/date-time/bootstrap-datepicker.min.js"></script>


<script type="text/javascript">
    $('#datepicker').datepicker();
</script>