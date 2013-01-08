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
  <div class="row content index">
    <div class="span8">
          <?php
                    // Blog post query
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
          if (have_posts()) : while ( have_posts() ) : the_post(); ?>
          <div <?php post_class(); ?>>

            <div class="row">
              <div class="span8">
              <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3 class="post-title"><?php the_title();?></h3></a> 
              <?php // Checking for a post thumbnail
              if ( has_post_thumbnail() ) ?>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                <?php the_post_thumbnail('');?></a>
              </div><!-- /.span8 -->
              <div class="span8">
              
            <p class="meta"><?php echo bootstrapwp_posted_on();?></p>
               <?php the_excerpt();?>
             </div><!-- /.span8 -->
           </div><!-- /.row -->
         </div><!-- /.post_class -->
       <?php endwhile; endif; ?>
       <?php bootstrapwp_content_nav('nav-below');?>
    </div><!-- /.span8 -->
      <?php get_sidebar('blog'); ?>
  </div><!-- /.row & .content -->


<?php get_footer(); ?>