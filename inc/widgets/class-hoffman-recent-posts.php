<?php 

if ( ! class_exists( 'Hoffman_Recent_Posts' ) ) : 
	class Hoffman_Recent_Posts extends WP_Widget {

		function __construct() {
			parent::__construct( 'hoffman_recent_posts_widget', __( 'Recent Posts', 'hoffman' ), array( 
				'classname' 	=> 'hoffman_recent_posts_widget', 
				'description' 	=> __( 'Displays recent blog entries.', 'hoffman' ),
			) );
		}
		
		function widget( $args, $instance ) {
		
			// Outputs the content of the widget
			extract( $args ); // Make before_widget, etc available.
			
			$widget_title = isset( $instance['widget_title'] ) ? apply_filters( 'widget_title', $instance['widget_title'] ) : '';
			$number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5;
			
			echo $before_widget;
			
			if ( $widget_title ) {
				echo $before_title . $widget_title . $after_title;
			}

			$recent_posts = get_posts( array(
				'ignore_sticky_posts' => true,
				'posts_per_page'      => $number_of_posts,
				'post_status'         => 'publish',
			) );
			
			if ( $recent_posts ) : ?>

				<ul class="hoffman-widget-list">

					<?php foreach ( $recent_posts as $recent_post ) : ?>
				
						<li>
						
							<a href="<?php the_permalink( $recent_post->ID ); ?>" class="group">
									
								<div class="post-icon">
								
									<?php 
									$post_format = get_post_format( $recent_post->ID ) ? get_post_format( $recent_post->ID ) : 'standard';
									
									if ( has_post_thumbnail( $recent_post->ID ) ) {
										echo get_the_post_thumbnail( $recent_post->ID, 'thumbnail' );
									} elseif ( $post_format == 'gallery' ) {
										echo '<div class="genericon genericon-gallery"></div>';
									} else {
										echo '<div class="genericon genericon-standard"></div>';
									}
									?>
									
								</div>
								
								<div class="inner">
									<p class="title"><?php echo get_the_title( $recent_post->ID ); ?></p>
									<p class="meta"><?php echo get_the_time( get_option( 'date_format' ), $recent_post->ID ); ?></p>
								</div><!-- .inner -->
													
							</a>
							
						</li>
					
					<?php endforeach; ?>
			
				</ul>
				
				<?php 

			endif;
			
			echo $after_widget; 
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['widget_title'] = isset( $new_instance['widget_title'] ) ? strip_tags( $new_instance['widget_title'] ) : '';
			$instance['number_of_posts'] = isset( $new_instance['number_of_posts'] ) && is_int( intval( $new_instance['number_of_posts'] ) ) ? intval( $new_instance['number_of_posts'] ) : 5;
		
			// Update and save the widget
			return $instance;
		}
		
		function form( $instance ) {
			
			// Set defaults
			if ( ! isset( $instance['widget_title'] ) ) $instance['widget_title'] = '';
			if ( ! isset( $instance['number_of_posts'] ) ) $instance['number_of_posts'] = 5;
		
			// Get the options into variables, escaping html characters on the way
			$widget_title = isset( $instance['widget_title'] ) ? $instance['widget_title'] : '';
			$number_of_posts = isset( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5;

			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>"><?php  _e( 'Title', 'hoffman' ); ?>:
				<input id="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget_title' ) ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $widget_title ); ?>" /></label>
			</p>
							
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php _e( 'Number of posts to display', 'hoffman' ); ?>:
				<input id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $number_of_posts ); ?>" /></label>
				<small>(<?php _e( 'Defaults to 5 if empty', 'hoffman' ); ?>)</small>
			</p>
			
			<?php
		}

	}
endif;