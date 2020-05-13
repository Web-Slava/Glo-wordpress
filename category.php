<?php get_header('category') ?>
		
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
						<div class="row">	
							<ul>
								<?php		
								global $post;

								$query = new WP_Query( [
									'posts_per_page' => 1,
									'cat' => $cat,
								] );
								
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										?>
										<!-- Вывода постов, функции цикла: the_title() и т.д. -->
										<!-- post -->
										<div class="col-md-12">
											<div class="post post-thumb">
											<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-lg'); ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-2" href="#"><?php echo get_the_category()[0] -> cat_name; ?></a>
														<span class="post-date"><?php the_time('j F, Y'); ?></span>
													</div>
													<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
												</div>
											</div>
										</div>
										<!-- /post -->
										<?php 
									}
								} else {
									// Постов не найдено
									echo "постов не найдено";
								}
							
								wp_reset_postdata(); // Сбрасываем $post
								?>
							</ul>

							<ul>
								<?php		
								global $post;

								$query = new WP_Query( [
									'posts_per_page' => 2,
									'cat' => $cat,
								] );
								
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										?>
										<!-- Вывода постов, функции цикла: the_title() и т.д. -->
										<!-- post -->
										<div class="col-md-6">
											<div class="post post-thumb">
												<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-sm'); ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-2" href="#"><?php echo get_the_category()[0] -> cat_name; ?></a>
														<span class="post-date"><?php the_time('j F, Y'); ?></span>
													</div>
													<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
												</div>
											</div>
										</div>
										<!-- /post -->
										<?php 
									}
								} else {
									// Постов не найдено
									echo "постов не найдено";
								}
							
								wp_reset_postdata(); // Сбрасываем $post
								?>
							</ul>

							<div class="clearfix visible-md visible-lg"></div>

							<ul>
								<?php		
								global $post;

								$query = new WP_Query( [
									'posts_per_page' => 4,
									'cat' => $cat,
								] );
								
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										?>
										<!-- post -->
										<div class="col-md-12">
											<div class="post post-row">
											<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-xs'); ?></a>
												<div class="post-body">
													<div class="post-meta">
														<a class="post-category cat-2" href="#"><?php echo get_the_category()[0] -> cat_name; ?></a>
														<span class="post-date"><?php the_time('j F, Y'); ?></span>
													</div>
													<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
										<!-- /post -->
										<?php 
									}
								} else {
									// Постов не найдено
									echo "постов не найдено";
								}
							
								wp_reset_postdata(); // Сбрасываем $post
								?>
							</ul>

							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
				</div>
				<div class="col-md-4">
					<!-- ad -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /ad -->
					
					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Most Read</h2>
						</div>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
							</div>
						</div>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>
					</div>
					<!-- /post widget -->
					
					<!-- catagories -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Catagories</h2>
						</div>
						<div class="category-widget">
							<ul>
								<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
								<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
								<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
								<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /catagories -->
					
					<!-- tags -->
					<div class="aside-widget">
						<div class="tags-widget">
							<ul>
								<li><a href="#">Chrome</a></li>
								<li><a href="#">CSS</a></li>
								<li><a href="#">Tutorial</a></li>
								<li><a href="#">Backend</a></li>
								<li><a href="#">JQuery</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Development</a></li>
								<li><a href="#">JavaScript</a></li>
								<li><a href="#">Website</a></li>
							</ul>
						</div>
					</div>
					<!-- /tags -->
					
					<!-- archive -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Archive</h2>
						</div>
						<div class="archive-widget">
							<ul>
								<li><a href="#">Jan 2018</a></li>
								<li><a href="#">Feb 2018</a></li>
								<li><a href="#">Mar 2018</a></li>
							</ul>
						</div>
					</div>
					<!-- /archive -->
				</div>
			</div> <!-- /row -->	
		</div> <!-- /container -->	
	</div> <!-- /section -->
		
<?php get_footer(); ?>