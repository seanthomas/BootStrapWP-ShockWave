<?php

/*
Plugin Name: Custom event Widget
Plugin URI: #
Description: Display your latest Album
Version: 1.00
Author: Sean Thomas
Author URI: #
*/

class event_widget extends WP_Widget { 
	
	// Widget Settings
	function event_widget() {
		$widget_ops = array('description' => __('Display your upcoming event') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'event' );
		$this->WP_Widget( 'event', __('Sean Thomas.event'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$event = $instance['event'];
		
		// ------
		echo $before_widget;
		echo $before_title . $title . $after_title; 
		
		/* display the widget */
		?>
                       
        <div class="album-widget post-types">
        
        <ul>
        <?php  
                global $post;
                        
		        $event = new WP_Query( array(
							    'post_type' => 'events',             
		                        'p'	=> $event 
		        ));
		        
		        while ( $event->have_posts() ) : $event->the_post();
		        
		          $date = get_post_meta($post->ID, 'sw_date', true);
		          $timestamp = strtotime($date);   
		          $pretty_date_yy = date('Y', $timestamp);
		          $pretty_date_M = date('M', $timestamp);
		          $pretty_date_d = date('d', $timestamp);
		                                       
		        ?>
                <li>
                <div class="post">
                <div class="post-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail( 'large' ); ?>
                  </a>
                </div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h4><?php the_title(); ?></h4></a>   
                <p>
                  <small><?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_yy; ?></small>
                </p>
            	</div>
                        
                </li>                       

                <?php endwhile; wp_reset_query(); ?>

        </ul>
        </div><!-- .album-widget post-types --> 

	<?php

	echo $after_widget;
	// ------

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  

		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['event'] = intval( $new_instance['event'] );

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$instance = wp_parse_args( (array) $instance, array('title'=>'Featured Event', 'event'=>'') );
		$title = htmlspecialchars($instance['title']);
		$event = intval ($instance['event']); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('event'); ?>"><?php _e( 'Select Event:','bootstrapwp' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('event'); ?>" name="<?php echo $this->get_field_name('event'); ?>">				
				<?php $a = new WP_Query( apply_filters( 'widget_posts_args', array( 'post_status' => 'publish', 'post_type' => 'events' ) ) ); ?>
					<?php while ( $a->have_posts() ) : $a->the_post(); ?>
						<?php $the_id = get_the_ID(); echo $the_id; ?>
						<option value="<?php the_ID(); ?>" <?php selected( get_the_ID(), $event); ?>><?php the_title(); ?></option>
					<?php endwhile;	wp_reset_postdata(); ?>
			</select>
		</p>
		
    <?php }
	}

	// Add Widget
	function event_widget_init() {
		register_widget('event_widget');
	}
	add_action('widgets_init', 'event_widget_init');

?>