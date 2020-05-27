<?php get_header(); ?>

<div class="content">
											        
	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php 
			$image_array = wp_get_attachment_image_src( $post->ID, 'full', false ); 
			?>
			
			<figure class="featured-media">
				<?php echo wp_get_attachment_image( $post->ID, 'post-thumbnail' ); ?>
			</figure>
			
			<div class="post-inner section-inner thin">
			
				<div class="post-header">
				
					<div class="post-meta top">
					
						<?php echo get_the_time( get_option( 'date_format' ) ) . ' <span class="sep">/</span> ' . $image_array['1'] . '<span style="text-transform: lowercase;">x</span>' . $image_array['2'] . ' px'; ?>
					
					</div>
				
					<h2 class="post-title"><?php echo basename( get_attached_file( $post->ID ) ); ?></h2>
				
				</div><!-- .post-header -->
				
				<?php 

				$image_caption = get_the_post_thumbnail_caption();
				
				if ( $image_caption ) : ?>
													
					<div class="post-content entry-content section-inner thin">
					
						<p><?php echo $image_caption; ?></p>
						
					</div>
					
				<?php endif; ?>
				
			</div><!-- .post-inner -->
														                        
		<?php endwhile; 
	
		else: ?>
	
			<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "hoffman" ); ?></p>
		
		<?php endif; ?>    
			
	</div><!-- .post -->
	
	<div class="comments-container">
	
		<div class="comments-inner section-inner thin">
	
			<?php comments_template( '', true ); ?>
		
		</div>
	
	</div>

</div><!-- .content -->
		
<?php get_footer(); ?>