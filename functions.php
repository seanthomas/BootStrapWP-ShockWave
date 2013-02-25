<?php
/**
 * Bootstrap functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Updated: September 9, 2012
 */

if (!defined('BOOTSTRAPWP_VERSION'))
define('BOOTSTRAPWP_VERSION', '.90');

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 770; /* pixels */

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */
add_action( 'after_setup_theme', 'bootstrapwp_theme_setup' );
if ( ! function_exists( 'bootstrapwp_theme_setup' ) ):
function bootstrapwp_theme_setup() {
  add_theme_support( 'automatic-feed-links' );
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
    'primary-menu' => __( 'Primary Menu', 'bootstrapwp' ),
    'secondary-menu' => __( 'Secondary Menu', 'bootstrapwp' ),
  ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );
  /**
   * Declaring the theme language domain
   */
   load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');
}
endif;


################################################################################
// Loading All CSS Stylesheets
################################################################################
  function bootstrapwp_css_loader() {
    wp_enqueue_style('bootstrapwp', get_template_directory_uri().'/css/bootstrapwp.css', false ,'0.90', 'all' );
    wp_enqueue_style('prettify', get_template_directory_uri().'/js/google-code-prettify/prettify.css', false ,'1.0', 'all' );
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_css_loader');


################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################
  function bootstrapwp_js_loader() {
       wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'0.90', true );
       wp_enqueue_script('prettifyjs', get_template_directory_uri().'/js/google-code-prettify/prettify.js', array('jquery'),'1.0', true );
       wp_enqueue_script('demojs', get_template_directory_uri().'/js/bootstrapwp.demo.js', array('jquery'),'0.90', true );
       wp_enqueue_script('twitter', get_template_directory_uri().'/js/twitter.js', array('jquery'),'1.0', true ); 
       wp_enqueue_script('functions', get_template_directory_uri().'/js/functions.js', array('jquery'),'1.0', true );
       wp_enqueue_script('jwplayer', get_template_directory_uri().'/includes/jwplayer/jwplayer.js' );      
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_js_loader');

################################################################################
// Load Meta-boxes Plugin
################################################################################

    // Re-define meta box path and URL
    define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/meta-box' ) );
    // Include the meta box script
    require_once RWMB_DIR . 'meta-box.php';
    // Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
    include 'includes/meta-box/config-meta-boxes.php';

/*------------------------------------------*/
/* Options Framework
/*------------------------------------------*/

/**
 * Slightly Modified Options Framework
 */
require_once ('admin/index.php');

/** INCLUDE CUSTOM POST TYPES (Discography) *************************************************/
include_once(TEMPLATEPATH . '/includes/post-types/discography.php');

/*
| -------------------------------------------------------------------
| Top Navigation Bar Customization
| -------------------------------------------------------------------

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bootstrapwp_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'bootstrapwp_page_menu_args' );

/**
 * Get file 'includes/class-bootstrap_walker_nav_menu.php' with Custom Walker class methods
 * */

include 'includes/class-bootstrapwp_walker_nav_menu.php';

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function bootstrapwp_widgets_init() {
  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );

  register_sidebar( array(
    'name' => 'Posts Sidebar',
    'id' => 'sidebar-posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );

  register_sidebar(array(
    'name' => 'Home Left',
    'id'   => 'home-left',
    'description'   => 'Left textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Middle',
    'id'   => 'home-middle',
    'description'   => 'Middle textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Right',
    'id'   => 'home-right',
    'description'   => 'Right textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Footer One',
    'id'   => 'footer-one',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

    register_sidebar(array(
    'name' => 'Footer Two',
    'id'   => 'footer-two',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

     register_sidebar(array(
    'name' => 'Footer Three',
    'id'   => 'footer-three',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

    register_sidebar(array(
    'name' => 'Footer Four',
    'id'   => 'footer-four',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));
}
add_action( 'init', 'bootstrapwp_widgets_init' );


/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
 }

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'standard', 770, 300, true );     // Standard Blog Image
}
/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */
function bootstrapwp_excerpt($more) {
       global $post;
  return '&nbsp; &nbsp;</p><p><a class="btn btn-mini btn-primary btn-readmore" href="'. get_permalink($post->ID) . '">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'bootstrapwp_excerpt');

/* ------------------------------------------------------------------------ */
/* Pagination */

function pagination($pages = '', $range = 2)
{
$showitems = ($range * 2)+1;

global $paged;
if(empty($paged)) $paged = 1;

if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}

if(1 != $pages)
{
echo "<ul>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
}
}

if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
echo "</ul>\n";
}
}


/** Looking to remove this feature **/
if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav

/**
 * Amends avatar class to add img styling
 */

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-polaroid", $class) ;
return $class;
}


if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> class="media" id="li-comment-<?php comment_ID(); ?>">

    <div class="pull-left">
      <?php echo get_avatar($comment, $size = '50'); ?>
    </div>

    <div class="media-body">

    <h4 class="media-heading"><?php printf( __( '%s', 'bootstrap'), get_comment_author_link() ) ?> </h4>

      <small><?php printf(__('%1$s at %2$s', 'bootstrap'), get_comment_date(),  get_comment_time() ) ?><?php edit_comment_link( __( '(Edit)', 'bootstrap'),'  ','' ) ?> &middot; <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></small>

      <?php comment_text() ?>

    </div>

    <?php if ( $comment->comment_approved == '0' ) : ?>
      <em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
      <br />
    <?php endif; ?>

    </li>

	<?php
			break;
	endswitch;
}
endif; // ends check for bootstrapwp_comment()

if ( comments_open() ) {
  if ( $num_comments == 0 ) {
    $comments = __('No Comments');
  } elseif ( $num_comments > 1 ) {
    $comments = $num_comments . __(' Comments');
  } else {
    $comments = __('1 Comment');
  }
  $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
} else {
  $write_comments =  __('Comments are off for this post.');
}

if ( ! function_exists( 'bootstrapwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bootstrap_posted_on to override in a child theme
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_posted_on() {
printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bootstrap' ),
esc_url( get_permalink() ),
esc_attr( get_the_time() ),
esc_attr( get_the_date( 'c' ) ),
esc_html( get_the_date() ),
esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
esc_html( get_the_author() )
);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'bootstrapwp_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bootstrap_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bootstrap_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in bootstrapwp_categorized_blog
 *
 * @since bootstrap 1.2
 */
function bootstrapwp_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bootstrapwp_category_transient_flusher' );
add_action( 'save_post', 'bootstrapwp_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function bootstrapwp_enhanced_image_navigation( $url ) {
	global $post;

	if ( wp_attachment_is_image( $post->ID ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'bootstrapwp_enhanced_image_navigation' );


/*
| -------------------------------------------------------------------
| Checking for Post Thumbnail
| -------------------------------------------------------------------
|
| */
function bootstrapwp_post_thumbnail_check() {
    global $post;
    if (get_the_post_thumbnail()) {
          return true; }
          else { return false; }
}

/*
| -------------------------------------------------------------------
| Setting Featured Image (Post Thumbnail)
| -------------------------------------------------------------------
| Will automatically add the first image attached to a post as the Featured Image if post does not have a featured image previously set.
| */
function bootstrapwp_autoset_featured_img() {

  $post_thumbnail = bootstrapwp_post_thumbnail_check();
  if ($post_thumbnail == true ){
    return the_post_thumbnail();
  }
    if ($post_thumbnail == false ){
      $image_args = array(
                'post_type' => 'attachment',
                'numberposts' => 1,
                'post_mime_type' => 'image',
                'post_parent' => $post->ID,
                'order' => 'desc'
          );
      $attached_image = get_children( $image_args );
             if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
            return the_post_thumbnail();
          } else { return " ";}
        }
      }  //end function


/*
| -------------------------------------------------------------------
| Adding Breadcrumbs
| -------------------------------------------------------------------
|
| */
 function bootstrapwp_breadcrumbs() {

  $delimiter = '<span class="divider">/</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<div class="subhead"><div class="container"><ul class="breadcrumb">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'bootstrapwp') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div><!-- /.subhead --></div><!-- /.container --></ul>';

  }
} // end bootstrapwp_breadcrumbs()
/*
A custom function to echo specified number of categories a
post is filed in.
(Takes number of categories to be displayed as argument)
Written by Satish Gandham
Author URL: http://swiftthemes.com
Contact: http://swiftthemes.com/contact-me/
*/
function swift_list_cats($num){
    $temp=get_the_category();
    $count=count($temp);// Getting the total number of categories the post is filed in.
    for($i=0;$i<$num&&$i<$count;$i++){
        //Formatting our output.
        $cat_string.='<a href=&quot;'.get_category_link( $temp[$i]->cat_ID  ).'&quot;>'.$temp[$i]->cat_name.'</a>';
        if($i!=$num-1&&$i+1<$count)
        //Adding a ',' if it's not the last category.
        //You can add your own separator here.
        $cat_string.=', ';
    }
    echo $cat_string;
}

remove_filter('dbem_notes', 'wpautop');

/*
| -------------------------------------------------------------------
| Event Manager - Adding event attributes
| -------------------------------------------------------------------
|
| */
/**
* add some conditional output conditions for Events Manager
* @param string $replacement
* @param string $condition
* @param string $match
* @param object $EM_Event
* @return string
*/
function filterEventOutputCondition($replacement, $condition, $match, $EM_Event){
    if (is_object($EM_Event)) {
 
        switch ($condition) {
 
            // #_ATT{externallink}
            case 'has_att_externallink':
                if (is_array($EM_Event->event_attributes) && !empty($EM_Event->event_attributes['externallink']))
                    $replacement = preg_replace('/\{\/?has_att_externallink\}/', '', $match);
                else
                    $replacement = '';
                break;

            // #_ATT{soldout}
            case 'has_att_soldout':
                if (is_array($EM_Event->event_attributes) && !empty($EM_Event->event_attributes['soldout']))
                    $replacement = preg_replace('/\{\/?has_att_soldout\}/', '', $match);
                else
                    $replacement = '';
                break;
 
        }
 
    }
 
    return $replacement;
}
 
add_filter('em_event_output_condition', 'filterEventOutputCondition', 10, 4);


/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a bootstrap.
 */