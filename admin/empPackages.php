<link rel="stylesheet" href="https:/ / maxcdn.bootstrapcdn.com / bootstrap / 3.3.7 / css / bootstrap.min.css ">
  <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" > </script>

<!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<!-- <div class="inner-heading">
  <div class="container">
    <h3>Manage Employer</h3>
  </div>
</div> -->

<div class="container-fluid myoverlay black " style="background:url('<?= base_url()?>images/Career.jpg'); ">
    <h1 style=" " class="myhero">Manage Employer</h1>
</div>

<?php $this->load->view('admin/demo'); ?>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dashboard-nav">
            <figure>
                    <a href="#" class="employer-dashboard-thumb"><img src="<?= base_url()?>images/profile.png" alt="">
                            </a>
                            <figcaption>
                                <h2 style="font-size: 18px;"><?= $this->session->userdata('EMAIL_ID')?></h2>
                            </figcaption>
                        </figure>

                       <ul>
                          <li >
                            <a href="<?= base_url('admin/adminDashboard');?>">
                              <i class="fa fa-dashboard"></i>
                              Dashboard
                            </a>
                          </li>

                                          <?php
                        $Pending = $this->db->select('count(e_id) as total')->from('employer')->where('active','0')->get()->result_array();
                         ?>
                        <li>
                        		<a href="<?= base_url('admin/manageEmp');?>">
                        			<i class="fa fa-users"></i>
                              Manage Employer <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $Pending[0]['total']?></span>
                        		</a>
                        	</li>
                          <li class="active">
                            <a href="<?= base_url('admin/empPackages');?>">
                              <i class="fa fa-user-o"></i>
                              Employer Packages
                            </a>
                          </li>

                          <?php 
                          $total_fj = $this->db->get_where('job_posts',array('action'=>'1','request_fj'=>'1','featured_job'=>'0'))->result_array();
                          ?>
                          <li>
                            <a href="<?= base_url('admin/featuredJob');?>">
                             <i class="fa fa-user-o"></i>
                             Featured Job<span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= count($total_fj)?></span>
                           </a>
                         </li>
                         
                          <li>
                            <a href="#" data-toggle="dropdown">
                              <i class="fa fa-address-card-o"></i>
                              Packages
                              <ul class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/pendingPlatinumPackEmp')?>"><i class="fa fa-trophy"></i>Platinum Pack</a>
                                        </li>
                                        <li>
                                              <a href="<?=base_url('admin/pendingGoldPackEmp')?>"><i class="fa fa-dollar"></i>Gold Pack</a>
                                        </li>
                                    </ul>
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url('admin/createJobRole');?>">
                              <i class="fa fa-briefcase"></i>
                              Add Specialization
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url('admin/candidateSection');?>">
                              <i class="fa fa-search"></i>
                              Candidate Section
                            </a>
                          </li>
                        <li>
                      <?php
                  $unreadmails = $this->db->select('count(mailbox_id) as unread')->from('mailbox')->where('to_userid','admin')->where('user_type','2')->where('flag','0')->get()->result_array();
                         ?>
                              <a href="<?=base_url('admin/mailbox')?>"><i class="fa fa-envelope"></i> Mailbox <span style="background: #a9d86e;border-radius: 10px;padding: 5px;"><?= $unreadmails[0]['unread']?></span></a>
                        </li>
                          <li>
                            <a href="<?=base_url('admin/backupdata')?>">
                              <i class="fa fa-database"></i>
                              Backup Data
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url('admin/changePassword');?>">
                              <i class="fa fa-cog"></i>
                              Change Password
                            </a>
                          </li>

                          <li>
                            <a href="#" data-toggle="dropdown">
                              <i class="fa fa-address-card-o"></i>
                                  Blog Posting
                              <ul id="subclass" class="dropdown-menu">
                                        <li>
                                              <a href="<?=base_url('admin/add_blog')?>"><i class="fa fa-trophy"></i>Add Blog</a>
                                        </li>
                                      <li>
                                              <a href="<?=base_url('admin/manage_blog')?>"><i class="fa fa-dollar"></i>Manage Blog</a>
                                      </li>
                                </ul>
                            </a>
                          </li>
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

      <div class="col-md-9 col-sm-12 col-xs-12" style="padding-left: 0px;">
        <div class="careerfy-typo-wrap">
          <div class="careerfy-employer-dasboard">
            <div class="careerfy-employer-box-section">

                               <?php 
                                    if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message');  
                                          } else {
                                            echo '';  
                                          }
                                ?>
                <!-- Profile Title -->
                  <div class="careerfy-profile-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#TAB_1">Renewal Package Requests</a></li>
                          
                        <li><a data-toggle="tab" href="#TAB_2">Employer Packages History</a></li>
                                        
                    </ul>
                  </div>

                  <!-- tab start -->
                                    <div class="tab-content">
                                    <!-- tab first start -->
                                    <div id="TAB_1" class="tab-pane fade in active">
                                      <div class="row">
                                       <div class="col-md-12 bg-white padding-2">
                                        <div class="row margin-top-20">
                                          <div class="col-md-12">
                                            <div class="box-body table-responsive no-padding">
                                              <table id="example2" class="table table-hover">
                                                <thead style="font-size: 13px;">
                                                  <th>Employer</th>
                                                  <th>Phone</th>
                                                  <th>Email</th>
                                                  <th>Package Name</th>
                                                  <th>Action</th>
                                                </thead>
                                                
                                                <tbody style="font-size: 13px;">
                                                  <?php 
                                                $req_pack = $this->db->select('*')->from('employer')->where('platinum_req','1')->get()->result_array();
                                                  //print_r($req_pack);
                                                  foreach ($req_pack as $RP) {
                                                  ?>
                                                  <tr>
                                                    <td><?= $RP['first_name']." ".$RP['last_name']?></td>
                                                    <td><?= $RP['phone']?></td>
                                                    <td><?= $RP['email_id']?></td>
                                                    <td>Platinum</td>
                                                    <td><a href="#" data-toggle="modal" data-target="#platinum_<?= $RP['e_id']?>">Activate</a></td>
                                                  </tr>

<!-- Modal -->
<div id="platinum_<?= $RP['e_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Platinum Pack</h4>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/activate_platinumpack?e_id='.$RP['e_id'])?>">
        
      <div class="modal-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Emp Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly="" value="<?= $RP['first_name']." ".$RP['last_name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Package</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="Platinum" readonly="">
                    </div>
                  </div>
<?php $platinum_pack = $this->db->get_where('packages',array('p_id'=>'1'))->result_array(); ?>
                  <!-- <div class="form-group">
                    <label class="col-sm-3 control-label">Package</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="Platinum" readonly="">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Package Price</label>
                    <div class="col-sm-8">
                        <input type="number" name="package_price" class="form-control" value="<?= $platinum_pack[0]['package_price'] ?>" required="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Amount Paid</label>
                    <div class="col-sm-8">
                        <input type="number" name="amount_paid" class="form-control" required="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-6 control-label">Package Validity(in days)</label>
                    <div class="col-sm-6">
                        <input type="number" name="package_validities" class="form-control" value="<?= $platinum_pack[0]['package_validities'] ?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Total Posts</label>
                    <div class="col-sm-9">
                        <input type="number" name="total_posts" class="form-control" value="<?= $platinum_pack[0]['total_posts'] ?>" required="">
                    </div>
                  </div>
                  <br><br><br>
                  <br><br><br>
                  <br><br><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Activate</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>

                                                  <?php } ?>
                                                  
                                                  <?php
                                                $req_pack = $this->db->select('*')->from('employer')->where('gold_req','1')->get()->result_array();
                                                  //print_r($req_pack);
                                                  foreach ($req_pack as $RP) {
                                                  ?>
                                                  <tr>
                                                    <td><?= $RP['first_name']." ".$RP['last_name']?></td>
                                                    <td><?= $RP['phone']?></td>
                                                    <td><?= $RP['email_id']?></td>
                                                    <td>Gold</td>
                                                    <td><a href="#" data-toggle="modal" data-target="#gold_<?= $RP['e_id']?>">Activate</a></td>
                                                  </tr>

                                                  <!-- Modal -->
<div id="gold_<?= $RP['e_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gold Pack</h4>
      </div>
            <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/activate_goldpack?e_id='.$RP['e_id'])?>">
        
      <div class="modal-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Emp Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly="" value="<?= $RP['first_name']." ".$RP['last_name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Package</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="Gold" readonly="">
                    </div>
                  </div>
<?php $gold_pack = $this->db->get_where('packages',array('p_id'=>'2'))->result_array(); ?>
                  <!-- <div class="form-group">
                    <label class="col-sm-3 control-label">Package</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="Platinum" readonly="">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Package Price</label>
                    <div class="col-sm-8">
                        <input type="number" name="package_price" class="form-control" value="<?= $gold_pack[0]['package_price'] ?>" required="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Amount Paid</label>
                    <div class="col-sm-8">
                        <input type="number" name="amount_paid" class="form-control" required="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-6 control-label">Package Validity(in days)</label>
                    <div class="col-sm-6">
                        <input type="number" name="package_validities" class="form-control" value="<?= $gold_pack[0]['package_validities'] ?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Total Posts</label>
                    <div class="col-sm-9">
                        <input type="number" name="total_posts" class="form-control" value="<?= $gold_pack[0]['total_posts'] ?>" required="">
                    </div>
                  </div>
                  <br><br><br>
                  <br><br><br>
                  <br><br><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Activate</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
                                                  <?php } ?>
                                                </tbody>       
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              <!-- tab first end -->
                              <!-- tab second start -->
                                  <div id="TAB_2" class="tab-pane fade">
                                    <div class="row">
                                     <div class="col-md-12 bg-white padding-2">
                                      <div class="row">
                                          <div class="col-md-12">
                                            <div class="box-body table-responsive no-padding">
                                              <form method="post" action="<?=base_url('admin/download_emp_csv')?>">
                                              
                                              <table id="example3" class="table table-hover">
                                                <thead style="font-size: 13px;">
                                                  <th>Employer</th>
                                                  <th>Phone No.</th>
                                                  <th>Email Id</th>
                                                  <th>Package Name</th>
                                                  <th>Package Price</th>
                                                  <th>Amount Paid</th>
                                                  <th>Package Validity</th>
                                                  <th>Total Posts</th>
                                                  <th>Used Posts</th>
                                                  <th>Active Date</th>
                                                  <th>Expire Date</th>
                                                  <th>Status</th>

                                                </thead>
                                                     <tbody>
                                                      <?php 
                                                    $pack_history = $this->db->join('employer','employer_packages.e_id=employer.e_id')->order_by('ep_id','DESC')->get('employer_packages')->result_array();
/*                                                    print_r($pack_history);
*/                                                    foreach ($pack_history as $PH) {
                                                     
                                                      ?>
                                                      <tr>
                                                        <td><?= $PH['first_name']." ".$PH['last_name']?></td>
                                                        <td><?= $PH['phone']?></td>
                                                        <td><?= $PH['email_id']?></td>
                                                        <td><?= $PH['package_name']?></td>
                                                        <td><?= $PH['package_price']?></td>
                                                        <td><?= $PH['amount_paid']?></td>
                                                        <td><?= $PH['package_validities']?></td>
                                                        <td><?= $PH['total_posts']?></td>
                                                        <td><?= $PH['used_job_posts']?></td>
                                                        <td><?= $PH['active_date']?></td>
                                                        <td><?= $PH['pack_expire_date']?></td>
                                                        <td>
                                                        <?php if($PH['flag']==1)
                                                                echo "Active";
                                                              else
                                                                echo "Expired";?>
                                                        </td>
                                                      </tr>
                                                  <?php } ?>
                                                </tbody>             
                                              </table>
                                            </form>
                                            </div>
                                          </div>
                                         </div>
                                        </div>
                                      </div>
                                      </div>
                                    <!-- tab second end -->
                                    
                                      </div>
                                      <!-- tab ends -->



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

  $(function () {
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
<script type="text/javascript">
function showUser(str,EID)
{
  var EID_new = EID;
  var emp_action = str;
alert('Status Updated');
  //alert(EID_new+str);
  $.ajax({
        type: "POST",
        url: "<?=base_url('admin/update_emp_status')?>",
        data: {'e_id': EID_new ,'status' :emp_action},
        success: function () {
                 window.location.href = "<?=base_url('admin/pending_employer')?>";     
        }
    });
}
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
            all.checked = len===total;
        }
    });
</script>

</body>
</html>
