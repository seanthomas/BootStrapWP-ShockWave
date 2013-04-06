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

<div class="row">
  <div class="span8">
    <?php if ( have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'includes/post-formats/single', get_post_format() ); ?>


        <?php if($data['check_blog_sharebox'] == true) { ?>
				<?php get_template_part( 'includes/sharebox' ); ?>
		<?php } ?>

      <?php endwhile;

 endif; ?>

 <?php comments_template(); ?>

 <?php bootstrapwp_content_nav('nav-below');?>

          </div><!-- /.span9 -->
          <?php get_sidebar('blog'); ?>




<?php get_footer(); ?>