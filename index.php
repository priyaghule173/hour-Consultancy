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



/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
/* Styles */
 h1
	{
		font-size: 30px !important;
	}

	h3
	{
		font-size: 18px;
	}

	/*.carousel-caption
	{
		top: 15px;
	}
	header.carousel
	{
		height: 70% !important;
	}

	.caption2
	{
		top: 70px;
	}*/
}

/* Smartphones (landscape) ----------- */
@media only screen and (min-width : 321px) {
/* Styles */
}

/* Smartphones (portrait) ----------- */
@media only screen and (max-width : 320px) {
/* Styles */


 h1
{
	font-size: 20px !important;
}
}

/* iPads (portrait and landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
/* Styles */
}

/* iPads (landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) {
/* Styles */
}

/* iPads (portrait) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {
/* Styles */
}
/**********
iPad 3
**********/
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) and (-webkit-min-device-pixel-ratio : 2) {
/* Styles */
}

@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) and (-webkit-min-device-pixel-ratio : 2) {
/* Styles */
}
/* Desktops and laptops ----------- */
@media only screen  and (min-width : 1224px) {
/* Styles */
}

/* Large screens ----------- */
@media only screen  and (min-width : 1824px) {
/* Styles */
}

/* iPhone 4 ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) and (orientation : landscape) and (-webkit-min-device-pixel-ratio : 2) {
/* Styles */
}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) and (orientation : portrait) and (-webkit-min-device-pixel-ratio : 2) {
/* Styles */
}

/* iPhone 5 ----------- */
@media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

@media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

/* iPhone 6, 7, 8 ----------- */
@media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

@media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

/* iPhone 6+, 7+, 8+ ----------- */
@media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

@media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

