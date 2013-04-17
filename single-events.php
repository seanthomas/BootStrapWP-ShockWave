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
<div class="row">
<!--start: Span8 --> 
<div class="span8">

  <?php // Checking for a post thumbnail
  if ( has_post_thumbnail() ) ?>
    <div class="post-image">
      <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('large'); ?>
      </a>
    </div>

  <hr class="hidden-phone">

  <?php the_content();?>


  <?php if($data['check_events_sharebox'] == true) { ?>
    <?php get_template_part( 'includes/sharebox' ); ?>
  <?php } ?>

  <?php comments_template(); ?>

  <?php bootstrapwp_content_nav('nav-below');?>

</div>

<!--start: Sidebar Span4 --> 
<div class="sidebar span4 ">

      <div class="sidebar-info">
        <h2><?php _e('Album Details', 'bootstrapwp') ?></h2>
      </div>

      <?php if ($Album_status) { ?>
        <p><?php echo $Album_status; ?></p>
        <div class="sidebar-label">
          <?php _e('Album Status', 'bootstrapwp') ?> 
        </div>
      <?php } ?>

        <p><?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_yy; ?></p>
        <div class="sidebar-label">
          <?php _e('Date', 'bootstrapwp') ?>
        </div>

        <p><?php echo $time; ?></p>
        <div class="sidebar-label">
          <?php _e('Time', 'bootstrapwp') ?>
        </div>

        <p><?php echo $venue; ?></p>
        <div class="sidebar-label">
          <?php _e('Venue', 'bootstrapwp') ?>
        </div>

        <p><?php echo $address; ?></p>
        <div class="sidebar-label">
          <?php _e('Address', 'bootstrapwp') ?>
        </div>

        <?php if($data['check_gettickets'] == true) { ?>

        <?php
        if ($cancelled){ ?>
          <a class="btn" href="<?php echo $url; ?>"><?php _e('Cancelled', 'bootstrapwp') ?></a>
        <?php }

        elseif ($soldout){ ?> 
          <a class="btn" href="<?php echo $url; ?>"><?php _e('Sold Out', 'bootstrapwp') ?></a>
        <?php }

        if ($url){ ?>
          <a class="btn" href="<?php echo $url; ?>"><?php if ($button_text) { echo $button_text; } else { _e('Buy Tickets', 'bootstrapwp'); } ?></a>
        <?php }
        ?>

        <?php } ?>

<!--end: Sidebar Span4 --> 
</div>
<!--end: Row --> 
</div>
<!--end: Post Class --> 
</div>

    <?php endwhile;

  endif; ?>

<?php get_footer(); ?>