<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic Page Needs -->
<meta charset="utf-8" />
<title>CCIT EXPO 2015</title>
<!-- Metas -->
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Stylesheets -->
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/style.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/fonts.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/fontello.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/jquery.countdown.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/jquery.validationengine.css" />
<link rel="stylesheet" href="<?echo $this->config->item('cssfront')?>frontend/css/flexslider.css">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- Favicon and touch icons -->
<link rel="apple-touch-icon" href="<?echo $this->config->item('imagefront')?>touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?echo $this->config->item('imagefront')?>touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?echo $this->config->item('imagefront')?>touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?echo $this->config->item('imagefront')?>touch-icon-ipad-retina.png">
<link rel="shortcut icon" href="<?echo $this->config->item('imagefront')?>favicon.ico">
</head>
<script>
	function gotoKontak()
	{
		<?php foreach($konfirmasi_tambah as $b){ 
			if(($b==1)OR($b==2)OR($b==3)) {
		?>
			document.getElementById("contact").scrollIntoView(true);
		<?php } } ?>
		<?php foreach($konfirmasi_bayar as $c){ 
			if(($c==1)OR($c==2)OR($c==3)OR($c==4)OR($c==5)OR($c==6)) {
		?>
			document.getElementById("eventsaya").scrollIntoView(true);
		<?php } } ?>
		<?php foreach($konfirmasi_akun as $d){ 
			if(($d==1)OR($d==2)OR($d==3)) {
		?>
			document.getElementById("akunsaya").scrollIntoView(true);
		<?php } } ?>
		<?php foreach($konfirmasi_daftar as $e){ 
			if(($e==1)OR($e==2)OR($e==3)OR($e==4)OR($e==5)OR($e==6)) {
		?>
			document.getElementById("daftarevent").scrollIntoView(true);
		<?php } } ?>
		//alert("TEST");
	}
</script>
<body onload="gotoKontak()">
<?
  $this->load->view('frontend/navigation');
?>
<!-- end top-bar -->
<?
  $this->load->view('frontend/slider');
?>
<!-- end top-bar -->
<!-- end intro section --> 
<!-- Modal -->
<div class="modal hide fade" id="modal-register">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Buy Tickets</h3>
  </div>
  <div class="modal-body">
    <ul class="price-table">
      <li class="price-item clearfix item">
        <div class="price-header"> <span class="title">Standard</span> <span class="price">$113</span> </div>
        <!-- end price-header -->
        <div class="price-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales tincidunt sodales. Nam tellus velit, hendrerit ac venenatis adipiscing, sollicitudin vitae orci. Vestibulum mollis pharetra metus sit amet convallis.</p>
          <input type="button"
						class="btn" value="Order Now" />
        </div>
        <!-- end price-content --> 
      </li>
      <!-- end price-item -->
      <li class="price-item clearfix item">
        <div class="price-header"> <span class="title">Student</span> <span class="price">$76</span> </div>
        <!-- end price-header -->
        <div class="price-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales tincidunt sodales. Nam tellus velit, hendrerit ac venenatis adipiscing, sollicitudin vitae orci. Vestibulum mollis pharetra metus sit amet convallis.</p>
          <input type="button"
						class="btn" value="Order Now" />
        </div>
        <!-- end price-content --> 
      </li>
      <!-- end price-item -->
    </ul>
  </div>
  <!-- end modal-body -->
  <div class="modal-footer"> <a data-dismiss="modal" class="btn">Close</a> </div>
</div>
<!-- top-bar, intro & modal end here -->

