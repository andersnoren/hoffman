<?php 

if ( ! class_exists( 'Hoffman_Recent_Comments' ) ) :
	class Hoffman_Recent_Comments extends WP_Widget {

		function __construct() {
			parent::__construct( 'hoffman_recent_comments_widget', __( 'Recent Comments', 'hoffman' ), array( 
				'classname' 	=> 'hoffman_recent_comments_widget', 
				'description' 	=> __( 'Displays recent comments with user avatars.', 'hoffman' ),
			) );
		}
		
		function widget( $args, $instance ) {
		
			// Outputs the content of the widget
			extract( $args ); // Make before_widget, etc available.
			
			$widget_title = isset( $instance['widget_title'] ) ? apply_filters( 'widget_title', $instance['widget_title'] ) : '';
			$number_of_comments = ! empty( $instance['number_of_comments'] ) ? $instance['number_of_comments'] : 5;
			
			echo $before_widget;
			
			if ( $widget_title ) {
				echo $before_title . $widget_title . $after_title;
			}
			
			?>
			
			<ul class="hoffman-widget-list">
				
				<?php
				
				if ( $number_of_comments == 0 ) $number_of_comments = 5;
			
				$args = array(
					'orderby'	=> 'date',
					'number'	=> $number_of_comments,
					'status'	=> 'approve'
				);
				
				global $comment;
				
				// The query
				$comments_query = new WP_Comment_Query;
				$comments = $comments_query->query( $args );
				
				// Comment loop
				if ( $comments ) :
					foreach ( $comments as $comment ) : ?>
					
						<li>
							
							<a href="<?php the_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>" class="group">
								
								<div class="post-icon">
									<?php echo get_avatar( get_comment_author_email( $comment->comment_ID ), $size = '100' ); ?>
								</div>
								
								<div class="inner">
									<p class="title"><?php comment_author(); ?></p>
									<p class="excerpt">"<?php echo wp_kses_post( hoffman_get_comment_excerpt( $comment->comment_ID, 13 ) ); ?>"</p>
								</div>
				
							</a>
							
						</li>
						
						<?php 
					endforeach;
				endif;
				?>
			
			</ul><!-- .hoffman-widget-list -->
						
			<?php 
			
			echo $after_widget; 
		}

		function update( $new_instance, $old_instance ) {
			
			$instance = $old_instance;
			
			$instance['widget_title'] = isset( $new_instance['widget_title'] ) ? strip_tags( $new_instance['widget_title'] ) : '';
			$instance['number_of_comments'] = isset( $new_instance['number_of_comments'] ) && is_int( intval( $new_instance['number_of_comments'] ) ) ? intval( $new_instance['number_of_comments'] ) : 5;

			return $instance;
			
		}
		
		function form( $instance ) {
		
			$widget_title = isset( $instance['widget_title'] ) ? $instance['widget_title'] : '';
			$number_of_comments = isset( $instance['number_of_comments'] ) ? $instance['number_of_comments'] : 5;

			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>"><?php _e( 'Title', 'hoffman' ); ?>:
				<input id="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget_title' ) ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $widget_title); ?>" /></label>
			</p>
							
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_comments' ) ); ?>"><?php _e( 'Number of comments to display', 'hoffman' ); ?>:
				<input id="<?php echo esc_attr( $this->get_field_id( 'number_of_comments' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_comments' ) ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $number_of_comments ); ?>" /></label>
				<small>(<?php _e( 'Defaults to 5 if empty', 'hoffman' ); ?>)</small>
			</p>
					
			<?php
		}
	}
endif;
