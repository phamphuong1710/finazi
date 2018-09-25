<?php get_header() ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<section id="main-section" class="col-md-9">
					<?php if (have_posts()) : while (have_posts()) : the_post() ; ?>
							<?php get_template_part('content',get_post_format()); ?>
							
							<?php endwhile; ?>
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