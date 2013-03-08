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


<div class="row-fluid">

<ul class="thumbnails">
    <?php 
    
$images = rwmb_meta( 'sw_gallery_images', 'type=image&size=single_gallery' );

foreach ( $images as $image )
      {
    echo "<li class='span4'>
    <a class='thumbnail img-polaroid' title='' alt='{$image['caption']}' data-rel='prettyPhoto[pp_gallery]' href='{$image['full_url']}'>
    <img data-src='holder.js/300x200' alt='' src='{$image['url']}' />
    </a>
    </li>";
      }                     
    ?>
</ul>

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