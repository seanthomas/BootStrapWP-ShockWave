<?php

/*
Plugin Name: Custom events Widget
Plugin URI: #
Description: Display your upcoming Events
Version: 1.00
Author: Sean Thomas
Author URI: #
*/

class events_widget extends WP_Widget { 
	
	// Widget Settings
	function events_widget() {
		$widget_ops = array('description' => __('Display your upcoming Events') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'events' );
		$this->WP_Widget( 'events', __('Sean Thomas.events'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		
		// ------
		echo $before_widget;
		echo $before_title . $title . $after_title; 
		
		/* display the widget */
		?>
                       
        <div class="album-widget post-types">
        
        <ul>
        <?php  
                global $post;
                        
		           $args = array(
							    'post_type' => 'events',
							    'meta_key' => 'sw_date',
							    'meta_value' => strftime("%Y/%m/%d"),
							    'meta_compare' => '>',
							    'orderby' => 'meta_value',
							    'order' => 'asc',                    
		                        'posts_per_page' => $number );
		        
		        $loop = new WP_Query( $args );
		        
		        while ( $loop->have_posts() ) : $loop->the_post();
		        
		          $date = get_post_meta($post->ID, 'sw_date', true);
		          $timestamp = strtotime($date);   
		          $pretty_date_yy = date('Y', $timestamp);
		          $pretty_date_M = date('M', $timestamp);
		          $pretty_date_d = date('d', $timestamp);
		          $address = get_post_meta($post->ID, 'sw_address', true);
		          $venue = get_post_meta($post->ID, 'sw_venue', true);
		                                       
		        ?>
                <li>
			    <div class="events-date row">
			      <div class="date pull-left">
			        <?php echo  $pretty_date_d . ' ' . $pretty_date_M . '<span>' . $pretty_date_yy; ?></span>
			      </div>

			      <div class="events-description">
			        <h4><a href="<?php the_permalink(); ?>"><?php echo $venue; ?></a></h4>
			        <span><?php echo $address; ?></span>
			      </div>

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
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array( 'title' => 'Upcoming Events' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of Events to Display:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
    <?php }
	}

	// Add Widget
	function events_widget_init() {
		register_widget('events_widget');
	}
	add_action('widgets_init', 'events_widget_init');

?>