<footer class="site-footer">
	<div class="container-responsive">
		<div class="row">
			<div class="col-12">
				<a class="footer-brand" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri('/') ); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" class="logo"></a>
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>
		</div>
	</div>
</footer>