<?php

/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_setup' ) ) {

	function hoffman_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 
		add_image_size( 'post-image', 1200, 9999 );
		add_image_size( 'thumbnail-square', 100, 100, true );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery' ) );
		
		// Custom background
		$defaults = array( 'default-color' => 'F9F9F9' );
		add_theme_support( 'custom-background', $defaults );
		
		// Jetpack infinite scroll
		add_theme_support( 'infinite-scroll', array(
			'container' => 'posts',
			'footer' 	=> 'wrapper',
			'type' 		=> 'click'
		) );
		
		// Add support for title-tag
		add_theme_support('title-tag');
		
		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'hoffman' ) );
		register_nav_menu( 'social', __( 'Social Menu', 'hoffman' ) );
		
		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 700;
		
		// Make the theme translation ready
		load_theme_textdomain( 'hoffman', get_template_directory() . '/languages' );
		
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";

		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}
		
	}
	add_action( 'after_setup_theme', 'hoffman_setup' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_load_javascript_files' ) ) {

	function hoffman_load_javascript_files() {

		if ( ! is_admin() ) {
			wp_register_script( 'hoffman_flexslider', get_template_directory_uri() . '/js/flexslider.min.js', '', true );
			
			wp_enqueue_script( 'hoffman_global', get_template_directory_uri() . '/js/global.js', array( 'jquery', 'hoffman_flexslider' ), '', true  );

			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'hoffman_load_javascript_files' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_load_style' ) ) {

	function hoffman_load_style() {
		if ( ! is_admin() ) {
			wp_register_style( 'hoffman_googleFonts', '//fonts.googleapis.com/css?family=Raleway:400,600,700,800|Vollkorn:400,400italic,700,700italic' );
			wp_register_style( 'hoffman_genericons', get_template_directory_uri() . '/genericons/genericons.css' );
			wp_enqueue_style( 'hoffman_style', get_stylesheet_uri(), array( 'hoffman_googleFonts', 'hoffman_genericons' ) );
		}
	}
	add_action( 'wp_print_styles', 'hoffman_load_style' );

}


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_add_editor_styles' ) ) {

	function hoffman_add_editor_styles() {
		add_editor_style( 'hoffman-editor-styles.css' );
		$font_url = '//fonts.googleapis.com/css?family=Raleway:400,600,700,800|Vollkorn:400,400italic,700,700italic';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
	add_action( 'init', 'hoffman_add_editor_styles' );

}


/* ---------------------------------------------------------------------------------------------
   ADD WIDGET AREAS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_widget_areas_registration' ) ) {

	function hoffman_widget_areas_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Footer A', 'hoffman' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		)) ;	

		register_sidebar( array(
			'name' 			=> __( 'Footer B', 'hoffman' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer C', 'hoffman' ),
			'id' 			=> 'footer-c',
			'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

	}
	add_action( 'widgets_init', 'hoffman_widget_areas_registration' ); 

}


/* ---------------------------------------------------------------------------------------------
   ADD THEME WIDGETS
   --------------------------------------------------------------------------------------------- */


require_once( get_template_directory() . '/widgets/flickr.php' );
require_once( get_template_directory() . '/widgets/recent-comments.php' );
require_once( get_template_directory() . '/widgets/recent-posts.php' );


/* ---------------------------------------------------------------------------------------------
   DELIST WORDPRESS WIDGETS REPLACED BY THEME WIDGETS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_unregister_default_widgets' ) ) {

	function hoffman_unregister_default_widgets() {
		unregister_widget( 'WP_Widget_Recent_Comments');
		unregister_widget( 'WP_Widget_Recent_Posts');
	}
	add_action( 'widgets_init', 'hoffman_unregister_default_widgets', 11 );

}


/* ---------------------------------------------------------------------------------------------
   CHECK JAVASCRIPT SUPPORT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_html_js_class' ) ) {

	function hoffman_html_js_class () {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
	add_action( 'wp_head', 'hoffman_html_js_class', 1 );

}


/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_posts_link_attributes_1' ) ) {

	function hoffman_posts_link_attributes_1() {
		return 'class="post-nav-older"';
	}
	add_filter( 'next_posts_link_attributes', 'hoffman_posts_link_attributes_1' );

}

if ( ! function_exists( 'hoffman_posts_link_attributes_2' ) ) {

	function hoffman_posts_link_attributes_2() {
		return 'class="post-nav-newer"';
	}
	add_filter( 'previous_posts_link_attributes', 'hoffman_posts_link_attributes_2' );

}


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_custom_more_link' ) ) {

	function hoffman_custom_more_link( $more_link, $more_link_text ) {
		return str_replace( $more_link_text, __( 'Read more', 'hoffman' ), $more_link );
	}
	add_filter( 'the_content_more_link', 'hoffman_custom_more_link', 10, 2 );

}


/* ---------------------------------------------------------------------------------------------
   BODY CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_body_classes' ) ) {

	function hoffman_body_classes($classes) {
		
		// Check post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

		// Check custom background
		if ( ! get_background_image() || get_background_color() != 'f9f9f9' ) {
			$classes[] = 'has-custom-background';
		}

		return $classes;
	}
	add_filter( 'body_class', 'hoffman_body_classes' );

}


/* ---------------------------------------------------------------------------------------------
   POST CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_post_classes' ) ) {

	function hoffman_post_classes( $classes ) {
		
		// Check post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';
		
		return $classes;
	}
	add_filter( 'post_class', 'hoffman_post_classes' );

}


/* ---------------------------------------------------------------------------------------------
   GET COMMENT EXCERPT LENGTH
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_get_comment_excerpt' ) ) {

	function hoffman_get_comment_excerpt( $comment_ID = 0, $num_words = 20 ) {
		$comment = get_comment( $comment_ID );
		$comment_text = strip_tags( $comment->comment_content );
		$blah = explode( ' ', $comment_text );
		if ( count( $blah ) > $num_words ) {
			$k = $num_words;
			$use_dotdotdot = 1;
		} else {
			$k = count( $blah );
			$use_dotdotdot = 0;
		}
		$excerpt = '';
		for ( $i = 0; $i < $k; $i++ ) {
			$excerpt .= $blah[$i] . ' ';
		}
		$excerpt .= ( $use_dotdotdot ) ? '...' : '';
		return apply_filters( 'get_comment_excerpt', $excerpt );
	}

}



/* ---------------------------------------------------------------------------------------------
   ADMIN CSS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_admin_css' ) ) {

	function hoffman_admin_css() { 
	echo '
	<style type="text/css">

		#postimagediv #set-post-thumbnail img {
			max-width: 100%;
			height: auto;
		}

	</style>';
	}
	add_action( 'admin_head', 'hoffman_admin_css' );

}


/* ---------------------------------------------------------------------------------------------
   FLEXSLIDER FUNCTION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_flexslider' ) ) {

	function hoffman_flexslider( $size = 'thumbnail' ) {

		$attachment_parent = is_page() ? $post->ID : get_the_ID();

		$image_args = array(
			'numberposts'    => -1, // show all
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $attachment_parent,
			'post_type'      => 'attachment',
			'post_status'    => null,
			'post_mime_type' => 'image',
		);

		$images = get_posts( $image_args );

		if ( $images ) : ?>
		
			<div class="flexslider">
			
				<ul class="slides">
		
					<?php foreach( $images as $image ) :

						$attimg = wp_get_attachment_image( $image->ID, $size ); ?>
						
						<li>
							<?php 
							echo $attimg;
							if ( ! empty( $image->post_excerpt ) && is_single() ) : ?>
								<div class="media-caption-container">
									<p class="media-caption"><?php echo $image->post_excerpt; ?></p>
								</div>
							<?php endif; ?>
						</li>
						
					<?php endforeach; ?>
			
				</ul>
				
			</div>
			
			<?php
			
		endif;
	}

}


/* ---------------------------------------------------------------------------------------------
   ADD SOCIAL NETWORKS FIELDS TO USER PROFILES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_modify_contact_methods' ) ) {

	function hoffman_modify_contact_methods( $profile_fields ) {

		// Add new fields
		$profile_fields['dribbble'] = 'Dribbble URL';
		$profile_fields['facebook'] = 'Facebook URL';
		$profile_fields['flickr'] = 'Flickr URL';
		$profile_fields['googleplus'] = 'Google+ URL';
		$profile_fields['linkedin'] = 'LinkedIn URL';
		$profile_fields['instagram'] = 'Instagram URL';
		$profile_fields['pinterest'] = 'Pinterest URL';
		$profile_fields['skype'] = 'Skype URL';
		$profile_fields['tumblr'] = 'Tumblr URL';
		$profile_fields['twitter'] = 'Twitter URL';
		$profile_fields['vimeo'] = 'Vimeo URL';
		
		return $profile_fields;
	}
	add_filter( 'user_contactmethods', 'hoffman_modify_contact_methods' );

}


/* ---------------------------------------------------------------------------------------------
   COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'hoffman_comment' ) ) {

	function hoffman_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		
			<?php __( 'Pingback:', 'hoffman' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'hoffman' ), '<span class="edit-link">', '</span>' ); ?>
			
		</li>
		<?php
				break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		
			<div id="comment-<?php comment_ID(); ?>" class="comment">
			
				<?php 
				
				echo get_avatar( $comment, 150 );
				static $comment_number; $comment_number++;
				$comment_number = str_pad( $comment_number, 2, '0', STR_PAD_LEFT );
				
				if ( $comment->user_id === $post->post_author ) { echo '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" title="' . __( 'Comment by post author', 'hoffman' ) . '" class="by-post-author"> ' . __( '', 'hoffman' ) . '</a>'; } ?>
				
				<div class="comment-inner">
				
					<div class="comment-header">
												
						<h4><?php printf( _x( '%s says:', 'Variable: Name of commenter', 'hoffman' ), get_comment_author_link() . '<span>' ); ?></span></h4>
					
					</div>
		
					<div class="comment-content post-content">
					
						<?php if ( 0 == $comment->comment_approved ) : ?>
						
							<p class="comment-awaiting-moderation"><?php __( 'Your comment is awaiting moderation.', 'hoffman' ); ?></p>
							
						<?php endif; ?>
					
						<?php comment_text(); ?>
						
					</div><!-- .comment-content -->
					
					<div class="comment-actions">
					
						<div class="fleft">
						
							<p class="comment-date"><a class="comment-date-link" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php printf( _x( '%s at %s', 'Variables: Date, time', 'hoffman' ), get_comment_date(), get_comment_time() ); ?>"><?php echo get_comment_date() . '<span> &mdash; ' . get_comment_time() . '</span>'; ?></a></p>
						
						</div>
					
						<div class="fright">
					
							<?php 
							edit_comment_link( __( 'Edit', 'hoffman' ), '<p class="comment-edit">', '</p>' ); 

							comment_reply_link( array_merge( $args, 
							array( 
								'reply_text' 	=>  	__( 'Reply', 'hoffman' ), 
								'depth'			=> 		$depth, 
								'max_depth' 	=> 		$args['max_depth'],
								'before'		=>		'<p class="comment-reply">',
								'after'			=>		'</p>'
								) 
							) ); 
							?>
						
						</div><!-- .fright -->
						
						<div class="clear"></div>
										
					</div><!-- .comment-actions -->
				
				</div><!-- .comment-inner -->
				
			</div><!-- .comment-## -->
					
		<?php
			break;
		endswitch;
	}

}


/* ---------------------------------------------------------------------------------------------
   HOFFMAN THEME OPTIONS
   --------------------------------------------------------------------------------------------- */


class hoffman_customize {

   public static function hoffman_register( $wp_customize ) {
   
      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_section( 'hoffman_options', 
         array(
            'title' 		=> __( 'Hoffman Options', 'hoffman' ), //Visible title of section
            'priority' 		=> 35, //Determines what order this appears in
            'capability' 	=> 'edit_theme_options', //Capability needed to tweak
            'description' 	=> __('Allows you to customize theme settings for Hoffman.', 'hoffman'), //Descriptive tooltip
         ) 
      );
      
      $wp_customize->add_section( 'hoffman_logo_section' , array(
            'title'       => __( 'Logo', 'hoffman' ),
            'priority'    => 40,
            'description' => __('Upload a logo to replace the default site name and description in the header', 'hoffman'),
      ) );
        
      
      //2. Register new settings to the WP database...
      $wp_customize->add_setting( 'accent_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' 			=> '#928452', //Default setting/value to save
            'type' 				=> 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' 		=> 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback' => 'sanitize_hex_color'
         ) 
      );

      
      $wp_customize->add_setting( 'hoffman_logo', 
      	array( 
      		'sanitize_callback' => 'esc_url_raw'
      	) 
      );
                  
      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'hoffman_accent_color', //Set a unique ID for the control
         array(
            'label' 		=> __( 'Accent Color', 'hoffman' ), //Admin-visible name of the control
            'section' 		=> 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' 		=> 'accent_color', //Which setting to load and manipulate (serialized is okay)
            'priority' 		=> 10, //Determines the order this control appears in for the specified section
         ) 
      ) );
      
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hoffman_logo', array(
		    'label'    => __( 'Logo', 'hoffman' ),
		    'section'  => 'hoffman_logo_section',
		    'settings' => 'hoffman_logo',
		) ) );
        
        
      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
   }

   public static function hoffman_header_output() {
      ?>
      
	      <!-- Customizer CSS --> 
	      
	      <style type="text/css">
	           <?php self::hoffman_generate_css( 'body a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( 'body a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.blog-title a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.main-menu > li > ul:before', 'border-bottom-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.main-menu ul li', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.main-menu ul > .page_item_has_children:hover::after', 'border-left-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.main-menu ul > .menu-item-has-children:hover::after', 'border-left-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.menu-social a:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.sticky .is-sticky:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.sticky .is-sticky:hover:before', 'border-top-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.sticky .is-sticky:hover:before', 'border-left-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.sticky .is-sticky:hover:after', 'border-left-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.sticky .is-sticky:hover:after', 'border-bottom-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.flex-direction-nav a:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-title a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-header:after', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content a:hover', 'border-bottom-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content a.more-link', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content a.more-link:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content input[type="submit"]:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content input[type="reset"]:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content input[type="button"]:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content fieldset legend', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '#infinite-handle span', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '#infinite-handle span', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '#infinite-handle span:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-content .page-links a:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.tab-selector a.active', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.tab-selector a.active', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.add-comment-title a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.add-comment-title a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.bypostauthor .by-post-author', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-actions a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-actions a:hover:before', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-header h4 a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-content a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-content a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '#cancel-comment-reply-link:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comments-nav a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-meta-item .genericon', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-meta-item a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.post-nav a:hover h5', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.author-name a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.author-meta-social a:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.logged-in-as a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="text"]:focus', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="email"]:focus', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="url"]:focus', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form textarea:focus', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="submit"]', 'color', 'accent_color'); ?>	            
	           <?php self::hoffman_generate_css( '.comment-form input[type="submit"]', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="submit"]', 'border-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="submit"]:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.comment-form input[type="submit"]:hover', 'background-color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.archive-nav a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.tagcloud a:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.search-form .search-button:hover:before', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.widget_hoffman_recent_posts a:hover .title', 'color', 'accent_color' ); ?>
               <?php self::hoffman_generate_css( '.hoffman-widget-list a:hover .title', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.hoffman-widget-list a:hover .title span', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.widget_hoffman_recent_posts a:hover .genericon', 'color', 'accent_color' ); ?>
               <?php self::hoffman_generate_css( '#wp-calendar thead', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.credits-menu a', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.credits .menu-social a:hover', 'background', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.credits p a:hover', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.nav-toggle.active p', 'color', 'accent_color' ); ?>
	           <?php self::hoffman_generate_css( '.nav-toggle.active .bar', 'background', 'accent_color' ); ?>
	      </style> 
	      
	      <!-- /Customizer CSS-->
	      
      <?php
   }
   
   public static function hoffman_live_preview() {
      wp_enqueue_script( 'hoffman-themecustomizer', get_template_directory_uri() . '/js/theme-customizer.js', array(  'jquery', 'customize-preview' ), '', true );
   }

   public static function hoffman_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'hoffman_customize' , 'hoffman_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'hoffman_customize' , 'hoffman_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'hoffman_customize' , 'hoffman_live_preview' ) );

?>