<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * Page template with a fixed 940px container and right sidebar layout
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>

<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>

<div class="container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

          $date = get_post_meta($post->ID, 'sw_date', true);
          $timestamp = strtotime($date);   
          $pretty_date_yy = date('Y', $timestamp);
          $pretty_date_M = date('M', $timestamp);
          $pretty_date_d = date('d', $timestamp);
          $time = get_post_meta($post->ID, 'sw_time', true);
          $address = get_post_meta($post->ID, 'sw_address', true);
          $venue = get_post_meta($post->ID, 'sw_venue', true);
          $url= get_post_meta($post->ID, 'sw_url', true);
          $button_text= get_post_meta($post->ID, 'sw_button_text', true);
          $soldout= get_post_meta($post->ID, 'sw_soldout', true);
          $cancelled= get_post_meta($post->ID, 'sw_cancelled', true);
        
        ?>

<div <?php post_class(); ?>>


<div class="row-fluid">

<div class="span6">

  <?php // Checking for a post thumbnail
  if ( has_post_thumbnail() ) ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
    <?php the_post_thumbnail( 'single-event' ); ?>
  </a>

</div>

<div class="span6 album-attributes">

    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>

    <ul class="unstlyed">

      <?php if ($Album_status) { ?>
        <li><strong><?php echo $Album_status; ?></strong></li>
      <?php } ?>

        <li><strong><?php _e('Date:', 'bootstrapwp') ?></strong><?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_yy; ?></li>

        <li><strong><?php _e('Time:', 'bootstrapwp') ?></strong><?php echo $time; ?></li>        

        <li><strong><?php _e('Venue:', 'bootstrapwp') ?></strong><?php echo $venue; ?></li>

        <li><strong><?php _e('Address:', 'bootstrapwp') ?></strong><?php echo $address; ?></li>

    </ul>

</div>

</div>

<div class="content-events row-fluid">
<?php the_content();?>
</div>

</div>

<?php if($data['check_gettickets'] == true) { ?>
<div class="sharebox row-fluid">
  <h4>Get Tickets</h4>
  <div class="album-icons pull-right inline">
    <ul>

      <?php 
      if ($cancelled){ ?>
      <li> 
              <a href=""><?php _e('Cancelled', 'bootstrapwp') ?></a>
      </li>       
      <?php }

      elseif ($soldout){ ?>    
      <li>                                             
              <a href=""><?php _e('Sold Out', 'bootstrapwp') ?></a>  
      </li>   
      <?php }

      if ($url){ ?>
      <li> 
              <a href="<?php echo $itunes; ?>"><?php if ($button_text) { echo $button_text; } else { _e('Buy Tickets', 'bootstrapwp'); } ?></a>
     </li>       
      <?php } 
      ?>

    </ul>
  </div>
</div>
<?php } ?>

        <?php if($data['check_events_sharebox'] == true) { ?>
        <?php get_template_part( 'includes/sharebox' ); ?>
        <?php } ?>

          <?php endwhile;

        endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

<?php get_footer(); ?>