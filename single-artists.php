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
  
        $artist_role = get_post_meta($post->ID, 'sw_artist_role', true);
        $description = get_post_meta($post->ID, 'sw_description', true);
        
        ?>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>

      <?php if ($artist_role) { ?>
        <p class="lead"><?php echo $artist_role; ?></p>
      <?php } ?>

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

    <?php the_content();?>



        <?php if($data['check_artists_sharebox'] == true) { ?>
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
        <h2><?php _e('Artist Details', 'bootstrapwp') ?></h2>
      </div>

      <p><?php wp_title(''); ?></p>
      <div class="sidebar-label">
        <?php _e('Name', 'bootstrapwp') ?>
      </div>

      <?php if ($artist_role) { ?>
        <p><?php echo $artist_role; ?></p>
        <div class="sidebar-label">
          <?php _e('Role', 'bootstrapwp') ?>
        </div>
      <?php } ?>

      <?php if ($description) { ?>
        <div class="sidebar-description"><?php echo $description; ?></div>
        <div class="sidebar-label">
          <?php _e('Description', 'bootstrapwp') ?> 
        </div>
      <?php } ?>

<!--end: Sidebar Span4 --> 
</div>
<!--end: Row -->
</div>
<!--end: Postclass -->
</div>

<?php get_footer(); ?>