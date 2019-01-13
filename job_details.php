<!--Revolutio slider starts-->
		<!-- <div class="job-details-wrap">
			<div class="container"> -->
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
<!-- 			</div>
		</div> -->
<!--Revolution slider ends-->
<!-- 
<div class="page-banner" style="background-color: rgb(243, 242, 242);">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h3>Job Details</h3>
			</div>
		</div>
	</div>
</div> -->

<header>
	

<!-- twist  styles -->

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
	

<!-- end twist styles -->

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
		overflow-x: hidden;
	}



 
.time-btn
{
	font-size: 15px;
}


</style>
</header>


<div class="container-fluid" style="background-image:url(<?php echo base_url('images/Software-Development1.jpg') ?>);     background-size: cover;">
	<div class="row">
		<div class="col-sm-12" style="height: 150px;  background:#0c0c0ca6;">
			<div class="col-sm-12" style="height: 50px;"></div>
			<div class="col-sm-12" style="height: 50px;"><h1 style="text-align: center;color: white;font-size: 50px;">Job Details</h1></div>
			<div class="col-sm-12" style="height: 50px;"></div>
			
		</div>
	</div>
</div>
    <?php 
          if($this->session->flashdata('message')){
          echo $this->session->flashdata('message');  
   } else {
     echo '';  
       }
  ?>
