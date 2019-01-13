<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
  
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#Quali').multiselect({
                includeSelectAllOption: true
            });
        });
        
        $(function () {
            $('#Job_role').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#Job_type').multiselect({
                includeSelectAllOption: true
            });
        });
        $(function () {
            $('#City').multiselect({
                includeSelectAllOption: true
            });
        });
    </script>



<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style="
    margin: auto; position: relative;
   top:50%;
" class="myhero">Create Job Post</h1>
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

                            <li class="active">
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
          <form method="post" action="<?=base_url('employer/createJobPost')?>">
              <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Post A New Job</h2>
              </div>

              <ul class="careerfy-row careerfy-employer-profile-form">
                <li class="careerfy-column-6 col-sm-6">
                  <label>Job Title *</label>
                  <input type="text" name="job_title" placeholder="Job Title" required>
                </li>

                <li class="careerfy-column-6 col-sm-6">
                  <label>Company Name *</label>
                  <input type="text" name="company_name" placeholder="Company Name" required>
                </li>

                <li class="careerfy-column-6 col-sm-6">
                  <label>Description</label>
                  <textarea name="description" placeholder="Job Description" rows="5" required></textarea>
                </li>
                <li class="careerfy-column-6 col-sm-6">
                  <label>Roles And Responsibilities <small>(Use '^' Symbol for Next Role)</small></label>
                  <textarea name="roles_and_responsibilities" placeholder="Roles And Responsibilities" rows="5" required></textarea>
                </li>
                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Minimum Salary</label>
                                                    <input type="number" id="min_sal" autocomplete="off" name="min_sal" placeholder="Minimum Salary" required="">
                                                </li>

                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Maximun Salary</label>
                                                    <input type="number" id="max_sal" autocomplete="off" name="max_sal" placeholder="Maximum Salary" required="">
                                                    <div id="message_3"></div>
                                                </li>
                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Minimum Experience</label>
                                                    <input type="number" min="0" id="min_exp" autocomplete="off" name="min_exp" placeholder="Minimum Experience (in Years) Required" required="">
                                                </li>

                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Maximun Experience</label>
                                                    <input type="number" autocomplete="off" id="max_exp" name="max_exp" placeholder="Maximum Experience (in Years) Required" required="">
                                                    <div id="message_4"></div>
                                                </li>
                                                
                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Qualification</label>
                                                  <select id="Quali" multiple="multiple" name="qualification[]" required style="display: block;">
                                                <?php
                                                    $quali = $this->db->select('*')->from('qualification')->order_by('qualification_name','ASC')->get()->result_array();// print_r($quali);
                                                    foreach ($quali as $row) {
                                                       ?>
                                                       <option value="<?=$row['qualification_name']?>"><?=$row['qualification_name']?></option>
                                                       <?php
                                                     } 
                                                    ?>
                                                   </select>
                                                </li>

                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Job Role</label>
                                                    <?php
                                                        $Job_role = $this->db->select('*')->from('job_role')->order_by('role', 'ASC')->get()->result_array();
                                                      ?>
                                                      <select id="Job_role" name="job_role" required>
                                                          <option value="" >Select Job Role</option>
                                                        <?php
                                                          foreach ($Job_role as $JR) {  ?>
                                                           <option value="<?= $JR['role']?>"><?= $JR['role']?></option> 
                                                          <?php
                                                          }
                                                        ?>

                                                      </select>
                                                </li>

                                               <!--  <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <div id="sub_roles" style="display: none;">
                                                    <label>Sub Role</label>
                                                      <select style="width:50%" required class="multiselect dropdown-toggle btn btn-default" name="job_sub_roles[]" id="mile_id"  multiple="multiple" >
                                                        <option value="">Select Sub Roles</option>
                                                      </select>
                                                      use ctrl for multiple selection
                                                    </div>
                                                </li> -->


                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>Job Type</label>

                                                    <select id="Job_type" required name="job_type">
                                                      <option value="">Select Job Type</option>
                                                      <option value="Full Time">Full Time</option>
                                                      <option value="Part Time">Part Time</option>
                                                      <option value="Internship">Internship</option>
                                                      <option value="Work From Home">Work From Home</option>
                                                  </select>
                                                </li>

                                                <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                                    <label>City</label>
                                                      <?php
                                                          $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
                                                        ?>
                                                        <select id="City" name="city" required>
                                                          <option value="">Select City</option>
                                                          <?php
                                                          foreach ($city as $row) {
                                                           ?>
                                                           <option value="<?=$row['city_name']?>"><?=$row['city_name']?></option>
                                                           <?php
                                                          }
                                                          ?>  
                                                        </select>
                                                </li>
                                            <!--     <li class="col-sm-6 col-xs-12 careerfy-column-6">
                                               <div id="localities" style="display: none;">
                                                  <label>localities</label>
                                                  <select name="locality[]" id="locality" required class="form-group" multiple="multiple"  >
                                                    <option value="">Select Localities</option>
                                                  </select>
                                                  use ctrl for multiple selection
                                        </div> -->
                                 </li>
                                <li class="careerfy-column-6">
                                    <input type="checkbox" name="req_fj" value="1"> Request for Featured Job Post
                                  </li>


              </ul>

              <div class="row" style="margin-top: 10px;">
                <div class="col-md-4">
                  <div class="my-free-ads">
                    <h4>My Free Ads</h4>
                    <p>My free ads: 10</p>
                    <p>Low Benefits</p>
                    <div class="free-job-button">
                                             <input type="submit" class="btn btn-flat btn-free" name="create_free_job_post" value="Create Free Job Post">
                                        </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="my-platinum-ads">
                    <h4>My Platinum Ads</h4>
                    <p>My platinum ads: 17</p>
                    <p>More Benefits</p>
                    <div class="platinum-job-button">
                                            <?php
                                                      if(!empty($platinum_pack))
                                                      {
                                                  ?>
                                           <input type="submit" class="btn btn-flat btn-platinum" name="platinum_job_post" value="Create Platinum Job post">

                                            <?php 
                                              }else{
                                             ?>
                                            <input type="submit" class="btn btn-flat btn-platinum" name="platinum_buy_now" value="Platinum Package buy now" data-toggle="modal" data-target="#myModal_1">
                                            <?php
                                             }
                                            ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="my-gold-ads">
                    <h4>My Gold Ads</h4>
                    <p>My gold ads: 17</p>
                    <p>More Benefits</p>
                    <div class="gold-job-button">
                                             <?php
                                                      if(!empty($gold_pack))
                                                      {
                                                       ?>
                                                     <input type="submit" class="btn btn-flat btn-gold" name="gold_job_post" value="Create Gold Job post">
                                                       <?php 
                                                      }else{
                                                        ?>
                                                     <input type="submit" class="btn btn-flat btn-gold" name="Gold_buy_now" value="Gold Package buy now" data-toggle="modal" data-target="#myModal">
                                                        <?php
                                                      }
                                                    ?>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </form>
        </div>
      </div>
      

    </div>
  </div>
