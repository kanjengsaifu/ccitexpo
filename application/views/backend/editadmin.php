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
	function cek2()
	{
		if(document.getElementById('aktifasi2').checked==true)
		{
			document.getElementById('password').removeAttribute('disabled');
			document.getElementById('password_konfirm').removeAttribute('disabled');
		}
		else
		{
			document.getElementById('password').setAttribute('disabled','disabled');
			document.getElementById('password_konfirm').setAttribute('disabled','disabled');
		}
	}
	</script>	
<div class="page-header position-relative">
	<h1>
		<a href="<?php echo $this->config->item('backend')?>kelolaadmin"> Admin</a>
		<small>
			<i class="icon-double-angle-right"></i>
				Ubah Data Admin
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
									<div style="color:red">Gagal Ubah Admin :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											Berhasil Ubah Admin
									</div>
								<?php
								}
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											Gagal Ubah Admin
										<div style="color:black">Foto Gagal Upload. Format tidak cocok</div>
									</div>
								<?php
								}
								} ?>
							<!--PAGE CONTENT BEGINS-->
							<form method="post" enctype='multipart/form-data' class="form-horizontal" action="<?php echo $this->config->item('backend')?>ubahDataAdmin">
								<?php foreach($admin->result() as $a) { ?>
								<input type="hidden" name="id_admin" value="<?php echo $a->id_admin; ?>"/>
								<input type="hidden" name="password_ori" value="<?php echo $a->password; ?>"/>
								<input type="hidden" name="id_foto_tmp" value="<?php echo $a->foto; ?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Username</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Username" name="username" value="<?php echo $a->username; ?>" disabled />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
										<input type="checkbox" name="aktifasi2" value="cek" onclick="cek2();" id="aktifasi2"/>Ubah Password
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Password</label>

									<div class="controls">
										<input type="password" id="password" placeholder="Password" name="password" value="" disabled />
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-2">Konfirmasi Password</label>

									<div class="controls">
										<input type="password" id="password_konfirm" placeholder="Password" name="password_konfirm" value="" disabled />
										<span class="help-inline">Password harus 8 karakter</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Nama" name="nama" value="<?php echo $a->nama; ?>"/>
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
								<?php } ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Foto</label>

									<div class="controls">
										<input type="checkbox" name="aktifasi" value="cek" onclick="cek();" id="aktifasi1"/>Ubah Foto
										<input type="file" id="file" placeholder="Foto" name="file" value="" disabled />
									</div>
								</div>
									<div class="form-actions">
									<input class="btn btn-info" type="submit" value="Ubah Admin">
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