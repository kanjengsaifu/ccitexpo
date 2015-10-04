<script>
    $(document).on("click", "#alert", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Yakin akan mendaftar ? ", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
</script>
<section id="daftarevent">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="module-header schedule-header">
          <h4>Daftar Event</h4>
        </div>
        <!-- end module-header --> 
      </div>
      <!-- end span12 -->
      <div class="span12 hero-unit text-center black">
        <h2>Daftar Event</h2>
        <p>Berikut merupakan event yang dapat anda ikuti</p>
      </div>
	  <div class="span12" id="ErrorMsgs">
			<?php 
								foreach($konfirmasi_daftar as $b){ 
								if($b==1) {
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Tambah Project Baru :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											<b>Berhasil Tambah Project Baru</b>
									</div>
								<?php
								}if($b==3) {
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Daftar Seminar :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==4)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											<b>Berhasil Daftar Seminar, Silahkan Cek Menu 'Event Saya'</b>
									</div>
								<?php
								}?>
								<?php
								if($b==5) {
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Daftar Game Competition :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==6)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											<b>Berhasil Daftar Game Competition, Silahkan Cek Menu 'Event Saya'</b>
									</div>
								<?php
								}?>
								<?php
								} ?>
	  </div>
      <!-- end span12 -->
      <div class="span12"> 
        <!-- Tabs -->
        <ul id="schedule-tabs" class="nav nav-pills tab-fillspace ">
          <li class="active"><a href="#dayone" data-toggle="tab">Seminar</a> </li>
          <li class=""><a href="#daytwo" data-toggle="tab">Game Competition</a> </li>
          <li class=""><a href="#daythree" data-toggle="tab">Project Competition</a> </li>
        </ul>
        <!-- end tabs --> 
      </div>
      <!-- end span12 -->
      <div class="tab-content">
        <div class="tab-pane wo-tab-pane fade in active" id="dayone"> 
          <!-- DAY ONE -->
			<div class="span4">
			<?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==2){
			?>
				<h2><?php echo $d->nama?></h2>
				<p><?php echo $d->deskripsi_panjang?></p>
			<?php }} ?>
			</br>
			</div>
          <!-- end span4 -->
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
              <!-- EVENT 1 -->
			  
					<?php if($seminar->num_rows==0){ ?>
						<div class="control-group span6">
						<h3>Anda Sudah Mendaftar di Semua Seminar</h3>
						<a href="#eventsaya">Lihat Seminar Saya</a>
						</div>
					<?php } ?>
			  <?php 
			  foreach($seminar->result() as $a) { ?>
              <article class="event">
                <div class="timeline-icon">
                  <div class="timeline-icon-container"><i class="iconf-wine"></i> </div>
                </div>
                <div class="time-box">
                  <time></time>
                </div>
                <div class="timeline-content">
                  <div class="event-content">
                    <div class="toggle-item-title event-title" data-count="1">
                      <h3><?php echo $a->judul?></h3>
                    </div>
                    <div class="toggle-item-body" style="display: none;">
                      <p>
					  <span><b>Jadwal  : <?php echo $a->tanggal?>, <?php echo $a->jam_mulai?> - <?php echo $a->jam_selesai?></span></b></br>
					  <span><b>Harga Tiket : <?php echo "Rp. ".number_format($a->harga_tiket)?></span></b></br>
					  <span><b>Tempat : <?php echo $a->tempat?></span></b></br>
					  <?php echo $a->deskripsi?></p>
                    </div>
					<form method="post" action="<?php echo $this->config->item('frontend')?>tambahseminar" id="#event" name="#event">
						<input type="hidden" value="<?php echo $a->id_seminar?>" name="id_seminar"/>
						<div class="control-group span10">
						  <div class="controls">
							<button type="submit" id="submit" class="btn btn-info" name="submit">Daftar</button>
						  </div>
						</div>
					</form>
                  </div>
                </div>
              </article>
			  <?php } ?>
              <!-- end EVENT 1 --> 
              <!-- end EVENT 10 --> 
              <!-- ADD AN EVENT HERE --> 
            </section>
			</br>
          </div>
          <!-- end span8 --> 
          <!-- --> 
        </div>
        <div class="tab-pane wo-tab-pane fade" id="daytwo"> 
          <!-- DAY TWO -->
          <!-- end span4 -->
		   <div class="span4">
			<?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==3){
			?>
				<h2><?php echo $d->nama?></h2>
				<p><?php echo $d->deskripsi_panjang?></p>
			<?php }} ?>
			</br>
			</div>
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
              <!-- EVENT 1 -->
			  
					<?php if($game->num_rows==0){ ?>
						<div class="control-group span6">
						<h3>Anda Sudah Terdaftar di Semua Game</h3>
						<a href="#eventsaya">Lihat Game Saya</a>
						</div>
					<?php } ?>
			  <?php 
			  foreach($game->result() as $a) { ?>
              <article class="event">
                <div class="timeline-icon">
                  <div class="timeline-icon-container"><i class="iconf-wine"></i> </div>
                </div>
                <div class="time-box">
					
                  <time></time>
                </div>
                <div class="timeline-content">
                  <div class="event-content">
                    <div class="toggle-item-title event-title" data-count="1">
                      <h3><?php echo $a->nama?></h3>
                    </div>
                    <div class="toggle-item-body" style="display: none;">
                      <p>
					  <span><b>Jadwal  : <?php echo $a->tanggal_mulai?>-<?php echo $a->tanggal_akhir?>, <?php echo $a->jam_mulai?> - <?php echo $a->jam_akhir?></span></b></br>
					  <span><b>Harga Tiket : <?php echo "Rp. ".number_format($a->harga_pendaftaran)?></span></b></br>
					  <span><b>Tempat : <?php echo $a->tempat?></span></b></br>
					  <?php echo $a->deskripsi?></p>
                    </div>
					<form method="post" action="<?php echo $this->config->item('frontend')?>tambahgame" id="#event" name="#event">
						<input type="hidden" value="<?php echo $a->id_game?>" name="id_game"/>
						<div class="control-group span10">
						  <div class="controls">
							<button type="submit" id="submit" class="btn btn-info" name="submit">Daftar</button>
						  </div>
						</div>
					</form>
                  </div>
                </div>
              </article>
			  <?php } ?>
              <!-- end EVENT 1 --> 
              <!-- end EVENT 10 --> 
              <!-- ADD AN EVENT HERE --> 
            </section>
			</br>
          </div>
          <!-- end span8 --> 
          <!-- --> 
        </div>
        <div class="tab-pane wo-tab-pane fade" id="daythree"> 
          <!-- DAY THREE -->
          <div class="span4">
			<?php foreach($jenisevent->result() as $d) { 
			if($d->id_jenisevent==4){
			?>
				<h2><?php echo $d->nama?></h2>
				<p><?php echo $d->deskripsi_panjang?></p>
			<?php }} ?>
			</br>
			</div>
          <!-- end span4 -->
          <div class="span8"> 
            <!-- TIMELINE -->
            <section class="timeline toggle-shortcode toggles"> 
              <!-- EVENT 1 -->
              <article class="event">
				<?php if($prokomsaya->num_rows==0){ ?>
					<form method="post" action="<?php echo $this->config->item('frontend')?>tambahprokom" id="#event" name="#event">
						<div class="control-group span6">
						  <label for="firstname" class="control-label">Judul:</label>
						  <div class="controls">
							<input type="text" name="judul" id="judul" class="input-block-level" required="" value="<?php echo set_value('judul'); ?>">
						  </div>
						</div>
						<div class="control-group span6">
						  <label for="lastname" class="control-label">Nama Ketua:</label>
						  <div class="controls">
							<input type="text" name="nama_ketua" id="nama_ketua" class="input-block-level" required="" value="<?php echo set_value('nama_ketua'); ?>">
						  </div>
						</div>
						<div class="control-group span6">
						  <label for="username" class="control-label">Anggota 1:</label>
						  <div class="controls">
							<input type="text" name="anggota_1" id="anggota_1" class="input-block-level"  value="<?php echo set_value('anggota_1'); ?>">
						  </div>
						</div>
						<div class="control-group span6">
						  <label for="username" class="control-label">Anggota 2:</label>
						  <div class="controls">
							<input type="text" name="anggota_2" id="anggota_2" class="input-block-level"  value="<?php echo set_value('anggota_2'); ?>">
						  </div>
						</div>
						<div class="control-group span6">
						  <label for="username" class="control-label">Desainer:</label>
						  <div class="controls">
							<input type="text" name="anggota_3" id="anggota_3" class="input-block-level" value="<?php echo set_value('anggota_3'); ?>">
						  </div>
						</div>
						<div class="control-group span6">
						  <div class="controls">
							<button type="submit" id="submit" class="btn btn-info pull-right" name="submit">Daftar</button>
						  </div>
						</div>
					  </form>
					<?php }?>
					<?php if($prokomsaya->num_rows!=0){ ?>
						<div class="control-group span6">
						<h3>Anda Sudah Terdaftar di Project Competition</h3>
						<a href="#eventsaya">Lihat Project Competition Saya</a>
						</div>
					<?php } ?>
              </article>
              <!-- end EVENT 8 --> 
              <!-- ADD AN EVENT HERE --> 
            </section>
			</br>
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