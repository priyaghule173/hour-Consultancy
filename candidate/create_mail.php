<div class="inner-heading">
	<div class="container">
		<h3>Read Mail</h3>
	</div>
</div>
<?php
$profile = $profile[0];
?>
<div class="inner-content emp-dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 navigation">
				<div class="careerfy-typo-wrap">
					<div class="careerfy-employer-dashboard-nav">
                        <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>assets/uploads/images/<?= $profile['profile_photo']?>" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $profile['first_name']?>&nbsp;<?= $profile['last_name']?></h2>
                            </figcaption>
                        </figure>


                       <ul>
                        <li>
                                <a href="<?= base_url('candidate/candidateDashboard');?>">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>
                        	<li>
                        		<a href="<?= base_url('candidate/candidateProfile');?>">
                        			<i class="fa fa-user-o"></i>
                        			My Profile
                        		</a>
                        	</li>

                        <!--	<li>
                        		<a href="#">
                        			<i class="fa fa-address-card-o"></i>
                        			My Resume
                        		</a>
                        	</li>-->

                        	<li>
                        		<a href="<?= base_url('candidate/candidateDashboard');?>">
                        			<i class="fa fa-briefcase"></i>
                        			Applied Jobs
                        		</a>
                        	</li>

                        	<li>
                        		<a href="<?= base_url('candidate/findJob');?>">
                        			<i class="fa fa-search"></i>
                        			Find Jobs
                        		</a>
                        	</li>

                    <?php
                        $unreadmails = $this->db->query('SELECT COUNT(mailbox_id) as unread FROM mailbox WHERE user_type = 1 AND to_userid="'.$this->session->userdata('c_id').'" AND flag = 0')->result_array();            
                    ?>
                        	<li class="active">
                        		<a href="<?= base_url('candidate/mailbox');?>">
                        			<i class="fa fa-envelope"></i>
                        			Mailbox&nbsp;<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails[0]['unread']?>
                        		</a>
                        	</li>


                        	<li>
                        		<a href="<?= base_url('candidate/changePassword');?>">
                        			<i class="fa fa-cog"></i>
                        			Change Password
                        		</a>
                        	</li>

                        	<li>
                        		<a href="<?= base_url('candidate/logout')?>">
                        			<i class="fa fa-sign-out"></i>
                        			Logout
                        		</a>
                        	</li>

                        </ul>
					</div>
				</div>
			</div>

			<div class="col-md-9 main-page">
				<div class="careerfy-typo-wrap">
					<form method="post" action="<?= base_url('candidate/createMail')?>">
						<div class="careerfy-employer-box-section">
							<div class="careerfy-profile-title">
								<h2 style="font-size: 18px;">Compose New Message</h2>
							</div>

							<ul class="careerfy-row careerfy-employer-profile-form">
								<li class="col-md-12 col-sm-12 careerfy-column-12">
									<label>To *</label>
									<select name="to" class="form-control">
										<option value="select">Select Applied Jobs</option>
                                            <?php 
                                            $data = $this->db->select('*')->from('applied_jobs')->where('c_id',$this->session->userdata('c_id'))->join('job_posts','applied_jobs.j_id=job_posts.j_id')->get()->result();
	                                        foreach ($data as $row) {
                                            ?>
                                           <option value="<?php echo($row->job_post_by_emp_id)?>"><?php echo($row->job_title)?></option>
                                            <?php
	                                            }
                                           ?>
									</select>
								</li>

								<li class="col-md-12 col-sm-12 careerfy-column-12">
									<label>Subject *</label>
									<input type="text" name="subject" class="form-control" placeholder="Subject">
								</li>

								<li class="col-md-12 col-sm-12 careerfy-column-12">
									<label>Message *</label>
									<textarea name="message" class="form-control" placeholder="Message" rows="5"></textarea>
								</li>
							</ul>
						</div>

						<div class="pull-right">
							<input type="submit" name="submit" class="careerfy-employer-profile-submit" value="Send" style="font-size: 13px;">
						</div>

						<a href="" class="btn btn-default btn-lg" style="padding: 8px; font-size: 13px;">
							<i class="fa fa-times"></i>Discard
						</a>

					</form>
				</div>
			</div>


		</div>
	</div>
</div>