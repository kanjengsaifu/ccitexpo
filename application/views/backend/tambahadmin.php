<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolaadmin"> Admin</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Tambah Data Admin
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
									<div style="color:red">Gagal Tambah Admin :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Tambah Admin
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Tambah Admin
										<div style="color:black">Foto Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>tambahDataAdmin">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Username</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-2">Password</label>

									<div class="controls">
										<input type="password" id="form-field-2" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>"/>
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Konfirmasi Password</label>

									<div class="controls">
										<input type="password" id="form-field-2" placeholder="Password" name="password_konfirm" value="<?php echo set_value('password_konfirm'); ?>"/>
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama" name="nama" value="<?php echo set_value('nama'); ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Level</label>

									<div class="controls">
										<select name="level">
											<option value="1">Super Admin</option>
											<option value="2">Admin</option>
											<option value="3">Seminar Admin</option>
											<option value="4">Game Admin</option>
											<option value="5">Project Admin</option>
											<option value="6">Bazaar Admin</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Foto</label>

									<div class="controls">
										<input type="file" id="form-field-1" placeholder="Foto" name="file" value="<?php echo set_value('file'); ?>"/>
									</div>
								</div>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Tambah Admin">
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