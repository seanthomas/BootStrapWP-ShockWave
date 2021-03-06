<?php
/**
 * Template Name: Home Hero Template with 3 widget areas
 *
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.5
 *
 * Last Revised: July 16, 2012
 */
get_header(); ?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <?php 
          $the_query = new WP_Query(array(
            'category_name' => 'Home Slider', 
              'posts_per_page' => 1 
              )); 
            while ( $the_query->have_posts() ) : 
          $the_query->the_post();
        ?>
        <div class="item active">
        <?php the_post_thumbnail('large');?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php the_title();?></h1>
              <p class="lead"><?php the_excerpt();?></p>
              <a class="btn btn-medium btn-primary btn-sticky" href="<?php echo get_permalink(); ?>">Read more...</a>
            </div>
          </div>
        </div>
        <?php 
          endwhile; 
          wp_reset_postdata();
        ?>
        <?php 
         $the_query = new WP_Query(array(
          'category_name' => 'Home Slider', 
          'posts_per_page' => 3, /* Number of posts per page */
          'offset' => 1 /* Offsets the this post by 1 to exclude post above so it isn't repeated */
          )); 
         while ( $the_query->have_posts() ) : 
         $the_query->the_post();
        ?>
        <div class="item">
          <?php the_post_thumbnail('large');?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php the_title();?></h1>
              <p class="lead"><?php the_excerpt();?></p>
              <a class="btn btn-medium btn-primary btn-sticky" href="<?php echo get_permalink(); ?>">Read more...</a>
            </div>
          </div>
        </div>
              <?php 
       endwhile; 
       wp_reset_postdata();
      ?>
      </div>  

      <a class="left carousel-control" href="#myCarousel" .slide data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" .slide data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->

    <!-- Latest News
    ================================================== -->

   <div class="container">
  
    <div class="page-header">
    <h1>Featured News<small> </small></h1>
    </div>

   <div class="row post-types">
      <ul class="unstyled">
                <?php
                $cat_id = get_cat_ID('Home Slider');
                $args = array( 'category__not_in' => array($cat_id), 'numberposts' => 3, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date", 'meta_key' => '_thumbnail_id' );
                $postslist = get_posts( $args ); 
                foreach ($postslist as $post) : setup_postdata($post); ?>
          <li class="span4">
              <div class="post">
                  <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                      <?php the_post_thumbnail( 'page-post-types' ); ?>
                    </a>
                  </div>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h4><?php the_title();?></h4></a>
                  <p>
                    <small><?php the_excerpt();?></small>
                  </p>
              </div>
          </li>
          <?php endforeach; ?>
      </ul>
   </div>
  </div>

<div class="container">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content();?>
</div>

<?php endwhile; endif; ?>

<div class="container">
  <div class="marketing">
    <div class="row-fluid">
      <div class="span4">
        <?php
  if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-left" );
  ?>
      </div>
      <div class="span4">
        <?php
  if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-middle" );
  ?>
      </div>
      <div class="span4">
        <?php
  if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-right" );
  ?>
      </div>
    </div><!-- /.row-fluid -->
  </div><!-- /.marketing -->


<?php get_footer();?>
