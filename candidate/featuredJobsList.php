<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#Quali').multiselect({
                includeSelectAllOption: true,
                maxHeight: 100
           });
        });
        $(function () {
            $('#Skills').multiselect({
                includeSelectAllOption: true,
                maxHeight: 100
            });
        });

    </script>

<!-- <div class="inner-heading">
	<div class="container">
		<h3>Profile</h3>
	</div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero"> Profile</h1>
</div>

<!-- <?php //$this->load->view('candidate/demo',$profile); ?>
<?php $profile = $profile[0];
//print_r($profile);
?> -->
<div class="inner-content emp-dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 navigation">
				<div class="careerfy-typo-wrap">
					<div class="careerfy-employer-dashboard-nav">
						<!-- <figure>
                            <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>assets/uploads/images/<?= $profile['profile_photo']?>" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $profile['first_name']?>&nbsp;<?= $profile['last_name']?></h2>
                            </figcaption>
                        </figure> -->

                        <ul>
                            <li>
                                <a href="<?= base_url('candidate/candidateDashboard');?>">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>
                        	<li class="active">
                        		<a href="<?= base_url('candidate/candidateProfile');?>">
                        			<i class="fa fa-user-o"></i>
                        			My Profile
                        		</a>
                        	</li>

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
                        	<li>
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

                        </ul>
					</div>
				</div>
			</div>

			<div class="col-md-9 main-page">
				<div class="careerfy-typo-wrap">
                            <?php   
                              if($this->session->flashdata('message_client')){
                                echo $this->session->flashdata('message_client');  
                              } else {
                                echo '';  
                              }
                            ?>
					<form method="post" action="<?= base_url('candidate/candidateProfile')?>" enctype="multipart/form-data">
  						<div class="careerfy-employer-box-section">
						<div class="careerfy-profile-title">
							<h2 style="font-size: 18px;">Basic Information</h2>
						</div>

						<ul class="careerfy-row careerfy-employer-profile-form">
							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>First Name *</label>
								<input type="text" class="form-control input-lg" name="fname" value="<?= $profile['first_name']?>" placeholder="First Name" required>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Middle Name *</label>
								<input type="text" class="form-control input-lg" name="mname" value="<?= $profile['middle_name']?>" placeholder="Middle Name" required>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Last Name *</label>
								<input type="text" class="form-control input-lg" name="lname" value="<?= $profile['last_name']?>" placeholder="Last Name" required>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Email *</label>
								<input type="text" readonly class="form-control input-lg" name="email" value="<?= $profile['email_id']?>" placeholder="Email" required>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Phone *</label>
								<input type="text" class="form-control input-lg" name="phone_no" value="<?= $profile['phone']?>" placeholder="Phone" required>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>City *</label>
                                    <?php
                                      $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
                                    ?>
                                    <select id="City" name="city" class="form-control" required="">
                                      <option selected="selected" disabled="disabled">Select City</option>
                                      <?php
                                      foreach ($city as $row) {
                                       ?>
                                       <option value="<?=$row['city_name']?>"
                                        <?php
                                            if($row['city_name'] == $profile['city'])
                                                echo "selected";
                                        ?>><?=$row['city_name']?></option>
                                       <?php
                                      }
                                      ?>  
                                    </select>
							</li>

							<li class="careerfy-column-12 col-sm-12 col-xs-12">
								<label>Address</label>
								<textarea class="form-control" name="address" cols="" rows="5" required><?= $profile['address']?></textarea>
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
                                    <label>Qualification *</label>
                                    <select name="qualification[]" id="Quali" multiple="multiple" class="form-control" required="required">
                                        <?php
                                        $quali = $this->db->select('*')->from('qualification')->order_by('qualification_name','ASC')->get()->result_array();
                                        $Q = explode(",", $profile['highest_qualification']);
                                        foreach ($quali as $row) {
                                            ?>
                                            <option value="<?=$row['qualification_name']?>"
                                                <?php
                                                if(in_array($row['qualification_name'], $Q))
                                                    echo "selected";
                                                ?>><?=$row['qualification_name']?></option>
                                            <?php
                                        } 
                                        ?>
                                    </select>
                                </li>

                                <li class="careerfy-column-6 col-sm-6 col-xs-12">
                                    <label>Skills *</label>
                                    <select id="Skills" multiple="multiple" required="required" name="skills[]">
                                        <?php
                                        $skill = $this->db->select('*')->from('sub_roles')->order_by('sub_role_type','ASC')->get()->result_array();
                                        $S = explode(",", $profile['skills']);
                                        foreach ($skill as $row) {
                                            ?>
                                            <option value="<?=$row['sub_role_type']?>"
                                                <?php
                                                 if(in_array($row['sub_role_type'], $S))
                                                    echo "selected";   
                                                ?>><?=$row['sub_role_type']?></option>
                                            <?php
                                        } 
                                        ?>
                                    </select>                                
                                </li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Change Profile Pic</label>
								<input type="file" name="profile_photo" class="form-control">
                            <img height="100px" src="<?= base_url()?>assets/uploads/images/<?= $profile['profile_photo']?>" alt="">
							</li>

							<li class="careerfy-column-6 col-sm-6 col-xs-12">
								<label>Resume</label>
								<input type="file" name="resume" class="form-control">
                                               <?php 
                                            $explode=explode(".",$profile['resume']);
                                            //print_r($explode);
                                               ?>
                                               <a href="<?php echo base_url();?>resume/<?= $profile['resume'] ?>">
                                               <?php 
                                               if(!empty($explode[1])){
                                                   
                                                if($explode[1]=='pdf'){?>
                                                <img height="100px" src="<?php echo base_url();?>images/pdf.jpg" class="avatar-medium" />
                                                <?php }else if($explode[1]=='doc' || $explode[1]=='docx'){?>
                                                <img height="100px" src="<?php echo base_url();?>images/word.png" class="avatar-medium" />
                                                <?php
                                                }
                                                }
                                            ?></a>
							</li>
							<!--<li class="careerfy-column-6 col-sm-6 col-xs-12">
							 	<input type="submit" name="update" value="Update Profile" class="careerfy-employer-profile-submit">

							</li>-->

						</ul>
						<br>
							<input type="submit" name="update" value="Update Profile" class="careerfy-employer-profile-submit">

					</div>
					</form>
					
				</div>
			</div>

		</div>
	</div>
</div>