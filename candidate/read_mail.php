<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Read Mail</h1>
</div>
<!-- <?php// $this->load->view('candidate/demo',$profile); ?> -->

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
                            
                        </figure>


                       <ul>
                        <li>
                            <a href="<?= base_url('candidate/candidateDashboard');?>">
                              <i class="fa fa-dashboard"></i>
                              Dashboard
                            </a>
                          </li>
                          <!--<li>
                            <a href="<?= base_url('candidate/candidateProfile');?>">
                              <i class="fa fa-user-o"></i>
                              My Profile
                            </a>
                          </li>-->

                          <li>
                            <a href="#">
                              <i class="fa fa-address-card-o"></i>
                              My Resume
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
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Read Mail</h2>
              </div>
              <?php
                  $candidate_id = $this->session->userdata('c_id');
                    /*update flag*/
                        $update['flag'] = '1';
                        $this->db->where('mailbox_id',$this->input->get('id_mail'));
                        $this->db->update('mailbox',$update);
                        
                  $mails = $this->db->select('*')->from('mailbox')->where('to_userid',$candidate_id)->where('mailbox_id',$_GET['id_mail'])->where('user_type','1')->get()->result_array();

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