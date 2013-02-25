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

<div class="page-wrap row-fluid">
  <div class="span8">

    <div class="post clearfix row-fluid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  
        $releasedate = get_post_meta($post->ID, 'gxg_releasedate', true);
        $timestamp = strtotime($releasedate);
        $pretty_date_M = date('F', $timestamp);
        $pretty_date_d = date('d', $timestamp);
        $pretty_date_Y = date('Y', $timestamp);  
        $amazon = get_post_meta($post->ID, 'gxg_amazon', true);
        $itunes = get_post_meta($post->ID, 'gxg_itunes', true);
        $albuminfo_left = get_post_meta($post->ID, 'gxg_albuminfo_left', true);
        $albuminfo_center = get_post_meta($post->ID, 'gxg_albuminfo_center', true);
        $albuminfo = get_post_meta($post->ID, 'gxg_albuminfo', true);
        $soundcloud = get_post_meta($post->ID, 'gxg_soundcloud', true);
        $audioplayer = get_post_meta($post->ID, 'gxg_audioplayer', true);
        $buy_other = get_post_meta($post->ID, 'gxg_buy_other', true);
        $buy_other_text = get_post_meta($post->ID, 'gxg_buy_other_text', true);
        
        ?>

     <div <?php post_class(); ?>>

      <div class="row-fluid">
        <div class="span3">
            <div class="post-image">
              <?php // Checking for a post thumbnail
                if ( has_post_thumbnail() ) ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                  <?php the_post_thumbnail( 'standard' ); ?>
                </a>
            </div>
        </div>
        <div class="span9 post-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a>
          <?php if ($releasedate) { ?>
              <h6 class="infotitle"> <?php _e('release date:', 'gxg_textdomain') ?> </h6>
              <p><?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_Y; ?> </p>
         <?php }
         ?>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span9 pull-right">
            <div class="album-tracks">
              <ol>
                  <?php                        
                  $songs = get_post_meta( get_the_ID( ), 'gxg_song', true );                        
                  foreach ( $songs as $song ) {                                                        
                  echo '<li>' . $song . '</li>';                                              
                  } ?>                   
              </ol>       
            </div><!-- #album-tracks -->
            <?php get_template_part( 'includes/audio-player' ); ?>           
            <?php the_content();?>
        </div>
      </div>
  </div>

</div>

        <?php if($data['check_sharebox'] == true) { ?>
        <?php get_template_part( 'includes/sharebox' ); ?>
        <?php } ?>

          <?php endwhile;

        endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

          </div><!-- /.span8 -->
          <?php get_sidebar('blog'); ?>

<?php get_footer(); ?>