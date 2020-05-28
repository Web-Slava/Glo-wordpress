<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webmag
 */

?>

<!-- Footer -->
<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-5">
				<div class="footer-widget">
					<div class="footer-logo">
						<a href="index.html" class="logo"><img src="./img/logo.png" alt=""></a>
					</div>
					
					<?php wp_nav_menu([
						'theme_location'  => 'footer-policy',
						'menu_class'      => 'footer-nav',
					]) ?>

					<!-- <ul class="footer-nav">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Advertisement</a></li>
					</ul> -->
					
					<div class="footer-copyright">
						<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">					

					<?php wp_nav_menu([					
						'theme_location'  => 'footer-links',
						'items_wrap'      => '<h3 class="footer-title">About Us</h3><ul>%3$s</ul>',
						'container'       => 'div', 
						'container_class' => 'footer-widget',
						'menu_class'      => 'footer-links',
					]) ?>

					</div>
					<div class="col-md-6">

					<?php wp_nav_menu([					
						'theme_location'  => 'footer-catagories',
						'items_wrap'      => '<h3 class="footer-title">Catagories</h3><ul>%3$s</ul>',
						'container'       => 'div', 
						'container_class' => 'footer-widget',
						'menu_class'      => 'footer-links',
					]) ?>

					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="footer-widget">
					<h3 class="footer-title">Join our Newsletter</h3>
					<div class="footer-newsletter">
						
					<form name="sendEmail" id="sendEmail" method="post" action="<?php echo admin_url('admin-ajax.php?action=send_mail') ?>">
						<input class="input" id="name" type="text" name="name" placeholder="Enter your name">
						<input class="input" id="email" type="email" name="newsletter" placeholder="Enter your email">
						<input type="submit" id="submit" name="button" value="Send message">
						<!-- <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button> -->
					</form>

					<!-- <?php echo do_shortcode( '[ninja_form id=2]' ) ?> -->
					
					</div>
					<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /Footer -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
