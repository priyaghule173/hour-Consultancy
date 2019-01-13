<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
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

<div class="inner-heading">
  <div class="container">
    <h3>Job Post</h3>
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
        <div class="careerfy-typo-wrap">
          <form>
            <div class="careerfy-employer-box-section">
              <div class="careerfy-profile-title">
                <h2 style="font-size: 18px;">Edit Job Post</h2>
                <a style="float:right; padding:5px;" href="<?=base_url('employer/create_job_post') ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Create Job Post</a>
              </div>


                <ul class="careerfy-row careerfy-employer-profile-form">
                    <li class="col-sm-6 careerfy-column-6">
                        <label>Job Title *</label>
                        <input type="text" name="job_title" class="form-control" value="<?php echo $result[0]['job_title']; ?>" placeholder="Job Title" >
                    </li>

                    <li class="col-sm-6 careerfy-column-6">
                        <label>Company Name</label>
                        <input type="text" name="company_name" class="form-control" value="<?php echo $result[0]['company_name']; ?>" placeholder="Company Name">
                    </li>

                    <li class="col-sm-6 careerfy-column-6">
                        <label>Description</label>
                        <textarea name="description" class="form-control" value="<?php echo $result[0]['description']; ?>" placeholder="Job Description"><?php echo $result[0]['description']; ?></textarea>
                    </li>

                    <li class="col-sm-6 careerfy-column-6">
                        <label>Minimum Salary</label>
                        <input type="number" min="1000" autocomplete="off" name="min_sal" class="form-control" value="<?php echo $result[0]['min_sal']; ?>" placeholder="Minimum Salary" required="">
                    </li>

                    <li class="col-sm-6 careerfy-column-6">
                        <label>Maximun Salary</label>
                        <input type="number" autocomplete="off" name="max_exp" class="form-control" value="<?php echo $result[0]['max_sal']; ?>" placeholder="Maximum Experience (in Years) Required" required="">
                    </li>

                    <li class="col-sm-6 careerfy-column-6">
                        <label>Qualification</label>
                      <select id="Quali" multiple="multiple" name="qualification[]" class="form-control">
                          <?php
                              $i=0;
                              $Q = explode(",", $result[0]['qualification_required']);
                                                    $quali = $this->db->select('*')->from('qualification')->order_by('qualification_name','ASC')->get()->result_array();// print_r($quali);
                                                    foreach ($quali as $row) {
                                                       ?>
                                                       <option value="<?=$row['qualification_name']?>"
                                                        <?php 
                                                          if($row['qualification_name'] == !empty($Q[$i]))
                                                          {
                                                            echo "selected";
                                                            $i++;
                                                          }
                                                         ?>
                                                        ><?=$row['qualification_name']?></option>
                                                       <?php
                                                     } 
                                                    ?>

                                                   </select>

                        </li>

                        <li class="col-sm-6 careerfy-column-6">
                              <label>Job Role</label>
                              <?php
                              $Job_role = $this->db->select('*')->from('job_role')->order_by('role', 'ASC')->get()->result_array();
                                                      ?>
                              <select id="Job_role" name="job_role" class="form-control">
                                  <option selected="selected" disabled="disabled">Select Job Role</option>
                                                        <?php
                                                          foreach ($Job_role as $JR) {  ?>
                                                           <option value="<?= $JR['role']?>"
                                                            <?php if($JR['role']== $result[0]['job_role'])
                                                            echo 'selected'; ?>
                                                            ><?= $JR['role']?></option> 
                                                          <?php
                                                          }
                                                        ?>

                              </select>
                        </li>

                        <li class="col-sm-6 careerfy-column-6">
                              <div id="sub_roles" style="display: none;">
                                <label>Sub Role</label>
                                <select class="multiselect dropdown-toggle btn btn-default" name="mile_id[]" id="mile_id"  multiple="multiple" class="form-control">
                                      <option value="" disabled="disabled" selected="selected">Select Sub Roles</option>
                                </select>
                                                      use ctrl for multiple selection
                              </div>
                        </li>


                        <li class="col-sm-6 careerfy-column-6">
                            <label>Job Type</label>

                            <select id="Job_type" name="job_type" class="form-control">
                              <option selected="selected" disabled="disabled">Select Job Type</option>
                              <option value="Full Time" <?php if($result[0]['job_type']== "Full Time") echo 'selected';?>>Full Time</option>
                              <option value="Part Time" <?php if($result[0]['job_type']== "Part Time") echo 'selected';?>>Part Time</option>
                              <option value="Internship" <?php if($result[0]['job_type']== "Internship") echo 'selected';?>>Internship</option>
                              <option value="Work From Home" <?php if($result[0]['job_type']== "Work From Home") echo 'selected';?>>Work From Home</option>
                            </select>
                        </li>

                        <li class="col-sm-6 careerfy-column-6">
                            <label>City</label>
                                            <?php
                                                          $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
                                                        ?>
                            <select id="City" name="city" class="form-control">
                                <option selected="selected" disabled="disabled">Select City</option>
                                                          <?php
                                                          foreach ($city as $row) {
                                                           ?>
                                                           <option value="<?=$row['city_name']?>" 
                                                            <?php if($row['city_name']==$result[0]['city']) 
                                                            echo 'selected'; ?>
                                                            ><?=$row['city_name']?></option>
                                                           <?php
                                                          }
                                                          ?>  
                                                        </select>
                        </li>
                        <li class="col-sm-6 careerfy-column-6">
                            <div id="localities" style="display: none;">
                                <label>localities</label>
                                <select name="locality[]" id="locality" class="form-control" multiple="multiple"  >
                                    <option value="" disabled="disabled" selected="selected">Select Localities</option>
                                </select>
                                                  use ctrl for multiple selection
                            </div>  

                        </li>

                        <li class="col-sm-6">
                          <input type="submit" name="update" value="Update" class="careerfy-employer-profile-submit">
                        </li>
                      </ul>
              
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      alert('Please aaafill out all the fields');
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
      alert('Please aaafill out all the fields');
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

</script>