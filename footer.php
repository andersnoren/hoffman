<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b') || is_active_sidebar( 'footer-c' ) ) : ?>

	<div class="footer">
			
		<div class="section-inner">
		
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
			
				<div class="column column-1 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-a' ); ?>
											
					</div>
					
				</div><!-- .footer-a -->
				
			<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
			
				<div class="column column-2 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-b' ); ?>
											
					</div><!-- .widgets -->
					
				</div><!-- .footer-b -->
				
			<?php endif; ?>
								
			<?php if ( is_active_sidebar( 'footer-c' ) ) : ?>
			
				<div class="column column-3 one-third">
			
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-c' ); ?>
											
					</div><!-- .widgets -->
					
				</div><!-- .footer-c -->
				
			<?php endif; ?>
			
			<div class="clear"></div>
		
		</div><!-- .footer-inner -->
	
	</div><!-- .footer -->

<?php endif; ?>

<div class="credits">

	<div class="section-inner">
	
		<?php get_template_part( 'menu', 'social' ); ?>
	
		<div class="fleft">
		
			<ul class="credits-menu">
						
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
				
				<div class="clear"></div>
					
			 </ul>

			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php _e( 'All rights reserved.', 'hoffman' ); ?></p>
			
			<p><?php _e( 'Theme by', 'hoffman' ); ?> <a href="https://www.andersnoren.se">Anders Nor&eacute;n</a>.</p>		
			
		</div><!-- .fleft -->
		
		<div class="clear"></div>
		
	</div><!-- .section-inner -->

</div><!-- .credits -->

<?php wp_footer(); ?>

</body>
</html>