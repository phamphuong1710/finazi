<?php get_header(); ?>
	<div class="container">
		<div id="main" class="row">
			<div id="content" class="<?php echo !is_product() ? 'col-md-9 woocommerce-content' : 'col-md-12 woocommerce-content' ?>">
				<?php woocommerce_content(); ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
			
		</div>
	</div>
<!-- 	<?php woocommerce_mini_cart() ?> <-->

<!-- <?php 	echo  WC()->cart->get_cart_contents_count() ?> -->
<!-- <?php 	echo  WC()->cart->get_cart_total() ?> -->
<?php 
	get_footer();
?>