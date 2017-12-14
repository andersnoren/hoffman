<?php get_header(); ?>

<div class="content">		

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
		<div <?php post_class( 'post single' ); ?>>
		
			<?php if ( has_post_thumbnail() ) :
				
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail_size' ); 
				$thumb_url = $thumb['0']; ?>
		
				<div class="featured-media">
		
					<?php the_post_thumbnail( 'post-image' ); ?>
					
				</div><!-- .featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner section-inner thin">
												
				<div class="post-header">
																										
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

				</div><!-- .post-header section -->
				    
			    <div class="post-content">
			    
			    	<?php the_content(); ?>
			    	
					<div class="clear"></div>
					
			    	<?php wp_link_pages( 'before=<p class="page-links">' . __( 'Pages:', 'hoffman' ) . ' &after=</p>&seperator= <span class="sep">/</span> '); ?>
			    
			    </div>
	
			</div><!-- .post -->
			
			<?php if ( comments_open() ) : ?>
			
				<div class="comments-container">
					
					<div class="comments-inner section-inner thin">
					
						<?php comments_template( '', true ); ?>
					
					</div>
				
				</div><!-- .comments-container -->
			
			<?php endif; ?>
		
		</div><!-- .post-inner -->
		
	<?php 
	endwhile; 
	else: 
	?>
	
		<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "hoffman" ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
	
</div><!-- .content -->
								
<?php get_footer(); ?>