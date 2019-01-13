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
				<h3>Contact Us</h3>
			</div>
		</div>
	</div>
</div>

<div class="contact-form">
	<div class="container">
		<div class="row">
			
			<div class="col-md-5 col-sm-12 col-xs-12 contact-info">
				<h4>Contact Information</h4>
				<p><strong>Address:</strong> Abc-101, Pride Icon, Kharadi bypass Road,Pune-01</p>
				<p><strong>Email:</strong> abc@gmail.com</p>
				<p><strong>Phone:</strong> 9034343424</p>
			</div>

			<div class="col-md-7 col-sm-12 col-xs-12 contact-us">
				<?php 
                  if($this->session->flashdata('message')){
                    echo $this->session->flashdata('message');  
                  } else {
                    echo '';  
                  }
                ?>
				<form method="post" action="<?= base_url('welcome/contact_us');?>">
				<h4>Contact Us</h4>
				
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<input type="text" name="name" class="form-control" style="height: 40px; border: 1px solid #0071bb21; border-radius: 0px;margin-bottom: 10px;" placeholder="Name" required>
					</div>

					<div class="col-md-6 col-sm-12 col-xs-12">
						<input type="email" name="email" class="form-control" style="height: 40px; border: 1px solid #0071bb21;border-radius: 0px; margin-bottom: 10px;" placeholder="Email" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<input type="text" name="phone" maxlength="10" onkeypress="return isNumberKey(event);" onkeypress="return validatePhone(event);" class="form-control" style="height: 40px; border: 1px solid #0071bb21;border-radius: 0px;margin-bottom: 10px;" placeholder="Phone" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<textarea name="message" class="form-control" rows="5" style="border: 1px solid #0071bb21;border-radius: 0px; margin-bottom: 10px;" placeholder="Message" required></textarea>	
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<input type="submit" name="submit" value="Send" class="send-button">
					</div>
				</div>
				</form>
			</div>

		</div>
	</div>
</div>
<script>

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}

function validatePhone(event) {

        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          return true;
      } else if( key < 48 || key > 57 ) {
    
          return false;
      } else return true;
  }
function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }

function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }

$(document).ready(function(){
  $('.customer-logos').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 3
      }
    }]
  });
});
</script>
