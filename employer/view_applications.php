

<!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<!-- <div class="inner-heading">
  <div class="container">
    <h3>Job Application</h3>
  </div>
</div> -->



<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Job Applications</h1>
</div>


<?php 
      if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');  
      } else {
        echo '';  
      }
      ?>

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

                            <li class="active">
                                <a href="<?= base_url('employer/jobAppl');?>">
                                    <i class="fa fa-search"></i>
                                     Applications
                                </a>
                            </li>

                     <?php
 $unreadmails_admin = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','0')->where('flag','0')->get()->result_array();
 $unreadmails_can = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid',$this->session->userdata('EMP_ID'))->where('user_type','2')->where('flag','0')->get()->result_array();
                        ?>

                              <li >
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
                                  <h2>My Job Posts Applications</h2>
                                </div>

              <div class="row">
                                 <div class="col-md-12">
                                  <div class="box-body table-responsive no-padding">
                                    <form method="post" action="<?=base_url('employer/download_csv')?>">
                                     <input type="button" id="export_to_csv" style="font-size:13px;margin-right:10px; padding: 5px 10px;margin-bottom: 10px;" class="careerfy-employer-profile-submit" name="submit_c" value="Export to CSV">
                                     <input type="button" id="resume_download" style="font-size:13px;margin-right:10px; padding: 5px 10px;" class="careerfy-employer-profile-submit" name="download_resume" value="Download Resume">
                                     <span style="float:right">
                                       <label>Sort Data</label>
                                       <select name="sort_flag" id="all" onchange="flag_change()">
                                        <option value="all">All Data</option>
                                        <option value="1">Flag Data</option>
                                      </select>
                                    </span>
                                    <div id="show_all">
                                      <table id="example2" class="table table-hover">
                                        <thead style="font-size: 12px;">
                                          <th class="active">
                                            <input type="checkbox" class="select-all checkbox" name="select-all" />
                                          </th>
                                          <th>Flag</th>
                                          <th>Candidate Name</th>
                                          <th>Qualification</th>
                                          <th>Email Id</th>
                                          <th>Mobile No.</th>
                                          <th>Skills</th>
                                          <th>City</th>
                                          <th>Applied Date</th>
                                          <th>Download Resume</th>
                                        </thead>
                                        <tbody style="font-size: 12px;">
                                          <?php
                                          foreach ($result as $row) {
                                            ?>
                                            <tr>
                                              <td>
                                                <input type="checkbox" class="select-item checkbox" name="select_can[]" value="<?=$row['c_id']?>" title="<?=$row['c_id']?>"/>
                                              </td>
                                              <td><?php if($row['flag']=="1"){
                                                        ?>
                                                        <i class="fa fa-bookmark"></i>
                                                        <?php 
                                                      } else{ ?>
                                                      <i class="fa fa-bookmark-o"></i>
                                                    <?php } ?>
                                              </td>
                                              <td><?php echo $row['c_name']; ?></td>
                                              <td>
                                                <?=$row['highest_qualification']?>
                                              </td>
                                              <td>
                                                <?=$row['email_id']?>
                                              </td>
                                              <td>
                                                <?=$row['phone']?>
                                              </td>
                                              <td>
                                                <?=$row['skills']?>
                                              </td>
                                              <td>
                                                <?= $row['city']?>
                                              </td>
                                              <td><?=$row['applied_date']?></td>
                                              <?php if($row['resume'] != '') { ?>
                                              <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                              <?php } else { ?>
                                              <td>No Resume Uploaded</td>
                                              <?php } ?>
                                            </tr>
                                            <?php
                                          }
                                          ?>
                                        </tbody>                    
                                      </table>
                                    </div>

                                     <div id="show_data" style="display:none;">
                                      <table id="example3" class="table table-hover">
                                        <thead>
                                          <th class="active">
                                            <input type="checkbox" class="select-all checkbox" name="select-all" />
                                          </th>
                                          <th>Flag</th>
                                          <th>Candidate Name</th>
                                          <th>Qualification</th>
                                          <th>Email Id</th>
                                          <th>Mobile No.</th>
                                          <th>Skills</th>
                                          <th>City</th>
                                          <th>Applied Date</th>
                                          <th>Download Resume</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                           $j_id = $this->input->get('j_id');
                                             $result1 = $this->db->select('c_name,applied_date,action,candidates.*')->from('applied_jobs')->where('flag',"1")->where('j_id',$j_id)->join('candidates','applied_jobs.c_id = candidates.c_id')->order_by('a_id','DESC')->get()->result_array();
                                            
                                          foreach ($result1 as $row) {
                                            ?>
                                            <tr>
                                              <td>
                                                <input type="checkbox" class="select-item checkbox" name="select_can[]" value="<?=$row['c_id']?>" title="<?=$row['c_id']?>"/>
                                              </td>
                                              <td>
                                                <?php if($row['flag']=="1"){
                                                        ?>
                                                        <i class="fa fa-bookmark"></i>
                                                        <?php 
                                                      } else{ ?>
                                                      <i class="fa fa-bookmark-o"></i>
                                                    <?php } ?>
                                              </td>
                                              <td><?php echo $row['c_name']; ?></td>
                                              <td>
                                                <?=$row['highest_qualification']?>
                                              </td>
                                              <td>
                                                <?=$row['email_id']?>
                                              </td>
                                              <td>
                                                <?=$row['phone']?>
                                              </td>
                                              <td>
                                                <?=$row['skills']?>
                                              </td>
                                              <td>
                                                <?= $row['city']?>
                                              </td>
                                              <td><?=$row['applied_date']?></td>
                                              <?php if($row['resume'] != '') { ?>
                                              <td><a href="<?=base_url()?>resume/<?php echo $row['resume']; ?>" download="<?php echo $row['resume'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                              <?php } else { ?>
                                              <td>No Resume Uploaded</td>
                                              <?php } ?>
                                            </tr>
                                            <?php
                                          }
                                          ?>
                                        </tbody>                    
                                      </table>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                
              
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
                <!-- DataTables -->
                <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>


                <script>
                $(function () {
                  $('#example2').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : false,
                    'info'        : true,
                    'autoWidth'   : false
                  });
                });
                $(function () {
                  $('#example3').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : false,
                    'info'        : true,
                    'autoWidth'   : false
                  });
                });
                </script>

                <script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();

        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected info
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
            checkSelected();
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            if(len==0){
                alert("Please Select Candidate");
                $('#resume_download').attr('type','button');
                $('#export_to_csv').attr('type','button');
                
            }
            else if(len > 0)
            {
                $('#resume_download').attr('type','submit');
                $('#export_to_csv').attr('type','submit');
            }
            all.checked = len===total;
        }
    });

function flag_change(){
var all = $('#all').val();
  //alert(all);
  if(all== "1"){
         $('#show_all').hide();
         $('#show_data').show();       
  }
  else{
        $('#show_data').hide();
         $('#show_all').show();
  }
  
}
</script>