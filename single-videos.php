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
  
        $video = get_post_meta($post->ID, 'sw_video_embed_code', true);
        
        ?>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>

      <?php if ($galleries_caption) { ?>
        <p class="lead"><?php echo $galleries_caption; ?></p>
      <?php } ?>

  </div>
</header>

<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>

<div class="container">

<div <?php post_class(); ?>>

<div class="row">

  <div class="span8">
    <div class="video-embed">

      <?php echo wp_oembed_get($video); ?>

    </div>

  <?php the_content();?>

  <?php if($data['check_artists_sharebox'] == true) { ?>
  <?php get_template_part( 'includes/sharebox' ); ?>
  <?php } ?>

    <?php endwhile;

  endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

  </div>

<?php get_sidebar('blog'); ?>

</div>

<?php get_footer(); ?>