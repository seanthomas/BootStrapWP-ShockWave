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
  
        $release_date = get_post_meta($post->ID, 'sw_release_date', true);
        $timestamp = strtotime($releasedate);
        $pretty_date_M = date('F', $timestamp);
        $pretty_date_d = date('d', $timestamp);
        $pretty_date_Y = date('Y', $timestamp);  
        $Album_status = get_post_meta($post->ID, 'sw_Album_status', true);
        $record_label = get_post_meta($post->ID, 'sw_record_label', true);
        $amazon = get_post_meta($post->ID, 'sw_amazon', true);
        $itunes = get_post_meta($post->ID, 'sw_itunes', true);
        $soundcloud = get_post_meta($post->ID, 'sw_soundcloud', true);
        $jwaudioplayer = get_post_meta($post->ID, 'sw_jwaudioplayer', true);
        $display_tracklisting = get_post_meta($post->ID, 'sw_display_tracklisting', true);
        $buy_other = get_post_meta($post->ID, 'sw_buy_other', true);
        $buy_other_text = get_post_meta($post->ID, 'sw_buy_other_text', true);
        
        ?>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>

    <?php if ($Album_status) { ?>
      <p class="lead"><?php echo $Album_status; ?></p>
    <?php } ?>

  </div>
</header>

<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>
<!--start: Container --> 
<div class="container">

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

  <?php the_content();?>

  <?php if($data['check_disco_sharebox'] == true) { ?>
    <?php get_template_part( 'includes/sharebox' ); ?>
  <?php } ?>

    <?php endwhile;

  endif; ?>

  <?php comments_template(); ?>

  <?php bootstrapwp_content_nav('nav-below');?>

</div>
<!--start: Sidebar Span4 --> 
<div class="sidebar span4 ">

      <div class="sidebar-info">
        <h2><?php _e('Album Details', 'bootstrapwp') ?></h2>
      </div>

      <?php if ($release_date) { ?>
        <p><?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_Y; ?></p>
        <div class="sidebar-label">
          <?php _e('Release Date', 'bootstrapwp') ?> 
        </div>
      <?php } ?>

      <?php if ($record_label) { ?>
        <p><?php echo $record_label; ?></p>
        <div class="sidebar-label">
          <?php _e('Record Label', 'bootstrapwp') ?>
        </div>
      <?php } ?>

       <?php if ($display_tracklisting) { ?>
       <p><?php _e('Tracklisting', 'bootstrapwp') ?></p>

        <div class="sidebar-label">
        <ol>
          <?php                        
          $songs = get_post_meta( get_the_ID( ), 'sw_song', true );                        
          foreach ( $songs as $song ) {                                                        
          echo '<li>' . $song . '</li>';                                              
          } ?>
        </ol>
        </div>
      <?php } ?>

      <?php if($data['check_getalbum'] == true) { ?>

      <?php 
      if ($buy_other){ ?>
        <a class="btn" href="<?php echo $buy_other; ?>"> <?php _e('Click Here', 'bootstrapwp') ?> </a>
        <div class="sidebar-label">
          <?php echo $buy_other_text; ?>
        </div>     
      <?php }

      if ($amazon){ ?>
        <a class="btn" href="<?php echo $amazon; ?>"><?php _e('Click Here', 'bootstrapwp') ?> </a>
        <div class="sidebar-label">
          <?php _e('Buy From Amazon', 'bootstrapwp') ?>
        </div>      
      <?php }

      if ($itunes){ ?>
        <a class="btn" href="<?php echo $itunes; ?>"><?php _e('Click Here', 'bootstrapwp') ?> </a>
        <div class="sidebar-label">
          <?php _e('Buy From iTunes', 'bootstrapwp') ?>
        </div>       
      <?php } 
      ?>

      <?php } ?>

      <?php if ($jwaudioplayer) { ?>
      <?php get_template_part( 'includes/audio-player' ); ?>
      <?php } ?>

<!--end: Sidebar Span4 --> 
</div>
<!--end: Row -->
</div>
<!--end: Postclass -->
</div>

<?php get_footer(); ?>