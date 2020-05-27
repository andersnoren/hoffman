<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_setup' ) ) :
	function hoffman_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 
		set_post_thumbnail_size( 1200, 9999 );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery' ) );
		
		// Custom background
		add_theme_support( 'custom-background', array( 
			'default-color'	=> 'F9F9F9' 
		) );

		// Custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		
		// Jetpack infinite scroll
		add_theme_support( 'infinite-scroll', array(
			'container' => 'posts',
			'footer' 	=> 'wrapper',
			'type' 		=> 'click'
		) );
		
		// Add support for title-tag
		add_theme_support( 'title-tag' );

		// Add HTML5 support to the search form
		add_theme_support( 'html5', array( 'search-form' ) );
		
		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'hoffman' ) );
		register_nav_menu( 'social', __( 'Social Menu', 'hoffman' ) );
		
		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 700;
		
		// Make the theme translation ready
		load_theme_textdomain( 'hoffman', get_template_directory() . '/languages' );
		
	}
	add_action( 'after_setup_theme', 'hoffman_setup' );
endif;


/* ---------------------------------------------------------------------------------------------
   INCLUDE REQUIRED FILES
   --------------------------------------------------------------------------------------------- */

require get_template_directory() . '/inc/widgets/class-hoffman-recent-comments.php';
require get_template_directory() . '/inc/widgets/class-hoffman-recent-posts.php';
require get_template_directory() . '/inc/classes/class-hoffman-customize.php';


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_load_javascript_files' ) ) :
	function hoffman_load_javascript_files() {

		$theme_version = wp_get_theme( 'hoffman' )->get( 'Version' );

		wp_register_script( 'hoffman_flexslider', get_template_directory_uri() . '/assets/js/flexslider.min.js', array(), '2.7.0' );
		
		wp_enqueue_script( 'hoffman_global', get_template_directory_uri() . '/assets/js/global.js', array( 'jquery', 'hoffman_flexslider' ), $theme_version, true  );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}
	add_action( 'wp_enqueue_scripts', 'hoffman_load_javascript_files' );
endif;


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_load_style' ) ) :
	function hoffman_load_style() {

		if ( is_admin() ) return;

		$dependencies = array();
		$theme_version = wp_get_theme( 'hoffman' )->get( 'Version' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google Fonts: on or off', 'hoffman' ) ) {
			wp_register_style( 'hoffman_googleFonts', '//fonts.googleapis.com/css?family=Raleway:400,600,700,800|Vollkorn:400,400italic,700,700italic' );
			$dependencies[] = 'hoffman_googleFonts';
		}

		wp_register_style( 'hoffman_genericons', get_template_directory_uri() . '/assets/css/genericons.css' );
		$dependencies[] = 'hoffman_genericons';

		wp_enqueue_style( 'hoffman_style', get_stylesheet_uri(), $dependencies, $theme_version );

		// Add custom CSS
		wp_add_inline_style( 'hoffman_style', Hoffman_Customize::get_custom_css() );

	}
	add_action( 'wp_print_styles', 'hoffman_load_style' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_add_editor_styles' ) ) :
	function hoffman_add_editor_styles() {

		add_editor_style( 'assets/css/hoffman-editor-styles.css' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google Fonts: on or off', 'hoffman' ) ) {
			$font_url = '//fonts.googleapis.com/css?family=Raleway:400,600,700,800|Vollkorn:400,400italic,700,700italic';
			add_editor_style( str_replace( ',', '%2C', $font_url ) );
		}

	}
	add_action( 'init', 'hoffman_add_editor_styles' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD WIDGET AREAS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_widget_areas_registration' ) ) :
	function hoffman_widget_areas_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Footer A', 'hoffman' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>'
		)) ;	

		register_sidebar( array(
			'name' 			=> __( 'Footer B', 'hoffman' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer C', 'hoffman' ),
			'id' 			=> 'footer-c',
			'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'hoffman' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>'
		) );

	}
	add_action( 'widgets_init', 'hoffman_widget_areas_registration' ); 
endif;


