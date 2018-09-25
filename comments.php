<?php 
	if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				// var_dump($comments_number);die();
				if ( '1' === $comments_number ) {
					printf(__('Comments (1)','finazi'));					
				} else {
					printf(__('Comments (%1$s)','finazi'),get_comments_number());
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 80,
				) );
			?>
		</ol>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php
		
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'finazi' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'label_submit' =>'Submit',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>

</div>