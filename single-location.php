<?php
/**
 *
 * Description: Displays single location template to display location details
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
  <div class="span12">
        <?php
      global $post;

      $EM_Event = em_get_event($post->ID, 'post_id');
    ?>

    <div class="row-fluid">
    <div class="span12 post-image">
    <?php echo $EM_Event->output('#_LOCATIONMAP'); ?>
    </div>
    </div>

    <div class="row-fluid post-content">

      <div class="row-fluid">
        <div class="span3">
          <a class="btn btn-inverse" href="<?php the_permalink(); ?>">
            <i class="icon-group"></i>
          </a>
        </div>
        <div class="span9 post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a></div>
      </div>

      <div class="row-fluid">
        <div class="span3">
         <ul class="unstyled event-meta">
          <li><strong>Location info:</strong></li>
          <li>
                <address>
    <strong><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></strong><i class="icon-road pull-right"></i><br>
    <?php echo $EM_Event->output('#_LOCATIONFULLBR'); ?><br>
    <a href="<?php echo $EM_Event->output('#_LOCATIONURL'); ?>">Visit <?php echo $EM_Event->output('#_LOCATIONNAME'); ?> Website</a><i class="icon-globe pull-right"></i><br>
  </li>
         </ul>
        </div>

        <div class="span9"><?php echo $EM_Event->output('#_LOCATIONNOTES'); ?></div>
      </div>
    </div>
<hr />




</div><!-- /.span12 -->
</div><!-- /.row .content -->


<?php get_footer(); ?>