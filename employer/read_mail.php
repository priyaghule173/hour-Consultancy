<!-- <div class="inner-heading">
  <div class="container">
    <h3>Read Mail</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Read Mail</h1>
</div>

<div class="rela-block mycontainer">
    <div class="rela-block profile-card">
        <div class="profile-pic" id="profile_pic"style="background:url('<?= base_url()?>assets/uploads/profile_pics/<?php echo $profile[0]['profile_pic'];?>') center no-repeat; background-size: cover;"></div>
        <div class="rela-block profile-name-container">
            <div class="rela-block user-name" id="user_name"> <h2 style="font-size: 25px;"><?= $this->session->userdata('FIRST_NAME')?>&nbsp;<?=$this->session->userdata('LAST_NAME')?></h2></div>
            <!-- <div class="rela-block user-desc" id="user_description">User Description Here</div> -->
        </div>
        <div class="rela-block profile-card-stats"><div class="floated profile-stat works" id="num_works"><b style=" font-size: 50px; color: #0071bb;">28</b><br></div>
        <div class="floated profile-stat followers" id="num_followers"><b style=" font-size: 50px; color: rgb(240, 90, 34);">112</b><br></div>
        <div class="floated profile-stat following" id="num_following"><b style=" font-size: 50px; color: #0071bb;">245</b><br></div>
    </div>

    <div class="row">
  <div class="col-sm-4" align="center">
    
    <a href="https://www.facebook.com/HouRConsultingEmploymentServices/" style="text-decoration: none;" class=""><i class="fa fa-facebook-f mysocials" style="font-size: 27px; padding: 0.5em; color: #0071bb;"></i> </a>
    <a href="https://twitter.com/HouRConsulting" style="text-decoration: none;"><i class="fa fa-twitter mysocials"  style="font-size: 27px;padding: 0.5em; color: #0071bb;"></i> </a>
    <a href="https://www.linkedin.com/company/hour-consulting/" style="text-decoration: none;" ><i class="fa fa-linkedin mysocials"  style="font-size: 27px;padding: 0.5em; color:#0071bb;"></i></a> 
    <a href="https://www.instagram.com/hourconsulting/" style="text-decoration: none;" ><i class="fa fa-instagram mysocials"  style="font-size: 27px;padding: 0.5em; color: #0071bb;"></i></a> 
  </div>
  <div class="col-sm-4"></div>

  <div class="col-sm-4" align="center">

    <button class="btn btn-info">Edit Profile</button>
  </div>
</div>

</div>


</div>

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

                              <li class="active">
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
        <div class="careerfy-typo-wrap">
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Read Mail</h2>
              </div>
              <?php
                  $emp_id = $this->session->userdata('EMP_ID');
                        /*update flag*/
                        $update['flag'] = '1';
                        $this->db->where('mailbox_id',$this->input->get('id_mail'));
                        $this->db->update('mailbox',$update);
                        
//                  $mails = $this->db->select('*')->from('mailbox')->where('mailbox_id',$this->input->get('id_mail'))->where('user_type','2')->get()->result_array();
                  $mails = $this->db->select('*')->from('mailbox')->where('mailbox_id',$this->input->get('id_mail'))->get()->result_array();

                  foreach($mails as $mail){

              ?>  
              <ul class="careerfy-row careerfy-employer-profile-form">
                <li class="col-md-12 col-sm-12 careerfy-column-12">
                  <label>Time </label>
                  <input type="text" class="form-control" readonly value="<?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?>" >
                </li>

                <li class="col-md-12 col-sm-12 careerfy-column-12">
                  <label>Subject </label>
                  <input type="text" class="form-control" readonly value="<?php echo $mail['subject']; ?>">
                </li>

                <li class="col-md-12 col-sm-12 careerfy-column-12">
                  <label>Message </label>
                  <textarea class="form-control" readonly rows="5"><?php echo stripcslashes($mail['message']); ?></textarea>
                </li>
              </ul>

              <?php } ?>
            </div>

        </div>
      </div>


    </div>
  </div>
</div>
