<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html lang="en">
<head>
<title>PT LELI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Doctor Appointment Form Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
<!-- /font files -->
<!-- css files -->
<link href="<?= base_url()?>assets/css/style2.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
<link href="<?= base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons-css-file -->

<link href="<?= base_url()?>assets/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />

<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-2.1.4.min.js"></script>
</head>
<body>
<?php
if ($this->session->flashdata('error')) {
	echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Oops!</strong> '.$this->session->flashdata('error').'
</div>';
 }elseif($this->session->flashdata('success')){
    echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> '.$this->session->flashdata('success').'.
</div>';
    } ?>
	<div class="w3-banner-main">
		<div class="center-container">
			<h1 class="header-w3ls">Daftar LELI</h1>
			
			<div class="content-top">
				<div class="content-w3ls">
					<div class="form-w3ls">
						<form action="<?= base_url()?>user/doSignup" method="post">
							<div class="content-wthree1">
								<div class="grid-agileits1">
									<div class="form-control"> 
										<label class="header">Username <span>*</span></label>
										<input type="text" id="name" name="username" placeholder="Name" title="Please enter your Username" required="">
									</div>
									
									<div class="form-control">	
										<label class="header">Password <span>*</span></label>
										<input type="password" id="name" name="password" placeholder="Password" title="Please enter password" required="">
									</div>
								
								</div>
								
							</div>
					</div>
					
					<div class="form-w3ls-1">
						<div class="form-control">	
										<label class="header">Email <span>*</span></label>
										<input type="email" id="email" name="email" placeholder="Mail@example.com" title="Please enter a Valid Email Address" required="">
									</div>
									<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label class="rating">Daftar Sebagai <span>*</span></label>
										<ul>
										<label style="background-color: white;">
                                        <input type="radio" name="userType" id="optionsRadios1" value="penawar" checked>Penawar
                                    </label></br>
									<label style="background-color: white;">
									<input type="radio" name="userType" id="optionsRadios2" value="pelelang" >Pelelang</label>
									
									</ul>
									</div>	
					
							
					</div>
									  <input type="submit" value="Register">

									</form>
					<div class="clear"></div>
				</div>
				
			</div>	
				<p class="copyright">=================</p>
				<p class="copyright">@Lelang Ini Itu </p>
				<p class="copyright">=================</p>
		</div>
	</div>

<!-- Calendar -->
				<link rel="stylesheet" href="<?= base_url()?>assets/css/jquery-ui.css" />
				<script src="<?= base_url()?>assets/js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
			<script type="text/javascript" src="<?= base_url()?>assets/js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>


</body>
</html>
