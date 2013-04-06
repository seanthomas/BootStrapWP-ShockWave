<!-- start: Post -->
<div <?php post_class(); ?>>
    <div class="post-image">
      <?php // Checking for a post thumbnail
        if ( has_post_thumbnail() ) ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
          <?php the_post_thumbnail( 'standard' ); ?>
        </a>
    </div>

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