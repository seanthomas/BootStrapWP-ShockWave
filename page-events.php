<?php
/**
* Template Name: Events Page
* Description: Events page template displaying albums.
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: September 9, 2012
 *
 */

get_header(); ?>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>
  </div>
</header>

<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>

<!--start: Container --> 
<div class="container">
<!--start: Post Class --> 
<div <?php post_class(); ?>>
<!--start: Row --> 
<div class="row-fluid">
<!--start: Span8 --> 
<div class="span8 events">

    <h1 class="events-title"> <?php _e('Upcoming Events', 'bootstrapwp'); ?> </h1>

    <ul class="unstyled">

<?php  
  global $post;

  $args = array(
    'post_type' => 'events',
    'meta_key' => 'sw_date',
    'meta_value' => strftime("%Y/%m/%d"),
    'meta_compare' => '>',
    'orderby' => 'meta_value',
    'order' => 'asc',
    'posts_per_page' => -1);

  $loop = new WP_Query( $args );
                            
                                
  if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
          
  $date = get_post_meta($post->ID, 'sw_date', true);
  $timestamp = strtotime($date);   
  $pretty_date_yy = date('Y', $timestamp);
  $pretty_date_M = date('M', $timestamp);
  $pretty_date_d = date('d', $timestamp);
  $address = get_post_meta($post->ID, 'sw_address', true);
  $venue = get_post_meta($post->ID, 'sw_venue', true);
  $url= get_post_meta($post->ID, 'sw_url', true);
  $button_text= get_post_meta($post->ID, 'sw_button_text', true);
  $soldout= get_post_meta($post->ID, 'sw_soldout', true);
  $cancelled= get_post_meta($post->ID, 'sw_cancelled', true);
  
  ?>

  <li>
    <div class="events-date row-fluid">
      <div class="date">
        <?php echo  $pretty_date_d . ' ' . $pretty_date_M . '<span>' . $pretty_date_yy; ?></span>
      </div>

      <?php  
      if ($cancelled){ ?>
        <a class="btn btn-red pull-right hidden-phone" href="<?php echo $url; ?>"><?php _e('Cancelled', 'bootstrapwp') ?></a>
      <?php }

      elseif ($soldout){ ?>
        <a class="btn btn-orange pull-right hidden-phone" href="<?php echo $url; ?>"><?php _e('Sold Out', 'bootstrapwp') ?></a>                                               
      <?php }

      elseif ($url){ ?>
        <a class="btn pull-right hidden-phone" href="<?php echo $url; ?>"><?php if ($button_text) { echo $button_text; } else { _e('Buy Tickets', 'bootstrapwp'); } ?></a>                                                              
      <?php } ?> 

      <div class="events-description">
        <h4><a href="<?php the_permalink(); ?>"><?php echo $venue; ?></a></h4>
        <span><?php echo $address; ?></span>
      </div>

    </div>
  </li>

  <?php

  endwhile;

  else: ?>
                       
    <!-- what if there are no dates? -->
    <div class="no_dates">
    <p> <?php _e('No dates to show.', 'bootstrapwp'); ?> </p>
    </div>

  <?php
   
  endif;

  // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
  wp_reset_query();                        

  ?>

</ul>

  <h1 class="events-title"> <?php _e('Past Events', 'bootstrapwp'); ?> </h1>

  <ul class="unstyled">

<?php  
  global $post;

  $args = array(
    'post_type' => 'events',
    'meta_key' => 'sw_date',
    'meta_value' => strftime("%Y/%m/%d"),
    'meta_compare' => '<',
    'orderby' => 'meta_value',
    'order' => 'asc',
    'posts_per_page' => -1);

  $loop = new WP_Query( $args );
                            
                                
  if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
          
  $date = get_post_meta($post->ID, 'sw_date', true);
  $timestamp = strtotime($date);   
  $pretty_date_yy = date('Y', $timestamp);
  $pretty_date_M = date('M', $timestamp);
  $pretty_date_d = date('d', $timestamp);
  $pretty_date_D = date('D', $timestamp);
  $address = get_post_meta($post->ID, 'sw_address', true);
  $venue = get_post_meta($post->ID, 'sw_venue', true);
  $url= get_post_meta($post->ID, 'sw_url', true);
  $button_text= get_post_meta($post->ID, 'sw_button_text', true);
  $soldout= get_post_meta($post->ID, 'sw_soldout', true);
  $cancelled= get_post_meta($post->ID, 'sw_cancelled', true);
  
  ?>

  <li>
    <div class="events-date row-fluid">
      <div class="date span1">
        <?php echo  $pretty_date_d . ' ' . $pretty_date_M . '<span>' . $pretty_date_yy; ?></span>
      </div>

      <div class="events-description">
        <h4><a href="<?php the_permalink(); ?>"><?php echo $venue; ?></a></h4>
        <span><?php echo $address; ?></span>
      </div>

    </div>
  </li>

  <?php

  endwhile;

  else:  ?>
                       
  <!-- No Dates: -->
  <div class="no_dates">
  <p> <?php _e('There are no dates yet.', 'gxg_textdomain'); ?> </p>
  </div>

  <?php
   
  endif;

  // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
  wp_reset_query();                        

  ?>
</ul>

<!--end: Span8 -->
</div>

<?php get_sidebar('blog'); ?>

<!--end: Row -->
</div>
<!--end: Postclass -->
</div>


<?php get_footer(); ?>