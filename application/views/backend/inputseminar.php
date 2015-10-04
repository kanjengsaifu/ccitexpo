<div class="page-header position-relative">
	<h1>
		Form Input Data Seminar
		<small>
			<i class="icon-double-angle-right"></i>
				Admin CCIT EXPO
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<div class="span12">
		<?
			if(isset($cekerror))
			{
				?>
					<div class="errorHandler alert alert-danger">
						<i class="fa fa-times-sign"></i>
						<div style="color:red;font-weight:bold;">Opps.. Input Process Failed</div></br>
						<?php echo validation_errors('<div style="padding-bottom:0px;">','</div>');?>
					</div>
				<?
			}

			if(isset($errorupload))
			{
				?>
					<div class="errorHandler alert alert-danger">
						<i class="fa fa-times-sign"></i>
						<div style="color:red;font-weight:bold;">Opps.. Input Process Failed</div></br>
						<?echo $errorupload;?>
					</div>
				<?
			}

			if(isset($errorcombo))
			{
				?>
					<div class="errorHandler alert alert-danger">
						<i class="fa fa-times-sign"></i>
						<div style="color:red;font-weight:bold;">Opps.. Input Process Failed</div></br>
						<?echo $errorcombo;?>
					</div>
				<?
			}

			if(isset($successmessage))
			{
				?>
					<div class="successHandler alert alert-success">
						<i class="fa fa-ok"></i>
						<div style="color:green;font-weight:bold;">Aww Yeah!</div></br>
						<?echo $successmessage;?>
					</div>
				<?
			}
		?>
		<form class="form-horizontal" method="post" 
			<?
				if(isset($binding))
				{
					?>
						action="<?echo $this->config->item('backend')?>editseminar" enctype="multipart/form-data"
					<?	
				}
				else
				{
					?>
						action="<?echo $this->config->item('backend')?>inputseminarproses" enctype="multipart/form-data"
					<?
				}
			?>>
			<div class="control-group">
				<label class="control-label" for="form-field-1">ID Acara</label>
				<div class="controls">
					<input type="text" name="id_seminar" id="form-field-1" readonly 
					<?
						if(isset($binding))
						{
							echo "value='".$binding->row('id_seminar')."'";		
						}
						else
						{
							?>
								value="<? echo substr(abs(crc32(sha1(rand()))),0,8);?>"
							<?
						}
					?>/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Judul Materi</label>
				<div class="controls">
					<input type='text' name='judul' id='form-field-1' class='span6'
					<?
						if(isset($binding))
						{
							echo "value='".$binding->row('judul')."'";		
						}
					?>/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Nama Pemateri</label>
				<div class="controls">
					<select name="pemateri" class="span6">
						<option>-- Pilih --</option>
						<?
							if(isset($binding))
							{
								$pembicara = $binding->row('tb_speaker_id_speaker');
								if(!empty($combopemateri))
								{
									foreach ($combopemateri->result() as $k) {
										if($pembicara==$k->id_speaker)
										{
											?>
												<option value="<?echo $k->id_speaker?>" selected><?echo $k->nama." - ".$k->pekerjaan?></option>
											<?
										}
										else
										{
											?>
												<option value="<?echo $k->id_speaker?>"><?echo $k->nama." - ".$k->pekerjaan?></option>
											<?
										}

									}
								}
							}
							else
							{
								if(!empty($combopemateri))
								{
									foreach ($combopemateri->result() as $k) {
										?>
											<option value="<?echo $k->id_speaker?>"><?echo $k->nama." - ".$k->pekerjaan?></option>
										<?
									}
								}
							}
						?>
					</select> <i style="color:darkred;">* Nama pemateri harus diinputkan terlebih dahulu.</i>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Kategori Acara</label>
				<div class="controls">
					<select name="kategori">
						<?
							if(isset($binding))
							{
								$kat = $binding->row('kategori');
								if($kat==1)
								{
									?>
										<option>-- Pilih --</option>
										<option value="1" selected>Seminar</option>
										<option value="2">Workshop</option>
									<?
								}
								else if($kat==2)
								{
									?>
										<option>-- Pilih --</option>
										<option value="1">Seminar</option>
										<option value="2" selected>Workshop</option>
									<?
								}
								else
								{
									?>
										<option>-- Pilih --</option>
										<option value="1">Seminar</option>
										<option value="2">Workshop</option>
									<?
								}
							}
							else
							{
								?>
									<option>-- Pilih --</option>
									<option value="1">Seminar</option>
									<option value="2">Workshop</option>
								<?
							}
						?>
						
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Tanggal</label>
				<div class="controls input-append" style="margin-left:20px;">
					<input class="span10 date-picker" name='tanggal' id="datepicker" type="text" data-date-format="dd-mm-yyyy" 
					<?
						if(isset($binding))
						{
							?>
								value='<? list($a,$b,$c) = explode("-", $binding->row('tanggal')); echo $c."-".$b."-".$a;?>';
							<?
						}
					?>
					/>
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
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
				<label class="control-label" for="form-field-1">Jam Selesai</label>
				<div class="controls">
					<div class="input-append bootstrap-timepicker">
						<input id="timepicker2" name="jam_selesai" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Tempat</label>
				<div class="controls">
					<textarea class="span6" rows="5" name="tempat"><?if(isset($binding)){echo $binding->row('tempat');}?></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="form-field-1">Longtitude</label>
				<div class="controls">
					<input type='text' name='longtitude' id='form-field-1' class='span6'
					<?
						if(isset($binding))
						{
							echo "value='".$binding->row('longtitude')."'";		
						}
					?>/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Latitude</label>
				<div class="controls">
					<input type='text' name='latitude' id='form-field-1' class='span6'
					<?
						if(isset($binding))
						{
							echo "value='".$binding->row('latitude')."'";		
						}
					?>/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Harga Tiket</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">
							Rp.
						</span>

						<input class="input-medium input-mask-phone" name='harga' type="text" id="harga" <?
						if(isset($binding))
						{
							echo "value='".$binding->row('harga_tiket')."'";		
						}
					?>>
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-tags">Deskripsi</label>

				<div class="controls" style="padding-right:50px;">
					<textarea id='editor1' name='deskripsi' cols='2' rows='40'><?if(isset($binding)){echo $binding->row('deskripsi');}?></textarea>
				</div>
			</div>


			<div class="form-actions">
				<button class="btn btn-info" type="submit">
					<i class="icon-ok bigger-110"></i>
					Submit
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="icon-undo bigger-110"></i>
					Reset
				</button>
			</div>
		</form>
	</div><!--/.span-->
<div>


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