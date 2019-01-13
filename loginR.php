

<div class="inner-content job-details-wrap">
	<div class="container">
		<div class="row">

			<div class="col-md-2">
				
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h2 style="color: #fff;font-size: 36px;font-weight: 600;">We Offer <span style="color: #209cee;font-weight: bold;">30,000+ </span>
				Job Vacancies Right Now</h2>

				<h5 style="color: #209cee;font-size: 16px;font-weight: bold;line-height: 26px;">Find Jobs,Employment and Career Opportunities</h5>
				<p style="color: #fff;line-height: 26px; font-size:16px">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p style="color: #fff;line-height: 26px;">
            </p>
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

					<div class="contctxt">Login</div>
					<div class="formint conForm">
						<form action="<?=base_url('welcome/check_employer_login')?>" method="post">
							<div class="input-wrap">
								<label class="input-group-addon">Email</label>
								<input type="email" name="email_id" placeholder="Email" class="form-control" required="">
							</div>

							<div class="input-wrap">
								<label class="input-group-addon">Password</label>
								
								<input type="password" name="password" placeholder="Password" class="form-control" required="">
							</div>

								<div class="forgot-pass">
									<span>
    				                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
									</span>
								</div>
							<div class="sub-btn">
								<input type="submit" name="submit" class="sbutn" value="Login">
							</div>
							<br>
								Don't have an account yet? <a href="<?= base_url()?>welcome/register_employer" class="text-center">Create an account</a>
						</form>
					</div>
				</div>
			</div>


          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <form method="post" action="<?= base_url('welcome/employee_FP')?>">
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" required>

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="submit" name="submit">Submit</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- modal -->

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