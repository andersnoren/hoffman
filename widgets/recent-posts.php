<?php 

class hoffman_recent_posts extends WP_Widget {

	function __construct() {
        $widget_ops = array( 
			'classname' 	=> 'hoffman_recent_posts_widget', 
			'description' 	=> __( 'Displays recent blog entries.', 'hoffman' ) 
		);
        parent::__construct( 'hoffman_recent_posts_widget', __( 'Recent Posts', 'hoffman' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
	
		// Outputs the content of the widget
		extract( $args ); // Make before_widget, etc available.
		
		$widget_title = null; 
		$number_of_posts = null; 
		
		$widget_title = esc_attr( apply_filters( 'widget_title', $instance['widget_title'] ) );
		$number_of_posts = esc_attr( $instance['number_of_posts'] );
		
		echo $before_widget;
		
		if ( ! empty( $widget_title ) ) {
		
			echo $before_title . $widget_title . $after_title;
			
		}

		if ( $number_of_posts == 0 ) $number_of_posts = 5;

		$args = array(
			'posts_per_page'      => $number_of_posts,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		);

		$recent_posts = get_posts( $args );
		
		if ( $recent_posts ) : ?>

			<ul class="hoffman-widget-list">

				<?php
					
				foreach( $recent_posts as $post ) :

					global $post;

					setup_postdata( $post );

					?>
			
					<li>
					
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								
							<div class="post-icon">
							
								<?php 
								$post_format = get_post_format() ?: 'standard';
								
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'thumbnail' );
								} elseif ( $post_format == 'gallery' ) {
									echo '<div class="genericon genericon-gallery"></div>';
								} else {
									echo '<div class="genericon genericon-standard"></div>';
								}
								?>
								
							</div>
							
							<div class="inner">
											
								<p class="title"><?php the_title(); ?></p>
								<p class="meta"><?php the_time( get_option( 'date_format' ) ); ?></p>
							
							</div>
							
							<div class="clear"></div>
												
						</a>
						
					</li>
				
					<?php 
				endforeach; 
				wp_reset_postdata();
				?>
		
			</ul>
			
			<?php 

		endif;
		
		echo $after_widget; 
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );

        // Make sure we are getting a number
        $instance['number_of_posts'] = is_int( intval( $new_instance['number_of_posts'] ) ) ? intval( $new_instance['number_of_posts']): 5;
	
		// Update and save the widget
		return $instance;		
	}
	
	function form( $instance ) {
		
		// Set defaults
		if ( ! isset( $instance["widget_title"] ) ) $instance["widget_title"] = '';
		if ( ! isset( $instance["number_of_posts"] ) ) $instance["number_of_posts"] = 5;
	
		// Get the options into variables, escaping html characters on the way
		$widget_title = esc_attr( $instance['widget_title'] );
		$number_of_posts = esc_attr( $instance['number_of_posts'] );
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php  _e( 'Title', 'hoffman' ); ?>:
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $widget_title ); ?>" /></label>
		</p>
						
		<p>
			<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of posts to display', 'hoffman' ); ?>:
			<input id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $number_of_posts ); ?>" /></label>
			<small>(<?php _e( 'Defaults to 5 if empty','hoffman' ); ?>)</small>
		</p>
		
		<?php
	}
}
register_widget('hoffman_recent_posts'); ?>