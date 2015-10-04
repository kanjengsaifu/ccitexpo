<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolasponsor"> Sponsor</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Tambah Data Sponsor
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
									<div style="color:red">Gagal Tambah Sponsor :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Tambah Sponsor
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Tambah Sponsor
										<div style="color:black">Foto Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>tambahDataSponsor">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama Sponsor</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama Sponsor" name="nama_sponsor" value="<?php echo set_value('nama'); ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Link Sponsor</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Link Sponsor" name="link_sponsor" value="<?php echo set_value('link_sponsor'); ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Kategori</label>

									<div class="controls">
										<select name="kategori">
											<option value="1">Gold</option>
											<option value="2">Silver</option>
											<option value="3">Bronze</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Logo</label>

									<div class="controls">
										<input type="file" id="form-field-1" placeholder="Foto" name="file" value="<?php echo set_value('file'); ?>"/>
									</div>
								</div>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Tambah Sponsor">
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