<!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<!-- <div class="inner-heading">
  <div class="container">
    <h3>Mailbox</h3>
  </div>
</div>
 -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Mailbox</h1>
</div>



<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-3 navigation">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dashboard-nav">
                       

                        <ul>

                            <li >
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
                <h2 style="font-size: 18px;">Mailbox</h2>
                <div class="pull-right">
                  <a href="<?= base_url('employer/createMail');?>" class="careerfy-classic-btn careerfy-bgcolor">
                    <i class="fa fa-envelope"></i>
                    Create
                  </a>
                </div>
              </div>
                
                <div class="careerfy-profile-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#TAB_1">Inbox&nbsp;(<?= $unreadmails_admin[0]['unread'] + $unreadmails_can[0]['unread']?>)</a></li>
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

                                              $emp_id = $this->session->userdata('EMP_ID');

                                                  if($emp_id !=0){

                                                $mails = $this->db->query('SELECT * FROM mailbox WHERE user_type = 0 OR user_type = 2 AND to_userid="'.$emp_id.'" ORDER BY mailbox_id DESC')->result_array();            
                                                    
                                                     // $mails = $this->db->select('*')->from('mailbox')->where('to_userid',$emp_id)->where('user_type','0')->or_where('user_type','2')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                if($mail['to_userid'] == $emp_id)
                                                {
                                                if($mail['flag']==0){    
                                              ?>
                                              <tr style="background-color:orange;">
                                               <td class="mailbox-subject"><a href="<?= base_url('employer/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>
                                              <?php
                                                }
                                                else{
                                                    ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('employer/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
                                                <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($mail['created_at'])); ?></td>
                                              </tr>    
                                                    <?php
                                                }
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

                                              $emp_id = $this->session->userdata('EMP_ID');

                                                  if($emp_id !=0){

                                                      $mails = $this->db->select('*')->from('mailbox')->where('from_userid',$emp_id)->where('user_type','1')->order_by('mailbox_id','DESC')->get()->result_array();
                                                    
                                                  //print_r($mails);

                                                      foreach ($mails as $mail) {
                                                        # code...
                                                      
                                              ?>
                                              <tr>
                                               <td class="mailbox-subject"><a href="<?= base_url('employer/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
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


              
<!--                <div class="col-sm-12">
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

                                                                      $emp_id = $this->session->userdata('EMP_ID');

                                                                        if($emp_id !=0){

                                                                        $mails = $this->db->select('*')->from('mailbox')->where('to_userid',$emp_id)->where('user_type','2')->or_where('user_type','0')->get()->result_array();
                                                                            
                                                                        foreach ($mails as $mail) {                                                                              
                                                                      ?>
                        <tr>
                                                                             <td class="mailbox-subject"><a href="<?= base_url('employer/read_mail');?>?id_mail=<?php echo $mail['mailbox_id']; ?>"><?php echo $mail['subject']; ?></a></td>
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

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
/*  $(function () {
    $('#example1').DataTable();
    'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
  })
*/
    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });

</script>