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
	<body style="  overflow-x: hidden;">
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

.btn:hover
{
	background-color: #29ABE2 !important;
}


p > .fa {
	font-size: 25px;
	color: rgb(240, 90, 34);
}


.form-control
{
	height: 50px;
}

</style>




<br>

<div class="container-fluid" style="margin-top: ; background:white; box-shadow: 5px 5px 5px 5px  #80808021;" style="margin-top: 20%;">
 <div class="row">
 	<div class="col-sm-12" align="center"  style="margin-top: 2%;" > 
 		<h2 style="margin-bottom: 0px;color:#0071bb ">Quick Job Search</h2>
 	</div>
 	<div class="col-sm-12" align="center"  style="margin-bottom: 2%;">
    <form class="form-inline" action="<?=base_url('welcome/findJob')?>" style="padding-top: 15px;">

    <div class="form-group" >
     
      <input type="text" class="form-control mytext " id="job_title" placeholder="Job Title"  name="job title"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34);">
    </div>
    <div class="form-group">
      <?php
                                  $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
      ?>
     
      <select class="form-control mytext" id="sel1" name="city_name"  style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.17), 0 6px 30px 0 rgba(0, 0, 0, 0.34); " >
     <option value="">Location</option>
                                      <?php
                                          foreach ($city as $row) {
                                      ?>
                                  <option value="<?=$row['city_name']?>"><?=$row['city_name']?></option>
                                  <?php
                                   }
                                   ?>  
      </select>
      <br>
     
    </div>
    
    <div class="form-group">
    <button type="submit"  class="btn" style="height: 50px;margin-top:-10px;background-color: #0071bb;"><i class="fa fa-search" style="color: white; font-size: 20px;"></i></button>
</div>
  </form>

  </div>
  </div>
</div>


<section id="fh5co-services" data-section="services">
		<div class="fh5co-services">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center" style="padding-bottom: 0px;">
						<br><br>
						<h2 class="to-animate"><span>Job Seeker</span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate"><b>Looking for a new career challenge in 
Human Resources Consulting or Recruitment ?  </b>
 </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<p><i class="fa fa-search" ></i> &nbsp; &nbsp;At Hour Consulting, we are always looking for ambitious and energetic professionals looking to join a fast growing global recruitment agency. <br><br>

<i class="fa fa-users" style="color: #0071bb;"></i> &nbsp; &nbsp;Our dedicated team of professionals are excited to be a part of our team, culture, able to think out of the box and always go that extra mile to perform to their optimum level. We are always innovating our recruitment and HR consulting processes to reach our goal of becoming a leading global recruitment partner. We offer a platform to provide you with the chance to develop new skills, gain relevant experience and constantly be learning along with the opportunity to grow within the team. Its a terrific time for us and for our team members, with numerous possibilities to expand your career with us.  





					
				</div>
			</div>
		</div>
		
	</section>





		<div class="container-fluid" style="margin-top: 100px; background:#29ABE2; ">
	<div class="row">
		<div class="col-sm-12" align="center" style="height: 220px; background: #29abe2bf;">
			<h2 style="margin-top: 2%;color: white;" >Got a question?</h2>
			<h4 style="color: #3a2525fa;">We are here to help. Check out our <a href="<?= base_url('welcome/faq');?>" style="color:white;"><b>FAQs</b></a> or</h4>
			<a href="<?php echo base_url('Welcome/contact_us_new') ?>"><button class="button button2" style="hover :orange;">Contact Us </button></a>
		</div>
	</div>
</div>



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

