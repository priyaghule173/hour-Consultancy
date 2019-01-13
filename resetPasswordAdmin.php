

<div class="inner-content job-details-wrap">
	<div class="container">
		<div class="row">

			<div class="col-md-2">
				
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h2 style="color: #fff;font-size: 36px;font-weight: 600;">We Offer <span style="color: #209cee;font-weight: bold;">30,000+ </span>
				Job Vacancies Right Now</h2>

				<h5 style="color: #209cee;font-size: 16px;font-weight: bold;line-height: 26px;">Find Jobs,Employment and Career Opportunities</h5>
				<p style="color: #fff;line-height: 26px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
			</div>

			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="login">
					       <?php 
					          if($this->session->flashdata('message')){
					            echo $this->session->flashdata('message');  
					          } else {
					            echo '';  
					          }
					        ?>
					<div class="contctxt">Reset Password</div>
					<div class="formint conForm">
						<form method="post" action="<?= base_url('welcome/resetPasswordAdmin?a_id='.$this->input->get('a_id'))?>">
							<div class="input-wrap">
								<label class="input-group-addon">New Password</label>
								<input type="password" name="password" id="password" placeholder="New Password" class="form-control" required="required">
							</div>

							<div class="input-wrap">
								<label class="input-group-addon">Confirm Password</label>
								
								<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" required="required">
							</div>
		                    <div id="message_1"></div>
							
							<div class="sub-btn">
								<input type="submit" id="reset_password" name="reset_password" class="sbutn" value="Reset Password">
							</div>
								
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="login-form-below">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="text-align: center;color: #1e1ed3;font-weight: bold;">Lorem Ipsum is simply dummy text</h3>
			</div>
		</div>
	</div>
</div>
<script>
    $('#password, #cpassword').on('keyup', function () {
	if ($('#password').val() == $('#cpassword').val()) {
		$('#message_1').html('Matching').css('color', 'green');
		$("#reset_password").attr("type", "submit");
	} else{ 
		$('#message_1').html('Not Matching').css('color', 'red');
   		$("#reset_password").attr("type", "button");
	}
});
</script>