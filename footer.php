<?php
/**
 * Default Footer
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */
?>

</div><!-- /.container -->
    <!-- End Template Content -->

<?php global $data; ?>

    <?php if($data['check_twitterbar'] == true) { ?>
    <div id="twitterbar">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="twitterpost"><?php _e('loading...') ?></ul>
            <script type='text/javascript'>
            jQuery(document).ready(function($){
              $.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $data['socialbar_twitter']; ?>.json?count=1&callback=?', function(tweets){
              $('.twitterpost').html(tz_format_twitter(tweets));
            }); });
            </script>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <footer class="footer">

      	<div class="container">
          <div class="row">

        		<?php
           			if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-one");
        		?>

            <?php
                 if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-two");
            ?>

            <?php
                 if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-three");
            ?>

            <?php
                 if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-four");
            ?>
      	
          </div>
        </div>
    
    </footer>

      <div class="footer-bottom">

    		<div class="container">
            <div class="socialbar-footer row">
            <div class="social-icons span12">

            <p class="pull-left">&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?></p>

            <?php if($data['check_socialbar_footer'] == true) { ?>
            <ul class="pull-right">

            <?php if($data['socialbar_twitter'] != "") { ?>
              <li class="social-twitter"><a href="http://www.twitter.com/<?php echo $data['socialbar_twitter']; ?>" target="_blank" title="<?php _e( 'Twitter', 'bootstrapwp' ) ?>"><?php _e( 'Twitter', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_forrst'] != "") { ?>
              <li class="social-forrst"><a href="<?php echo $data['socialbar_forrst']; ?>" target="_blank" title="<?php _e( 'Forrst', 'bootstrapwp' ) ?>"><?php _e( 'Forrst', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_dribbble'] != "") { ?>
              <li class="social-dribbble"><a href="<?php echo $data['socialbar_dribbble']; ?>" target="_blank" title="<?php _e( 'Dribbble', 'bootstrapwp' ) ?>"><?php _e( 'Dribbble', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_flickr'] != "") { ?>
              <li class="social-flickr"><a href="<?php echo $data['socialbar_flickr']; ?>" target="_blank" title="<?php _e( 'Flickr', 'bootstrapwp' ) ?>"><?php _e( 'Flickr', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_facebook'] != "") { ?>
              <li class="social-facebook"><a href="<?php echo $data['socialbar_facebook']; ?>" target="_blank" title="<?php _e( 'Facebook', 'bootstrapwp' ) ?>"><?php _e( 'Facebook', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_skype'] != "") { ?>
              <li class="social-skype"><a href="<?php echo $data['socialbar_skype']; ?>" target="_blank" title="<?php _e( 'Skype', 'bootstrapwp' ) ?>"><?php _e( 'Skype', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_digg'] != "") { ?>
              <li class="social-digg"><a href="<?php echo $data['socialbar_digg']; ?>" target="_blank" title="<?php _e( 'Digg', 'bootstrapwp' ) ?>"><?php _e( 'Digg', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_google'] != "") { ?>
              <li class="social-google"><a href="<?php echo $data['socialbar_google']; ?>" target="_blank" title="<?php _e( 'Google', 'bootstrapwp' ) ?>"><?php _e( 'Google+', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_linkedin'] != "") { ?>
              <li class="social-linkedin"><a href="<?php echo $data['socialbar_linkedin']; ?>" target="_blank" title="<?php _e( 'LinkedIn', 'bootstrapwp' ) ?>"><?php _e( 'LinkedIn', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_vimeo'] != "") { ?>
              <li class="social-vimeo"><a href="<?php echo $data['socialbar_vimeo']; ?>" target="_blank" title="<?php _e( 'Vimeo', 'bootstrapwp' ) ?>"><?php _e( 'Vimeo', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_yahoo'] != "") { ?>
              <li class="social-yahoo"><a href="<?php echo $data['socialbar_yahoo']; ?>" target="_blank" title="<?php _e( 'Yahoo', 'bootstrapwp' ) ?>"><?php _e( 'Yahoo', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_tumblr'] != "") { ?>
              <li class="social-tumblr"><a href="<?php echo $data['socialbar_tumblr']; ?>" target="_blank" title="<?php _e( 'Tumblr', 'bootstrapwp' ) ?>"><?php _e( 'Tumblr', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_youtube'] != "") { ?>
              <li class="social-youtube"><a href="<?php echo $data['socialbar_youtube']; ?>" target="_blank" title="<?php _e( 'YouTube', 'bootstrapwp' ) ?>"><?php _e( 'YouTube', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_picasa'] != "") { ?>
              <li class="social-picasa"><a href="<?php echo $data['socialbar_picasa']; ?>" target="_blank" title="<?php _e( 'Picasa', 'bootstrapwp' ) ?>"><?php _e( 'Picasa', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_deviantart'] != "") { ?>
              <li class="social-deviantart"><a href="<?php echo $data['socialbar_deviantart']; ?>" target="_blank" title="<?php _e( 'DeviantArt', 'bootstrapwp' ) ?>"><?php _e( 'DeviantArt', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_behance'] != "") { ?>
              <li class="social-behance"><a href="<?php echo $data['socialbar_behance']; ?>" target="_blank" title="<?php _e( 'Behance', 'bootstrapwp' ) ?>"><?php _e( 'Behance', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_pinterest'] != "") { ?>
              <li class="social-pinterest"><a href="<?php echo $data['socialbar_pinterest']; ?>" target="_blank" title="<?php _e( 'Pinterest', 'bootstrapwp' ) ?>"><?php _e( 'Pinterest', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_paypal'] != "") { ?>
              <li class="social-paypal"><a href="<?php echo $data['socialbar_paypal']; ?>" target="_blank" title="<?php _e( 'PayPal', 'bootstrapwp' ) ?>"><?php _e( 'PayPal', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_delicious'] != "") { ?>
              <li class="social-delicious"><a href="<?php echo $data['socialbar_delicious']; ?>" target="_blank" title="<?php _e( 'Delicious', 'bootstrapwp' ) ?>"><?php _e( 'Delicious', 'bootstrapwp' ) ?></a></li>
            <?php } ?>
            <?php if($data['socialbar_rss'] == true) { ?>
              <li class="social-rss"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="<?php _e( 'RSS', 'bootstrapwp' ) ?>"><?php _e( 'RSS', 'bootstrapwp' ) ?></a></li>
            <?php } ?>

            </ul>
            <?php } ?>
            </div>
          </div>
    		</div> <!-- /container -->
      </div>

<?php wp_footer(); ?>

  </body>
</html>