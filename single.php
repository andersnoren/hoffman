<?php get_header(); ?>

<div class="content">
											        
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php 
			
			$post_format = get_post_format();
			
			if ( $post_format == 'gallery' ) : ?>
			
				<div class="featured-media">	
	
					<?php hoffman_flexslider( 'post-image' ); ?>
					
				</div><!-- .featured-media -->
			
			<?php elseif ( has_post_thumbnail() ) : ?>
					
				<div class="featured-media">
		
					<?php the_post_thumbnail( 'post-image' ); ?>
					
					<?php if ( ! empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ) : ?>
											
						<p class="caption"><?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?></p>
						
					<?php endif; ?>
					
				</div><!-- .featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner section-inner thin">
				
				<div class="post-header">
													
					<p class="post-meta top">
					
						<a href="<?php the_permalink(); ?>" title="<?php the_time( get_option( 'time_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
						
						<?php 
						if ( comments_open() ) {
							echo '<span class="sep">/</span> '; 
							comments_popup_link( __( '0 Comments', 'hoffman' ), __( '1 Comment', 'hoffman' ), __( '% Comments', 'hoffman' ) );
						}
						
						edit_post_link( __( 'Edit', 'hoffman' ), '<span class="sep">/</span> ', '' ); 
						
						?>
						
					</p>
											
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

				</div><!-- .post-header -->
				    
			    <div class="post-content">
			    
					<?php 
					
					the_content();
					
					$args = array(
						'before'           => '<div class="clear"></div><p class="page-links"><span class="title">' . __( 'Pages:','hoffman' ) . '</span>',
						'after'            => '</p>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'separator'        => '',
						'pagelink'         => '%',
						'echo'             => 1
					);
				
					wp_link_pages( $args ); 
			    	?>
			    
			    </div><!-- .post-content -->
			    
			    <div class="clear"></div>
			
			</div><!-- .post-inner -->
													                                    	        	        
		</div><!-- .post -->
				
		<div class="tab-selector">
		
			<div class="section-inner thin">
			
				<ul>
				
					<li>
						<a class="active tab-comments" href="#">
							<div class="genericon genericon-comment"></div>
							<span><?php _e( 'Comments', 'hoffman' ); ?></span>
						</a>
					</li>
					<li>
						<a class="tab-post-meta" href="#">
							<div class="genericon genericon-summary"></div>
							<span><?php _e( 'Post info', 'hoffman' ); ?></span>
						</a>
					</li>
					<li>
						<a class="tab-author-meta" href="#">
							<div class="genericon genericon-user"></div>
							<span><?php _e( 'Author info', 'hoffman' ); ?></span>
						</a>
					</li>
					
					<div class="clear"></div>
					
				</ul>
			
			</div>
		
		</div><!-- .tab-selector -->
		
		<div class="section-inner thin post-meta-tabs">
			
			<div class="tab-post-meta tab">
			
				<div class="post-meta-items two-thirds">
			
					<div class="post-meta-item post-meta-author">
						<div class="genericon genericon-user"></div>
						<?php the_author_posts_link(); ?>
					</div>
					
					<div class="post-meta-item post-meta-date">
						<div class="genericon genericon-time"></div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?></a>
					</div>
								
					<div class="post-meta-item post-meta-categories">
						<div class="genericon genericon-category"></div>
						<?php the_category( ', ' ); ?>
					</div>
						
					<?php if ( has_tag() ) : ?>
						<div class="post-meta-item post-meta-tags">
							<div class="genericon genericon-tag"></div>
							<?php the_tags( '', ', ' ); ?>
						</div>
					<?php endif; ?>
				
				</div>
				
				<div class="post-nav one-third">
				
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					
					if ( ! empty( $next_post ) ) : ?>
						
						<a class="post-nav-newer" title="<?php printf( __( 'Next post: %s', 'hoffman' ), the_title_attribute( array( 'post' => $next_post->ID, 'echo' => false ) ) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
							<p><?php _e('Next post','hoffman'); ?></p>
							<h5><?php echo get_the_title($next_post); ?></h5>
						</a>
				
					<?php endif;
					
					if ( ! empty( $prev_post ) && ! empty( $next_post ) ) echo '<hr>';
													
					if ( ! empty( $prev_post ) ): ?>
					
						<a class="post-nav-older" title="<?php printf( __( 'Previous post: %s', 'hoffman' ), the_title_attribute( array( 'post' => $prev_post->ID, 'echo' => false ) ) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
							<p><?php _e( 'Previous post', 'hoffman' ); ?></p>
							<h5><?php echo get_the_title( $prev_post ); ?></h5>
						</a>
				
					<?php endif; ?>
																					
				</div><!-- .post-nav -->
				
				<div class="clear"></div>
				
			</div><!-- .post-meta-tab -->
			
			<div class="tab-author-meta tab">
			
				<div class="author-meta-aside">

					<?php $user_id = get_the_author_meta( 'ID' ); ?>
			
					<a href="<?php echo get_author_posts_url( $user_id ); ?>" class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'email' ), '256' ); ?></a>
								
				</div><!-- .author-meta-left -->
			
				<div class="author-meta-inner">
			
					<h3 class="author-name"><?php the_author_posts_link(); ?></h3>
					
					<p class="author-position">
				
						<?php
						$user_info = get_userdata( $user_id );
						$user_role = ucfirst( implode( ', ', $user_info->roles ) );

						echo $user_role;
						?>
						
					</h4>
					
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-description">
							<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
						</div>
					<?php endif; ?>
					
					<div class="author-meta-social">
													
						<?php 
						$author_url = get_the_author_meta( 'user_url' ); 
						if ( ! empty( $author_url ) ) : ?>
							<a class="author-link-url" href="<?php echo esc_url( $author_url ); ?>">
								<div class="genericon genericon-website"></div>
							</a>
						<?php endif;
						
						$author_dribbble = get_the_author_meta( 'dribbble' ); 
						if ( ! empty( $author_dribbble ) ) : ?>
							<a class="author-link-dribbble" href="<?php echo esc_url( $author_dribbble ); ?>">
								<div class="genericon genericon-dribbble"></div>
							</a>
						<?php endif;
						
						$author_facebook = get_the_author_meta( 'facebook' ); 
						if ( ! empty( $author_facebook ) ) : ?>
							<a class="author-link-facebook" href="<?php echo esc_url( $author_facebook ); ?>">
								<div class="genericon genericon-facebook-alt"></div>
							</a>
						<?php endif;
						
						$author_flickr = get_the_author_meta( 'flickr' ); 
						if ( ! empty( $author_flickr ) ) : ?>
							<a class="author-link-flickr" href="<?php echo esc_url( $author_flickr ); ?>">
								<div class="genericon genericon-flickr"></div>
							</a>
						<?php endif;
						
						$author_googleplus = get_the_author_meta( 'googleplus' ); 
						if ( ! empty( $author_googleplus ) ) : ?>
							<a class="author-link-googleplus" href="<?php echo esc_url( $author_googleplus ); ?>">
								<div class="genericon genericon-googleplus"></div>
							</a>
						<?php endif;
						
						$author_linkedin = get_the_author_meta( 'linkedin' ); 
						if ( ! empty( $author_linkedin ) ) : ?>
							<a class="author-link-linkedin" href="<?php echo esc_url( $author_linkedin ); ?>">
								<div class="genericon genericon-linkedin"></div>
							</a>
						<?php endif;
						
						$author_instagram = get_the_author_meta( 'instagram' ); 
						if ( ! empty( $author_instagram ) ) : ?>
							<a class="author-link-instagram" href="<?php echo esc_url( $author_instagram ); ?>">
								<div class="genericon genericon-instagram"></div>
							</a>
						<?php endif;
						
						$author_pinterest = get_the_author_meta( 'pinterest' ); 
						if ( ! empty( $author_pinterest ) ) : ?>
							<a class="author-link-pinterest" href="<?php echo esc_url( $author_pinterest ); ?>">
								<div class="genericon genericon-pinterest"></div>
							</a>
						<?php endif;
						
						$author_skype = get_the_author_meta( 'skype' ); 
						if ( ! empty( $author_skype ) ) : ?>
							<a class="author-link-skype" href="<?php echo esc_url( $author_skype ); ?>">
								<div class="genericon genericon-skype"></div>
							</a>
						<?php endif;
						
						$author_tumblr = get_the_author_meta( 'tumblr' ); 
						if ( ! empty( $author_tumblr ) ) : ?>
							<a class="author-link-tumblr" href="<?php echo esc_url( $author_tumblr ); ?>">
								<div class="genericon genericon-tumblr"></div>
							</a>
						<?php endif;
						
						$author_twitter = get_the_author_meta( 'twitter' ); 
						if ( ! empty( $author_twitter ) ) : ?>
							<a class="author-link-twitter" href="<?php echo esc_url( $author_twitter ); ?>">
								<div class="genericon genericon-twitter"></div>
							</a>
						<?php endif;
						
						$author_vimeo = get_the_author_meta( 'vimeo' ); 
						if ( ! empty( $author_vimeo ) ) : ?>
							<a class="author-link-vimeo" href="<?php echo esc_url( $author_vimeo ); ?>">
								<div class="genericon genericon-vimeo"></div>
							</a>
						<?php endif; ?>
						
						<div class="clear"></div>
					
					</div><!-- .author-meta-social -->
				
				</div><!-- .author-meta-inner -->
			
			</div><!-- .tab-author-meta -->
			
			<div class="tab-comments tab">
							
				<?php comments_template( '', true ); ?>
				
			</div><!-- .tab-comments -->
					
		</div><!-- .section-inner -->
									                        
	<?php 
	endwhile; 
	else: ?>

		<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "hoffman" ); ?></p>
	
	<?php endif; ?>    

</div><!-- .content -->
		
<?php get_footer(); ?>