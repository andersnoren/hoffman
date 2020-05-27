<?php get_header(); ?>

<div class="content">

	<?php

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			$show_comments = ( ! post_password_required() && ( get_comments_number() || comments_open() ) );

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post single' ); ?>>

				<?php

				$post_format = get_post_format();

				if ( $post_format == 'gallery' ) : ?>

					<figure class="featured-media">
						<?php hoffman_flexslider(); ?>
					</div><!-- .featured-media -->

				<?php elseif ( has_post_thumbnail() ) : ?>

					<figure class="featured-media">

						<?php

						the_post_thumbnail();

						$image_caption = get_the_post_thumbnail_caption();

						if ( $image_caption ) : ?>
							<figcaption class="caption"><?php echo $image_caption; ?></figcaption>
						<?php endif; ?>

					</figure><!-- .featured-media -->

				<?php endif; ?>

				<div class="post-inner section-inner thin">

					<div class="post-header">

						<?php if ( is_single() ) : ?>

							<p class="post-meta top">

								<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

								<?php
								if ( $show_comments ) {
									echo '<span class="sep">/</span> ';
									comments_popup_link( __( '0 Comments', 'hoffman' ), __( '1 Comment', 'hoffman' ), __( '% Comments', 'hoffman' ) );
								}

								edit_post_link( __( 'Edit', 'hoffman' ), '<span class="sep">/</span> ', '' );

								?>

							</p>

						<?php endif; ?>

						<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

					</div><!-- .post-header -->

					<div class="post-content entry-content">

						<?php

						the_content();

						$args = array(
							'before'           => '<p class="page-links clear"><span class="title">' . __( 'Pages:','hoffman' ) . '</span>',
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

				</div><!-- .post-inner -->

			</article><!-- .post -->

			<?php if ( is_single() ) : ?>

				<div class="tab-selector">

					<div class="section-inner thin">

						<ul class="group">

							<?php if ( $show_comments ) : ?>
								<li>
									<a class="tab-comments active" href="#" data-target=".tab-comments">
										<div class="genericon genericon-comment"></div>
										<span><?php _e( 'Comments', 'hoffman' ); ?></span>
									</a>
								</li>
							<?php endif; ?>

							<li>
								<a class="tab-post-meta<?php if ( ! $show_comments ) echo ' active'; ?>" href="#" data-target=".tab-post-meta">
									<div class="genericon genericon-summary"></div>
									<span><?php _e( 'Post info', 'hoffman' ); ?></span>
								</a>
							</li>
							<li>
								<a class="tab-author-meta" href="#" data-target=".tab-author-meta">
									<div class="genericon genericon-user"></div>
									<span><?php _e( 'Author info', 'hoffman' ); ?></span>
								</a>
							</li>

						</ul>

					</div><!-- .section-inner -->

				</div><!-- .tab-selector -->

				<div class="section-inner thin post-meta-tabs">

					<?php if ( $show_comments ) : ?>

						<div class="tab-comments active tab">
							<?php comments_template( '', true ); ?>
						</div><!-- .tab-comments -->

					<?php endif; ?>

					<div class="tab-post-meta tab group<?php if ( ! $show_comments ) echo ' active'; ?>">

						<div class="post-meta-items two-thirds">

							<div class="post-meta-item post-meta-author">
								<div class="genericon genericon-user"></div>
								<?php the_author_posts_link(); ?>
							</div>

							<div class="post-meta-item post-meta-date">
								<div class="genericon genericon-time"></div>
								<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?></a>
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

						</div><!-- .post-meta-items -->

						<div class="post-nav one-third">

							<?php
							$prev_post = get_previous_post();
							$next_post = get_next_post();

							if ( $next_post ) : ?>

								<a class="post-nav-newer" href="<?php the_permalink( $next_post->ID ); ?>">
									<p><?php _e( 'Next post', 'hoffman' ); ?></p>
									<h5><?php echo get_the_title( $next_post ); ?></h5>
								</a>

							<?php endif;

							if ( $prev_post && $next_post ) echo '<hr>';

							if ( $prev_post ): ?>

								<a class="post-nav-older" href="<?php the_permalink( $prev_post->ID ); ?>">
									<p><?php _e( 'Previous post', 'hoffman' ); ?></p>
									<h5><?php echo get_the_title( $prev_post ); ?></h5>
								</a>

							<?php endif; ?>

						</div><!-- .post-nav -->

					</div><!-- .post-meta-tab -->

					<div class="tab-author-meta tab">

						<div class="author-meta-aside">

							<?php $user_id = get_the_author_meta( 'ID' ); ?>

							<a href="<?php echo get_author_posts_url( $user_id ); ?>" class="author-avatar"><?php echo get_avatar( $user_id, '256' ); ?></a>

						</div><!-- .author-meta-left -->

						<div class="author-meta-inner">

							<h3 class="author-name"><?php the_author_posts_link(); ?></h3>

							<?php

							$user_info = get_userdata( $user_id );
							$user_role = isset( $user_info->roles[0] ) ? $user_info->roles[0] : '';

							if ( $user_role ) :
								global $wp_roles;
								$user_role_translated = isset( $wp_roles->roles[$user_role] ) ? translate_user_role( $wp_roles->roles[$user_role]['name'] ) : '';
								if ( $user_role_translated ) :
									?>
									<p class="author-position"><?php echo $user_role_translated; ?></p>
									<?php
								endif;
							endif;
							?>

							<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<div class="author-description">
									<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
								</div>
							<?php endif; ?>

							<div class="author-meta-social group">

								<?php
								$author_url = get_the_author_meta( 'user_url' );
								if ( $author_url ) : ?>
									<a class="author-link-url" href="<?php echo esc_url( $author_url ); ?>">
										<div class="genericon genericon-website"></div>
										<span class="screen-reader-text"><?php _e( 'Author website', 'hoffman' ); ?></span>
									</a>
								<?php endif; ?>

							</div><!-- .author-meta-social -->

						</div><!-- .author-meta-inner -->

					</div><!-- .tab-author-meta -->

				</div><!-- .section-inner -->

			<?php elseif ( $show_comments ) : ?>

				<div class="comments-container">

					<div class="comments-inner section-inner thin">

						<?php comments_template( '', true ); ?>

					</div><!-- .comments-inner -->

				</div><!-- .comments-container -->

				<?php

			endif; // is_single

		endwhile;
	endif;

	?>

</div><!-- .content -->

<?php get_footer(); ?>