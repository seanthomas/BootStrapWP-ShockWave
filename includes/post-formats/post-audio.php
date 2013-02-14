<div class="post clearfix row-fluid">

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
            <i class="icon-music"></i>
          </a>
        </div>
        <div class="span10 post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a></div>
      </div>

      <div class="row-fluid">
        <div class="span3">
          <?php get_template_part( 'includes/meta' ); ?>
        </div>
        <div class="span9"><?php the_excerpt();?></div>
      </div>
    </div>
<hr />
  </div>

</div>