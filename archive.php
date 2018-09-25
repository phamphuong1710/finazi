<?php get_header() ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<section id="main-section" class="col-md-9">
					<?php 
						// if (is_category()) {
						// 	printf(__('The Category: %1$s','finazi'),single_cat_title('',false));
						// } 
						// if (is_tag()){
						// 	printf(__('Taged: %1$s','finazi'),single_tag_title('',false));
						// }
						// if (is_day()) {
						// 	printf(__('Taged: %1$s','finazi'),the_time('F jS, Y'));
						// }
						// if (is_month()) {
						// 	printf(__('Post : %1$s','finazi'),single_month_title('',false));
						// }
						// if (is_year()) {
						// 	printf(__('Taged: %1$s','finazi'),the_time('Y'));
						// }
					?>
					<?php if (have_posts()) : while (have_posts()) : the_post() ; ?>
							<?php get_template_part('content',get_post_format()); ?>
							<?php endwhile; ?>
							<?php the_posts_pagination([
														'mid-size' => 2,
														'next-text' => __('Next','finazi'),
														'prev-text' => __('Pre','finazi')
														]); ?>
							<?php else : ?>
								<?php get_template_part('404'); ?>
						<?php endif ?>
				</section>
				<aside id="main-sidebar" class="col-md-3">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>
<?php get_footer() ?>