<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Webmag
 */
/*
Template Name: Home
Template Post Type: page
*/

get_header();
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">	
			<ul>
				<?php		
				global $post;

				$query = new WP_Query( [
					'posts_per_page' => 2,
					'post_type'		 => 'video',
					'genre'			 => 'Lesson',
					//'category__name' => 'css, javascript, web design, popular, jquery, news',
				] );
				
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<!-- Вывода постов, функции цикла: the_title() и т.д. -->
						<!-- post -->
						<div class="col-md-6">
							<div class="post post-thumb">
								<a class="post-img" href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb-m'); ?></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="<?php
											$category = get_the_category()[0] -> cat_name;
											$category_id = get_cat_ID($category);
											$link = get_category_link($category_id);
											echo $link;
							 			?>"><?php  the_taxonomies(array(
												'template' => '%s %l',
												'sep' 	   => '<br>',
										 )); ?></a>
										<span class="post-date"><?php the_time('j F, Y'); ?></span>
									</div>
									<h3 class="post-title"><a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></h3>
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
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Recent Posts</h2>
				</div>
			</div>
			<!-- post -->
			<ul>
				<?php		
				global $post;

				$query = new WP_Query( [
					'posts_per_page' => 6,
					'category__name' => 'css, javascript, web design, popular, jquery, news',
				] );
				
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<!-- Вывода постов, функции цикла: the_title() и т.д. -->
						<!-- post -->
						<div class="col-md-4">
							<div class="post">
								<a class="post-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb-sm'); ?></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-1" href="<?php
											$category = get_the_category()[0] -> cat_name;
											$category_id = get_cat_ID($category);
											$link = get_category_link($category_id);
											echo $link;
							 			?>"><?php echo get_the_category()[0] -> cat_name; ?></a>
										<span class="post-date"><?php the_time('j F, Y'); ?></span>
									</div>
									<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- post -->
					<ul>
						<?php $posts = get_posts( array(
							'numberposts' => 7,
							'orderby'     => 'date',
							'order'       => 'DESC',
							'include'     => array(),
							'exclude'     => array(),
							'meta_key'    => '',
							'meta_value'  =>'',
							'post_type'   => 'post',
							'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
						) );
						$count = 1;
						foreach( $posts as $post ){
							$count++;
							setup_postdata($post); 
							if($count == 2){ ?>
								<div class="col-md-12">
									<div class="post post-thumb">
										<a class="post-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb-lg'); ?></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category cat-3" href="<?php
													$category = get_the_category()[0] -> cat_name;
													$category_id = get_cat_ID($category);
													$link = get_category_link($category_id);
													echo $link;
							 					?>"><?php echo get_the_category()[0] -> cat_name; ?></a>
												<span class="post-date"><?php the_time('j F, Y'); ?></span>
											</div>
											<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div>
							<?php } else{ ?>
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb-sm'); ?></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category cat-4" href="<?php
													$category = get_the_category()[0] -> cat_name;
													$category_id = get_cat_ID($category);
													$link = get_category_link($category_id);
													echo $link;
							 					?>"><?php echo get_the_category()[0] -> cat_name; ?></a>
												<span class="post-date"><?php the_time('j F, Y'); ?></span>
											</div>
											<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div>
							<?php }				
							if( $count%2 == 0 ) { ?> 
								<div class="clearfix visible-md visible-lg"></div> 
							<?php
							} else if ( !$query->have_posts() ){
								echo "постов не найдено!";
							}
						} // close foreach
							wp_reset_postdata(); 
							?>
					</ul>
					<!-- /post -->
				</div> <!-- /row -->
			</div> <!-- /col-md-8 -->
			<div class="col-md-4">
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
				<!-- post widget -->
				<!-- <div class="aside-widget">
					<div class="section-title">
						<h2>Featured Posts</h2>
					</div>
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="category.html">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div> -->
				<!-- /post widget -->
				
				<!-- ad -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-1.jpg" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Posts</h2>
					</div>
				</div>
				<!-- post -->
				<ul>
					<?php		
					global $post;
					$query = new WP_Query( [
						'posts_per_page' => 3,
						'category__name' => 'css, javascript, web design, popular, jquery, news',
					] );
					
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<!-- Вывода постов, функции цикла: the_title() и т.д. -->
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb-sm'); ?></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="<?php
												$category = get_the_category()[0] -> cat_name;
												$category_id = get_cat_ID($category);
												$link = get_category_link($category_id);
												echo $link;
							 				?>"><?php echo get_the_category()[0] -> cat_name; ?></a>
											<span class="post-date"><?php the_time('j F, Y'); ?></span>
										</div>
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
				<!-- /post -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
</div>
<!-- /section -->
<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						</div>
						<!-- post -->
						<ul>
							<?php		
							global $post;

							$query = new WP_Query( [
								'posts_per_page' => 4,
								'category__name' => 'css, javascript, web design, popular, jquery, news',
							] );
							
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									?>
									<!-- Вывода постов, функции цикла: the_title() и т.д. -->
									<!-- post -->
									<div class="col-md-12">
										<div class="post post-row">
											<a class="post-img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb-xs'); ?></a>
											<div class="post-body">
												<div class="post-meta">
													<a class="post-category cat-2" href="<?php
														$category = get_the_category()[0] -> cat_name;
														$category_id = get_cat_ID($category);
														$link = get_category_link($category_id);
														echo $link;
							 						?>"><?php echo get_the_category()[0] -> cat_name; ?></a>
													<span class="post-date"><?php the_time('j F, Y'); ?></span>
												</div>
												<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
					
					<!-- widget-catagories -->
					<?php get_sidebar('categories'); ?>
					<!-- /widget-catagories -->
					
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
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
</div>
<!-- /section -->

<?php
get_footer();
