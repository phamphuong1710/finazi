<?php get_header(); ?>
<section class="no-results not-found">
	<div class="page-content">
		<div class="container">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'finazi' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			<?php else : ?>

				<?php 
					printf( __( '<div class="message"><h1 class="page-title">404</h1><h3>The requested page cannot be found!</h3><p>The page you are looking for was moved, removed, renamed or might never existed.</p> <a href="%1$s">HOME PAGE</a></div>', 'finazi' ), home_url() ); 
					?>

			<?php endif; ?>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
<?php get_footer(); ?>