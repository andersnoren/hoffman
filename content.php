<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	
	$post_format = get_post_format();

	if ( $post_format == 'gallery' ) : ?>

		<figure class="featured-media">	
			<?php hoffman_flexslider(); ?>
		</figure><!-- .featured-media -->

	<?php elseif ( has_post_thumbnail() ) : ?>
	
		<figure class="featured-media">	
			
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
			
			<?php 

			$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
			
			if ( $image_caption ) : ?>
				<figcaption class="caption"><?php echo $image_caption; ?></figcaption>
			<?php endif; ?>
			
		</figure><!-- .featured-media -->
			
	<?php endif; 
	
	if ( is_sticky() ) { 
		echo '<a class="is-sticky" href="' . get_permalink() . '"><span class="genericon genericon-pinned"></span><span class="screen-reader-text">' . __( 'Sticky post', 'hoffman' ) . '</span></a>'; 
	} 
	?>
	
	<div class="post-inner section-inner thin">
		
		<div class="post-header">
			
			<div class="post-meta top">

				<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				
				<?php 

				if ( comments_open() ) {
					echo '<span class="sep">/</span> '; 
					comments_popup_link( __( '0 Comments', 'hoffman' ), __( '1 Comment', 'hoffman' ), __( '% Comments', 'hoffman' ) );
				}
				
				edit_post_link( __( 'Edit', 'hoffman' ), '<span class="sep">/</span> ', '' ); 
				
				?>
				
			</div>
			
		    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    	    
		</div><!-- .post-header -->
		
		<div class="post-content entry-content">
			<?php 
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content();
			}
			?>
		</div>
	
	</div><!-- .post-inner -->

</article><!-- .post -->