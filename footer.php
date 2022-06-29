		<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b') || is_active_sidebar( 'footer-c' ) ) : ?>

			<div class="footer">
					
				<div class="section-inner group">
				
					<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
						<div class="column column-1 one-third">
							<div class="widgets">
								<?php dynamic_sidebar( 'footer-a' ); ?>
							</div>
						</div><!-- .column-1 -->
					<?php endif; ?>
						
					<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
						<div class="column column-2 one-third">
							<div class="widgets">
								<?php dynamic_sidebar( 'footer-b' ); ?>
							</div><!-- .widgets -->
						</div><!-- .column-2 -->
					<?php endif; ?>
										
					<?php if ( is_active_sidebar( 'footer-c' ) ) : ?>
						<div class="column column-3 one-third">
							<div class="widgets">
								<?php dynamic_sidebar( 'footer-c' ); ?>
							</div><!-- .widgets -->
						</div><!-- .column-3 -->
					<?php endif; ?>

				</div><!-- .footer-inner -->
			
			</div><!-- .footer -->

		<?php endif; ?>

		<footer class="credits">

			<div class="section-inner">

				<div class="credits-menus">
					
					<ul class="credits-menu group">
								
						<?php 
						
						if ( has_nav_menu( 'primary' ) ) {
																			
							wp_nav_menu( array( 
								'container' 		=> '', 
								'depth' 			=> '1',
								'items_wrap' 		=> '%3$s',
								'theme_location' 	=> 'primary',
							) ); 
						
						} else {
						
							wp_list_pages( array(
								'container' => '',
								'title_li' 	=> ''
							) );
							
						} 
						?>

					</ul><!-- .credits-menu -->

					<?php get_template_part( 'menu', 'social' ); ?>

				</div><!-- .credits-menus -->

				<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php _e( 'All rights reserved.', 'hoffman' ); ?></p>
				
				<p><?php _e( 'Theme by', 'hoffman' ); ?> <a href="https://andersnoren.se">Anders Nor&eacute;n</a>.</p>		
				
			</div><!-- .section-inner -->

		</footer><!-- .credits -->

		<?php wp_footer(); ?>

	</body>
</html>