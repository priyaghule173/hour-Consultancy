<link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

<!--Revolutio slider starts-->
		<div class="job-details-wrap">
			<div class="container">
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
			</div>
		</div>
<!--Revolution slider ends-->

<div class="page-banner" style="background-color: rgb(243, 242, 242);">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h5>Employer Register</h5>
			</div>
		</div>
	</div>
</div>

<div class="inner-content loginWrp">
	<?php 
          if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }
        ?>
	<div class="container">
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-7 col-sm-12">
				<div class="login">
					<div class="contctxt">Please complete all fields.</div>
					<div class="formint conForm">
						<form method="post" class="cand-form" action="<?=base_url('welcome/register_employer')?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input type="text" name="first_name" class="form-control"  onKeyPress="return ValidateAlpha(event);" placeholder="First Name" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input type="text" class="form-control" name="middle_name" onKeyPress="return ValidateAlpha(event);" placeholder="Middle Name" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="text" name="last_name" onKeyPress="return ValidateAlpha(event);" placeholder="Last Name" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="email" id="check_email" name="email_id" placeholder="Email Id" required>
									</div>
    								<div id="message_2"></div>
								</div> 
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										 <input class="form-control" type="text" name="phone" placeholder="Phone Number" onkeypress="return isNumberKey(event);" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<select name="location" class="form-control" required>
											<option>Select Company Location</option>
											<?php $sql = $this->db->select('*')->from('city')->get()->result_array(); 
											foreach ($sql as $row) {
											?>
											<option value="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										 <textarea class="form-control" rows="4" name="address" placeholder="Employee Address"></textarea>
									</div>
								</div>
<!-- 
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input type="number" name="postal_code" class="form-control" placeholder="Postal Code">
									</div>
								</div> -->

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                      					<span id='message_1'></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="text" name="company_name" onKeyPress="return ValidateAlpha(event);" placeholder="Company Name" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="text" name="company_website" placeholder="Company Website">
									</div>
								</div>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
									    <!--onblur="validateEmail(this);"-->
										<input class="form-control" type="email" name="company_email_id"  placeholder="Company Email" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<input class="form-control" type="text" name="company_industry" placeholder="Company Industry" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<textarea class="form-control" rows="4" name="about_company" placeholder="About Company" required></textarea>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="input-wrap">
										<textarea class="form-control" rows="4" name="company_address" placeholder="Company Address" required></textarea>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
			                    <label class="col-sm-3 col-md-3">Company Logo</label>
									<div class="input-wrap col-sm-3 col-md-3">
								        <input type="file" name="profile_pic" accept="image/*" required><!--( .jpg, .jpeg, .png, .gif)-->
								  </div>
							</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									 <label><input type="checkbox" required> I accept terms & conditions</label>
								</div>

								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="sub-btn">
										<input type="submit" id="register_emp" name="register_emp" class="sbutn" value="Register Now">
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>

			</div>

			<div class="col-md-3 col-sm-2">
				<div class="rightbox">
					<h2 class="rightbox_h2">Find Better with</h2>
					<h2 class="rightbox_h2 colr">HR</h2>

					<div class="right_txtchange">
						<div class="separate">
							20000+ Employers
							Millions of Jobs. Find Yours
						</div>
					</div>

					<div class="frmlogin_box">
						Already a member?
						<a href="<?= base_url()?>welcome/loginR" class="login_lnk">Sign in Here</a>
					</div>
				</div>
			</div>

			<div class="col-md-1">
				
			</div>


		</div>


	</div>
</div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>

<script type="text/javascript">

$('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message_1').html('Matching').css('color', 'green');
    $("#register_emp").attr("type", "submit");
  } else{ 
    $('#message_1').html('Not Matching').css('color', 'red');
    $("#register_emp").attr("type", "button");
	}
});

 function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

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
 
</script>

<script>
  $("#country").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#state").find('option:not(:first)').remove();
    if(id != '') {
      $.post("state.php", {id: id}).done(function(data) {
        $("#state").append(data);
      });
      $('#stateDiv').show();
    } else {
      $('#stateDiv').hide();
      $('#cityDiv').hide();
    }
  });
</script>

<script>
  $("#state").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#city").find('option:not(:first)').remove();
    if(id != '') {
      $.post("city.php", {id: id}).done(function(data) {
        $("#city").append(data);
      });
      $('#cityDiv').show();
    } else {
      $('#cityDiv').hide();
    }
  });
  
  $('#check_email').focusout(function(){
    var can_email = $('#check_email').val();
    $.ajax({
        type:'POST',
        url:'<?php echo base_url('welcome/check_emp_email_exists/') ?>',
        data:{can_email:can_email},
        success: function(data){
            if(data.flag == '0'){
                $('#message_2').html('Email Can be Used').css('color', 'green');
        		$("#register_emp").attr("type", "submit");
            }
            else
            {
                $('#message_2').html('Email Already in Use').css('color', 'red');
        		$("#register_emp").attr("type", "button");
            }
        },
        error:function(data){
            alert(data);
        }
    });
});
</script>
