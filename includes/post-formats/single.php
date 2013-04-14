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
      <div class="span7 post-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
          <h3><?php the_title();?></h3>
        </a>

       <?php get_template_part( 'includes/post-meta-single' ); ?>

       <?php the_content();?>

      </div>
    </div>

</div>
<!-- end: Post -->