<?php if(!$this->session->userdata('isLoginPeserta')) { ?>
<?
  $this->load->view('frontend/about');
?>

<section id="register">
  <div class="container">
    <div class="row">
      <div id="countdown"></div>
      <div class="span12 white register-box text-center">
        <h2 class="register-title">Registrasi Disini Untuk Mengikuti Acara CCIT EXPO 2015</h2>
        <a href="#contact" class="btn btn-large btn-primary">Ya, Saya Ingin Melakukan Registrasi!</a> </div>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<?
  $this->load->view('frontend/speakers');
?>

<?
  $this->load->view('frontend/schedule');
?>

<?
  $this->load->view('frontend/workshops');
?>

<?
  $this->load->view("frontend/game");
?>

<!-- File Sponsor.php adalah Project Competition -->
<?
  $this->load->view('frontend/sponsors')
?>

<?
  $this->load->view('frontend/bazaar')
?>

<!-- File Sponsor.php adalah Blog -->
<?echo $this->load->view('frontend/news')?>

<!-- end news -->
<section id="twitter-feed">
  <div class="container">
    <div class="row">
      <div class="span10 offset1 text-center">
        <div class="tweet"></div>
        <a href="#" class="btn btn-follow">Follow Us <i class="iconf-twitter"></i></a> </div>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end twitter-feed -->
<section id="contact" class="white">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="module-header contact-header">
          <h4>DAFTAR</h4>
        </div>
      </div>
      <!-- end span12 -->
      <div class="span6 hero-unit text-center white">
        <h2 style="margin-left:60px;">Daftar Sekarang</h2>
        <p style="margin-left:60px;">Daftar Sekarang! gunakan 1 akun untuk mengikuti seminar, workshop, game competition dan project competition</p>
      </div>
     <div class="span6 hero-unit text-center white">
        <h2>Login Area</h2>
        <p>Masukan Username dan Password Anda : </p>
      </div>
      <!-- end hero-unit -->
      <div class="span12" style="margin-left:50px;"id="ErrorMsgs">
			<?php 
								foreach($konfirmasi_tambah as $b){ 
								if($b==1) {
								?>
									<div class="errorHandler alert alert-danger" >
										<i class="fa fa-times-sign"></i>
									<div style="color:red">Gagal Tambah Akun :</div></br>
										<?php echo validation_errors('<div style="color:black">','</div>');?>
									</div>
								<?php }
								if($b==2)
								{
								?>
									<div class="successHandler alert alert-success">
										<i class="fa fa-ok"></i>
											<b>Berhasil Tambah Akun, Silahkan Login</b>
									</div>
								<?php
								}?>
								<?php
								if($b==3)
								{
								?>
									<div class="errorHandler alert alert-danger">
										<i class="fa fa-times-sign"></i>
											<div style="color:red">
												Gagal Login, Periksa Kembali Username atau Password
											</div></br>
									</div>
								<?php
								}
								} ?>
	  </div>
      <!-- end ErrorMsgs -->
	  <div class="span6">
		  <form method="post" action="<?php echo $this->config->item('frontend')?>tambahuser" id="#form" name="#form">
			<div class="control-group span6">
			  <label for="firstname" class="control-label">Firstname:</label>
			  <div class="controls">
				<input type="text" name="firstname" id="firstname" class="input-block-level" required="" value="<?php echo set_value('firstname'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="lastname" class="control-label">Lastname:</label>
			  <div class="controls">
				<input type="text" name="lastname" id="lastname" class="input-block-level" required="" value="<?php echo set_value('lastname'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="username" class="control-label">Username:</label>
			  <div class="controls">
				<input type="text" name="username" id="username" class="input-block-level" required="" value="<?php echo set_value('username'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="password" class="control-label">Password:</label>
			  <div class="controls">
				<input type="password" name="password" id="password" class="input-block-level" required="" value="<?php echo set_value('password'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="password_konfirmasi" class="control-label">Konfirmasi Password:</label>
			  <div class="controls">
				<input type="password" name="password_konfirm" id="password_konfirmasi" class="input-block-level" required="" value="<?php echo set_value('password_konfirm'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="email" class="control-label">Email:</label>
			  <div class="controls">
				<input type="email" id="email" name="email" class="input-block-level" required="" value="<?php echo set_value('email'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="phone" class="control-label">Phone:</label>
			  <div class="controls">
				<input type="text" id="phone" name="phone" class="validate[required,custom[email]] input-block-level" required="" value="<?php echo set_value('phone'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <div class="controls">
				<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Daftar</button>
			  </div>
			</div>
		  </form>
		</div>
	<div class="span6">
		  <form method="post" action="<?php echo $this->config->item('frontend')?>loginuser">
			<div class="control-group span6">
			  <label for="username" class="control-label">Username:</label>
			  <div class="controls">
				<input type="text" name="username" id="username" class="input-block-level" required="" value="<?php echo set_value('username'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <label for="password" class="control-label">Password:</label>
			  <div class="controls">
				<input type="password" name="password" id="password" class="input-block-level" required="" value="<?php echo set_value('password'); ?>">
			  </div>
			</div>
			<div class="control-group span6">
			  <div class="controls">
				<button type="submit" id="submit" class="btn btn-primary pull-right" name="submit">Login</button>
			  </div>
			</div>
		  </form>
		</div>
    <?
      if(isset($sponsor3) && $sponsor3->num_rows!=0)
      {
        ?>
          <div class="span12 text-center">
            <div class="subheader">
              <h4>Supported By : </h4>
            </div>
          </div>
           <?
              if(isset($sponsor3) && $sponsor3->num_rows!=0)
              {
                foreach ($sponsor3->result() as $k) {
                  ?>
                    <div class="span2 text-center"> 
                      <a href="<?echo $k->link_sponsor?>"> 
                        <img src="<?echo $this->config->item('sponsor').$k->logo_sponsor?>" alt="" class="sponsor-logo"> 
                      </a> 
                    </div>
                  <?
                }
              }
          ?>
        <?
      }
    ?>
      
    </div>
    <!-- end row --> 

  </div>
  <!-- end container --> 
</section>
<!-- end contact -->

<section id="map">
  <div id="map_canvas"></div>
  <!-- end Map Canvas --> 
</section>
<!-- end map -->
<?php } ?>
<?php if($this->session->userdata('isLoginPeserta')) { ?>
<?
  $this->load->view('frontend/daftarevent');
  $this->load->view('frontend/akunsaya');
  $this->load->view('frontend/eventsaya');
 }
?>
<?
  $this->load->view('frontend/footer');
?>
<!-- end Document --> 
<!-- javascripts --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/maps.js"></script>
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.ui.map.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.carousel.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.scrollTo-1.4.3.1-min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.parallax-1.1.3.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.localscroll-1.2.7-min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.nav.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.countdown.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.validationengine-en.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/jquery.validationengine.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/tweetie.min.js"></script> 
<script type="text/javascript" src="<?echo $this->config->item('cssfront')?>frontend/js/custom.js"></script> 

<!-- Google analytics here -->
<script src="<?echo $this->config->item('css')?>backend/assets/js/bootbox.min.js"></script>
<script>
    $(document).on("click", "#selengkapnya", function(e) {
      var link = $(this).attr("value");
           bootbox.dialog(link, {
          "label": "OK",
          "callback": function() {
              console.log("callback");
          }
      });
        });
</script>
</body>
</html>