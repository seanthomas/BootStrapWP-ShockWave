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
  
        $artist_role = get_post_meta($post->ID, 'sw_artist_role', true);
        
        ?>

<div <?php post_class(); ?>>

  <div class="page-title">
    <h1><?php the_title();?>

      <?php if ($artist_role) { ?>
        <small><em class="muted"> - <?php echo $artist_role; ?></em></small>
      <?php } ?>

    </h1>

  </div>

<div class="row">

<div class="span6">

  <?php // Checking for a post thumbnail
  if ( has_post_thumbnail() ) ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
    <?php the_post_thumbnail( 'single-discography' ); ?>
  </a>

</div>

<div class="span6">

  <?php the_content();?>

</div>

</div>

</div>

        <?php if($data['check_artists_sharebox'] == true) { ?>
        <?php get_template_part( 'includes/sharebox' ); ?>
        <?php } ?>

          <?php endwhile;

        endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

<?php get_footer(); ?>