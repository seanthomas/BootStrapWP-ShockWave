<?php
/**
 * Template Name: Full-width Page
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
      <?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>

  <!-- Subhead
================================================== -->
<header class="subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>
  </div>
</header>

<div class="container">

<div class="row content">
  <div class="span12">
<?php the_content();?>
<?php endwhile; // end of the loop. ?>
</div><!-- /.span12 -->
</div>


<?php get_footer(); ?>