<!-- <div class="inner-heading">
    <div class="container">
        <h3>Change Password</h3>
    </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Change Password</h1>
</div>

<!-- <?php// $this->load->view('candidate/demo',$profile); ?>
<?php $profile// = $profile[0];
?> -->
<div class="inner-content emp-dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 navigation">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dashboard-nav">
                     <!--    <figure>
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
                            <li>
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

                            <li class="active">
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
                    <form method="post" action="<?= base_url('candidate/changePassword')?>">
                        <div class="careerfy-employer-box-section">
                            <?php 
                              if($this->session->flashdata('message')){
                                echo $this->session->flashdata('message');  
                              } else {
                                echo '';  
                              }
                            ?>
                            
                            <div class="careerfy-profile-title">
                                <h2 style="font-size: 18px;">Change Password</h2>
                            </div>

                            <ul class="careerfy-row careerfy-employer-profile-form">
                                
                                <li class="careerfy-column-6 col-sm-6">
                                    <label>New Password *</label>
                                    <input type="password" name="confirm_password" id="password" class="form-control" required>
                                </li>

                                <li class="careerfy-column-6 col-sm-6">
                                    <label>Confirm Password *</label>
                                    <input type="password" name="" id="cpassword" class="form-control" required>
                                </li>
                                <li class="careerfy-column-6 col-sm-6"></li>    
                                <li id="message_1" class="careerfy-column-6 col-sm-6"></li>
                            </ul>

                            <input type="submit" name="update_pass" id="update_pass" class="careerfy-employer-profile-submit" value="Update Password" style="font-size: 13px;">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$('#password, #cpassword').on('keyup', function () {
    if ($('#password').val() == $('#cpassword').val()) {
        $('#message_1').html('Matching').css('color', 'green');
        $("#update_pass").attr("type", "submit");
    } else {
    $('#message_1').html('Not Matching').css('color', 'red');
    $("#update_pass").attr("type", "button");
    }
});
</script>