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
  <div id="twitterbar" class="clearfix">
    <div class="container">
      <div class="row-fluid">
        <ul class="twitterpost"><?php _e('loading...') ?></ul>
        <script type='text/javascript'>
        jQuery(document).ready(function($){
          $.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $data['social_twitter']; ?>.json?count=1&callback=?', function(tweets){
          $('.twitterpost').html(tz_format_twitter(tweets));
        }); });
        </script>
      </div>
    </div>
  </div>
  <?php } ?>

    <footer class="footer">

      	<div class="container">
          <div class="row-fluid">

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
<hr class="footer-hr">
		<div class="container">
        <div class="row-fluid">
      		<p class="pull-right"><a href="#"><i class="icon-arrow-up"></i> Back to top</a></p>
        	<p>&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?></p>
        </div>
		</div> <!-- /container -->
		
    </footer>

<?php wp_footer(); ?>

  </body>
</html>