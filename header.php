<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
																				 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>
	
		<div class="wrapper" id="wrapper">
	
			<header class="header group">

				<button class="nav-toggle show-desktop">
					<div class="bars">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>
					<p>
						<span class="menu"><?php _e( 'Menu', 'hoffman' ); ?></span>
						<span class="close"><?php _e( 'Close', 'hoffman' ); ?></span>
					</p>
				</button>

				<div class="header-titles">

					<?php 

					$custom_logo_id 	= get_theme_mod( 'custom_logo' );
					$legacy_logo_url 	= get_theme_mod( 'baskerville_logo' );
					$blog_title_elem 	= ( ( is_front_page() || is_home() ) && ! is_page() ) ? 'h1' : 'div';
					$blog_title_class 	= $custom_logo_id ? 'blog-logo' : 'blog-title';

					$blog_title 		= get_bloginfo( 'title' );
					$blog_description 	= get_bloginfo( 'description' );

					if ( $custom_logo_id  || $legacy_logo_url ) : 

						$custom_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : $legacy_logo_url;
					
						?>

						<<?php echo $blog_title_elem; ?> class="<?php echo esc_attr( $blog_title_class ); ?>">
							<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo esc_url( $custom_logo_url ); ?>">
								<span class="screen-reader-text"><?php echo $blog_title; ?></span>
							</a>
						</<?php echo $blog_title_elem; ?>>
			
					<?php elseif ( $blog_description || $blog_title ) : ?>

						<<?php echo $blog_title_elem; ?> class="<?php echo esc_attr( $blog_title_class ); ?>">
							<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo $blog_title; ?></a>
						</<?php echo $blog_title_elem; ?>>
					
						<?php if ( $blog_description ) : ?>
							<p class="blog-description"><?php echo $blog_description; ?></p>
						<?php endif; ?>
					
					<?php endif; ?>

				</div><!-- .header-titles -->
				
				<?php get_template_part( 'menu', 'social' ); ?>
								
			</header><!-- .header -->
			
			<div class="navigation bg-dark hidden">
		
				<div class="section-inner">
				
					<ul class="main-menu group">
						
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