<head>

	
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



 
.time-btn ,.part-time
{
	font-size: 15px;
}

.part-time
{
	font-size: 15px;
  background-color: rgb(240, 90, 34);
  border-radius: 30px;
}

.sbutn:hover
{
  background-color: #29ABE2;
}




</style>




<script type="text/javascript">
	function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var sortBy_ca = $('#sortBy_ca').val();

 /*var quali = $("input[name='rr_1']:checked").val();
            if(quali){
                var quali =quali.toString();
            }else{
                quali='';
            }*/
// var quali = $('#Qualii').val();

 
    //alert(quali);
/* var job_type = $("input[name='rr_2']:checked").val();
            if(job_type){
                var job_type =job_type.toString();
            }else{
                job_type='';
            }*/
 var job_type = $('#JobType').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>welcome/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&sortBy_ca='+sortBy_ca+'&job_type_new='+job_type,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}

</script>
<script>
function myFunction(page_num) {
    page_num = page_num?page_num:0;
 
 var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var sortBy_ca = $('#sortBy_ca').val();

 /*var quali = $("input[name='rr_1']:checked").val();
            if(quali){
                var quali =quali.toString();
            }else{
                quali='';
            }*/
    //alert(quali);
 var job_type = $("input[name='rr_2']:checked").val();
            if(job_type){
                var job_type =job_type.toString();
            }else{
                job_type='';
            }
/*    alert(sortBy);
    alert("<?=$city_s?>");
*/    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>welcome/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&sortBy_ca='+sortBy_ca+'&job_type_new='+job_type,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>

</head>
<body onload="myFunction()">

	<br>

<!--Revolutio slider starts-->
		<!-- <div class="job-listing-wrap">
			<div class="container"> -->
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
			<!-- </div>
		</div> -->
<!--Revolution slider ends-->

<!-- <div class="page-banner" style="background-color: rgb(243, 242, 242);">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h3>Job Search</h3>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid" style="background-image:url(<?php echo base_url('images/Software-Development1.jpg') ?>);     background-size: cover;">
	<div class="row">
		<div class="col-sm-12" style="height: 150px;  background:#0c0c0ca6;">
			<div class="col-sm-12" style="height: 50px;"></div>
			<div class="col-sm-12" style="height: 50px;"><h1 style="text-align: center;color: white;font-size: 50px;">Job Listing</h1></div>
			<div class="col-sm-12" style="height: 50px;"></div>
			
		</div>
	</div>
</div>


<div class="inner-content listing">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				
				<div class="sortbybar">
					<div class="sortbar listingSearch">
						<div class="form-wrap">
							
								<div class="row">
									<div class="col-md-3">
										<div class="input-group">
								<input type="text" id="keywords" class="form-control" placeholder="Job Title Keywords" 
                                        value="<?php
                                                if(isset($job_title))
                                                {
                                                  echo $job_title;
                                                }
                                                ?>" onkeyup="searchFilter()" />
<!-- 											<input type="text" name="jobtitle" placeholder="Job title, skills, or company" class="form-control"> -->
										</div>
									</div>

									<div class="col-md-3">
										<div class="input-group">
											<?php
                                                $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
                                                        ?>
                                                    <select class="form-control" id="sortBy" onchange="searchFilter()" onselect="searchFilter()">
                                                        <option value="">Sort By City</option>
                                                        <?php
                                                            foreach ($city as $row) {
                                                             ?>
                                                             <option value="<?=$row['city_name']?>"
                                                                <?php
                                                                if(isset($city_s))
                                                                {
                                                                if($row['city_name']==$city_s)
                                                                    echo "selected";
                                                                }
                                                                ?>

                                                                ><?=$row['city_name']?></option>
                                                             <?php
                                                            }
                                                            ?>  
                                                    </select>
<!-- 											<select name="location" class="form-control">
												<option>Location...</option>
												<option value="india">India</option>
											</select> -->
										</div>
									</div>

									<div class="col-md-2">
										<div class="input-group">
											<?php
                                                $Job_role = $this->db->select('*')->from('job_role')->order_by('role','ASC')->get()->result_array();
                                                    ?>    
                                                    <select class="form-control" id="sortBy_ca" onchange="searchFilter()">
                                                        <option value="">Sort By Categories</option>
                                                    <?php
                                                  foreach ($Job_role as $JR) {  ?>
                                                   <option value="<?= $JR['role']?>"
                                                    <?php
                                                                if(isset($job_role))
                                                                {
                                                                if($JR['role']==$job_role)
                                                                    echo "selected";
                                                                }
                                                                ?>


                                                    ><?= $JR['role']?></option> 
                                                  <?php
                                                  }
                                                ?>
                                                     </select>
<!-- 											<select name="category" class="form-control">
												<option>Category...</option>
												<option value="01">Web Designer</option>
												<option value="02">Web Developer</option>
											</select> -->
										</div>
									</div>

									<!--<div class="col-md-2">
										<div class="input-group">
											<select class="form-control" id="Qualii" onchange="searchFilter()">
												<option value="">Qualifications...</option>
											<?php 
											$qua = $this->db->get('qualification')->result_array();
												foreach ($qua as $Q) {
													?>
												<option value="<?= $Q['qualification_name']?>"><?= $Q['qualification_name']?></option>

													<?php
												}
											?>
											</select>
										</div>
									</div>-->

									<div class="col-md-2">
										<div class="input-group">
											<select class="form-control" id="JobType" onchange="searchFilter()">
												<option value="">Job Type...</option>
												<option value="Full Time">Full Time</option>
												<option value="Part Time">Part Time</option>
												<option value="Internship">Internship</option>
												<option value="Work From Home">Work From Home</option>
											</select>
										</div>
									</div>



									<div class="col-md-2">
										<div class="input-btn">
											<input type="submit" class="sbutn" value="Search" style="background-color: #0071bb;">
										</div>
									</div>
								</div>
							
						</div>
					</div>
				</div>

				<ul class="listService">
					<li>
						<div class="Service featured-wrap">
							<div class="row">
								

								<div class="col-md-12 col-sm-12 col-xs-12">

									<!--<div class="row job-row">
										<div class="col-md-2 col-sm-2">
											<h5 style="font-weight: bold;">Job Title</h5>
										</div>

										<div class="col-md-3 col-sm-3">
											<h5 style="font-weight: bold;">Company</h5>
										</div>

										<div class="col-md-3 col-sm-3">
											<h5 style="font-weight: bold;">Location</h5>
										</div>

										<div class="col-md-3 col-sm-3">
											<h5 style="font-weight: bold;">Job-Valid</h5>
										</div>

										<div class="col-md-1 col-sm-1">
											<h5 style="font-weight: bold;">Job Type</h5>
										</div>
									</div>-->
									<div id="postList">
                                   <?php if(!empty($posts)): foreach($posts as $post):
                                   
                                 $profile_pic = $this->db->select('*')->from('employer')->where('e_id',$post['job_post_by_emp_id'])->get()->result_array();

                                   ?>

									<div class="row job-listing" style="margin-left:0px; margin-right:0px">

										<div class="col-md-4 col-sm-6 job-title">
										
											 <img src="<?php echo base_url()?>assets/uploads/profile_pics/<?php echo $profile_pic[0]['profile_pic']; ?>" height="150" width="180"> 
												
										</div>
										
                                        <div class="col-md-8 col-sm-6">
                                        <div class="row">
                                            
                                        <div class="col-md-12 col-sm-12">
											<i class="fa fa-calendar" style="color:deeppink;font-size: 25px;"  aria-hidden="true"></i> <?= substr($post['approved_job_post_date'], 0,10)?> - <?= substr($post['job_post_expire_date'],0,10)?>
										</div>
											<div class="col-md-12 col-sm-13 job-title-t">
											    <a  href="<?php echo base_url('welcome/jobDetails?j_id=').$post['j_id']?>" target="_blank" >
											<h4> <?php echo $post['job_title']; ?></h4><a/>
										</div>
											<div class="col-md-12 col-sm-12">
											<div class="part-time"><?= $post['job_type']?></div>
										</div>
										<div class="col-md-12 col-sm-13">
											<p class="job-desc"><?= substr($post['description'],0,150)?>...[<a target="_blank"  href="<?php echo base_url('welcome/jobDetails?j_id=').$post['j_id']?>">See more</a>]</p>
										</div>

										<div class="col-md-12 col-sm-12 job-com">
											<i class="fa fa-building-o" style="color:#13b5ea;" aria-hidden="true"></i>&nbsp;By&nbsp;<?= $post['company_name']?>
										</div>
									
										</div>
			                            </div>
									</div>

                                            <?php
                                             endforeach;
                                             else:
                                              ?>
                                            <p>Post(s) not available.</p>
                                            <?php 
                                            endif;
                                             ?>

                                            <?php echo $this->ajax_pagination->create_links(); ?>
                                        </div>
                                        <div class="loading" style="display: none;">
                                            <div class="content"><img src="<?php echo base_url().'images/126.gif'; ?>"/>
                                            </div>
                                        </div>


								</div>
							</div>
						</div>
					</li>
				</ul>

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
	<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

</body>