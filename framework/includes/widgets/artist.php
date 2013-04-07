<?php

/*
Plugin Name: Custom Featured Artist Widget
Plugin URI: #
Description: Display your Featured Artists
Version: 1.00
Author: Sean Thomas
Author URI: #
*/

class artist_widget extends WP_Widget { 
	
	// Widget Settings
	function artist_widget() {
		$widget_ops = array('description' => __('Display your featured artist') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'artist' );
		$this->WP_Widget( 'artist', __('Sean Thomas.artist'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$artist = $instance['artist'];
		
		// ------
		echo $before_widget;
		echo $before_title . $title . $after_title; 
		
		/* display the widget */
		?>
                       
        <div class="album-widget post-types">
        
        <ul>
        <?php  
                global $post;
                        
		        $artist = new WP_Query( array(
							    'post_type' => 'artists',             
		                        'p'	=> $artist 
		        ));
		        
		        while ( $artist->have_posts() ) : $artist->the_post();
		        
		          $artist_role = get_post_meta($post->ID, 'sw_artist_role', true);
		                                       
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
                  <small><?php echo $artist_role; ?></small>
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
		$instance['artist'] = intval( $new_instance['artist'] );

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$instance = wp_parse_args( (array) $instance, array('title'=>'Featured Artist', 'artist'=>'') );
		$title = htmlspecialchars($instance['title']);
		$artist = intval ($instance['artist']); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('artist'); ?>"><?php _e( 'Select artist:','bootstrapwp' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('artist'); ?>" name="<?php echo $this->get_field_name('artist'); ?>">				
				<?php $a = new WP_Query( apply_filters( 'widget_posts_args', array( 'post_status' => 'publish', 'post_type' => 'artists' ) ) ); ?>
					<?php while ( $a->have_posts() ) : $a->the_post(); ?>
						<?php $the_id = get_the_ID(); echo $the_id; ?>
						<option value="<?php the_ID(); ?>" <?php selected( get_the_ID(), $artist); ?>><?php the_title(); ?></option>
					<?php endwhile;	wp_reset_postdata(); ?>
			</select>
		</p>
		
    <?php }
	}

	// Add Widget
	function artist_widget_init() {
		register_widget('artist_widget');
	}
	add_action('widgets_init', 'artist_widget_init');

?>