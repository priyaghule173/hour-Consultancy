<!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">


<!-- <div class="inner-heading">
  <div class="container">
    <h3>Mailbox</h3>
  </div>
</div> -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Mailbox</h1>
</div>

<!-- <?php //$this->load->view('candidate/demo',$profile); ?>

<?php
$profile //= $profile[0];
?> -->
<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 navigation">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
                       <!--  <figure>
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

                        <!--  <li>
                            <a href="#">
                              <i class="fa fa-address-card-o"></i>
                              My Resume
                            </a>
                          </li>-->

                          <li>
                            <a href="<?= base_url('candidate/candidateDashboard')?>">
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
                            <?php   
                              if($this->session->flashdata('message')){
                                echo $this->session->flashdata('message');  
                              } else {
                                echo '';  
                              }
                            ?>        
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Mailbox</h2>
                <div class="pull-right">
                  <a href="<?= base_url('candidate/createMail');?>" style="background-color: yellowgreen;" class="careerfy-classic-btn careerfy-bgcolor">
                    <i class="fa fa-envelope" ></i>
                    Create
                  </a>
                </div>
              </div>
                <div class="careerfy-profile-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#TAB_1">Inbox&nbsp;(<?= $unreadmails[0]['unread']?>)</a></li>
                          <?php
                          ?>
                        <li><a data-toggle="tab" href="#TAB_2">Send&nbsp;</a></li>

                    </ul>
                  </div>
                  
           <div class="tab-content">
                    <!-- tab first start -->
                <div id="TAB_1" class="tab-pane fade in active">
                  
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">

                            <table id="example1" class="table table-hover">
                                                   
                                              <thead>
                                                <tr>
                                                  <th>Subject</th>
                                                  <th>Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php

                                            $candidate_id = $this->session->userdata('c_id');
                                                if($candidate_id !=0){

                                                $mails = $this->db->query('SELECT * FROM mailbox WHERE user_type = 1 AND to_userid="'.$candidate_id.'" ORDER BY mailbox_id DESC')->result_array();            
                                                    
                                                     // $mails = $this->db->select('*')->from('mailbox')->where('to_userid',$emp_id)->where('user_type','0')->or_where('user_type','2')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                if($mail['flag']==0){    
                                              ?>
                                              <tr style="background-color:orange;">
                                               <td class="mailbox-subject"><a href="<?= base_url('candidate/readMail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>
                                              <?php
                                                }
                                                else{
                                                    ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('candidate/readMail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>    
                                                    <?php
                                                }
                                                  
                                                }
                                                }
                                              ?>
                                              </tbody>
                                              
                                            </table>
                    </div>
                </div>
            </div>
            </div>
    <!-- tab send start -->
                <div id="TAB_2" class="tab-pane fade">
                  
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">

                            <table id="example2" class="table table-hover">
                                                   
                                              <thead>
                                                <tr>
                                                  <th>Subject</th>
                                                  <th>Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php

                                            $candidate_id = $this->session->userdata('c_id');
                                                if($candidate_id !=0){

                                                      $mails = $this->db->select('*')->from('mailbox')->where('from_userid',$candidate_id)->where('user_type','2')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                        # code...
                                                      
                                              ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('candidate/readMail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>
                                              <?php
                                                  }
                                                }
                                              ?>
                                              </tbody>
                                              
                                            </table>
                    </div>
                </div>
            </div>
            </div>
            </div>

              
  <!--              <div class="col-sm-12">
                  <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-hover">
                      <thead style="font-size: 13px;">
                        <tr>
                          <th>Subject</th>
                          <th>Date</th>
                        </tr>
                      </thead>

                      <tbody>
                                                <?php

                                            $candidate_id = $this->session->userdata('c_id');
                                                if($candidate_id !=0){

                                                    $mails = $this->db->select('*')->from('mailbox')->where('to_userid',$candidate_id)->where('user_type','1')->get()->result_array();
                                                  
                                             
                                                    foreach ($mails as $mail) {
                                                    
                                            ?>
                                            <tr>
                                             <td class="mailbox-subject"><a href="<?= base_url('candidate/readMail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                              <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                            </tr>
                                            <?php
                                                }
                                              }
                                            ?>
                                        </tbody>
                    </table>
                  </div>
                </div>-->
              
            </div>
          
        </div>
      </div>

    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>