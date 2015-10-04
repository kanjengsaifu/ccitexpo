<div class="page-header position-relative">
	<h1>
		Form Input Blog
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
						action="<?echo $this->config->item('backend')?>editblog"
					<?
				}
				else
				{
					?>
						action="<?echo $this->config->item('backend')?>inputblog"
					<?
				}
			?>
		 	enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="form-field-1">ID Konten</label>
				<div class="controls">
					<input type="text" name="idkonten" id="form-field-1" readonly 
					<?
						if(isset($binding))
						{
							?>
								value="<? echo $binding->row('id_blog');?>"
							<?
						}
						else
						{
							?>
								value="<? echo substr(abs(crc32(sha1(rand()))),0,8);?>"
							<?
						}
					?>
					/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Judul Konten</label>
				<div class="controls">
					<input type='text' name='judul' id='form-field-1' class='span6'
					<?
						if(isset($binding))
						{
							?>
								value="<?echo $binding->row('judul')?>"
							<?
						}
					?>
					>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Tanggal Posting</label>
				<div class="controls">
					<input type='text' name='tanggal' readonly id='form-field-1' class='span6' <?
						if(isset($binding))
						{
							?>
								value='<?echo $binding->row('tanggal');?>'
							<?
						}
						else
						{
							?>
								value='<?echo date('Y-m-d');?>'
							<?
						}
					?>>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-1">Foto Header</label>
				<div class="controls">
					<input type="file" id="form-field-1" name="userfile" />
					<?
						if(isset($binding))
						{
							?>
								<i style="color:darkred;">* Kosongkan jika tidak ingin diganti.</i>
							<?
						}
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="form-field-tags">Isi Konten</label>

				<div class="controls" style="padding-right:50px;">
					<textarea id='editor1' name='konten' cols='2' rows='40'>
						<?
							if(isset($binding))
							{
								echo $binding->row('isi');
							}
						?>
					</textarea>
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
<script src="<?echo $this->config->item('ckeditor')?>ckfinder/ckfinder.js"></script>

<script language="javascript">
	CKEDITOR.replace( 'editor1');
	CKFinder.setupCKEditor( null, { basePath : '<?echo base_url()?>assets/ckfinder/'} );
	CKEDITOR.config.extraPlugins = 'justify';
</script>