/* ---------------------------------------------------------------------------------------------
   REGISTER AND UNREGISTER WIDGETS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_widgets_init' ) ) :
	function hoffman_widgets_init() {

		// Register widgets
		register_widget( 'Hoffman_Recent_Comments' );
		register_widget( 'Hoffman_Recent_Posts' );
		
		// Unregister widgets
		unregister_widget( 'WP_Widget_Recent_Comments');
		unregister_widget( 'WP_Widget_Recent_Posts');

	}
	add_action( 'widgets_init', 'hoffman_widgets_init', 11 );
endif;


/* ---------------------------------------------------------------------------------------------
   CHECK JAVASCRIPT SUPPORT
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_html_js_class' ) ) :
	function hoffman_html_js_class() {

		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";

	}
	add_action( 'wp_head', 'hoffman_html_js_class', 1 );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_next_posts_link_attributes' ) ) :
	function hoffman_next_posts_link_attributes() {

		return 'class="post-nav-older"';

	}
	add_filter( 'next_posts_link_attributes', 'hoffman_next_posts_link_attributes' );
endif;

if ( ! function_exists( 'hoffman_previous_posts_link_attributes' ) ) :
	function hoffman_previous_posts_link_attributes() {

		return 'class="post-nav-newer"';

	}
	add_filter( 'previous_posts_link_attributes', 'hoffman_previous_posts_link_attributes' );
endif;


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_custom_more_link' ) ) :
	function hoffman_custom_more_link( $more_link, $more_link_text ) {

		return str_replace( $more_link_text, __( 'Read more', 'hoffman' ), $more_link );

	}
	add_filter( 'the_content_more_link', 'hoffman_custom_more_link', 10, 2 );
endif;


/* ---------------------------------------------------------------------------------------------
   BODY CLASSES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_body_classes' ) ) :
	function hoffman_body_classes( $classes ) {
		
		// Check post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

		// Check custom background
		if ( ! get_background_image() || get_background_color() != 'f9f9f9' ) {
			$classes[] = 'has-custom-background';
		}

		return $classes;

	}
	add_filter( 'body_class', 'hoffman_body_classes' );
endif;


/* ---------------------------------------------------------------------------------------------
   POST CLASSES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_post_classes' ) ) :
	function hoffman_post_classes( $classes ) {
		
		// Add the post class to all post classes, simplifying legacy post styling
		$classes[] = 'post';

		// Check post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';
		
		return $classes;

	}
	add_filter( 'post_class', 'hoffman_post_classes' );
endif;


/* ---------------------------------------------------------------------------------------------
   GET COMMENT EXCERPT LENGTH
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_get_comment_excerpt' ) ) :
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
endif;


/* ---------------------------------------------------------------------------------------------
   FLEXSLIDER FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_flexslider' ) ) :
	function hoffman_flexslider( $size = 'post-thumbnail' ) {

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
		
					<?php foreach ( $images as $image ) :

						$attimg = wp_get_attachment_image( $image->ID, $size ); ?>
						
						<li>
							<?php 
							echo $attimg;
							$image_caption = $image->post_excerpt;
							if ( $image_caption && is_single() ) : ?>
								<div class="media-caption-container">
									<p class="media-caption"><?php echo $image_caption; ?></p>
								</div>
							<?php endif; ?>
						</li>
						
					<?php endforeach; ?>
			
				</ul>
				
			</div>
			
			<?php
			
		endif;
	}
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE TITLE

	@param	$title string		The initial title
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_filter_archive_title' ) ) :
	function hoffman_filter_archive_title( $title ) {

		global $paged;

		if ( is_home() && $paged <= 1 ) {
			$title = '';
		}

		// On search, show the search query.
		else if ( is_search() ) {
			$title = sprintf( _x( 'Search Results: %s', '%s = The search query', 'hoffman' ), '&ldquo;' . get_search_query() . '&rdquo;' );
		}

		return $title;

	}
	add_filter( 'get_the_archive_title', 'hoffman_filter_archive_title' );
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE DESCRIPTION

	@param	$description string		The initial description
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_filter_archive_description' ) ) :
	function hoffman_filter_archive_description( $description ) {

		// On search, show a string describing the results of the search.
		if ( is_search() ) {
			global $wp_query;
			if ( $wp_query->found_posts ) {
				/* Translators: %s = Number of results */
				$description = sprintf( _nx( 'We found %s result for your search.', 'We found %s results for your search.',  $wp_query->found_posts, '%s = Number of results', 'hoffman' ), $wp_query->found_posts );
			} else {
				$description = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'hoffman' );
			}
		}

		return $description;

	}
	add_filter( 'get_the_archive_description', 'hoffman_filter_archive_description' );
