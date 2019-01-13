<!-- <div class="inner-heading">
	<div class="container">
		<h3>Create Mail</h3>
	</div>
</div> -->
<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Create Mail</h1>
</div>

<?php $this->load->view('employer/demo',$result); ?>

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
					<form class="careerfy-employer-dasboard" action="<?= base_url('employer/createMail');?>" method="post">
						<div class="careerfy-employer-box-section">
							<div class="careerfy-profile-title">
								<h2 style="font-size: 18px;">Compose New Message</h2>
							</div>
                                <label>Send Mail To</label>
                                <input type="radio" name="user_type_role" checked id="Admin" value="Admin">Admin&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="user_type_role" id="Candidate" value="Candidate">Candidate<br><br>

							<ul class="careerfy-row careerfy-employer-profile-form">
								<li class="col-md-12 col-sm-12 careerfy-column-12" id="job_list" style="display:none;">
                                            <label>Select Approved Job</label>

                                      
                                            <select name="" id="jobs_approved" required class="form-control">
                                              <option value="">Select Job</option>

                                              <?php 

                                              foreach ($jobs_approved as $row)
                                              {
                                                        ?>
                                              <option value="<?= $row['j_id'];?>"><?= $row['job_title'];?></option>
                                              <?php
                                                }
                                              ?>
                                            </select>
                                            
                                          </li>
                                            
                                            <li class="col-md-12 col-sm-12  careerfy-column-12" id="can_list" style="display:none;">
                                                <label>To *</label>
                                                    
                                                    <select name="to" id="candidate_id" class="form-control" required>
                                                        <option value="">Select Candidate</option>

                                                       </select>

                                                  <?php
                                                   $applied_job_candidates = $this->db->select('*')->from('applied_jobs')->get()->result_array();

                                                  ?>
                                            </li>
								<li class="col-md-12 col-sm-12 careerfy-column-12">
									<label>Subject *</label>
                                                      <input class="form-control input-lg" required  class="form-control" name="subject" placeholder="Subject:"  onblur="if(this.value == '') { this.value ='Jody Wisternoff'; }" onfocus="if(this.value =='Jody Wisternoff') { this.value = ''; }" type="text" required="">
								</li>

								<li class="col-md-12 col-sm-12 careerfy-column-12">
									<label>Message *</label>
                                                      <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description" required></textarea>
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
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
  
$('#jobs_approved').on('change',function(){
    
    var j_id = $(this).val();
//alert(j_id);
        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url()?>employer/get_candidate',
                            data: { 'j_id_new':j_id },
                            dataType:'json',
                            success: function(data) {
                              $("#candidate_id").html(data);
                              },
                            error:function(data) { 
                                        //alert(data+"error"); 
                                      }
                  });
    
});

$('#Admin').on('click',function(){
    $('#job_list').hide();
    $('#can_list').hide();
});
$('#Candidate').on('click',function(){
    $('#job_list').show();
    $('#can_list').show();    
});
</script>
