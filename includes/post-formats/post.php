<!-- start: Post -->
<div <?php post_class(); ?>>
  <div class="post-image">
  <?php // Checking for a post thumbnail
  if ( has_post_thumbnail() ) ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'standard' ); ?></a>
  </div>

  <div class="row">
    
    <div class="span2">
      <a class="btn btn-inverse" href="<?php the_permalink(); ?>">
        <i class="icon-file icon-white"></i>
      </a>
      <?php if(!is_sticky()):?>

      <?php else : ?>
      <a class="btn btn-sticky" href="<?php the_permalink(); ?>" rel="tooltip" title="Sticky Post">
        <i class="icon-arrow-up icon-white"></i>
      </a>
      <?php endif;?>
    </div>

    <div class="span7 post-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
        <h3><?php the_title();?></h3>
      </a>
    </div>

  </div>

  <div>
    <?php the_excerpt();?>
  </div>

  <?php get_template_part( 'includes/meta' ); ?>

</div>
<!-- end: Post -->