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
											<i class="fa fa-calendar" style="color:#13b5ea;"  aria-hidden="true"></i> <?= substr($post['approved_job_post_date'], 0,10)?> - <?= substr($post['job_post_expire_date'],0,10)?>
										</div>
											<div class="col-md-12 col-sm-13 job-title-t">
											    <a  href="<?php echo base_url('welcome/jobDetails?j_id=').$post['j_id']?>" target="_blank" >
											<h4> <?php echo $post['job_title']; ?></h4><a/>
										</div>
											<div class="col-md-12 col-sm-12">
											<div class="part-time"><?= $post['job_type']?></div>
										</div>
										<div class="col-md-12 col-sm-13">
											<p class="job-desc"><?= substr($post['description'],0,150)?>...[<a target="_blank"  href="<?php echo base_url('welcome/jobDetails?j_id=').$post['j_id']?>">See more</a>]</p>
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



<!--           <div class="careerfy-job careerfy-joblisting-classic">
                                    <div class="post-list" id="postList">
                                        <ul class="careerfy-row">
                                            <?php if(!empty($posts)): foreach($posts as $post): ?>
                                              <li class="careerfy-column-12">
                                                <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="<?= base_url() ?>assets/img/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                 <div class="careerfy-list-option">
                                                    <div class="list-item">
                                                        <a href="<?php echo base_url('candidate/job_details?j_id=').$post['j_id']?>">
                                                        <h2><?php echo $post['job_title']; ?></h2>
                                                        </a>
                                                    </div>
                                                        <ul>
                                                            <li><i class="fa fa-graduation-cap"></i> <?= $post['qualification_required']?>
                                                            </li>
                                                            <li><i class="fa fa-building"></i><a href="#"><?= $post['company_name']?></a></li>
                                                            <li><i class="fa fa-map-marker"></i> <?= $post['city']?> - <?=$post['localities']?></li>
                                                            <li><i class="fa fa-filter"></i><?= $post['job_role']?></li>
                                                            <li><i class="fa fa-calendar"></i><?= $post['approved_job_post_date']?></li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a  class="
                                                        <?php 
                                                            if($post['job_type']=='Full Time')
                                                                echo "careerfy-option-btn";
                                                            elseif ($post['job_type']=='Part Time') {
                                                               echo "careerfy-option-btn careerfy-green";
                                                            }elseif ($post['job_type']=='Internship') {
                                                                echo "careerfy-option-btn careerfy-red";
                                                            }elseif ($post['job_type']=='Work From Home') {
                                                                echo "careerfy-option-btn careerfy-blue";
                                                            }
                                                        ?>"><?= $post['job_type']?></a>
                                                        <input type="submit" value="Apply" id="<?=$post['j_id']." ".$post['job_post_by_emp_id']?>" onclick="show_id(this.id)" class="careerfy-option-btn careerfy-blue" value="Apply" id="" onclick="show_id(this.id)"> 
                                                   </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                               
                                            </li>
                                            <?php
                                             endforeach;
                                             else:
                                              ?>
                                            <p>Post(s) not available456.</p>
                                            <?php 
                                            endif;
                                             ?>
                                            <?php echo $this->ajax_pagination->create_links(); ?>
                                        </ul>
                                        </div>
                                        <div class="loading" style="display: none;">
                                            <div class="content"><img src="<?php echo base_url().'assets/img/126.gif'; ?>"/>
                                            </div>
                                        </div>
                                </div>
 -->