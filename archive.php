<?php get_header(); ?>

<div class="content">

	<div class="page-title">
			
		<div class="section-inner">

			<h4>
			
				<?php 
				if ( is_day() ) :
					printf( __( 'Date: %s', 'hoffman' ), get_the_date() );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'hoffman' ), get_the_date( _x( 'F Y', 'F = Month, Y = Year', 'hoffman' ) ) );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'hoffman' ), get_the_date( _x( 'Y', 'Y = Year', 'hoffman' ) ) );

				elseif ( is_category() ) :
					printf( __( 'Category: %s', 'hoffman' ), single_cat_title( '', false ) . '' );

				elseif ( is_tag() ) :
					printf( __( 'Tag: %s', 'hoffman' ), single_tag_title( '', false ) . '' );

				elseif ( is_author() ) :
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
					printf( __( 'Author: %s', 'hoffman' ), $curauth->display_name );
					
				else : 
					_e( 'Archive', 'hoffman' ); 
				endif;

				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
				if ( 1 < $wp_query->max_num_pages ) : ?>
				
					<span><?php printf( __( '(page %1$s of %2$s)', 'hoffman' ), $paged, $wp_query->max_num_pages ); ?></span>
				
				<?php endif; ?>

			</h4>
			
			<?php
			$tag_description = tag_description();
			
			if ( ! empty( $tag_description ) ) {
				echo apply_filters( 'tag_archive_meta', '<div class="tag-meta">' . $tag_description . '</div>' );
			}
			?>
		
		</div><!-- .section-inner -->
		
	</div><!-- .page-title -->
	
	<?php if ( have_posts() ) : ?>
			
		<div class="posts" id="posts">
			
			<?php while ( have_posts() ) : the_post(); ?>
						
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
							
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
				
	<?php endif; ?>

</div><!-- .content -->

<?php get_footer(); ?>