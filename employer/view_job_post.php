<div class="inner-heading">
  <div class="container">
    <h3>Job Post</h3>
  </div>
</div>

<div class="inner-content emp-dashboard">
  <div class="container-fluid">
    <div class="row">
         <?php $this->load->view('employer/empsidebar'); ?>
            <?php
                    foreach ($result as $row) {
                        $emp_id = $row['job_post_by_emp_id'];
                        ?>
            <div class="col-md-9 main-page>
                <div class="careerfy-typo-wrap">
        
                    <div class="careerfy-employer-box-section">
                        <div class="careerfy-profile-title">
                            <h2 style="font-size: 18px;">Job Details</h2>
                        </div>
                           
                                <div class="col-md-12 col-sm-12 col-xs-12 hr-job-detail-list">
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <span class="jobdetail-listthumb"><img src="<?= base_url()?>assets/img/job-detail-logo-1.png" alt=""></span>
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-xs-9 job-detail-list">
                                        <h2><?= $row['job_title']?></h2>
                                        <small class="job-detail-type"><?= $row['job_type']?></small>
                                        <ul class="job-detail-options">
                                            <li><i class="fa fa-map-marker"></i> <?=$row['city']?> - <?=$row['localities']?></li>
                                            <li><i class="fa fa-calendar"></i> Post Date: <?= $row['approved_job_post_date']?></li>
                                        </ul>
                                    </div>
                                </div>
                            

                            
                                <div class="col-md-12 col-sm-12 col-xs-12 job-detail-services">
                                    <h3>Job Detail</h3>

                                    <ul class="">
                                        <li class="col-sm-4">
                                            <i class="fa fa-money"></i>
                                            <div class="job-detail-services-text">Offerd Salary <small><?=$row['min_sal']?> - <?=$row['max_sal']?></small></div>
                                        </li>

                                        <li class="col-sm-4">
                                            <i class="fa fa-briefcase"></i>
                                            <div class="job-detail-services-text">Experience <small><?=$row['min_exp']?> - <?=$row['max_exp']?></div>
                                        </li>

                                        <li class="col-sm-4">
                                            <i class="fa fa-university"></i>
                                            <div class="job-detail-services-text">Industry <small><?= $row['job_role']?></small></div>
                                        </li>

                                        <li class="col-sm-4">
                                            <i class="fa fa-graduation-cap"></i>
                                            <div class="job-detail-services-text">Qualification <small><?= $row['qualification_required']?></div>
                                        </li>
                                    </ul>

                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 job-content-details">
                                    <h3>Job Deesciption</h3>
                                    <div class="careerfy-description">
                                        <p><?=$row['description']?>.</p>
                                    </div>
                                    <div class="careerfy-content-title"><h3>Required skills</h3></div>
                                    <div class="careerfy-jobdetail-tags">
                                        <?php
                                        $skills = explode(',', $row['sub_roles']);
                                        foreach ($skills as $row) {
                                            ?>
                                        <a href="#"><?=$row?></a>
                                                
                                        <?php
                                        }
                                        ?>
                                   </div>
                                </div>
                            
                    </div>
                </div>
            </div>

            <?php
                }
            ?>

    </div>
    </div>
</div>