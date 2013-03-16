<?php global $data; ?>
<div class="sharebox row">

	<div class="span3 hidden-phone">
	<span><h4>Share This Story</h4></span>
	</div>

	<div class="social-icons pull-right span5">
		<ul>

			<?php if($data['check_sharingboxemail'] == true) { ?>	
			<li class="social-email">
				<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" title="<?php _e( 'E-Mail', 'minti' ) ?>" target="_blank"><i class="icon-envelope-alt"></i></a>
			</li>
			<?php } ?>

			<?php if($data['check_sharingboxgoogle'] == true) { ?>	
			<li class="social-googleplus">
				<a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Google+', 'minti' ) ?>" target="_blank"><i class="icon-google-plus"></i></a>
			</li>
			<?php } ?>	

			<?php if($data['check_sharingboxpinterest'] == true) { ?>	
			<li class="social-pinterest">
				<a href="http://pinterest.com/pinthis?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Pinterest', 'minti' ) ?>" target="_blank"><i class="icon-pinterest"></i></a>
			</li>
			<?php } ?>

			<?php if($data['check_sharingboxlinkedin'] == true) { ?>	
			<li class="social-linkedin">
				<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" title="<?php _e( 'LinkedIn', 'minti' ) ?>" target="_blank"><i class="icon-linkedin"></i></a>
			</li>
			<?php } ?>	

			<?php if($data['check_sharingboxtwitter'] == true) { ?>	
			<li class="social-twitter">
				<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="<?php _e( 'Twitter', 'minti' ) ?>" target="_blank"><i class="icon-twitter"></i></a>
			</li>
			<?php } ?>					

			<?php if($data['check_sharingboxfacebook'] == true) { ?>	
			<li class="social-facebook">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php _e( 'Facebook', 'minti' ) ?>" target="_blank"><i class="icon-facebook"></i></a>
			</li>
			<?php } ?>

		</ul>
	</div>
</div>