</div>
 <!-- Platinum -->
<!-- Modal -->
  <div class="modal fade" id="myModal_1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Platinum Package</h4>
        </div>
        <div class="modal-body">
          <p>Platinum Package Details</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="Platinum_buy_now" value="Buy now" class="btn btn-success" onclick="validate_fields_1()">
        </div>
      </div>
    </div>
  </div>
  <!-- Gold -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gold Package</h4>
        </div>
        <div class="modal-body">
          <p>Gold Package Details</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="Gold_buy_now_1" value="Buy now" class="btn btn-success" onclick="validate_fields()">
        </div>
      </div>
    </div>
  </div>


<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script type="text/javascript">   
   $(document).ready(function(){
      $('#Job_role').on('change',function(){
        var j_r = $(this).val();

        $.ajax({
            url:"<?php echo base_url()?>employer/get_sub_roles",
            data:{'j_r_new':j_r},
            type:"POST",
            dataType:'json',
            success:function(data) {
                $('#sub_roles').show();
                $("#mile_id").html(data);
                
            },
        error:function() { 
                    alert("error"); 
                  }
          });
      });

   });


      $(document).ready(function(){
      $('#City').on('change',function(){
        var city_n = $(this).val();
        $.ajax({
            url:"<?php echo base_url()?>employer/get_localities",
            data:{'city_new':city_n},
            type:"POST",
            dataType:'json',
            success:function(data1) {
                $('#localities').show();
                $("#locality").html(data1);
                
            },
        error:function(data1) { 
                    alert(data1+"error"); 
                  }
          });
      });

   });

    </script>
