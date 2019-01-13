<style type="text/css">


  h1,h2,h3,h4,h5, #fh5co-header, .navbar-default
  {
    font-family: 'Karla', sans-serif !important;
  }

  button ,body
  {
    font-family: 'Lato', sans-serif;
  }


.button {
    background-color: #0071bb; /* Green */
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: #29ABE2;
}
  

#cover {
    max-width :100%;
     height :auto
}

.container-fluid {
    padding-right:0;
    padding-left:0;
    margin-right:auto;
    margin-left:auto
 }

 .parent{
  height: 20%;
  width: 100%;
 }
 
 label{
     font-size: 16px;
 }
 
 
 #image_div img {
        /* Set rules to fill background */
      max-height: 200px;
            min-height: 500px;
      min-width: 100%;
      
      /* Set up proportionate scaling */
      width: 100%;
      height: auto;
      
      /* Set up positioning */
      //position: fixed;
      top: 0;
      left: 0;
}

@media screen and (max-width: 1024px){
      #image_div img {
        left: 50%;
        margin-left: -512px; }
}



/** {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}*/

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: #0071bb;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.mycontainer {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.mycontainer::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -13px;
  background-color: #29ABE2;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid black;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent #29ABE2;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent #29ABE2 transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -13px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
  border: 1px solid #29ABE2;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .mycontainer {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .mycontainer::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}


/*file upload*/
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
/*end file upload*/

.part-time
{
  font-size: 15px;
  background-color: rgb(240, 90, 34);
  border-radius: 30px;
}
.calendar
{
  background-color: green;
}
.sbutn:hover
{
  background-color: #29ABE2;
}

</style>











<script type="text/javascript">
  function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var sortBy_ca = $('#sortBy_ca').val();

 /*var quali = $("input[name='rr_1']:checked").val();
            if(quali){
                var quali =quali.toString();
            }else{
                quali='';
            }*/
 var quali = $('#Qualii').val();

 
    //alert(quali);
/* var job_type = $("input[name='rr_2']:checked").val();
            if(job_type){
                var job_type =job_type.toString();
            }else{
                job_type='';
            }*/
 var job_type = $('#JobType').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>candidate/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&sortBy_ca='+sortBy_ca+'&quali_new='+quali+'&job_type_new='+job_type,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}

