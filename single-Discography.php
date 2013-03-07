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

<div <?php post_class(); ?>>


<div class="row-fluid">

<div class="span6">

  <?php // Checking for a post thumbnail
  if ( has_post_thumbnail() ) ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
    <?php the_post_thumbnail( 'single-discography' ); ?>
  </a>

</div>

<div class="span6 album-attributes">

    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>

    <ul class="unstlyed">

      <?php if ($Album_status) { ?>
        <li><strong><?php echo $Album_status; ?></strong></li>
      <?php } ?>

      <?php if ($release_date) { ?>
        <li><strong><?php _e('Release Date:', 'bootstrapwp') ?></strong> <?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_Y; ?></li>
      <?php } ?>

      <?php if ($record_label) { ?>
        <li><strong><?php _e('Record Label:', 'bootstrapwp') ?></strong><?php echo $record_label; ?></li>
      <?php } ?>

       <?php if ($display_tracklisting) { ?>
        <li>
          <dl class="dl-horizontal">
          <dt><strong><?php _e('Tracklisting:', 'bootstrapwp') ?></strong></dt>
          
          <dd>
            <ol>
          <?php                        
          $songs = get_post_meta( get_the_ID( ), 'sw_song', true );                        
          foreach ( $songs as $song ) {                                                        
          echo '<li>' . $song . '</li>';                                              
          } ?>
        </ol>
        </dd>
        </dl>
      </li>
      <?php } ?>
    </ul>

    <?php if ($jwaudioplayer) { ?>
    <?php get_template_part( 'includes/audio-player' ); ?>
    <?php } ?>

</div>

</div>

<div class="row-fluid">
<?php the_content();?>
</div>



</div>

<?php if($data['check_getalbum'] == true) { ?>
<div class="sharebox row-fluid">
  <h4>Get This Album</h4>
  <div class="album-icons pull-right inline">
    <ul>

      <?php 
      if ($buy_other){ ?>
      <li> 
              <a href="<?php echo $buy_other; ?>"><?php echo $buy_other_text; ?></a>
      </li>       
      <?php }

      if ($amazon){ ?>    
      <li>                                             
              <a href="<?php echo $amazon; ?>"><?php _e('Amazon', 'bootstrapwp') ?></a>  
      </li>   
      <?php }

      if ($itunes){ ?>
      <li> 
              <a href="<?php echo $itunes; ?>"><?php _e('iTunes', 'bootstrapwp') ?></a>
     </li>       
      <?php } 
      ?>

    </ul>
  </div>
</div>
<?php } ?>

        <?php if($data['check_sharebox'] == true) { ?>
        <?php get_template_part( 'includes/sharebox' ); ?>
        <?php } ?>

          <?php endwhile;

        endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

<?php get_footer(); ?>