<?php
/**
 *
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: August 15, 2012
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );

  ?></title>

  <?php global $data; ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-57-precomposed.png">

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
    <!--start: Navbar -->
    <div class="navbar navbar-relative-top">
       <!--start: Navbar-inner -->
       <div class="navbar-inner">
         <!--start: Container -->        
         <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          <?php
           /** Loading WordPress Custom Menu  **/
           wp_nav_menu( array(
              'theme_location'   => 'primary-menu',
              'container_class' => 'nav-collapse',
              'menu_class'      => 'nav pull-right',
              'fallback_cb'     => '',
              'walker' => new Bootstrapwp_Walker_Nav_Menu()
          ) ); ?>
        <!--end: Container -->
        </div>
      <!--end: Navbar-inner -->
      </div>
    <!--end: Navbar -->
    </div>
    <?php if($data['check_socialbar_header'] == true) { ?>
    <div class="socialbar">
      <div class="container">
        <div class="row">
          <div class="social-icons span12">
            <ul>

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
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
              <!-- Begin Template Content -->