/* iPhone X ----------- */
@media only screen and (min-device-width: 375px) and (max-device-height: 812px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

@media only screen and (min-device-width: 375px) and (max-device-height: 812px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

/* iPhone XS Max, XR ----------- */
@media only screen and (min-device-width: 414px) and (max-device-height: 896px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

@media only screen and (min-device-width: 414px) and (max-device-height: 896px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

/* Samsung Galaxy S3 ----------- */
@media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

@media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
/* Styles */
}

/* Samsung Galaxy S4 ----------- */
@media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

@media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

/* Samsung Galaxy S5 ----------- */
@media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}

@media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
/* Styles */
}



































</style>

<br> <br>
<?php $this->load->view("newcar"); ?>


<!-- 
<div id="carouselbig" style="display: none;">
	<?php// $this->load->view('carousel'); ?>
</div>
<div id="carouselsmall">
	<?php //$this->load->view('carousel2'); ?>
</div>
	 -->


	
<!-- 
	<section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="gradient"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h1 class="to-animate">One Page template for any type of <span>Businesses</span></h1>
							<h2 class="to-animate">100% Free HTML5 Template. Licensed under <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">Creative Commons Attribution 3.0.</a> <br> Crafted with love by <a href="http://freehtml5.co/" target="_blank" title="Free HTML5 Bootstrap Templates" class="fh5co-link">FREEHTML5.co</a></h2>
							<div class="call-to-action">
								<a href="#" class="demo to-animate"><i class="icon-power"></i> Demo</a>
								<a href="#" class="download to-animate"><i class="icon-download"></i> Download</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

<!-- <section id="fh5co-trusted" data-section="trusted" style="padding-bottom: 0;">
		<div class="fh5co-trusted">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center"  style="padding-bottom: 0;">
						<h2 class="to-animate"  style="padding-bottom: 0;"><span>Trusted By</span></h2>
						
					</div>
				</div>
				<div class="row">
					 <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
					 	<div class="partner-logo to-animate-2">
					 		<img src="images/logo1.png" alt="Partners" class="img-responsive">
					 	</div>
					 </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo2.png" alt="Partners" class="img-responsive">
						</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo3.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo4.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-12 col-xs-12">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo5.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</section>
 -->
	

<!-- 
	<section id="fh5co-home" data-section="home" style="background-image: url(images/background2.jpg); "data-stellar-background-ratio="0.5">
		<div class="gradient"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h1 style="font-size: 40px; margin-top: 0;">Make Recruiting Your Competitive Advantage <span>Advantage</span></h1>
							<h2 class="to-animate">Talent is a top priority for all startup founders and executives. Jobify offers a way to completely optimize your entire recruiting process. Find better candidates, conduct more focused interviews, and make data-driven hiring decisions.</h2>
							<div class="call-to-action">
								<!-- <a href="#" class="demo to-animate"><i class="icon-power"></i> Demo</a> -->
								<!-- <a href="#" class="download to-animate"> Get Started</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --> 




<!-- <div class="container">
	<div class="row">
		<div class="col-sm-3" class="cat" style="height: 5%;background-color: red;">
			
		</div>
		<div class="col-sm-3" class="cat" style="height: 5%;background-color: green;">
			
		</div>
		<div class="col-sm-3" class="cat" style="height: 5%;background-color: blue;">
			
		</div>
		<div class="col-sm-3" class="cat" style="height: 5%;background-color: gray;">
			
		</div>
	</div>
</div>
 -->


	<section id="fh5co-explore" data-section="explore"  style="padding: 1em 0;">
	


		<div id="fh5co-counter-section" style="padding: 1em 0;" class="fh5co-counters">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center" style="padding-bottom:0;">
						<h2 class="to-animate"><span>Choose your sector</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">We offer jobs in a variety of categories, find the right job for you today. Whether you are starting your career, relocating and looking for a growth in your career, we have options for you. </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row to-animate">
					<div class="col-md-3 text-center" style="background-color: rgb(240, 90, 34); ">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="3452" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/admin1.png" alt="Logo">

						<span class="fh5co-counter-label">Administartion</span>
					</div>
					<div class="col-md-3 text-center" style="background-color: #29ABE2;">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="234" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/digimedia.png" alt="Logo">

						<span class="fh5co-counter-label">Digital Media</span>
					</div>
					<div class="col-md-3 text-center" style="background-color: #ccc;">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="6542" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/sale.png" alt="Logo">
						<span class="fh5co-counter-label">Sales</span>
					</div>
					<div class="col-md-3 text-center" style=" background-color: #0071bb; ">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="8687" data-speed="5000" data-refresh-interval="50"></span> -->

						<img class="category-img" src="<?= base_url()?>images/customercare.png" alt="Logo">
						<span class="fh5co-counter-label">Customer Service</span>
					</div>


					<div class="col-md-3 text-center" style=" background-color: #0071bb; ">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="3452" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/techno.png" alt="Logo">

						<span class="fh5co-counter-label">Technology</span>
					</div>
					<div class="col-md-3 text-center" style="background-color: #ccc;">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="234" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/hr.png" alt="Logo">

						<span class="fh5co-counter-label">Human Resource</span>
					</div>
					<div class="col-md-3 text-center" style="background-color: #29ABE2;">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="6542" data-speed="5000" data-refresh-interval="50"></span> -->
						<img class="category-img" src="<?= base_url()?>images/finance.png" alt="Logo">
						<span class="fh5co-counter-label">Accounting and Finance</span>
					</div>
					<div class="col-md-3 text-center" style="background-color: rgb(240, 90, 34);">
						<!-- <span class="fh5co-counter js-counter" data-from="0" data-to="8687" data-speed="5000" data-refresh-interval="50"></span> -->

						<img class="category-img" src="<?= base_url()?>images/engi.png" alt="Logo" >
						<span class="fh5co-counter-label">Engineering</span>
					</div>


				</div>



			</div>
			<br>
			<div align="center">
				<a href="<?= base_url('welcome/findJob')?>"><button class="button button2 btn-lg" margin-top: 2%;  font-size: 18px;" >Browse all Categories <span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span><span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span></button></a>
				</div>
		</div>
		
	</section>
















	<section id="fh5co-services" data-section="services" style="padding:0;">
		<div class="fh5co-services">
			<div class="container">
				
				<br>
				<div align="center">
				<a href="<?= base_url('welcome/findJob')?>"><button class="button button2 btn-lg" margin-top: 2%;  font-size: 18px;" >Browse all Categories <span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span><span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span></button></a>
				</div>
			</div>
		</div>
		<div class="core-features" style="    padding-top: 4em;">
			<div class="grid2 " style="background-image: url('<?php echo base_url('images/community.jpg') ?>');height: 500px;">
			</div>
			<div class="grid2 fh5co-bg-color">
				<div class="core-f">
					<b><h2 class="" style="color: #29ABE2 ">Community</h2></b>
					<h3  style="color: #0071bb;font-size: 27px;">How working with HouR consulting makes you make a difference </h3>
					<p>HouR consulting believes in giving back to community and making a footprint in local
communities in any way we can. We are the only one in the Industry with such a giving back
program. We try and help communities we service organisations and help job seekers in.
Working with HouR consulting automatically, makes you a participant and you contribute to
your community! Our contributions made are from our revenues. It's that simple.
For every placement we make and for HR consulting projects we are paid for, we give back
a portion to the community our client is in ! It's that simple
					
				<br></p>
				<br>
			
					<a  href="<?= base_url('welcome/ourCommunity');?>"><button class="button button2" style="position: absolute;bottom: 30px;">Find out More</button></a>
				</div>
			</div>
		</div>

<section id="fh5co-services" data-section="services" style="padding-bottom: 60px;">
   <div class="fh5co-services howitworks"  style="padding-bottom: 0;">
	   <div class="container"  style="padding-bottom: 0;">
	<div class="row"  style="padding-bottom: 0;">
					<div class="col-md-12 section-heading text-center" style="padding-bottom:0;">
						<h2 class="to-animate"><span>How It Works</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<!--<h3 class="to-animate"  style="padding-bottom: 0;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>-->
							</div>
						</div>
					</div>
				</div>



        <div class="wizard" style="margin-right:77px;">
            <div class="wizard-inner">
                <div class="connecting-line"></div>

                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="<?= base_url('welcome/findJob');?>" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-file" style="top:40px;font-size:58px;"></i>

                               <!--<p class="process-text"  style="top:-9px;">Step 1</p>-->
                            </span>

                        </a>

                    </li>

                    <!-- class="disabled" -->
                    <li role="presentation" >
                        <a href="<?= base_url('welcome/lookingToHire');?>" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-send" style="top:40px;font-size:58px;"></i>
                                <!--<p class="process-text"  style="top:-9px;">Step 2</p>-->
                            </span>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok" style="top:40px;font-size:58px;"></i>
                                  <!--<p class="process-text" style="top:-9px;">Step 3</p>-->
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text howtext">
        	<div class="row">
        		<div class="col-lg-4 text-center">
        			<p style="width: 77%;float: right;">
        				<span style="font-weight: bold; color:#f05a22">Looking For a Job?</span> <br>&nbsp;Search for the right job today
        			</p>
        		</div>
        		<!--<div class="col-lg-4 text-center">	<p style="width: 77%;float: right;"><span style="font-weight: bold;color:#f05a22">Need career assistance?</span> <br>&nbsp;HourR team is there to help</p></div>-->
        		<div class="col-lg-4 text-center">	<p style=""><span style="font-weight: bold;color:#f05a22">Need career assistance?</span> <br>&nbsp;HourR team is there to help</p></div>
<!--        		<div class="col-lg-4 text-center">	<p style="width: 77%;float: right;"><span style="font-weight: bold;color:#f05a22">Register your resume</span> <br>&nbsp;Apply to jobs now.-->
<!--</p></div>-->
	<div class="col-lg-4 text-center">	<p style="width: 77%;"><span style="font-weight: bold;color:#f05a22">Register your resume</span> <br>&nbsp;Apply to jobs now.
</p></div>
        	</div>
        </div>
    </div>
</div>

<div class=" howitworksmob">

	<div class="row"  style="padding-bottom: 0;">
					<div class="col-md-12 section-heading text-center" style="padding-bottom:0;">
						<h2 class="to-animate"><span>How It Works</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<!--<h3 class="to-animate"  style="padding-bottom: 0;">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>-->
							</div>
						</div>
					</div>
				</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12" align="center">
				<i class="glyphicon glyphicon-file mobi"></i>
				<p style="color:#f05a22">Looking For a Job? </p>
 <p>Search for the right job today</p>
			</div>
			<div class="col-xs-12"  align="center">
				<i class="glyphicon glyphicon-send mobi"></i>
				<p style="color:#f05a22">Need career assistance? </p>
 <p>HourR team is there to help</p>
			</div>
			<div class="col-xs-12"  align="center">
				<i class="glyphicon glyphicon-ok mobi"></i>
				<p style="color:#f05a22">Register your resume </p>
 <p>Apply to jobs now.</p>
			</div>
		</div>
	</div>
</div>
    </section>




<div class="container-fluid jobline" style="background-image:url('images/Software-Development1.jpg');     background-size: cover;">
	<div class="row">
	
			<div class="col-sm-12" style="height: 244px; background:#29abe2bf">
				<div class="row">
					<div class="offset-sm-2 col-sm-4" align="center" style="margin-top: 50px;">
						<div style="margin-left: 192px;">
						<h3 style="color: white;">Want to hire?</h3>
						<h4 style="color: white;">Start your search today</h4>
						<a class="external" role="menuitem" tabindex="-1" href="<?= base_url('welcome/faq');?>" ><button class="button button2" style="width:254px;">Hire Now</button></a>
						</div>
					</div>
				<div class="col-sm-4" align="center"  style="margin-top: 50px;">
					    <div style="margin-left: 10px;">
						<h3 style="color: white;">Looking for HR support?</h3>
						<h4 style="color: white;">We can help starting now
About Us
</h4>
						<a class="external"  href="<?= base_url('welcome/ourCompany');?>" ><button class="button button2" style="width:254px;">Find out more</button></a>
						</div>
					</div>
					<div class="col-sm-4" align="center"  style="margin-top: 50px;">
						<div style="margin-left:-189px; ">
						<h3 style="color: white;">Why partner with HouR ?</h3>
						<h4 style="color: white;">Make an impact that counts</h4>
						<a class="external" role="menuitem" tabindex="-1" href="<?= base_url('welcome/ourCommunity');?>" ><button class="button button2" style="width:254px;">Make an impact with HouR</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section id="fh5co-explore " data-section="explore">
		
		<div class="fh5co-project joblinemob">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="project-grid to-animate-2" style="background-image:  url(images/project-1.jpg);">
							<div class="desc">
								<h3><a href="#">Want to hire?</a></h3>
								<span>Start your search today</span> <br>

							<a class="external" role="menuitem" tabindex="-1" href="<?= base_url('welcome/faq');?>" ><button class="button button2" style="width:254px;">Hire Now</button></a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="project-grid to-animate-2" style="background-image:  url(images/project-2.jpg);">
									<div class="desc">
										<h3><a href="#">Looking for HR support?</a></h3>
										<span>We can help starting now
About Us</span>

<a class="external"  href="<?= base_url('welcome/ourCompany');?>" ><button class="button button2" style="width:254px;">Find out more</button></a>

										
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="project-grid to-animate-2" style="background-image:  url(images/project-5.jpg);">
									<div class="desc">
										<h3><a href="#">Why partner with HouR ?</a></h3>
										<span>Make an impact that counts</span>

										<a class="external" role="menuitem" tabindex="-1" href="<?= base_url('welcome/ourCommunity');?>" ><button class="button button2" style="width:254px;">Make an impact with HouR</button></a>
									</div>
								</div>
							</div>
						</div>
						
					</div>

					
					
				</div>
			</div>	
		</div>
		
		
	</section>

	

	








	






	<section id="fh5co-team" class="fh5co-bg-color" data-section="team">
		<div class="fh5co-team">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center" style="padding-bottom:0;">
						<h2 class="to-animate"><span>Articles</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">HouR resources team offers interesting updates on the industry, latest hiring tips for
organisations and methods for job seekers to enhance their job search.
Check out our latest articles today.
 </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="team-box text-center to-animate-2" style="height:479px!important;">
							<!-- <div class="user"><img class="img-reponsive" src="images/person3.jpg" alt="Roger Garfield"></div> -->
							<!-- <div class="card-img"> -->
							<img class="blog-img" src="<?= base_url()?>images/blog1.jpg" alt="Logo">
						    <!-- </div> -->
							<h3> Interview Tips</h3>
							<!--<span class="position">Full Stack Developer</span>-->
							<p>Interviews can be on the phone, video and in person, in groups , panel. Review these quick
tips to make sure your ready to give a terrific interview
</p>
							<!--<ul class="social-media">-->
							<!--	<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>-->
							<!--	<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>-->
							<!--	<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>-->
							<!--	<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>-->
							<!--	<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>-->
							<!--</ul>-->
						</div>
					</div>

					<div class="col-md-4">
						<div class="team-box text-center to-animate-2">
							<!-- <div class="user"><img class="img-reponsive" src="images/person3.jpg" alt="Roger Garfield"></div> -->
							<!-- <div class="card-img"> -->
							<img class="blog-img" src="<?= base_url()?>images/blog2.jpg" alt="Logo">
						    <!-- </div> -->
							<h3> How can HR management solutions free up time for senior team members ?</h3>
							<!--<span class="position">Full Stack Developer</span>-->
							<p>HR management solutions can be tailored to organisational needs to free up senior
management's time for them to focus on other core
activities
</p>
							<!--<ul class="social-media">-->
							<!--	<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>-->
							<!--	<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>-->
							<!--	<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>-->
							<!--	<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>-->
							<!--	<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>-->
							<!--</ul>-->
						</div>
					</div>

					<div class="col-md-4">
						<div class="team-box text-center to-animate-2" style="height:479px!important;">
							<!-- <div class="user"><img class="img-reponsive" src="images/person3.jpg" alt="Roger Garfield"></div> -->
							<!-- <div class="card-img"> -->
							<img class="blog-img" src="<?= base_url()?>images/blog3.jpg" alt="Logo">
						    <!-- </div> -->
							<h3> Looking for remote work? Factors to assess before you take the jump
</h3>
							<!--<span class="position">Full Stack Developer</span>-->
							<p>Remote work definitely offers flexibility , find out the additional factors to consider before you
make the change</p>
							<!--<ul class="social-media">-->
							<!--	<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>-->
							<!--	<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>-->
							<!--	<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>-->
							<!--	<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>-->
							<!--	<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>-->
							<!--</ul>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--  -->






	<!-- <section id="fh5co-explore" data-section="explore"  style="padding: 1em 0;">
	


		<div id="fh5co-counter-section" style="padding: 1em 0;" class="fh5co-counters">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center" style="padding-bottom:0;">
						<h2 class="to-animate"><span>Our Achievement</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row to-animate">
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="3452" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">JOBS ADDED</span>
					</div>
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="234" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">ACTIVE RESUMES</span>
					</div>
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="6542" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">COMPANY</span>
					</div>
					<div class="col-md-3 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="8687" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">POSITION  MATCHED</span>
					</div>
				</div>
			</div>
		</div>
		
	</section> -->

	<div class="container-fluid" style="margin-top: 100px; background:#29ABE2; ">
	<div class="row">
		<div class="col-sm-12" align="center" style="height: 220px; background: #29abe2bf;">
			<h2 style="margin-top: 2%;color: white;" >Got a question?</h2>
			<h4 style="color: #3a2525fa;">We are here to help. Check out our <a href="<?= base_url('welcome/faq');?>" style="color:white;"><b>FAQs</b></a> or</h4>
			<a href="<?php echo base_url('Welcome/contact_us_new') ?>"><button class="button button2" style="hover :orange;">Contact Us </button></a>
		</div>
	</div>
</div>

	
	<!-- <section id="fh5co-testimony" class="fh5co-bg-color" data-section="testimony">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Our Happy Clients</span></h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 to-animate">
					<div class="wrap-testimony">
						<div class="owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person2.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person3.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person2.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

<!-- 	<div class="getting-started getting-started-1">
		<div class="getting-grid" style="background-image:  url(images/full_image_3.jpg);">
			<div class="desc">
				<h2>Getting <span>Started</span></h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			</div>
		</div>
		<a href="#" class="getting-grid2">
			<div class="call-to-action text-center">
				<p href="#" class="sign-up">Sign Up For Free</p>
			</div>
		</a>
	</div> -->
	
	<!-- <section id="fh5co-pricing" data-section="pricing">
		<div class="fh5co-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span>Plans Built For Every One</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Starter</h2>
							<div class="price"><sup class="currency">$</sup>7<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>10 projects</li>
								<li>20 Pages</li>
								<li>20 Emails</li>
								<li>100 Images</li>
							</ul>
							<p><a href="#" class="btn btn-primary">Read More</a></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Regular</h2>
							<div class="price"><sup class="currency">$</sup>19<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>15 projects</li>
								<li>40 Pages</li>
								<li>40 Emails</li>
								<li>200 Images</li>
							</ul>
							<p><a href="#" class="btn btn-primary">Read More</a></p>
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 to-animate">
						<div class="price-box popular">
							<div class="popular-text">Best value</div>
							<h2 class="pricing-plan">Plus</h2>
							<div class="price"><sup class="currency">$</sup>79<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>Unlimitted projects</li>
								<li>100 Pages</li>
								<li>100 Emails</li>
								<li>700 Images</li>
							</ul>
							<p><a href="#" class="btn btn-primary">Read More</a></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Enterprise</h2>
							<div class="price"><sup class="currency">$</sup>125<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>Unlimitted projects</li>
								<li>Unlimitted Pages</li>
								<li>Unlimitted Emails</li>
								<li>Unlimitted Images</li>
							</ul>
							<p><a href="#" class="btn btn-primary">Read More</a></p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3 to-animate">
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. <a href="#">Learn More</a></p>
					</div>
				</div>

			</div>
		</div>
	</section> -->	

	

<!-- 	<section id="fh5co-blog" data-section="blog">
		<div class="fh5co-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span>Read Our Blog</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate blog">
						<div class="blog-grid" style="background-image: url(images/full_image_5.jpg);">
							<div class="date">
								<span>03</span>
								<small>Aug</small>
							</div>
						</div>
						<a href="#" class="desc">
							<div class="desc-grid">
								<h3>Download Free HTML5 Template</h3>
							</div>
							<div class="reading">
								<i class="icon-arrow-right2"></i>
							</div>
						</a>
					</div>

					<div class="col-md-6 to-animate blog">
						<div class="blog-grid" style="background-image: url(images/full_image_4.jpg);">
							<div class="date">
								<span>04</span>
								<small>Aug</small>
							</div>
						</div>
						<a href="#" class="desc">
							<div class="desc-grid">
								<h3>Download Free HTML5 Template</h3>
							</div>
							<div class="reading">
								<i class="icon-arrow-right2"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
<!-- 
	<section id="fh5co-faq" class="fh5co-bg-color" data-section="faq">
		<div class="fh5co-faq">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span>Common Questions</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Everything you need to know before you get started</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>What is Twist?</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>I have technical problem, who do I email? </h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>How do I use Twist features?</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>What language are available?</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>Can I have a username that is already taken?</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>Is Twist free?</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
<!-- 
	<section id="fh5co-trusted" data-section="trusted">
		<div class="fh5co-trusted">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span>Trusted By</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">We’re trusted by these popular companies</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					 <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
					 	<div class="partner-logo to-animate-2">
					 		<img src="images/logo1.png" alt="Partners" class="img-responsive">
					 	</div>
					 </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo2.png" alt="Partners" class="img-responsive">
						</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo3.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo4.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-12 col-xs-12">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo5.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</section>
 -->






	
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="assets/js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="assets/js/jquery.countTo.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="assets/js/google_map.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="assets/js/main.js"></script>

<!-- 	<script type="text/javascript">
if ( $(window).width() > 800 ) {

$("#carouselbig").show();
$("#carouselsmall").hide();

}
else
{
	$("#carouselsmall").show();
	$("#carouselbig").show();
}
</script> -->

	</body>
</html>

