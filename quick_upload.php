
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
	

#cover {
    max-width :100%;
     height :auto
}

.container-fluid {
    padding-right:0;
    padding-left:0;
    margin-right:auto;
    margin-left:auto
 }

 .parent{
 	height: 20%;
 	width: 100%;
 }
 
 label{
     font-size: 16px;
 }
 
 
 #image_div img {
  			/* Set rules to fill background */
			max-height: 200px;
            min-height: 500px;
			min-width: 100%;
			
			/* Set up proportionate scaling */
			width: 100%;
			height: auto;
			
			/* Set up positioning */
			//position: fixed;
			top: 0;
			left: 0;
}

@media screen and (max-width: 1024px){
			#image_div img {
				left: 50%;
				margin-left: -512px; }
}



/** {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}*/

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: #0071bb;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.mycontainer {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.mycontainer::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -13px;
  background-color: #29ABE2;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid black;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent #29ABE2;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent #29ABE2 transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -13px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
  border: 1px solid #29ABE2;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .mycontainer {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .mycontainer::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}


/*file upload*/
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
/*end file upload*/


</style>

<br>
<div class="container">
	<div class="row">

		<div  class="col-sm-1"></div>
	<div class="col-sm-10 jumbotron" >	
	  <h2 style="text-align: center;color:#0071bb;    font-weight: bold;
">Submit Resume</h2>
 <!--  <p>The form below shows input elements with different widths using different .col-xs-* classes:</p> -->
  <form>
    <div class="form-group row">
    	<div class="col-xs-12">
      <label for="sel1">Specialized Service:</label>
      <select class="form-control" id="sel1">
        <option>Administration</option>
        <option>Digital Media</option>
        <option>Sales</option>
        <option>Customer Service</option>
        <option>Technology</option>
        <option>Human Resource</option>
        <option>Accounting And Finance</option>
        <option>Engineering</option>
        
      </select>
  	</div>

  	 <div class="col-xs-6">
        <label for="ex1">First Name</label>
        <input class="form-control" id="ex1" type="text">
      </div>

       <div class="col-xs-6">
        <label for="ex1">Last Name</label>
        <input class="form-control" id="ex1" type="text">
      </div>

       <div class="col-xs-12">
        <label for="ex1">Email</label>
        <input class="form-control" id="ex1" type="text">
      </div>

       <div class="col-xs-12">
        <label for="ex1">Phone Number</label>
        <input class="form-control" id="ex1" type="text">
      </div>

       <div class="col-xs-4">
        <label for="ex1">City</label>
        <input class="form-control" id="ex1" type="text">
      </div>

       <div class="col-xs-4">
       	 <label for="sel1">State/Province</label>
      <select class="form-control" id="sel1">

       <option>	Downtown Toronto</option>
 <option>Ottawa Area</option>
 <option>Etobicoke</option>
 <option>Kitchener Waterloo</option>
 <option>Oakville</option>
 <option>Milton</option>
 <option>Burlington</option>
 <option>Mississauga</option>
 <option>Scarborough</option>
 <option>Pickering</option>
 <option>Vaughan</option>
 <option>North York</option>
 <option>Greater Toronto Area</option>
 <option>Ajax</option>
 <option>Guelph</option>
 <option>London</option>
 <option>Windsor</option>
 <option>Montreal</option>
 <option>Quebec City</option>
     
      </select>
      
      </div>

       <div class="col-xs-4">
         <label for="ex1">Postal Code</label>
        <input class="form-control" id="ex1" type="text">
       
      </div>

      <div class="form-group files col-xs-12">
                <label>Upload Your Resume </label>
                <input type="file" class="form-control" multiple="">
              </div>

      
    </div>
    <div class="col-xs-12" align="center">
   <button type="submit" class="button button2">Submit</button>
   </div>
  </form>
  </div>
  </div>

  <div class="col-sm-1"></div>

</div>
<br>







	




	
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

