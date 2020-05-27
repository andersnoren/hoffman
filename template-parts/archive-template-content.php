<div class="archive-container clear">

	<h3><?php _e( 'Posts', 'hoffman' ); ?></h3>
									
	<ul>
		<?php 
		
		$posts_archive = get_posts( array(
			'post_status'		=> 'publish',
			'posts_per_page'	=> -1,
		) );

		foreach( $posts_archive as $archive_post ) : ?>
			<li>
				<a href="<?php echo get_the_permalink( $archive_post->ID ); ?>" title="<?php the_title_attribute( array( 'post' => $archive_post->ID ) ); ?>">
					<?php echo get_the_title( $archive_post->ID );?> 
					<span><?php echo get_the_time( get_option( 'date_format' ), $archive_post->ID ); ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	
	<h3><?php _e( 'Categories','hoffman') ?></h3>
	
	<?php wp_list_categories( 'title_li='); ?>
	
	<h3><?php _e( 'Tags','hoffman') ?></h3>
	
	<ul>
		<?php 
		
		$tags = get_tags();
		
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( 'View all posts in %s', 'hoffman' ), $tag->name ) . '">' . $tag->name . '</a></li> ';
			}
		}
		?>
	</ul>
	
	<h3><?php _e( 'Contributors', 'hoffman' ); ?></h3>
	
	<ul>
		<?php wp_list_authors(); ?> 
	</ul>
	
	<h3><?php _e( 'Archives by Year', 'hoffman' ); ?></h3>
	
	<ul>
		<?php wp_get_archives( 'type=yearly' ); ?>
	</ul>
	
	<h3><?php _e( 'Archives by Month', 'hoffman' ); ?></h3>
	
	<ul>
		<?php wp_get_archives( 'type=monthly' ); ?>
	</ul>

	<h3><?php _e( 'Archives by Day', 'hoffman' ); ?></h3>
	
	<ul>
		<?php wp_get_archives( 'type=daily' ); ?>
	</ul>

</div><!-- .archive-container -->