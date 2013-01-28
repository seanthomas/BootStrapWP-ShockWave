<?php
/**
 *
 * Description: Displays single event template to display event
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
    <?php echo $EM_Event->output('#_MAP'); ?>
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
         <ul class="unstyled post-meta">
          <li><strong>Event info:</strong></li>
          <li class="date-color"><?php echo $EM_Event->output('#_EVENTDATES'); ?><i class="icon-calendar pull-right no-color"></i></li>
          <li><?php echo $EM_Event->output('#_EVENTTIMES'); ?><i class="icon-time pull-right"></i></li>
          <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><i class="icon-comment pull-right"></i></li>
          
          <li>
                <address>
    <strong><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></strong><i class="icon-road pull-right"></i><br>
    <?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?><br>
    <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?><br>
    <?php echo $EM_Event->output('#_LOCATIONSTATE'); ?><br>
    <?php echo $EM_Event->output('#_LOCATIONPOSTCODE'); ?><br>
    <?php echo $EM_Event->output('#_LOCATIONCOUNTRY'); ?><br>
    <abbr title="Phone">P:</abbr> <?php echo $EM_Event->output('#_CONTACTPHONE'); ?><i class="icon-phone pull-right"></i><br>
     <a href="mailto:<?php echo $EM_Event->output('#_CONTACTEMAIL'); ?>"><?php echo $EM_Event->output('#_CONTACTEMAIL'); ?></a><i class="icon-envelope pull-right"></i>
    </address>
  </li>
         </ul>
        </div>

        <div class="span9"><?php echo $EM_Event->output('#_EVENTNOTES'); ?></div>
      </div>
    </div>
<hr />




</div><!-- /.span12 -->
</div><!-- /.row .content -->


<?php get_footer(); ?>