<div class="inner-content listing detail">
	<div class="container">
		
		<div class="inner-wrap">
			<div class="row">
				
				<div class="col-md-8">
							<?php
							if(!empty($this->session->userdata('c_id')))
							{
							    //echo $this->session->userdata('c_id');
                                $this->session->set_userdata('newjob_id',$this->input->get('j_id'));							    
							}
                                $this->session->set_userdata('newjob_id_1',$this->input->get('j_id'));							    
							
							foreach ($result as $row) {
								$emp_id = $row['job_post_by_emp_id'];
    							$job_role = $row['job_role'];
    							
    							$com_d = $this->db->get_where('employer',array('e_id'=>$emp_id))->result_array();
								?>
					<div class="listWrpService jobdetail">
						<div class="row">
							

							<div class="col-md-3 col-sm-3 col-xs-3">
								<div class="listImg">
									<img src="<?= base_url()?>assets/uploads/profile_pics/<?= $com_d[0]['profile_pic']?>" alt="">
									
								</div>
							</div>

							<div class="col-md-9 col-sm-9 col-xs-9">
								<h3><?= $row['job_title']?></h3>
								<p><?= $row['company_name']?></p>
								<ul class="featureInfo">
									<li>
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<?= $row['city']?> - <?=$row['localities']?> &nbsp;
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?= substr($row['approved_job_post_date'], 0,10)?> - <?= substr($row['job_post_expire_date'],0,10)?>
									</li>
								</ul>

								<div class="time-btn" style="
    font-size: 15px;
"><?= $row['job_type']?></div>

								<div class="click-btn" style="
    font-size: 15px;
">
									<a href="<?= base_url('welcome/login')?>">Apply Now</a>
								</div>
							</div>

						</div>

						<div class="row" style="padding-top: 20px;">
							<div class="col-md-4">
								<h4>Qualifications: </h4><?= $row['qualification_required']?>
							</div>

							<div class="col-md-4">
								<h4>Skills: </h4><?= $row['sub_roles']?>
							</div>

							<div class="col-md-4">
								<h4>Experience: </h4><?= $row['min_exp']." - ".$row['max_exp']?>Years
							</div>
						</div>

						<h2>Description</h2>
						<p>
							<?= $row['description']?>
						</p>

						<h2>Roles and Responsibility</h2>
							<ul class="featureLinks benefits">
								<?php 
								$RAR = explode("^", $row['roles_and_responsibilities']);
									foreach ($RAR as $rar) {
								?>	
    								<li><?= $rar?></li>							
								<?php
								}
								?>
    						</ul>
					</div>
					<?php } ?>
					<div class="listWrpService related-jobs">
						<div class="related-heading"><h3>Other related Jobs</h3></div>
						<div class="row">
						    <?php 
						    $other_r_j = $this->db->limit(2)->order_by('j_id','DESC')->get_where('job_posts',array('action'=>'1','job_role'=>$job_role))->result_array();
						    foreach($other_r_j as $ORJ){
						    ?>
							<div class="col-md-6">
								<h4>
									<a href="<?= base_url('candidate/jobDetails?j_id='.$ORJ['j_id'])?>"><?= $ORJ['job_title']?></a>
								</h4>
								<p><?= $ORJ['company_name']?></p>
								<ul class="featureInfo innerfeat">
									<li>
										<i class="fa fa-map-marker" aria-hidden="true"></i><?= $ORJ['city']?>
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?= substr($ORJ['approved_job_post_date'], 0,10)?> - <?= substr($ORJ['job_post_expire_date'],0,10)?>
									</li>
								</ul>
								<div class="time-btn"><?= $ORJ['job_type']?></div>
								<!--<div class="click-btn">
									<a href="">Apply Now</a>
								</div>-->
							</div>
                            <?php } ?>
							<!--<div class="col-md-6">
								<h4>
									<a href="">Marketing Graphic Design / 2D Artist</a>
								</h4>
								<p>Design Communication Studio</p>
								<ul class="featureInfo innerfeat">
									<li>
										<i class="fa fa-map-marker" aria-hidden="true"></i>Pune, MH
										<i class="fa fa-calendar" aria-hidden="true"></i>May 30, 2018 - July 20, 2018
									</li>
								</ul>
								<div class="time-btn">Full Time</div>
								<div class="click-btn">
									<a href="">Apply Now</a>
								</div>
							</div>-->
						</div>
					</div>


				</div>

				<div class="col-md-4">
					<div class="sidebarWrp listWrpService jobdetail">
						<?php 
						  $about_com = $this->db->get_where('employer',array('e_id'=>$emp_id))->result_array();
						?>
						<h3>About Company</h3>
						<p><?= $about_com[0]['about_company']?></p>
						
						<div class="companyInfo">Industry</div>
						<p><?= $about_com[0]['company_industry']?></p>

						<div class="companyInfo">Location</div>
						<p><?= $about_com[0]['location']?></p>

					</div>

					<div>
							<div class="listWrpService">
								<div class="row">
									<h4 class="heading-featured"><strong>Featured Jobs</strong></h4>
									<?php
									$FJ = $this->db->limit(2)->order_by('sequence_featured_job','ASC')->get_where('job_posts',array('action'=>'1','featured_job'=>'1'))->result_array();
									$count = 0;
										if(!empty($FJ)){
									foreach ($FJ as $FJL) {
										$count++;
										if($count == 2)
										{ }
										?>
									<div class="col-md-12 col-sm-12 col-xs-12 featured-jobs">
										<h5><a href="<?= base_url('candidate/jobDetails?j_id='.$FJL['j_id'])?>"><?= $FJL['job_title']?></a></h5>
										<p></p>
										<ul class="featureInfo">
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<?= $FJL['city']?>
<!--												&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i><?= $FJL['job_type']?>-->
											</li>
											<li>
												<i class="fa fa-calendar" aria-hidden="true"></i>
												<?= substr($FJL['approved_job_post_date'], 0,10)?> - <?= substr($FJL['job_post_expire_date'],0,10)?>
											</li>
										</ul>
										<div class="time-btn"><?= $FJL['job_type']?></div>
<!--										<div class="click-btn"><a href="<?= base_url('welcome/login')?>">Apply Now</a></div>-->
									</div>
										<?php
										if($count == 2)
										{		?>
							<div style="text-align: center;"><a href="<?= base_url('welcome/featuredJobsList')?>" style="background-color: #ddd;color: #333;font-weight: bold;padding: 3px 99px 17px 100.5px;text-align: center;">View All</a></div>
											<?php
										}
									} 
								}
									?>
									<!--<div class="col-md-12 col-sm-12 col-xs-12 featured-jobs">
										<h5><a href="">Marketing Graphic Design / 2D Artist</a></h5>
										<p>Design Communication Studio</p>

										<ul class="featureInfo">
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>Pune,MH
											</li>

											<li>
												<i class="fa fa-calendar" aria-hidden="true"></i>1 Jun, 2018 - 31 Jun, 2018
											</li>
										</ul>

										<div class="time-btn">Part Time</div>
										<div class="click-btn"><a href="">Apply Now</a></div>
									</div>-->

								</div>

								<!--<div class="row">
									
									<div class="col-md-12 col-sm-12 col-xs-12 featured-jobs">
										<h5><a href="">Marketing Graphic Design / 2D Artist</a></h5>
										<p>Design Communication Studio</p>

										<ul class="featureInfo">
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>Pune,MH
											</li>

											<li>
												<i class="fa fa-calendar" aria-hidden="true"></i>1 Jun, 2018 - 31 Jun, 2018
											</li>
										</ul>

										<div class="time-btn">Part Time</div>
										<div class="click-btn"><a href="">Apply Now</a></div>
									</div>

								</div>-->
							</div>
						</div>
						
				</div>

			</div>
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
	<!-- <script src="<?php echo base_url('assets/js/main.js') ?>"></script> -->