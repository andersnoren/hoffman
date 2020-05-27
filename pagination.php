<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div class="archive-nav">
		<div class="section-inner group">
			<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'hoffman' ) ); ?>
			<?php echo get_previous_posts_link( __( 'Newer posts', 'hoffman' ) . ' &raquo;' ); ?>
		</div>
	</div><!-- .archive-nav -->
	
<?php endif; ?>