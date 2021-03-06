<!-- start: Post -->
<div <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) { ?>
    <div class="post-image">
      <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" title="<?php the_title(); ?>" >
        <?php the_post_thumbnail('large'); ?>
      </a>
    </div>
    <?php } ?>

    <div class="row">
      <div class="span2">
        <a class="btn btn-inverse" href="<?php the_permalink(); ?>">
          <i class="icon-th icon-white"></i>
        </a>
        <?php if(!is_sticky()):?>

      <?php else : ?>
        <a class="btn btn-sticky" href="<?php the_permalink(); ?>" rel="tooltip" title="Sticky Post">
          <i class="icon-arrow-up icon-white"></i>
        </a>
      <?php endif;?>
      </div>
      <div class="span6 post-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
          <h3><?php the_title();?></h3>
        </a>
      </div>
    </div>

    <?php get_template_part( 'includes/meta' ); ?>

    <div><?php the_content();?></div>

</div>
<!-- end: Post -->