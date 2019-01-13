<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<!-- <div class="inner-heading">
	<div class="container">
		<h3>Admin Dashboard</h3>
	</div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Admin Dashboard</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 navigation">
				<div class="careerfy-typo-wrap">
					<div class="careerfy-employer-dashboard-nav">
					<!-- 	<figure>
                 <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                    </a>
                      <figcaption>
                                <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                            </figcaption>
                        </figure>
 -->
                        <ul>
                        	<li class="active">
                        		<a href="<?= base_url('admin/adminDashboard');?>">
                        			<i class="fa fa-dashboard"></i>
                        			Dashboard
                        		</a>
                        	</li>
                      <?php
                        $Pending = $this->db->select('count(e_id) as total')->from('employer')->where('active','0')->get()->result_array();
                         ?>
                        <li>
                        		<a href="<?= base_url('admin/manageEmp');?>">
                        			<i class="fa fa-users"></i>
                              Manage Employer <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $Pending[0]['total']?></span>
                        		</a>
                        	</li>
                          <li>
                            <a href="<?= base_url('admin/empPackages');?>">
                              <i class="fa fa-user-o"></i>
                              Employer Packages
                            </a>
                          </li>
                          
                          <?php 
                          $total_fj = $this->db->get_where('job_posts',array('action'=>'1','request_fj'=>'1','featured_job'=>'0'))->result_array();
                          ?>
                          <li>
                            <a href="<?= base_url('admin/featuredJob');?>">
                             <i class="fa fa-user-o"></i>
                             Featured Job<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span>
                           </a>
                         </li>
                         <li>
                           

                         </li>
                          
                         
                        	<li>
                        		<a href="#" data-toggle="dropdown">
                        			<i class="fa fa-address-card-o"></i>
                        			Packages
                        			<ul class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/pendingPlatinumPackEmp')?>"><i class="fa fa-trophy"></i>Platinum Pack</a>
                                        </li>
                                        <li>
                                              <a href="<?=base_url('admin/pendingGoldPackEmp')?>"><i class="fa fa-dollar"></i>Gold Pack</a>
                                        </li>
                                    </ul>
                        		</a>
                        	</li>

                        	<li>
                        		<a href="<?= base_url('admin/createJobRole');?>">
                        			<i class="fa fa-briefcase"></i>
                        			Add Specialization
                        		</a>
                        	</li>

                        	<li>
                        		<a href="<?= base_url('admin/candidateSection');?>">
                        			<i class="fa fa-search"></i>
                        			Candidate Section
                        		</a>
                        	</li>
                        <li>
                      <?php
                  $unreadmails = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid','admin')->where('user_type','2')->where('flag','0')->get()->result_array();
                         ?>
                              <a href="<?=base_url('admin/mailbox')?>"><i class="fa fa-envelope"></i> Mailbox <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails[0]['unread']?></span></a>
                        </li>
                        	<li>
                        		<a href="<?=base_url('admin/backupdata')?>">
                        			<i class="fa fa-database"></i>
                        			Backup Data
                        		</a>
                        	</li>

                        	<li>
                        		<a href="<?= base_url('admin/changePassword');?>">
                        			<i class="fa fa-cog"></i>
                        			Change Password
                        		</a>
                        	</li>

                        	<li>
                            <a href="#" data-toggle="dropdown">
                              <i class="fa fa-address-card-o"></i>
                                  Blog Posting
                              <ul id="subclass" class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/add_blog')?>"><i class="fa fa-trophy"></i>Add Blog</a>
                                        </li>
                                      <li>
                                              <a href="<?=base_url('admin/manage_blog')?>"><i class="fa fa-dollar"></i>Manage Blog</a>
                                      </li>
                                </ul>
                            </a>
                          </li>
                          <li>
                            <a href="<?=base_url('welcome/logout')?>">
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
					<div class="careerfy-employer-dasboard">
             <?php 
              if($this->session->flashdata('message')){
                echo $this->session->flashdata('message');  
              } else {
                echo '';  
              }
            ?>
						<div class="careerfy-employer-box-section">
							<?php

                                    $platinum_req = $this->db->select('count(distinct(job_post_by_emp_id)) as total')->from('job_posts')->where('Package_type','Platinum')->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Platinum")')
                                    ->get()->result_array();
                                    $gold_req = $this->db->select('count(distinct(job_post_by_emp_id)) as total')->from('job_posts')->where('Package_type','Gold')->where('job_post_by_emp_id NOT IN (select e_id from employer_packages where package_name ="Gold")')->get()->result_array();
                                    $sql = $this->db->select('distinct(job_post_by_emp_id)')->from('job_posts')->where('Package_type','Platinum')->get()->result_array();

                                    $Free_pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Free')->get()->result_array();
                                                  
                                    $Platinum_pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Platinum')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Platinum")')->get()->result_array();

                                    $Gold_pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Gold')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Gold")')->get()->result_array();

                                    $total_pending =$Free_pending_jobs[0]['total'] + $Platinum_pending_jobs[0]['total'] + $Gold_pending_jobs[0]['total'];

                                    ?>
							<div class="careerfy-profile-title">
								<h2 style="font-size: 18px;">No Consultancy Statistics</h2>
								<ul class="nav top-menu">
									<li id="header_notification_bar" class="dropdown">
										<a title="job Notifications" class="dropdown-toggle" href="<?=base_url('admin/all_pending_job_posts')?>">
											<i class="fa fa-bell-o"></i>
											<span class="badge bg-success"><?=$total_pending?></span>
										</a>
									</li>

									<li id="header_notification_bar" class="dropdown">
										<a title="Platinum Notifications" class="dropdown-toggle" href="<?=base_url('admin/pending_platinum_pack_emp')?>">
											<i class="fa fa-trophy"></i>
											<span class="badge bg-important"><?=$platinum_req[0]['total']?></span>
										</a>
									</li>

									<li id="header_notification_bar" class="dropdown">
										<a title="Gold Notifications" class="dropdown-toggle" href="<?=base_url('admin/pending_gold_pack_emp')?>">
											<i class="fa fa-trophy"></i>
											<span class="badge bg-warning"><?=$gold_req[0]['total']?></span>
										</a>
									</li>

					
					                <h2 style="font-size: 18px;">Package Renew Notification</h2>
                                      <li id="header_notification_bar" class="dropdown">
                                        <a title="job Notifications" class="dropdown-toggle" href="<?=base_url('admin/empPackages')?>">
                                          <i class="fa fa-bell-o"></i>
                                          <span class="badge bg-success">
                                            <?php $aaa = $this->db->select('SUM(platinum_req + gold_req) as req_total')->from('employer')->get()->result_array();
                                            echo $aaa[0]['req_total']; 
                                            ?>
                                          </span>
                                        </a>
                                      </li>
                    			</ul>
					
						</div>
							<div class="careerfy-Sub-title">
								<h5>Package Section</h5>
							</div>

							<div class="row state-overview col-sm-12">
								<div class="col-lg-4 col-sm-12">
									<p class="heading">Free Packages</p>
									<section class="panel" style="background-color: #f9f9f9;">
										<div class="symbol terques">
											<i class="fa fa-check-circle-o"></i>
										</div>
										<?php
                                            $active_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','1')->where('Package_type','Free')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count"><?php if($active_jobs[0]['total']==0)
                                                echo $active_jobs[0]['total'];
                                              else
                                                 {
                                              ?><a href="<?=base_url('admin/approved_job_posts')?>"><?= $active_jobs[0]['total']?></a>
                                                <?php     
                                                   } 
                                          ?></h1>
											<p>Total Active</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Platinum Packages</p>
									<section class="panel">
										<div class="symbol red">
											<i class="fa fa-check-circle-o"></i>
										</div>
										<?php
                                            $active_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('Package_type','Platinum')->where('action','1')->get()->result_array();
                                        ?>
										<div class="value">
											<h1 class="count"><?php if($active_jobs[0]['total']==0)
                                                    echo $active_jobs[0]['total'];
                                                  else
                                                     {
                                                  ?>
                                                  <a href="<?=base_url('admin/approved_platinum_job_posts')?>"><?= $active_jobs[0]['total']?></a>
                                                  <?php     
                                                     } 
                                            ?></h1>
											<p>Total Active</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Gold Packages</p>
									<section class="panel">
										<div class="symbol yellow">
											<i class="fa fa-check-circle-o"></i>
										</div>
										<?php
                                              $active_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','1')->where('Package_type','Gold')->get()->result_array();
                                              
                                            ?>
										<div class="value">
											<h1 class="count">
												<?php if($active_jobs[0]['total']==0)
                                                      echo $active_jobs[0]['total'];
                                                    else
                                                       {
                                                    ?>
                                                    <a href="<?=base_url('admin/approved_gold_job_posts')?>"><?= $active_jobs[0]['total']?></a>
                                                    <?php     
                                                       } 
                                                      ?>
                                            </h1>
											<p>Total Active</p>
										</div>
									</section>
								</div>
							</div>

							<div class="row state-overview col-sm-12">
								<div class="col-lg-4 col-sm-12">
									<p class="heading">Free Packages</p>
									<section class="panel">
										<div class="symbol terques">
											<i class="fa fa-clock-o"></i>
										</div>
										<?php
                                            $pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Free')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count"><?php if($pending_jobs[0]['total']==0)
                                                      echo $pending_jobs[0]['total'];
                                                    else
                                                       {
                                                    ?>
                                                    <a href="<?=base_url('admin/pending_job_posts')?>"><?= $pending_jobs[0]['total']?></a>
                                                    <?php     
                                                       } 
                                              ?></h1>
											<p>Total Pending</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Platinum Packages</p>
									<section class="panel">
										<div class="symbol red">
											<i class="fa fa-clock-o"></i>
										</div>
										<?php
                                            /*Approval pending , Approved , Rejected*/
                                              $pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Platinum')
                                               ->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Platinum")')->get()->result_array();
                                            ?>
										<div class="value">
											<h1 class="count"><?php if($pending_jobs[0]['total']==0)
                                                    echo $pending_jobs[0]['total'];
                                                  else
                                                     {
                                                  ?>
                                                  <a href="<?=base_url('admin/pending_platinum_job_posts')?>"><?= $pending_jobs[0]['total']?></a>
                                                  <?php     
                                                     } 
                                            ?></h1>
											<p>Total Pending</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Gold Packages</p>
									<section class="panel">
										<div class="symbol yellow">
											<i class="fa fa-clock-o"></i>
										</div>
										<?php
                                            $pending_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','0')->where('Package_type','Gold')->where('job_post_by_emp_id IN (select e_id from employer_packages where package_name ="Gold")')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count">
												<?php if($pending_jobs[0]['total']==0)
                                                  echo $pending_jobs[0]['total'];
                                                else
                                                   {
                                                ?>
                                                <a href="<?=base_url('admin/pending_gold_job_posts')?>"><?= $pending_jobs[0]['total']?></a>
                                                <?php     
                                                   } 
                                          ?></h1>
											<p>Total Pending</p>
										</div>
									</section>
								</div>
							</div>

							<div class="row state-overview col-sm-12">
								<div class="col-lg-4 col-sm-12">
									<p class="heading">Free Packages</p>
									<section class="panel">
										<div class="symbol terques">
											<i class="fa fa-ban"></i>
										</div>
										<?php
                                              $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','2')->where('Package_type','Free')->get()->result_array();
                                              
                                            ?>
										<div class="value">
											<h1 class="count">
												<?php if($rejected_jobs[0]['total']==0)
                                                  echo $rejected_jobs[0]['total'];
                                                else
                                                   {
                                                ?>
                                                <a href="<?=base_url('admin/rejected_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                <?php     
                                                   } 
                                          ?></h1>
											<p>Total Rejected</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Platinum Packages</p>
									<section class="panel">
										<div class="symbol red">
											<i class="fa fa-ban"></i>
										</div>
										<?php
                                              $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','2')->where('Package_type','Platinum')->get()->result_array();
                                              
                                            ?>
										<div class="value">
											<h1 class="count"> 
												<?php if($rejected_jobs[0]['total']==0)
                                                      echo $rejected_jobs[0]['total'];
                                                    else
                                                       {
                                                    ?>
                                                    <a href="<?=base_url('admin/rejected_platinum_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                    <?php     
                                                  } 
                                              ?></h1>
											<p>Total Rejected</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Gold Packages</p>
									<section class="panel">
										<div class="symbol yellow">
											<i class="fa fa-ban"></i>
										</div>
										<?php
                                            $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','2')->where('Package_type','Gold')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count">
											<?php if($rejected_jobs[0]['total']==0)
                                                    echo $rejected_jobs[0]['total'];
                                                  else
                                                     {
                                                  ?>
                                                  <a href="<?=base_url('admin/rejected_gold_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                  <?php     
                                                     } 
                                            ?></h1>
											<p>Total Rejected</p>
										</div>
									</section>
								</div>
							</div>

							<div class="row state-overview col-sm-12">
								<div class="col-lg-4 col-sm-12">
									<p class="heading">Free Packages</p>
									<section class="panel">
										<div class="symbol terques">
											<i class="fa fa-times-circle-o"></i>
										</div>
										<?php
                                              $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','3')->where('Package_type','Free')->get()->result_array();
                                              
                                            ?>
										<div class="value">
											<h1 class="count">
											<?php if($rejected_jobs[0]['total']==0)
                                                    echo $rejected_jobs[0]['total'];
                                                  else
                                                     {
                                                  ?>
                                                  <a href="<?=base_url('admin/expired_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                  <?php     
                                                     } 
                                            ?></h1>
											<p>Total Expired</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Platinum Packages</p>
									<section class="panel">
										<div class="symbol red">
											<i class="fa fa-times-circle-o"></i>
										</div>
										<?php
                                            $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','3')->where('Package_type','Platinum')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count">
											<?php if($rejected_jobs[0]['total']==0)
                                                      echo $rejected_jobs[0]['total'];
                                                    else
                                                       {
                                                    ?>
                                                    <a href="<?=base_url('admin/expired_platinum_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                    <?php     
                                                       } 
                                              ?></h1>
											<p>Total Expired</p>
										</div>
									</section>
								</div>

								<div class="col-lg-4 col-sm-12">
									<p class="heading">Gold Packages</p>
									<section class="panel">
										<div class="symbol yellow">
											<i class="fa fa-times-circle-o"></i>
										</div>
										<?php
                                            $rejected_jobs = $this->db->select('count(j_id) as total')->from('job_posts')->where('action','2')->where('Package_type','Gold')->get()->result_array();
                                            
                                          ?>
										<div class="value">
											<h1 class="count">
											<?php if($rejected_jobs[0]['total']==0)
                                                    echo $rejected_jobs[0]['total'];
                                                  else
                                                     {
                                                  ?>
                                                  <a href="<?=base_url('admin/expired_gold_job_posts')?>"><?= $rejected_jobs[0]['total']?></a>
                                                  <?php     
                                                     } 
                                            ?>
                                        </h1>
											<p>Total Expired</p>
										</div>
									</section>
								</div>
							</div>

							<div class="row state-overview col-sm-12">
								<div class="col-lg-6 col-sm-12">
									<p class="heading"></p>
									<section class="panel">
										<div class="symbol reded">
											<i class="fa fa-users"></i>
										</div>
										<div class="value">
											<h1 class="count"><a href="<?=base_url('admin/candidate_section')?>">
                                                <?= $total_candidate[0]['total_candidate']?>
                                              </a></h1>
											<p>Registered Candidates</p>
										</div>
									</section>
								</div>

								<div class="col-lg-6 col-sm-12">
									<p class="heading"></p>
									<section class="panel">
										<div class="symbol blue">
											<i class="fa fa-files-o"></i>
										</div>
										<div class="value">
											<h1 class="count">
												<a href="<?=base_url('admin/candidate_section')?>">
                                                <?= $total_applications[0]['total_applications']?>
                                              </a></h1>
											<p>Total Applications</p>
										</div>
									</section>
								</div>

								
							</div>


						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