endif;


/* ---------------------------------------------------------------------------------------------
   APPEND ARCHIVE TEMPLATE ELEMENTS TO CONTENT
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_archive_template_content' ) ) :
	function hoffman_archive_template_content( $content ) {

		// On the archive page, append the archive content to the_content.
		if ( is_page_template( 'template-archive.php' ) ) {
			ob_start();
			get_template_part( 'template-parts/archive-template-content' );
			$content .= ob_get_clean();
		}

		return $content;

	}
	add_filter( 'the_content', 'hoffman_archive_template_content' );
endif;


/* ---------------------------------------------------------------------------------------------
   COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_comment' ) ) :
	function hoffman_comment( $comment, $args, $depth ) {

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
				
				if ( $comment->user_id === $post->post_author ) echo '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" class="by-post-author"><span class="screen-reader-text">' . __( 'Comment by post author', 'hoffman' ) . '</span></a>'; 
				
				?>
				
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
					
					<div class="comment-actions group">
					
						<div class="fleft">
						
							<p class="comment-date"><a class="comment-date-link" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . '<span> &mdash; ' . get_comment_time() . '</span>'; ?></a></p>
						
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
										
					</div><!-- .comment-actions -->
				
				</div><!-- .comment-inner -->
				
			</div><!-- .comment-## -->
					
		<?php
			break;
		endswitch;
	}
endif;


/* ---------------------------------------------------------------------------------------------
   SPECIFY BLOCK EDITOR SUPPORT
------------------------------------------------------------------------------------------------ */

if ( ! function_exists( 'hoffman_block_editor_features' ) ) :
	function hoffman_block_editor_features() {

		/* Block Editor Features ------------- */

		add_theme_support( 'align-wide' );

		/* Block Editor Palette -------------- */

		$accent_color = get_theme_mod( 'accent_color', '#928452' );

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Accent', 'Name of the accent color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'accent',
				'color' => $accent_color,
			),
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'black',
				'color' => '#333',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'dark-gray',
				'color' => '#555',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'medium-gray',
				'color' => '#777',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'light-gray',
				'color' => '#767676',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'hoffman' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Block Editor Font Sizes ----------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'hoffman' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'hoffman' ),
				'size' 		=> 18,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'hoffman' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'hoffman' ),
				'size' 		=> 21,
				'slug' 		=> 'normal',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'hoffman' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'hoffman' ),
				'size' 		=> 26,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'hoffman' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'hoffman' ),
				'size' 		=> 32,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'hoffman_block_editor_features' );
endif;


/* ---------------------------------------------------------------------------------------------
   BLOCK EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'hoffman_block_editor_styles' ) ) :
	function hoffman_block_editor_styles() {

		$dependencies = array();
		$theme_version = wp_get_theme( 'hoffman' )->get( 'Version' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google Fonts: on or off', 'hoffman' ) ) {
			wp_register_style( 'hoffman-block-editor-styles-font', '//fonts.googleapis.com/css?family=Raleway:400,600,700,800|Vollkorn:400,400italic,700,700italic', false, 1.0, 'all' );
			$dependencies[] = 'hoffman-block-editor-styles-font';
		}

		// Enqueue the editor styles
		wp_enqueue_style( 'hoffman-block-editor-styles', get_theme_file_uri( '/assets/css/hoffman-block-editor-styles.css' ), $dependencies, $theme_version, 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'hoffman_block_editor_styles', 1 );
endif;
