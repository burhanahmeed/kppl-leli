<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>PT LELI</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transparent Sign In Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="<?= base_url()?>assets/font-awesome/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<!-- //web-fonts -->
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
        <!--header-->
        <div class="header-w3l">
            <h1>LELI</h1>
                <h4>Solusi Cerdas Koleksi Anda</h4>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="sub-main-w3">   
                <h2>Sign In</h2>
                 <form action="<?= base_url()?>user/doLogin/user" method="post">
                <h6 color="white"><label>
                    <input type="radio" name="userType" id="optionsRadios1" value="penawar" checked="true">Penawar
                </label>
                <label>
                <input type="radio" name="userType" id="optionsRadios2" value="pelelang">pelelang</label></h6>
                               
               
                    <div class="icon2">
                        <input  placeholder="Username" name="username" type="text" required="">
                    </div>
                    <style type="text/css">
                        input{
                            outline: none;
                            font-size: 14px;
                            border: none;
                            box-shadow: 2px 2px 21px rgba(0, 0, 0, 0.29);
                            background: rgba(255, 255, 255, 0.21);
                            width: 95.9%;
                            color: #fff;
                            padding: 10px;
                            letter-spacing: 1px;
                            font-family: 'Roboto', sans-serif;
                        }
                    </style>
                    <div class="icon2">
                        <input  placeholder="Password" name="password" type="password" required="">
                    </div>
                    <label class="anim">
                        <div class="clear"></div>
                    <input type="submit" value="Sign in">
                </form>
            </div>
            <a class="btn btn-default" href="<?= base_url()?>user/signup">Daftar</a>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Transparent Sign In Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
        </div>
        <!--//footer-->
<!-- js -->
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.vide.min.js"></script>
<!-- //js -->
</body>
</html>