<script type="text/javascript">
  function validate_fields()
  {
    var job_title = $('#job_title').val();
    var company_name = $('#company_name').val();
    var description = $('#description').val();
    var min_sal = $('#min_sal').val();
    var max_sal = $('#max_sal').val();
    var min_exp = $('#min_exp').val();
    var max_exp = $('#max_exp').val();
    var Quali = $('#Quali').val();
    var Quali = Quali.toString();
    var Job_role = $('#Job_role').val().toString();
    var sub_roles = $('#sub_roles').val().toString();
    var Job_type = $('#Job_type').val().toString();
    var City = $('#City').val().toString();
    var locality = $('#locality').val().toString();

 if(job_title == null || company_name == null || description == null || min_sal == null || max_sal == null || min_exp == null || max_exp == null || Quali == null || Job_role == null || sub_roles == null || Job_type == null || City == null || locality == null)
    {
      alert('Please fill out all the fields');
    }
    else{
          $.ajax({
            url:"<?php echo base_url()?>employer/gold_pack",
            data:{'job_title':job_title,'company_name':company_name,'description':description,'min_sal':min_sal,'max_sal':max_sal,'min_exp':min_exp,'max_exp':max_exp,'qualification':Quali,'job_role':Job_role,'job_sub_roles':sub_roles,'job_type':Job_type,'city':City,'locality':locality},
            type:"POST",
            success:function(data1) {
                window.location.href = "<?=base_url('employer/create_job_post')?>";
            },
        error:function(data1) { 
                    alert(data1+"error"); 
                  }
          });
    } 
  }
  function validate_fields_1()
  {
    var job_title = $('#job_title').val();
    var company_name = $('#company_name').val();
    var description = $('#description').val();
    var min_sal = $('#min_sal').val();
    var max_sal = $('#max_sal').val();
    var min_exp = $('#min_exp').val();
    var max_exp = $('#max_exp').val();
    var Quali = $('#Quali').val();
    var Quali = Quali.toString();
    var Job_role = $('#Job_role').val().toString();
    var sub_roles = $('#sub_roles').val().toString();
    var Job_type = $('#Job_type').val().toString();
    var City = $('#City').val().toString();
    var locality = $('#locality').val().toString();
 if(job_title == null || company_name == null || description == null || min_sal == null || max_sal == null || min_exp == null || max_exp == null || Quali == null || Job_role == null || sub_roles == null || Job_type == null || City == null || locality == null)
    {
      alert('Please fill out all the fields');
    }
    else{
          $.ajax({
            url:"<?php echo base_url()?>employer/platinum_pack",
            data:{'job_title':job_title,'company_name':company_name,'description':description,'min_sal':min_sal,'max_sal':max_sal,'min_exp':min_exp,'max_exp':max_exp,'qualification':Quali,'job_role':Job_role,'job_sub_roles':sub_roles,'job_type':Job_type,'city':City,'locality':locality},
            type:"POST",
            success:function(data1) {
                window.location.href = "<?=base_url('employer/create_job_post')?>";
            },
        error:function(data1) { 

                    alert(data1+"error"); 
                  }
          });
    } 
  }

$('#min_sal, #max_sal').on('change', function () {
  if ($('#min_sal').val() <= $('#max_sal').val()) {
  //  $('#message_3').html('Valid.. ').css('color', 'green');
    
    $('#max_sal').attr('min',$('#min_sal').val());

  } else{ 
    $('#max_sal').attr('min',$('#min_sal').val());

//    $('#message_3').html('Maximum salary should be greated than Minimum salary').css('color', 'red');
    
  }
});
$('#min_sal, #max_sal').on('keyup', function () {
  if ($('#min_sal').val() <= $('#max_sal').val()) {
    //$('#message_3').html('Valid.. ').css('color', 'green');
    
    $('#max_sal').attr('min',$('#min_sal').val());

  } else{ 
    $('#max_sal').attr('min',$('#min_sal').val());

  //  $('#message_3').html('Maximum salary should be greated than Minimum salary').css('color', 'red');
    
  }
});

$('#min_exp, #max_exp').on('change', function () {
  if ($('#min_exp').val() <= $('#max_exp').val()) {
//    $('#message_4').html('Valid.. ').css('color', 'green');
    
    $('#max_exp').attr('min',$('#min_exp').val());

  } else{ 
    $('#max_exp').attr('min',$('#min_exp').val());

    //$('#message_4').html('Maximum Years should be greated than Minimum Years').css('color', 'red');
    
  }
});
$('#min_exp, #max_exp').on('keyup', function () {
  if ($('#min_exp').val() <= $('#max_exp').val()) {
  //  $('#message_4').html('Valid.. ').css('color', 'green');
    
    $('#max_exp').attr('min',$('#min_exp').val());

  } else{ 
    $('#max_exp').attr('min',$('#min_exp').val());

//    $('#message_4').html('Maximum Years should be greated than Minimum Years').css('color', 'red');
    
  }
});

</script>