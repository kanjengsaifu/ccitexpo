<section id="akunsaya" class="white">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="module-header contact-header">
          <h4 style="font-color:white">Akun Saya</h4>
        </div>
      </div>
      <!-- end span12 -->
      <div class="span12 hero-unit text-center white">
        <h2>Akun Saya</h2>
        <p>Informasi lengkap mengenai akun anda sangat membantu kami dalam mengirimkan informasi terbaru.</p>
      </div>
	  <!-- end hero-unit -->
      <div class="span12" id="ErrorMsgs">
			<?php 
								foreach($konfirmasi_akun as $b){ 
								if($b==1) {
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Ubah Akun :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											<b>Berhasil Ubah Informasi Akun Anda</b>
									</div>
								<?php
								}?>
								<?php
								} ?>
	  </div>
      <!-- end ErrorMsgs -->
	  <div class="span12">
		  <form method="post" action="<?php echo $this->config->item('frontend')?>ubahakun" id="#form" name="#form">
			<?php foreach($akun->result() as $a) { ?>
			<input type="hidden" name="id_peserta"value="<?php echo $a->id_peserta ?>">
			<div class="control-group span12">
			  <label for="firstname" class="control-label">Firstname:</label>
			  <div class="controls">
				<input type="text" name="firstname" id="firstname" class="input-block-level" required="" value="<?php echo $a->firstname ?>">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="lastname" class="control-label">Lastname:</label>
			  <div class="controls">
				<input type="text" name="lastname" id="lastname" class="input-block-level" required="" value="<?php echo $a->lastname ?>">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="username" class="control-label">Username:</label>
			  <div class="controls">
				<input type="text" name="username" id="username" class="input-block-level" disabled value="<?php echo $a->username ?>">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="password" class="control-label">Password:</label>
			  <div class="controls">
				<input type="password" name="password" id="password" class="input-block-level"  value="">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="password_konfirmasi" class="control-label">Konfirmasi Password:</label>
			  <div class="controls">
				<input type="password" name="password_konfirm" id="password_konfirmasi" class="input-block-level" value="">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="email" class="control-label">Email:</label>
			  <div class="controls">
				<input type="email" id="email" name="email" class="input-block-level" required="" value="<?php echo $a->email ?>">
			  </div>
			</div>
			<div class="control-group span12">
			  <label for="phone" class="control-label">Phone:</label>
			  <div class="controls">
				<input type="text" id="phone" name="phone" class="input-block-level" required="" value="<?php echo $a->phone ?>">
			  </div>
			</div>
			<div class="control-group span12">
			  <div class="controls">
				<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Ubah</button>
			  </div>
			</div>
			<?php } ?>
		  </form>
		</div>
    <!-- end row --> 

  </div>
  <!-- end container --> 
</section>