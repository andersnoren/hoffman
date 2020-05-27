<?php get_header(); ?>

<div class="content">

	<?php
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	global $wp_query;

	$archive_title = get_the_archive_title();
	$archive_subtitle = $paged && $wp_query->max_num_pages ? sprintf( __( '(page %1$s of %2$s)', 'hoffman' ), $paged, $wp_query->max_num_pages ) : '';
	$archive_description = get_the_archive_description();

	if ( $paged > 1 || $archive_title || $archive_description ) : ?>

		<header class="archive-header">

			<div class="section-inner">
		
				<h1 class="archive-title">
				
					<?php 
					
					echo wp_kses_post( $archive_title );
					
					if ( $archive_subtitle ) : ?>
						<span class="archive-subtitle"><?php echo $archive_subtitle; ?></span>
					<?php endif; ?>
					
				</h1>

				<?php if ( $archive_description ) : ?>
					<div class="archive-description">
						<?php echo wp_kses_post( wpautop( $archive_description ) ); ?>
					</div>
				<?php endif; ?>
				
			</div><!-- .section-inner -->

		</header><!-- .archive-header -->
		
	<?php endif; ?>
																	                    
	<?php if ( have_posts() ) : ?>
	
		<div class="posts" id="posts">

			<?php
		
			while ( have_posts() ) : the_post();
			
				get_template_part( 'content', get_post_format() );
				
			endwhile;

			?>
		
		</div><!-- .posts -->
	
		<?php get_template_part( 'pagination' ); ?>

	<?php elseif ( is_search() ) : ?>

		<div class="post section medium-padding">
				
			<div class="post-content entry-content section-inner thin">
							
				<?php get_search_form(); ?>
			
			</div><!-- .post-content -->
		
		</div><!-- .post -->

	<?php endif; ?>
		
</div><!-- .content.section-inner -->
	              	        
<?php get_footer(); ?>