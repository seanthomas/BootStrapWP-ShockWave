<?php

/*
Plugin Name: Custom Discography Widget
Plugin URI: #
Description: Display your latest Album
Version: 1.00
Author: Sean Thomas
Author URI: #
*/

class discography_widget extends WP_Widget { 
	
	// Widget Settings
	function discography_widget() {
		$widget_ops = array('description' => __('Display your latest Album') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'discography' );
		$this->WP_Widget( 'discography', __('Sean Thomas.discography'), $widget_ops, $control_ops );
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
		                        'post_type' => 'Discography',
		                        'order' => 'desc',                        
		                        'posts_per_page' => $number );
		        
		        $loop = new WP_Query( $args );
		        
		        while ( $loop->have_posts() ) : $loop->the_post();
		        
		        $album_title = $post->post_title;
		        $release_date = get_post_meta($post->ID, 'sw_release_date', true);
		        $timestamp = strtotime($release_date);
		        $pretty_date_M = date('F', $timestamp);
		        $pretty_date_d = date('d', $timestamp);
		        $pretty_date_Y = date('Y', $timestamp); 
		                                       
		        ?>
                <li>
                <div class="post">
                <div class="post-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail( 'large' ); ?>
                  </a>
                </div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h4><?php echo $album_title; ?></h4></a>   
                <p>
                  <small><?php _e('Release Date:', 'bootstrapwp') ?> <?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_Y; ?></small>
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
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array( 'title' => 'New Album' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of Albums to Display:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
    <?php }
	}

	// Add Widget
	function discography_widget_init() {
		register_widget('discography_widget');
	}
	add_action('widgets_init', 'discography_widget_init');

?>