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
			
			<div class="col-md-12 col-sm-12 col-xs-12 looking-to-hire-info">
			<form action="<?php echo base_url('welcome/mail_hire_info')?>" method="Post">
				<div class="col-md-3">
					
				</div>
		    <div class="col-md-6 col-sm-6 col-xs-12 job-requirement">
		        <p data-bind="html: sendUsJobRequirementTitle" style="font-size: 18px;
    text-align: center;color: #fff;">Send Us A Job <span>Req</span>uirement</p>

		        
		        <input type="text" name="firstName" required class="form-control" value="<?php echo $hire_data['firstName']; ?>"  placeholder="First Name" style="border-radius: 0px;height: 42px;">

		        
		        <input type="text" name="lastName" required class="form-control" value="<?php echo $hire_data['lastName']; ?>" placeholder="Last Name" style="border-radius: 0px;height: 42px;">

		        
		        <input type="email" name="email" required class="form-control"  value="<?php echo $hire_data['email']; ?>" placeholder="E-mail Address" style="border-radius: 0px;height: 42px;">

		        
		        <input type="text" name="organization" required class="form-control" value="<?php echo $hire_data['organization']; ?>" placeholder="Organization Name" style="border-radius: 0px;height: 42px;">

		        
		        <input type="text" name="job_title" required class="form-control" placeholder="Job Title" style="border-radius: 0px;height: 42px;">

		        
		        <input type="radio" required value="Full Time" name="job_type">Full Time
		        <input type="radio" required value="Part Time" name="job_type">Part Time
		        <input type="radio" required value="Internship" name="job_type">Internship
		        <input type="radio" required value="Work From Home" name="job_type" style="margin-bottom: 10px">Work From Home

		        <textarea name="position" required class="form-control" placeholder="Job Description" style="border-radius: 0px;height: 42px;"></textarea>
		        <!--<input type="text" name="position" required class="form-control" placeholder="Job Description" style="border-radius: 0px;height: 42px;">-->
		        
		        <input type="url" name="web_url" required class="form-control"  placeholder="Website Url" style="border-radius: 0px;height: 42px;">

		        <button id="continueButton" name="submit" style="background-color: rgb(237, 28, 36);border: 1px solid rgb(237, 28, 36);width: 100%;padding: 10px;">Submit</button>
		    </div>

		    <div class="col-md-3">
		    	
		    </div>
		    </form> 

			</div>
			
		   </div>
		</div>
	</div>
</div>