<!--Revolutio slider starts-->
		<div class="job-listing-wrap">
			<div class="container">
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
			</div>
		</div>
<!--Revolution slider ends-->

<div class="page-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h3>Looking To Hire</h3>
			</div>
		</div>
	</div>
</div>

<div class="looking-to-hire">
	<div class="container">
		<div class="row">
			 <?php 
          if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }
        ?>
			<div class="col-md-9 col-sm-12 col-xs-12 looking-to-hire-info">
				<h4>WE DELIVER THE RESULTS YOU NEED.</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

				<div class="row">
					<div class="col-md-6">
						<img src="<?= base_url()?>images/img.jpg" alt="image">
						<h5>Why Along with us</h5>
					</div>

					<div class="col-md-6">
						<img src="<?= base_url()?>images/img.jpg" alt="image">
						<h5>Why Along with us</h5>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 job-requirement">
           <form action="<?php echo base_url('welcome/hire_form')?>" method="Post">
		        <p data-bind="html: sendUsJobRequirementTitle" style="font-size: 18px;">Send Us A Job <span>Req</span>uirement</p>

		        
		        <input type="text" name="firstName" required class="form-control" placeholder="First Name" style="border-radius: 0px;height: 42px;">

		        
		        <input type="text" name="lastName" required class="form-control" placeholder="Last Name" style="border-radius: 0px;height: 42px;">

		        
		        <input type="email" name="email"  required class="form-control"  placeholder="E-mail Address" style="border-radius: 0px;height: 42px;">

		        
		        <input type="text" name="organization" required class="form-control" placeholder="Organization Name" style="border-radius: 0px;height: 42px;">

		         <button id="continueButton" name="submit" style="background-color: rgb(237, 28, 36);border: 1px solid rgb(237, 28, 36);width: 100%;padding: 10px;">Continue</button>

		        
		        </form> 
		    </div>
		    
		</div>
	</div>
</div>


<!-- <div class="col-md-3 col-sm-12 col-xs-12 job-requirement">
				
						
							<h4>Send us a Job Requirement</h4>

							<input type="text" name="firstname" placeholder="First Name" class="form-control" style="height: 45px; border-radius: 0px;">

							<input type="text" name="lastname" placeholder="Last Name" class="form-control" style="height: 45px; border-radius: 0px;">

							<input type="text" name="email" placeholder="Email" class="form-control" style="height: 45px; border-radius: 0px;">

							<input type="text" name="organization" placeholder="Organization" class="form-control" style="height: 45px; border-radius: 0px;">

							<input type="submit" name="continue" value="Continue" class="continue-btn" style="font-weight: bold;width: 100%;height: 45px;border-radius: 0px;background-color: #2c5d2c;border: 1px solid #2c5d2c;">
						
					
			</div> -->