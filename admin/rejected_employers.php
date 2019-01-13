<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                   
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <?php 
          if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');  
          } else {
            echo '';  
          }
        ?>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 bg-white padding-2">
            <h3>Rejected Employers</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Employer Name</th>
                      <th>Phone No.</th>
                      <th>Email Id</th>
                      <th>Company Name</th>
                      <th>Company Email Id</th>
                      <th>Company Website</th>
                      <th>Company Address</th>
                      <th>Status</th>
                      <th>Registerd Date</th>
                      <th>Rejected Date</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($result as $row) {
                        ?>
                        <tr>
                          <td>
                            <?= $row['first_name']?>&nbsp;&nbsp;<?= $row['middle_name']?>&nbsp;&nbsp;<?= $row['last_name']?>
                          </td>
                          <td>
                            <?= $row['phone']?>
                          </td>
                          <td>
                            <?= $row['email_id']?>
                          </td>
                          <td>
                            <?= $row['company_name']?>
                          </td>
                          <td>
                            <?= $row['company_email_id']?>
                          </td>
                          <td>
                            <?= $row['company_website']?>
                          </td>
                          <td>
                            <?= $row['company_address']?>
                          </td>
                          <td>
                            <?= "Rejected"?>
                          </td>
                          <td>
                            <?= $row['date_created']?>
                          </td>
                          <td>
                            <?= $row['active_date']?>
                          </td>
                          <td>
                            <select name="emp_active" onchange="showUser(this.value,<?= $row['e_id']?>)">
                              <option disabled="disabled" selected="selected">Select Action</option>
                              <option value="0">Approval Pending</option>
                              <option value="1">Approved</option>
                              <option value="2">Rejected</option>
                            </select>
                          </td>
                        </tr>
                      <?php
                      }
                    ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
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
                 window.location.href = "<?=base_url('admin/rejected_employer')?>";     
        }
    });
}
</script>
</body>
</html>
