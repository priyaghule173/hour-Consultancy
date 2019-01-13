<!-- <div class="inner-heading">
    <div class="container">
        <h3>Company Profile</h3>
    </div>
</div> -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Company Profile</h1>
</div>

<!-- <?php //$this->load->view('employer/demo',$result); ?> -->

<div class="inner-content emp-dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 navigation">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dashboard-nav">
                       

                        <ul>

                            <li>
                                <a href="<?= base_url('employer/empDashboard');?>">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="active">
                                <a href="<?= base_url('employer/empProfile');?>">
                                    <i class="fa fa-user-o"></i>
                                    Company Profile
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/createJobPost');?>">
                                    <i class="fa fa-address-card-o"></i>
                                    Post a new job
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/myJobPost');?>">
                                    <i class="fa fa-briefcase"></i>
                                    Manage posts
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('employer/jobAppl');?>">
                                    <i class="fa fa-search"></i>
                                     Applications
                                </a>
                            </li>

                     <?php
 $unreadmails_admin = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','0')->where('flag','0')->get()->result_array();
 $unreadmails_can = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','2')->where('flag','0')->get()->result_array();
                        ?>

                              <li>
                                    <a href="<?= base_url('employer/mailbox');?>">
                                          <i class="fa fa-envelope"></i>
                                          Mailbox&nbsp;<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails_admin[0]['unread'] + $unreadmails_can[0]['unread']?></span>
                                    </a>
                              </li>
                            <li>
                                <a href="<?= base_url('employer/packageHistory');?>">
                                    <i class="fa fa-envelope"></i>
                                    Packages
                                </a>
                            </li>
                        
                            <li>
                                <a href="<?= base_url('employer/changePassword');?>">
                                    <i class="fa fa-cog"></i>
                                    Change Password
                                </a>
                            </li>
                            <!--<li>
                                <a href="<?=base_url('employer/backupdata')?>">
                                <i class="fa fa-user"></i>Backup Data</a>
                            </li>-->

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
                <?php 
                  if($this->session->flashdata('message')){
                    echo $this->session->flashdata('message');  
                  } else {
                    echo '';  
                  }
                ?>
                <div class="careerfy-typo-wrap">
                    <form class="careerfy-employer-dasboard" action="<?=base_url('employer/empProfile')?>" method="post" enctype="multipart/form-data">
                        <div class="careerfy-employer-box-section">
                        <?php
                             foreach ($result as $row) {
                         ?>
                        <div class="careerfy-profile-title">
                            <h2 style="font-size: 18px;">Company Details</h2>
                        </div>

                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" placeholder="First Name" value="<?=$row['first_name']?>" required>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Middle Name</label>
                                                <input type="text" name="middle_name" placeholder="Middle Name" required value="<?=$row['middle_name']?>" required>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" placeholder="Last Name" required value="<?=$row['last_name']?>" required>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Phone</label>
                                                <input type="text" name="phone" placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required value="<?=$row['phone']?>">
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Address</label>
                                                <textarea rows="4" name="address" placeholder="Employee Address" required><?=$row['address']?></textarea>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Email</label>
                                                <input type="email" name="email_id" placeholder="Email Id" required value="<?=$row['email_id']?>" readonly disabled>
                                            </li>
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Location</label>
                                                <select name="location" class="form-control">
                                                    <option>Select Company Location</option>
                                                    <?php $sql = $this->db->select('*')->from('city')->get()->result_array();
                                                    foreach ($sql as $row1) {
                                                     ?>
                                                     <option value="<?php echo $row1['city_name']; ?>"
                                                       <?php if($row1['city_name'] == $row['location']){ 
                                                        echo 'selected'; } ?>>
                                                        <?php echo $row1['city_name']; ?></option>
                                                        <?php }  ?>
                                                </select>
                                            </li>
                                           
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" placeholder="Company Name" required value="<?=$row['company_name']?>">
                                            </li>
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Company Email Id</label>
                                                <input type="email" name="company_email_id" placeholder="Company Email" required value="<?=$row['company_email_id']?>">
                                            </li>
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Company Industry</label>
                                                <input type="text" name="company_industry" placeholder="Company Industry" required value="<?=$row['company_industry']?>">
                                            </li>
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>About Company</label>
                                                <textarea rows="4" name="about_company" required placeholder="About Company"><?=$row['about_company']?></textarea>
                                            </li>
                                            
                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Company Address</label>
                                                <textarea rows="4" name="company_address" required placeholder="Company Address"><?=$row['company_address']?></textarea>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Company Website</label>
                                                <input type="text" name="company_website" required placeholder="Company Website" value="<?=$row['company_website']?>">
                                            </li>


                                             <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <label>Change Profile Pic</label>
                                                <input type="file" name="profile_pic"  class="btn btn-default">( .jpg, .jpeg, .png, .gif)
                                                 <?php if($row['profile_pic'] != "") { ?>
                                                <img src="<?=base_url()?>assets/uploads/profile_pics/<?php echo $row['profile_pic']; ?>" class="img-responsive" style="max-height: 150px; max-width: 150px;">
                                                <?php } ?>
                                            </li>

                                            <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                <input type="submit" name="update_emp" value="Update Profile" class="careerfy-employer-profile-submit">
                                            </li>
                                        </ul>
                                </form>
                                <?php
                               }
                          ?>
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