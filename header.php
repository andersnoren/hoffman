<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
																				 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
	
		<div class="wrapper" id="wrapper">
	
			<div class="header">
							
				<?php if ( get_theme_mod( 'hoffman_logo' ) ) : ?>
				
			        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
			        	<img src='<?php echo esc_url( get_theme_mod( 'hoffman_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
			        </a>
			
				<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : 

					// h2 title on singular, h1 elsewhere
					$title_type = is_singular() ? '2' : '1';
					
					?>
			
					<h<?php echo $title_type; ?> class="blog-title">
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
					</h<?php echo $title_type; ?>>
					
					<?php if (  get_bloginfo( 'description' ) ) : ?>
					
						<h3 class="blog-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h3>
					
					<?php endif; ?>
					
				<?php endif; ?>
                
				<a class="nav-toggle show-desktop" title="<?php _e( 'Click to view the navigation', 'hoffman' ); ?>" href="#">
				
					<div class="bars">
					
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						
						<div class="clear"></div>
					
					</div>
					
					<p>
						<span class="menu"><?php _e( 'Menu', 'hoffman' ); ?></span>
						<span class="close"><?php _e( 'Close', 'hoffman' ); ?></span>
					</p>
				
				</a>
				
				<?php get_template_part( 'menu', 'social' ); ?>				
				
				<div class="clear"></div>
								
			</div><!-- .header -->
			
			<div class="navigation bg-dark hidden">
		
				<div class="section-inner">
				
					<ul class="main-menu">
						
						<?php 
						
						if ( has_nav_menu( 'primary' ) ) {

							$nav_args = array( 
								'container' 		=> '', 
								'items_wrap' 		=> '%3$s',
								'theme_location' 	=> 'primary'
							);
																			
							wp_nav_menu( $nav_args ); 

						} else {

							$list_pages_args = array(
								'container' => '',
								'title_li' 	=> ''
							);
							
							wp_list_pages( $list_pages_args );
							
						} 
						
						?>
						
						<div class="clear"></div>
							
					 </ul>
					 
					 <ul class="mobile-menu hidden">
						
						<?php 
						if ( has_nav_menu( 'primary' ) ) {						
							wp_nav_menu( $nav_args ); 
						} else {
							wp_list_pages( $list_pages_args );
						} 
						?>
						
					</ul>
						
				</div><!-- .section-inner -->
					
			</div><!-- .navigation -->