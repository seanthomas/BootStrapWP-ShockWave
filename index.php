<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>
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
  <div class="span8">
    <?php
              // Blog post query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'includes/post', get_post_format() ); ?>

 <?php endwhile; 















 endif; ?>
 <?php bootstrapwp_content_nav('nav-below');?>

</div><!-- /.span8 -->
<?php get_sidebar('blog'); ?>


<?php get_footer(); ?>