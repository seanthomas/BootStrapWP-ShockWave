<?php
/**
* Template Name: Discography Page
* Description: Discography page template displaying albums.
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: September 9, 2012
 *
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

<div class="page-wrap row-fluid">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                                                           
        <?php the_content(); ?> 
<?php endwhile; endif; ?>    

<ul class="thumbnails albums">
<?php  
        global $post;
        
        $args = array(
                        'post_type' => 'Discography',
                        'order' => 'desc',                        
                        'posts_per_page' => -1 );
        
        $loop = new WP_Query( $args );
        
        while ( $loop->have_posts() ) : $loop->the_post();
        
        $album_title = $post->post_title;
        $release_date = get_post_meta($post->ID, 'sw_release_date', true);
        $timestamp = strtotime($release_date);
        $pretty_date_M = date('F', $timestamp);
        $pretty_date_d = date('d', $timestamp);
        $pretty_date_Y = date('Y', $timestamp); 
                                       
?>                
                
<li class="span3">
<div class="thumbnail">
  <div class="post-image">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
    <?php the_post_thumbnail( '' ); ?>
  </a>
</div>
  <div class="caption">
    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h4><?php echo $album_title; ?></h4></a>
    <p>
      <small><?php _e('Release Date:', 'bootstrapwp') ?> <?php echo $pretty_date_M . ' ' . $pretty_date_d . ', ' . $pretty_date_Y; ?></small>
    </p>
  </div>
</div>
</li>  

<?php       
  endwhile;

  // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
  wp_reset_query();
?>
</ul>

</div>


<?php get_footer(); ?>