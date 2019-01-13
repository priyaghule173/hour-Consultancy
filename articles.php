<!--Revolutio slider starts-->
		<div class="job-listing-wrap">
			<div class="container">
				<!--<img src="<?= base_url()?>images/Job-Seekers-Header3.jpg">-->
				<!--<div class="sliderTxt">
					<p></p>
					<h1>Our Company</h1>
				</div>-->
			</div>
		</div>
<!--Revolution slider ends-->

<div class="page-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4 about">
				<h3>Articles</h3>
			</div>
		</div>
	</div>
</div>

<div class="articles">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-sm-12 col-xs-12 articles-info">
				<h4></h4>
				<ul class="row blogGrid">
					<?php foreach ($blog_data as $row) { ?>
						<li class="col-md-3">
							<div class="blog-inter">
								<div class="postimg">
									<img width="300px" height="200px" src="<?=base_url()?>assets/uploads/blog_pics/<?php echo $row['blog_pic']; ?>" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href=""><?php echo $row['blog_title']; ?></a></h5>
								</div>

								<div class="postmeta">
									<p><?php echo substr($row['blog_description'],0,60); ?></p>
									<div class="view-btn">
										<a  target = "_blank" href="<?php echo $row['blog_link']; ?>">Read More</a>
									</div>
								</div>
							</div>

						</li>
						<?php } ?>
						
<!--						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>-->

<!--						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>-->

<!--						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>-->
					</ul>

<!--					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
						<ul class="row blogGrid">
						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>

						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>

						<li class="col-md-4">
							<div class="blog-inter">
								<div class="postimg">
									<img src="<?= base_url()?>images/imgages.jpg" alt="Blog image">
								</div>

								<div class="post-header">
									<h5><a href="">Lorem ipsumdummy text</a></h5>
									<div class="postmeta">
										By <span>Abc</span>
										Category: <a href="">Movers,Shifting</a>
									</div>
								</div>

								<div class="postmeta">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus...</p>
									<div class="view-btn">
										<a href="">Read More</a>
									</div>
								</div>
							</div>

						</li>
					</ul>
				</div>
					</div>-->
			</div>

		</div>
	</div>
</div>