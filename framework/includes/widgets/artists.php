<?php

/*
Plugin Name: Custom artists Widget
Plugin URI: #
Description: Display your upcoming artists
Version: 1.00
Author: Sean Thomas
Author URI: #
*/

class artists_widget extends WP_Widget { 
	
	// Widget Settings
	function artists_widget() {
		$widget_ops = array('description' => __('Display list of artists') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'artists' );
		$this->WP_Widget( 'artists', __('Sean Thomas.artists'), $widget_ops, $control_ops );
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
                       
        <div class="album-widget">
        
        <ul>
        <?php  
                global $post;
                        
		           $args = array(
							    'post_type' => 'artists',
								'orderby'	=> 'rand',
								'posts_per_page' => $artists_no );
		        
		        $loop = new WP_Query( $args );
		        
		        while ( $loop->have_posts() ) : $loop->the_post();
		        
		          $artist_role = get_post_meta($post->ID, 'sw_artist_role', true);
		                                       
		        ?>
                <li>
			    <div class="artists row">
			    <div class="span4">
			      <div class="date pull-left">
	                <div class="post-image">
			          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			            <?php the_post_thumbnail( 'artists_thumbnail' ); ?>
			          </a>
			        </div>
			      </div>

			      <div class="artists-description">
			        <h4><a href="<?php the_permalink(); ?>"><?php the_title() ;?></a></h4>
			        <span><?php echo $artist_role; ?></span>
			      </div>
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
		
		$defaults = array( 'title' => 'Artists' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of artists to Display:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
    <?php }
	}

	// Add Widget
	function artists_widget_init() {
		register_widget('artists_widget');
	}
	add_action('widgets_init', 'artists_widget_init');

?>