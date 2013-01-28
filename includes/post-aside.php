<div class="row-fluid">

  <div <?php post_class(); ?>>

    <div class="row-fluid">
    <div class="span12 post-image">
      <?php // Checking for a post thumbnail
        if ( has_post_thumbnail() ) ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
          <?php the_post_thumbnail('large');?></a>
    </div>
    </div>

    <div class="row-fluid post-content">

      <div class="row-fluid">
        <div class="span2">
          <a class="btn btn-inverse" href="<?php the_permalink(); ?>">
            <i class="icon-file"></i>
          </a>
        </div>
        <div class="span10 post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a></div>
      </div>

      <div class="row-fluid">
        <div class="span3">
         <ul class="unstyled post-meta">
          <li class="date-color"><?php the_time('jS F Y') ?><i class="icon-pencil pull-right no-color"></i></li>
          <li><?php the_author(); ?><i class="icon-user pull-right"></i></li>
          <li><?php swift_list_cats(3); ?><i class="icon-reorder pull-right"></i></li>
          <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><i class="icon-comment pull-right"></i></li>
         </ul>
        </div>
        <div class="span9"><?php the_excerpt();?></div>
      </div>
    </div>
<hr />
  </div>

</div>