</script>
<script>
function myFunction(page_num) {
    page_num = page_num?page_num:0;
 
 var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var sortBy_ca = $('#sortBy_ca').val();

 var quali = $("input[name='rr_1']:checked").val();
            if(quali){
                var quali =quali.toString();
            }else{
                quali='';
            }
    //alert(quali);
 var job_type = $("input[name='rr_2']:checked").val();
            if(job_type){
                var job_type =job_type.toString();
            }else{
                job_type='';
            }
/*    alert(sortBy);
    alert("<?=$city_s?>");
*/    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>candidate/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&sortBy_ca='+sortBy_ca+'&quali_new='+quali+'&job_type_new='+job_type,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>

</head>
<body onload="myFunction()" style="  overflow-x: hidden;">

<!--Revolutio slider starts-->
    <!-- <div class="job-listing-wrap">
      <div class="container"> -->
        <!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
        <!--<div class="sliderTxt">
          <p></p>
          <h1>Our Company</h1>
        </div>-->
      <!-- </div>
    </div> -->
<!--Revolution slider ends-->

<!-- <div class="page-banner" style="background-color: rgb(243, 242, 242);">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-4 about">
        <h3>Job Search</h3>
      </div>
    </div>
  </div>
</div> -->

<div class="container-fluid" style="background-image:url(<?php echo base_url('images/Software-Development1.jpg') ?>);     background-size: cover;">
  <div class="row">
    <div class="col-sm-12" style="height: 150px;  background:#0c0c0ca6;">
      <div class="col-sm-12" style="height: 50px;"></div>
      <div class="col-sm-12" style="height: 50px;"><h1 style="text-align: center;color: white;font-size: 50px;">Job Listing</h1></div>
      <div class="col-sm-12" style="height: 50px;"></div>
      
    </div>
  </div>
</div>

<div class="inner-content listing">
  <div class="container">
    <div class="row">
      
      <div class="col-md-12 col-sm-12 col-xs-12">
        
        <div class="sortbybar">
          <div class="sortbar listingSearch">
            <div class="form-wrap">
              
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                <input type="text" id="keywords" class="form-control" placeholder="Job Title Keywords" 
                                        value="<?php
                                                if(isset($job_title))
                                                {
                                                  echo $job_title;
                                                }
                                                ?>" onkeyup="searchFilter()" />
<!--                      <input type="text" name="jobtitle" placeholder="Job title, skills, or company" class="form-control"> -->
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">


                      <?php
                                                $city = $this->db->select('*')->from('city')->order_by('city_name','ASC')->get()->result_array();
                                                        ?>
                                                    <select class="form-control" id="sortBy" onchange="searchFilter()" onselect="searchFilter()">
                                                        <option value="">Sort By City</option>
                                                        <?php
                                                            foreach ($city as $row) {
                                                             ?>
                                                             <option value="<?=$row['city_name']?>"
                                                                <?php
                                                                if(isset($city_s))
                                                                {
                                                                if($row['city_name']==$city_s)
                                                                    echo "selected";
                                                                }
                                                                ?>

                                                                ><?=$row['city_name']?></option>
                                                             <?php
                                                            }
                                                            ?>  
                                                    </select>
<!--                      <select name="location" class="form-control">
                        <option>Location...</option>
                        <option value="india">India</option>
                      </select> -->
                    </div>
                  </div>

                  <div class="col-md-2">


                    <div class="input-group">
                      <?php
                                                $Job_role = $this->db->select('*')->from('job_role')->order_by('role','ASC')->get()->result_array();
                                                    ?>    
                                                    <select class="form-control" id="sortBy_ca" onchange="searchFilter()">
                                                        <option value="">Sort By Categories</option>
                                                    <?php
                                                  foreach ($Job_role as $JR) {  ?>
                                                   <option value="<?= $JR['role']?>"
                                                    <?php
                                                                if(isset($job_role))
                                                                {
                                                                if($JR['role']==$job_role)
                                                                    echo "selected";
                                                                }
                                                                ?>


                                                    ><?= $JR['role']?></option> 
                                                  <?php
                                                  }
                                                ?>
                                                     </select>
<!--                      <select name="category" class="form-control">
                        <option>Category...</option>
                        <option value="01">Web Designer</option>
                        <option value="02">Web Developer</option>
                      </select> -->
                    </div>
                  </div>

                <!--  <div class="col-md-2">
                    <div class="input-group">
                      <select class="form-control" id="Qualii" onchange="searchFilter()">
                        <option value="">Qualifications...</option>
                      <?php 
                      $qua = $this->db->get('qualification')->result_array();
                        foreach ($qua as $Q) {
                          ?>
                        <option value="<?= $Q['qualification_name']?>"><?= $Q['qualification_name']?></option>

                          <?php
                        }
                      ?>
                      </select>
                    </div>
                  </div>-->

                  <div class="col-md-2">
                    <div class="input-group">
                      <select class="form-control" id="JobType" onchange="searchFilter()">
                        <option value="">Job Type...</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Internship">Internship</option>
                        <option value="Work From Home">Work From Home</option>
                      </select>
                    </div>
                  </div>



                  <div class="col-md-2">
                    <div class="input-btn">
                      <input type="submit" class="sbutn" value="Search" style="background-color: #0071bb;">
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
        </div>

        <ul class="listService">
          <li>
            <div class="Service featured-wrap">
              <div class="row">
                

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <!--<div class="row job-row">
                    <div class="col-md-2 col-sm-2">
                      <h5 style="font-weight: bold;">Job Title</h5>
                    </div>

                    <div class="col-md-3 col-sm-3">
                      <h5 style="font-weight: bold;">Company</h5>
                    </div>

                    <div class="col-md-3 col-sm-3">
                      <h5 style="font-weight: bold;">Location</h5>
                    </div>

                    <div class="col-md-3 col-sm-3">
                      <h5 style="font-weight: bold;">Job-Valid</h5>
                    </div>

                    <div class="col-md-1 col-sm-1">
                      <h5 style="font-weight: bold;">Job Type</h5>
                    </div>
                  </div>-->
                  <div id="postList">
                                   <?php if(!empty($posts)): foreach($posts as $post):
                                   
                                   $profile_pic = $this->db->select('*')->from('employer')->where('e_id',$post['job_post_by_emp_id'])->get()->result_array();
                                   ?>


                                    <div class="row job-listing" style="margin-left:0px; margin-right:0px">

                    <div class="col-md-4 col-sm-6 job-title">
                    
                       <img src="<?php echo base_url()?>assets/uploads/profile_pics/<?php echo $profile_pic[0]['profile_pic']; ?>" height="150" width="180"> 
                        
                    </div>
                    
                                        <div class="col-md-8 col-sm-6">
                                        <div class="row">
                                            
                                        <div class="col-md-12 col-sm-12">
                      <i class="fa fa-calendar calendar" style="color:deeppink !important;font-size: 25px;"  aria-hidden="true"></i> <?= substr($post['approved_job_post_date'], 0,10)?> - <?= substr($post['job_post_expire_date'],0,10)?>
                    </div>
                      <div class="col-md-12 col-sm-13 job-title-t">
                          <a  href="<?php echo base_url('candidate/jobDetails?j_id=').$post['j_id']?>" target="_blank" >
                      <h4 style="color:green;"> <?php echo $post['job_title']; ?></h4><a/>
                    </div>
                      <div class="col-md-12 col-sm-12">
                      <div class="part-time"><?= $post['job_type']?></div>
                    </div>
                    <div class="col-md-12 col-sm-13">
                      <p class="job-desc"><?= substr($post['description'],0,150)?>...[<a   href="<?php echo base_url('candidate/jobDetails?j_id=').$post['j_id']?>">See more</a>]</p>
                    </div>

                    <div class="col-md-12 col-sm-12 job-com">
                      <i class="fa fa-building-o" style="color:#13b5ea;" aria-hidden="true"></i>&nbsp;By&nbsp;<?= $post['company_name']?>
                    </div>
                  
                    </div>
                                  </div>
                  </div>

                                            <?php
                                             endforeach;
                                             else:
                                              ?>
                                            <p>Post(s) not available.</p>
                                            <?php 
                                            endif;
                                             ?>

                                            <?php echo $this->ajax_pagination->create_links(); ?>
                                        </div>
                                        <div class="loading" style="display: none;">
                                            <div class="content"><img src="<?php echo base_url().'images/126.gif'; ?>"/>
                                            </div>
                                        </div>


                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
</div>




</body>