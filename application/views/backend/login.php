<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Halaman Login - CCIT EXPO</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url()?>assets/backend/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/backend/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/backend/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="<?php echo base_url()?>assets/backend/assets/css/ace-fonts.css" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url()?>assets/backend/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/backend/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/backend/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->

		<!--ace settings handler-->

		<script src="<?php echo base_url()?>assets/backend/assets/js/ace-extra.min.js"></script>
	</head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-leaf green"></i>
										<span class="red">CCIT</span>
										<span class="white">EXPO</span>
									</h1>
									<h4 class="blue">Halaman Admin CCIT EXPO</h4>
								</div>
							</div>

							<div class="space-6"></div>
							<div class="row-fluid">
								<div class="position-relative">
										<div class="widget-body">
											<div class="widget-main">
												<h3 class="header blue lighter bigger">
													Masukan Data Dibawah : 
												</h3>
												<?php foreach($status as $b){ 
												if($b==1) {
												?>
												<h6 class="header red lighter bigger">
													Gagal Login, Periksa Kembali Username dan Password
												</h6>
												<?php } }?>

												<div class="space-6"></div>

												<form action="<?php echo $this->config->item('backend')?>cobaLogin" method="post">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" name="username" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" name="password"/>
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="form-actions">
															<input class="btn btn-info" type="submit" value="Login">
															&nbsp; &nbsp; &nbsp;
															<button class="btn" type="reset">
																<i class="icon-undo bigger-110"></i>
																Reset
															</button>
														</div>
														<div class="space-4"></div>
													</fieldset>
												</form>
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url()?>assets/backend/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url()?>assets/backend/assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url()?>assets/backend/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url()?>assets/backend/assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
	</body>
</html>
