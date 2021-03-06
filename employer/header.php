<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="chrome=1">

	<title>Hour Consulting</title>
	<!--favicon-->
	
	<link rel="shortcut icon" href="<?= base_url()?>images/favicon.ico">

	<meta name="description" content="&lt;p&gt;Job Portal is a comprehensive, powerful and feature-rich Job board HTML template. It is ...">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

	
  <link rel="stylesheet" href="<?= base_url()?>css/style.css">
  	
  	<!--<link rel="stylesheet" href="<?= base_url()?>css/style.css">

	<script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>js/jquery-3.3.1.js"></script>-->

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
  	
  	
</head>

<body>

	<!--header starts-->

	
<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="logo col-xs-12">
					     <div class="imageclass">
						    <a href="<?= base_url('welcome');?>"><img src="<?= base_url()?>images/logo.png" width="70px" alt="Logo"></a>
                                </div>
                                	<div class="post-btn">
									<a href="<?= base_url('employer/createJobPost')?>">Post a Job</a>
							</div>
                    </div>

				</div>
			</div>
		</div>
		<div class="container menu">
			<div class="navbar navbar-static-top" role="navigation">
				<div class="col-md-3 col-sm-12" style="float: right;">
						<div class="header-right">
							<div class="user-wrap">
	 <?php
$profile = $profile[0];
 ?>
								<div class="register-btn">
									<a href="<?= base_url('employer/empDashboard')?>">Welcome <?= $profile['first_name']." ".$profile['last_name'] ?></a>
								</div>


								<div class="clearfix">
									
								</div>
							</div>

							<!--<div class="post-btn">
								<a href="">Post a Job</a>
							</div>-->

							<div class="clearfix">
								
							</div>

						</div>
					</div>


				<nav class="col-lg-9 col-md-9 navbar-static-top navbar-menu-header" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1" style="background-color: #0459be;">
							 <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar" style="background-color: #fff; font-size: 15px; display: block;width: 22px;height: 2px;border-radius: 1px;"></span>
					            <span class="icon-bar" style="background-color: #fff; font-size: 15px; display: block;width: 22px;height: 2px;border-radius: 1px;"></span>
					            <span class="icon-bar" style="background-color: #fff; font-size: 15px; display: block;width: 22px;height: 2px;border-radius: 1px;"></span>
						</button>
						</div>

						<div id="navbar-collapse-1" class="navbar-collapse collapse menu-links">
									<ul class="nav navbar-nav">
										<li>
											<a href="<?= base_url('welcome/jobListing')?>" style="color: #333; text-transform: uppercase; font-weight: 600;">Search Jobs</a>
										</li>

										<!--<li>
											<a href="<?= base_url('welcome/about');?>" class="active" style="color: #333; text-transform: uppercase; font-weight: 600;">About</a>
										</li>-->


										<li class="dropdown">
										    <a href="<?= base_url('welcome/about');?>" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="color: #333; text-transform: uppercase; font-weight: 600;">About
										    <span class="caret"></span></a>
										    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/ourCompany');?>" >Our Company</a></li>
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/empServices');?>">Employer Services</a></li>
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/jobseeker');?>">Job Seeker Services</a></li>
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/ourCommunity');?>">Our Community</a></li>
								
										    </ul>
										</li>

										<li class="dropdown">
										    <a href="#" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="color: #333; text-transform: uppercase; font-weight: 600;">Looking to Hire
										    <span class="caret"></span></a>
										    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/lookingToHire');?>" >Looking to hire</a></li>
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/whyAlignwithu');?>">Why Align with us</a></li>
										    </ul>
										</li>

										<li class="dropdown">
										    <a href="#" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="color: #333; text-transform: uppercase; font-weight: 600;">FAQ
										    <span class="caret"></span></a>
										    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/faq');?>" >FAQ</a></li>
										      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url('welcome/article');?>">Articles</a></li>
										    </ul>
										</li>

										

						                   <!-- <li>
						                      <a href="<?= base_url('candidate/candidateDashboard')?>" style="color: #333; text-transform: uppercase; font-weight: 600;">Candidate</a>
						                    </li>

						                    <li>
						                      <a href="<?= base_url('employer/empDashboard')?>" style="color: #333; text-transform: uppercase; font-weight: 600;">Employer</a>
						                    </li>

						                    <li>
						                      <a href="<?= base_url('admin/adminDashboard')?>" style="color: #333; text-transform: uppercase; font-weight: 600;">Admin</a>
						                    </li>-->

												<li>
													<a href="<?= base_url('welcome/contact')?>" style="color: #333; text-transform: uppercase; font-weight: 600;">Contact Us</a>
												</li>
											</ul>
						</div>

					</div>

				</nav>
			</div>
		</div>
	<!--header ends-->