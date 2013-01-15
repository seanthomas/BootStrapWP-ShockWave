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
          <?php if(!is_sticky()):?>

        <?php else : ?>
          <a class="btn btn-sticky" href="<?php the_permalink(); ?>" rel="tooltip" title="Sticky Post">
            <i class="icon-arrow-up icon-white"></i>
          </a>
        <?php endif;?>
        </div>
        <div class="span10 post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h3><?php the_title();?></h3></a></div>
      </div>

      <div class="row-fluid">
        <div class="span2 post-meta"><p class="meta"><?php echo bootstrapwp_posted_on();?></p></div>
        <div class="span10"><?php the_excerpt();?></div>
      </div>
    </div>
<hr />
  </div>

</div>