

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Change Password</h1>
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

                            <li>
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
                        
                            <li class="active">
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
                    <form class="careerfy-employer-dasboard" action="<?=base_url('employer/changePassword')?>" method="post">
                        <div class="careerfy-employer-box-section">
                            <div class="careerfy-profile-title">
                                <h2 style="font-size: 18px;">Change Password</h2>
                            </div>

                            <ul class="careerfy-row careerfy-employer-profile-form">

                                <li class="careerfy-column-6 col-sm-6">
                                    <label>New Password *</label>
                                    <input id="password" type="password" name="password" autocomplete="off" placeholder="Password" required >
                                </li>

                                <li class="careerfy-column-4">
                                    <label>Confirm New Password  *</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control input-lg" autocomplete="off"  placeholder="Confirm Password" required>
                                </li>
                                <li <li class="careerfy-column-2"><span id='message'></span></li>

                            </ul>

                            <input type="submit" name="change_password" id="change_password" class="careerfy-employer-profile-submit" value="Update Password" style="font-size: 13px;">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    $("#change_password").attr("type", "submit");
  } else {
    $('#message').html('Not Matching').css('color', 'red');
    $("#change_password").attr("type", "button");
  }
});
</script>