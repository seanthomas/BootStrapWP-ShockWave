<?php
/**
* Template Name: Videos Page
* Description: Videos page template displaying Videos.
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: September 9, 2012
 *
 */

get_header(); ?>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1><?php wp_title(''); ?></h1>
  </div>
</header>

<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>

<div class="container">

<div class="row-fluid post-types">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                                                           
        <?php the_content(); ?> 
<?php endwhile; endif; ?>    

<ul class="unstyled">

<?php  
        global $post;
        
        $args = array(
                        'post_type' => 'videos',
                        'order' => 'desc',
                        'posts_per_page' => -1 );
        
        $loop = new WP_Query( $args );
        
        while ( $loop->have_posts() ) : $loop->the_post();
                         
        $video = get_post_meta($post->ID, 'sw_video_embed_code', true);

?> 
        <li class="span4">
            <div class="post">
                <div class="post-image">
                  <a href="<?php echo $video; ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail( 'large' ); ?>
                  </a>
                </div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h4><?php the_title();?></h4></a>
                <p>
                  <small><?php echo $galleries_caption; ?></small>
                </p>
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