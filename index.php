<?php get_header(); ?>

<div class="content">
																	                    
	<?php if (have_posts()) : ?>
	
		<div class="posts" id="posts">
	
			<?php
			$paged = get_query_var( 'paged' ) ?: 1;
			$total_post_count = wp_count_posts();
			$published_post_count = $total_post_count->publish;
			$total_pages = ceil( $published_post_count / $posts_per_page );
			
			if ( 1 < $paged ) : ?>
			
				<div class="page-title section small-padding">
				
					<h4 class="section-inner"><?php printf( __( 'Page %s of %s', 'hoffman' ), $paged, $wp_query->max_num_pages ); ?></h4>
					
				</div>
				
				<div class="clear"></div>
			
			<?php endif;
			
				while ( have_posts() ) : the_post();
				
					get_template_part( 'content', get_post_format() );
					
				endwhile;
				
			endif; ?>
		
	</div><!-- .posts -->
	
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	
		<div class="archive-nav">
		
			<div class="section-inner">
		
				<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'hoffman' ) ); ?>
					
				<?php echo get_previous_posts_link( __( 'Newer posts', 'hoffman' ) . ' &raquo;' ); ?>
				
				<div class="clear"></div>
			
			</div>
			
		</div><!-- .post-nav archive-nav -->
						
	<?php endif; ?>
		
</div><!-- .content section-inner -->
	              	        
<?php get_footer(); ?>