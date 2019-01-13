<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Twist &mdash; Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Animate.css -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css'); ?>">
	
	<!-- Simple Line Icons -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons.css'); ?>">
	
	<!-- Bootstrap  -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	
	<!-- Owl Carousel  -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css'); ?>">
	
	<!-- Style -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

	<!-- Modernizr JS -->

	<script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js') ?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	</head>
	<body>
	<!-- <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> -->
<link href="<?php echo base_url('assets/fonts/karla.css') ?>" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> -->
<link href="<?php echo base_url('assets/fonts/lato.css') ?>" rel="stylesheet">
<style type="text/css">

	h1,h2,h3,h4,h5, #fh5co-header, .navbar-default
	{
		font-family: 'Karla', sans-serif !important;
	}

	button ,body
	{
		font-family: 'Lato', sans-serif;
	}

	.btn:hover, .btn:active, .btn:focus
	{
		    background: #29ABE2 !important;
	}

	.box {
  width: 500px; 
  height: 100px;  
  border: solid 5px #000;
  border-color: #000 transparent transparent transparent;
  border-radius: 50%/100px 100px 0 0;
}

.letsstart {
  border-radius: 4px;
  background-color:  #0071bb;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.letsstart span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  
}

.letsstart span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.letsstart:hover span {
  padding-right: 25px;
  
}

.letsstart:hover span:after {
 
  opacity: 1;
  right: 0;
}

.button {
    background-color: #0071bb; /* Green */
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: #29ABE2;
}


@media screen and (min-width: 320px)
{
	#sales
	{
		background-color: rgb(240, 90, 34);
	}
	
	.howitworks
	{
		display: none;
	}

	.howitworksmob
	{
		display: block;
	}

	.mobi
	{
		display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

  font-size: 53px;
  text-align: center;
	}

	.jobline
	{
		display: none;
	}

	.joblinemob
	{
		display: block;
	}

}
@media screen and (min-width: 980px){

	#sales
	{
		background-color: #ccc;
	}
	.howitworks
	{
		display: block;
	}

	.howitworksmob
	{
		display: none;
	}

	.jobline
	{
		display: block;
	}
	.joblinemob
	{
		display: none !important;
	}
	}


	/*login styles start*/

	body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  //max-width: 38%;
 padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background:#0071bb none repeat scroll 0 0;
  border-color: #0071bb;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:0px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}


	/*login styles end*/

</style>

<br>

<!-- <div class="container-fluid" style="background-image:url(<?php echo base_url('images/Software-Development1.jpg') ?>);     background-size: cover;">
	<div class="row">
		<div class="col-sm-12" style="height: 150px;  background:#0c0c0ca6;">
			<div class="col-sm-12" style="height: 50px;"></div>
			<div class="col-sm-12" style="height: 50px;"><h1 style="text-align: center;color: white;font-size: 40px;">Employer Login</h1></div>
			<div class="col-sm-12" style="height: 50px;"></div>
			
		</div>
	</div>
</div> -->


<div class="container-fluid" style="background-image:url(<?php echo base_url('images/Software-Development1.jpg') ?>);">
<br>
<div class="login-form">

	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="main-div">
    <div class="panel">
   <h3 style="color: #0071bb;">Employer Login</h3>
  
   </div>
  <form action="<?=base_url('welcome/check_employer_login')?>" method="post">

        <div class="form-group">


            <input type="email" name="email_id" placeholder="Email Address" class="form-control" required="">

        </div>

        <div class="form-group">

            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>

        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
          <div class="forgot" align="center" style="text-align: center;">
        <a data-toggle="modal" href="#myModal" style="text-align: center; color:rgb(240, 90, 34); ">Forgot password?</a>
</div>

    </form>
 <br>
    	<p>Do not have an account?</p>
    	<button type="submit" class="btn btn-default" style=" width: 100%;
  height: 50px;background-color:  rgb(240, 90, 34);"><a href="<?= base_url()?>welcome/register_employer" class="text-center"  style="color:white;">Sign Up Now!</button></a>
    
    </div>
    

		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

</div>
</div>


 <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <form method="post" action="<?= base_url('welcome/employee_FP')?>">
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" required>

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="submit" name="submit">Submit</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- modal -->



	<!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

	<!-- jQuery Easing -->
	<script src="<?php echo base_url('assets/js/jquery.easing.1.3.js') ?>"></script>

	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	
	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
	
	<!-- Stellar Parallax -->
	<script src="<?php echo base_url('assets/js/jquery.stellar.min.js') ?>"></script>
	
	<!-- Owl Carousel -->
	<script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
	
	<!-- Counters -->
	<script src="<?php echo base_url('assets/js/jquery.countTo.js') ?>"></script>
	
	<!-- Google Map -->
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="<?php echo base_url('assets/js/google_map.js') ?>"></script>
	
	<!-- Main JS (Do not remove) -->
	<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
	

</body>
</html>
