<section id="eventsaya">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="module-header schedule-header">
          <h4>Daftar Event</h4>
        </div>
        <!-- end module-header --> 
      </div>
      <!-- end span12 -->
	  <div class="span12" id="ErrorMsgs">
							<?php 
												foreach($konfirmasi_bayar as $b){ 
													if($b==1) {
													?>
														<div class="errorHandler alert alert-danger">
															<i class="fa fa-times-sign"></i>
														<div style="color:red">Gagal Update Konfirmasi Pembayaran :</div></br>
															<?php echo validation_errors('<div style="color:black">','</div>');?>
														</div>
													<?php }
													if($b==2)
													{
													?>
														<div class="successHandler alert alert-success">
															<i class="fa fa-ok"></i>
																<b>Berhasil Update Konfirmasi Pembayaran, Pembayaran Anda akan diproses.</b>
																</br>
																Periksa Kembali Halaman ini untuk mencetak tiket anda
														</div>
													<?php
													}
													if($b==3) {
													?>
														<div class="errorHandler alert alert-danger">
															<i class="fa fa-times-sign"></i>
															<div style="color:red">Gagal Update Konfirmasi Pembayaran : </br> Periksa Gambar</div></br>
														</div>
													<?php }
													?>
													<?php
													if($b==4) {
													?>
														<div class="errorHandler alert alert-danger">
															<i class="fa fa-times-sign"></i>
														<div style="color:red">Gagal Update Project :</div></br>
															<?php echo validation_errors('<div style="color:black">','</div>');?>
														</div>
													<?php }
													if($b==5)
													{
													?>
														<div class="successHandler alert alert-success">
															<i class="fa fa-ok"></i>
																<b>Berhasil Update Project</b>
																</br>
																Periksa Kembali Halaman ini untuk mencetak tiket anda
														</div>
													<?php
													}
													if($b==6) {
													?>
														<div class="errorHandler alert alert-danger">
															<i class="fa fa-times-sign"></i>
															<div style="color:red">Gagal Update Project : </br> Periksa File</div></br>
														</div>
													<?php }
													?>
													
												<?php
												} ?>
	  </div>
      <div class="span12 hero-unit text-center black">
        <h2>Event Saya</h2>
        <p>Berikut merupakan event yang telah anda daftarkan</p>
      </div>
      <!-- end span12 -->
      <div class="span12"> 
        <!-- Tabs -->
        <ul id="schedule-tabs" class="nav nav-pills tab-fillspace ">
          <li class="active"><a href="#seminars" data-toggle="tab">Seminar</a> </li>
          <li class=""><a href="#games" data-toggle="tab">Game Competition</a> </li>
          <li class=""><a href="#prokoms" data-toggle="tab">Project Competition</a> </li>
        </ul>
        <!-- end tabs --> 
      </div>
      <!-- end span12 -->
      <div class="tab-content">
        <div class="tab-pane wo-tab-pane fade in active" id="seminars"> 
		  <div class="span4">
			<?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==2){
			?>
				<h2>Cara Pembayaran <?php echo $d->nama?></h2>
				<p><?php echo $d->cara_bayar?></p>
			<?php }} ?>
			</br>
		  </div>
          <!-- DAY ONE -->
          <!-- end span4 -->
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
              <!-- EVENT 1 -->
			  <?php 
			  $i = 1;
			  foreach($seminarsaya->result() as $a) { ?>
              <article class="event">
                <div class="timeline-icon">
                  <div class="timeline-icon-container"><i class="iconf-wine"></i> </div>
                </div>
                <div class="time-box">
					
                  <time><?php echo $i?></time>
                </div>
                <div class="timeline-content">
                  <div class="event-content">
                    <div class="toggle-item-title event-title" data-count="1">
                      <h3><?php echo $a->judul?></h3>
                    </div>
                    <div class="toggle-item-body" style="display: none;">
                      <span><b>Jadwal  : <?php echo $a->tanggal?>, <?php echo $a->jam_mulai?> - <?php echo $a->jam_selesai?></span></b></br>
					  <span><b>Status Bayar : <?php if($a->status_bayar==1) echo "Sudah Bayar"; else echo "Belum Bayar";?></span></b></br>
						<?php if(($a->status_bayar==2)&&($a->isKonfirm==0)) { ?>
						<div class="row">
						<div class="span6">
						  <form method="post" enctype='multipart/form-data' action="<?php echo $this->config->item('frontend')?>konfirmasi_bayar">
							<input type="hidden" name="konfirm_venue" value="1">
							<input type="hidden" name="id_seminardetail" value="<?php echo $a->id_seminardetail;?>">
							<div class="control-group span6">
							  <label for="nama_rekening" class="control-label">Nama Rekening:</label>
							  <div class="controls">
								<input type="text" name="nama_rekening" id="nama_rekening" class="input-block-level" required="" value="<?php echo set_value('nama_rekening'); ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="nama_bank" class="control-label">Nama Bank:</label>
							  <div class="controls">
								<input type="text" name="nama_bank" id="nama_bank" class="input-block-level" required="" value="<?php echo set_value('nama_bank'); ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="nama_bank" class="control-label">Bukti Pembayaran:</label>
							  <div class="controls">
								<input type="file" name="file" id="bukti_pembayaran" class="input-block-level" required="">
							  </div>
							</div>
							<div class="control-group span6">
							  <div class="controls">
								<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Konfirmasi</button>
							  </div>
							</div>
						  </form>
						</div>
						</div>
						<?php } else if($a->status_bayar==1){?>
						<div class="schedule-download">
							<a href="<?php echo $this->config->item('frontend')?>tiket/<?php echo $a->qrcode?>/1" class="btn" target="_blank"><i class="iconf-acrobat"></i>
								<p>Download Tiket!</p>
							</a> 
						</div>
						<?php } if(($a->status_bayar==2)&&($a->isKonfirm==1)){?>
						<div class="schedule-download red">
							<h4>Tiket Anda Sedang Diproses</h4>
						</div>
						<?php } ?>
						
					</div>
					<!-- form -->
                  </div>
                </div>
              </article>
			  <?php $i = $i + 1;} ?>
              <!-- end EVENT 1 --> 
              <!-- end EVENT 10 --> 
              <!-- ADD AN EVENT HERE -->
			</br>			  
            </section>
          </div>
          <!-- end span8 --> 
          <!-- --> 
        </div>
        <div class="tab-pane wo-tab-pane fade" id="games"> 
          <!-- DAY TWO -->
		  <div class="span4">
		  <?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==3){
			?>
				<h2>Cara Pembayaran <?php echo $d->nama?></h2>
				<p><?php echo $d->cara_bayar?></p>
			<?php }} ?>
			</br>
		  </div>
          <!-- end span4 -->
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
				<?php 
			  $i = 1;
			  foreach($gamesaya->result() as $a) { ?>
              <article class="event">
                <div class="timeline-icon">
                  <div class="timeline-icon-container"><i class="iconf-wine"></i> </div>
                </div>
                <div class="time-box">
					
                  <time><?php echo $i?></time>
                </div>
                <div class="timeline-content">
                  <div class="event-content">
                    <div class="toggle-item-title event-title" data-count="1">
                      <h3><?php echo $a->nama?></h3>
                    </div>
                    <div class="toggle-item-body" style="display: none;">
                      <p>
					  <span><b>Jadwal  : <?php echo $a->tanggal_mulai?> - <?php echo $a->tanggal_akhir?>, <?php echo $a->jam_mulai?> - <?php echo $a->jam_akhir?></span></b></br>
					  <span><b>Status Bayar : <?php if($a->status_bayar==1) echo "Sudah Bayar"; else echo "Belum Bayar";?></span></b></br>
						<?php if(($a->status_bayar==2)&&($a->qrcode=="")) { ?>
						<div class="row">
						<div class="span6">
						  <form method="post" enctype='multipart/form-data' action="<?php echo $this->config->item('frontend')?>konfirmasi_bayar">
							<input type="hidden" name="konfirm_venue" value="2">
							<input type="hidden" name="id_gamedetail" value="<?php echo $a->id_gamedetail;?>">
							<div class="control-group span6">
							  <label for="nama_rekening" class="control-label">Nama Rekening:</label>
							  <div class="controls">
								<input type="text" name="nama_rekening" id="nama_rekening" class="input-block-level" required="" value="<?php echo set_value('nama_rekening'); ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="nama_bank" class="control-label">Nama Bank:</label>
							  <div class="controls">
								<input type="text" name="nama_bank" id="nama_bank" class="input-block-level" required="" value="<?php echo set_value('nama_bank'); ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="nama_bank" class="control-label">Bukti Pembayaran:</label>
							  <div class="controls">
								<input type="file" name="file" id="bukti_pembayaran" class="input-block-level" required="">
							  </div>
							</div>
							<div class="control-group span6">
							  <div class="controls">
								<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Konfirmasi</button>
							  </div>
							</div>
						  </form>
						</div>
						</div>
						<?php } else if(($a->status_bayar==1)&&($a->qrcode!="")){?>
						<div class="schedule-download">
							<a href="<?php echo $this->config->item('frontend')?>tiket/<?php echo $a->qrcode?>/2" class="btn" target="_blank"><i class="iconf-acrobat"></i>
								<p>Download Tiket!</p>
							</a> 
						</div>
						<?php } if(($a->status_bayar==1)&&($a->qrcode=="")){?>
						<div class="schedule-download red">
							<h4>Tiket Anda Sedang Diproses</h4>
						</div>
						<?php } ?>
						
					</div>
					<!-- form -->
                  </div>
                </div>
              </article>
			  <?php $i = $i + 1;} ?>
              <!-- end EVENT 1 --> 
              <!-- end EVENT 10 --> 
              <!-- ADD AN EVENT HERE -->
			</br>
			</section>
          </div>
          <!-- end span8 --> 
          <!-- --> 
        </div>
        <div class="tab-pane wo-tab-pane fade" id="prokoms"> 
          <!-- DAY THREE -->
		  <div class="span4">
		  <?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==4){
			?>
				<h2>Cara Registrasi <?php echo $d->nama?></h2>
				<p><?php echo $d->cara_bayar?></p>
			<?php }} ?>
			</br>
		  </div>
          <!-- end span4 -->
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
				<?php 
			  $i = 1;
			  foreach($prokomsaya->result() as $a) { ?>
              <article class="event">
                <div class="timeline-icon">
                  <div class="timeline-icon-container"><i class="iconf-wine"></i> </div>
                </div>
                <div class="time-box">
					
                  <time><?php echo $i?></time>
                </div>
                <div class="timeline-content">
                  <div class="event-content">
                    <div class="toggle-item-title event-title" data-count="1">
                      <h3><?php echo $a->judul?></h3>
                    </div>
                    <div class="toggle-item-body" style="display: none;">
                      <p>
					  <span><b>Judul  : <?php echo $a->judul?></span></b></br>
					  <span><b>Status Kelengkapan : <?php if($a->file=="") echo "Belum Lengkap"; else echo "Sudah Lengkap";?></span></b></br>
						<?php if($a->qrcode=="") { ?>
						<div class="span6">
						  <form method="post" enctype='multipart/form-data' action="<?php echo $this->config->item('frontend')?>konfirmasi_project">
							<input type="hidden" name="konfirm_venue" value="3">
							<input type="hidden" name="id_project" value="<?php echo $a->id_project;?>">
							<div class="control-group span6">
							  <label for="judul" class="control-label">Judul:</label>
							  <div class="controls">
								<input type="text" name="judul" id="judul" class="input-block-level" required="" value="<?php echo $a->judul; ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="nama_ketua" class="control-label">Nama Ketua:</label>
							  <div class="controls">
								<input type="text" name="nama_ketua" id="nama_ketua" class="input-block-level" required="" value="<?php echo $a->nama_ketua; ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="anggota_1" class="control-label">Nama Anggota 1:</label>
							  <div class="controls">
								<input type="text" name="anggota_1" id="anggota_1" class="input-block-level" required="" value="<?php echo $a->anggota_1; ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="anggota_2" class="control-label">Nama Anggota 2:</label>
							  <div class="controls">
								<input type="text" name="anggota_2" id="anggota_2" class="input-block-level" required="" value="<?php echo $a->anggota_2; ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="anggota_3" class="control-label">Nama Desainer:</label>
							  <div class="controls">
								<input type="text" name="anggota_3" id="anggota_3" class="input-block-level" required="" value="<?php echo $a->anggota_3; ?>">
							  </div>
							</div>
							<div class="control-group span6">
							  <label for="file" class="control-label">File Upload:</label>
							  <div class="controls">
								<input type="file" name="file" id="file" class="input-block-level" required="">
							  </div>
							</div>
							<div class="control-group span6">
							  <div class="controls">
								<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Update</button>
							  </div>
							</div>
						  </form>
						</div>
						<?php 
						}
						if(($a->file!="")&&($a->qrcode=="")) { ?>
						<div class="schedule-download">
							<h3>Tiket Anda Sedang Diproses, Kami Akan Memproses Secepatnya</h3> 
							<h5>Anda Masih Dapat mengupload ulang data selama tiket belum di proses</h5>
						</div>
						<?php } ?>
						<?php if(($a->file!="")&&($a->qrcode!="")) { ?>
						<div class="schedule-download">
							<a href="<?php echo $this->config->item('frontend')?>tiket/<?php echo $a->qrcode?>/3" class="btn" target="_blank"><i class="iconf-acrobat"></i>
								<p>Download Tiket!</p>
							</a> 
						</div>
						<?php } ?>
					</div>
					<!-- form -->
                  </div>
                </div>
              </article>
			  <?php $i = $i + 1;} ?>
              <!-- end EVENT 1 --> 
              <!-- end EVENT 10 --> 
              <!-- ADD AN EVENT HERE -->
			</br>
			</section>
          </div>
          <!-- end span8 --> 
          <!-- --> 
        </div>
      </div>
      <!-- end tabs --> 
      <!-- --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>