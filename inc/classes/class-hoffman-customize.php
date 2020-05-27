<?php

/* ---------------------------------------------------------------------------------------------
   HOFFMAN THEME OPTIONS
   --------------------------------------------------------------------------------------------- */

if ( ! class_exists( 'Hoffman_Customize' ) ) : 
	class Hoffman_Customize {

		public static function register( $wp_customize ) {
			
			$wp_customize->add_setting( 'accent_color', array(
				'default' 			=> '#928452',
				'type' 				=> 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hoffman_accent_color', array(
				'label' 		=> __( 'Accent Color', 'hoffman' ),
				'section' 		=> 'colors',
				'settings' 		=> 'accent_color',
				'priority' 		=> 10,
			) ) );

			// Only display the Customizer section for the hoffman_logo setting if it already has a value.
			// This means that site owners with existing logos can remove them, but new site owners can't add them.
			// Since v2.0.0, the core custom_logo setting (in the Site Identity Customizer panel) should be used instead.
			if ( get_theme_mod( 'hoffman_logo' ) ) {
			
				$wp_customize->add_section( 'hoffman_logo_section', array(
					'title'       => __( 'Logo', 'hoffman' ),
					'priority'    => 40,
					'description' => __( 'Upload a logo to replace the default site name and description in the header', 'hoffman' ),
				) );

				$wp_customize->add_setting( 'hoffman_logo', array( 
					'sanitize_callback' => 'esc_url_raw' 
				) );

				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hoffman_logo', array(
					'label'    => __( 'Logo', 'hoffman' ),
					'section'  => 'hoffman_logo_section',
					'settings' => 'hoffman_logo',
				) ) );

			}
		
		}

		public static function get_custom_css() {

			$accent_default = '#928452';
			$accent = get_theme_mod( 'accent_color', $accent_default );

			$background_default = 'F9F9F9';
			$background = '#' . get_theme_mod( 'background_color', $background_default );

			$custom_css = '';

			if ( ! $background != $background_default ) {
				$custom_css.= self::generate_css( '.wrapper:after', 'border-top-color', $background );
				$custom_css.= self::generate_css( '.wrapper:after', 'border-right-color', $background );
			}

			if ( $accent != $accent_default ) {

				$custom_css.= self::generate_css( 'a', 'color', $accent );

				$custom_css.= self::generate_css( ':root .has-accent-color', 'color', $accent );
				$custom_css.= self::generate_css( ':root .has-accent-background-color', 'background-color', $accent );

				$custom_css.= self::generate_css( '.nav-toggle.active', 'color', $accent );
				$custom_css.= self::generate_css( '.main-menu > li > ul:before', 'border-bottom-color', $accent );
				$custom_css.= self::generate_css( '.main-menu ul li', 'background-color', $accent );
				$custom_css.= self::generate_css( '.main-menu ul > .page_item_has_children:hover::after, .main-menu ul > .menu-item-has-children:hover::after', 'border-left-color', $accent );
				$custom_css.= self::generate_css( '', 'border-left-color', $accent );
				$custom_css.= self::generate_css( '.menu-social a:hover', 'background-color', $accent );
				$custom_css.= self::generate_css( '.flex-direction-nav a:hover', 'background-color', $accent );
				$custom_css.= self::generate_css( '.post-title a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.post-header:after', 'background-color', $accent );

				$custom_css.= self::generate_css( 'a.more-link:hover', 'background-color', $accent );

				$custom_css.= self::generate_css( 'button:hover, .button:hover, .faux-button:hover, :root .wp-block-button__link:hover, :root .wp-block-file__button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover', 'background-color', $accent );

				$custom_css.= self::generate_css( '.archive-nav a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '#infinite-handle span', 'color', $accent );
				$custom_css.= self::generate_css( '#infinite-handle span:hover', 'background-color', $accent );

				$custom_css.= self::generate_css( '.page-links a:hover', 'background-color', $accent );
				$custom_css.= self::generate_css( '.tab-selector a.active', 'color', $accent );
				$custom_css.= self::generate_css( '.bypostauthor .by-post-author', 'background-color', $accent );
				
				$custom_css.= self::generate_css( '.comment-actions a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '#cancel-comment-reply-link:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.comments-nav a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.comment-form input[type="submit"]', 'color', $accent );
				$custom_css.= self::generate_css( '.comment-form input[type="submit"]:hover, .comment-form input[type="submit"]:focus', 'background-color', $accent );

				$custom_css.= self::generate_css( '.post-meta-item .genericon', 'color', $accent );
				$custom_css.= self::generate_css( '.post-meta-item a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.post-nav a:hover h5', 'color', $accent );
				$custom_css.= self::generate_css( '.author-name a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.author-meta-social a:hover', 'background-color', $accent );

				$custom_css.= self::generate_css( '.widget_archive li a:hover, .widget_categories li a:hover, .widget_meta li a:hover, .widget_nav_menu li a:hover, .widget_pages li a:hover', 'color', $accent );
				$custom_css.= self::generate_css( '.tagcloud a:hover', 'background-color', $accent );
				$custom_css.= self::generate_css( '.hoffman-widget-list a:hover .title', 'color', $accent );
				$custom_css.= self::generate_css( '.hoffman-widget-list a:hover .genericon', 'color', $accent );
				$custom_css.= self::generate_css( '#wp-calendar thead', 'color', $accent );

				$custom_css.= self::generate_css( '.credits .menu-social a:hover', 'background-color', $accent );
				$custom_css.= self::generate_css( '.credits p a:hover', 'color', $accent );

			}

			return $custom_css;
			
		}

		public static function generate_css( $selector, $style, $value, $prefix = '', $postfix = '' ) {
			return sprintf('%s { %s:%s; }', $selector, $style, $prefix . $value . $postfix );
		}

	}

	// Register the Customizer settings
	add_action( 'customize_register', array( 'Hoffman_Customize', 'register' ) );

endif;
