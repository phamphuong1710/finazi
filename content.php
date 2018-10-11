<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
	<div class="thumbnail-post">
		<?php finazi_thumbnail('large'); ?>
	</div>
	<div class="blog-post-info">
		<div class="left">
			<div class="time">
				<div class="blog-post-date-number">
					<?php finazi_date_post() ?>
				</div>
				<div class="blog-post-date-text">
					<?php finazi_month_post() ?>
					<?php finazi_year_post() ?>
				</div>
			</div>
			<div class="blog-post-under-date">
				<span class="ion-ios-chatboxes-outline">
					<?php finazi_number_comment() ?>
				</span>
				<span class="ion-compose">
					<?php finazi_author_post() ?>
				</span>
			</div>
			<div class="info-post">
				
			</div>
		</div>
		<div class="right">
			<div class="post-format">
				<?php finazi_category_post() ?>
			</div>
			
			<div class="entry-title">
				<?php finazi_entry_title() ?>
					
			</div>
			<div class="content-post <?php echo (is_single()) ?  'post-content-single' : '' ;?>">	
				<?php finazi_entry_content() ?>
			</div>
			<!-- <?php the_post_navigation(); ?>
			<?php echo get_the_post_navigation() ?> -->
			<?php if (is_single()) {?>
				<div class="social-network">
					<div class="share_number">

						<p><?php echo esc_html( 'Share', 'finazi' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
						<?php
							$src = 'dkfjdlfslf.com/photo';
							$img_alt = 'Photo';
						?>
						<img src="" alt="">
					</div>
					<div class="share_with">
						<ul>
							<li><a href="#" class="fa fa-linkedin"></a></li>
							<li><a href="#" class="fa fa-google-plus"></a></li>
							<li><a href="#" class="fa fa-twitter"></a></li>
							<li><a href="#" class="fa fa-facebook"></a></li>
						</ul>
					</div>
				</div><?php

				post_navigation();
				// the_post_navigation();
				// echo next_post_link();
				// var_dump(get_next_post());?>
				<div class="post-tag">
					<?php echo the_tags(); ?>
				</div><?php
				comments_template();

			} ?>
		</div>
	</div>
</article>