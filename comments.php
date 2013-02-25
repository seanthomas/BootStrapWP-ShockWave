<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to bootstrapwp_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 * 
 * Last Revised: February 4, 2012
 */
?>
	<div id="comments" class="row-fluid">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'bootstrapwp' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'bootstrapwp' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="media-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use bootstrapwp_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define bootstrapwp_comment() and that will be used instead.
				 * See bootstrapwp_comment() in bootstrapwp/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'bootstrapwp_comment' ) );
			?>
		</ol>


	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'bootstrapwp' ); ?></p>
	<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<?php
	
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//Custom Fields
		$fields =  array(
			'author'=> '<div class="controls controls-row"><input class="span3" placeholder=".span3" name="author" type="text" value="' . __('Name (required)', 'bootstrapwp') . '" size="30"' . $aria_req . ' />',
			
			'email' => '<input class="span3" placeholder=".span3"name="email" type="text" value="' . __('E-Mail (required)', 'bootstrapwp') . '" size="30"' . $aria_req . ' />',
			
			'url' 	=> '<input class="span3" placeholder=".span3" name="url" type="text" value="' . __('Website', 'bootstrapwp') . '" size="30" /></p></div>',
		);

		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'title_reply'=>'<h3 class="title"><span>'. __('Leave a reply', 'bootstrapwp') .'</span></h4>',
			'comment_field' => '<div id="respond-textarea"><textarea id="comment" name="comment" aria-required="true" rows="10" tabindex="4"></textarea></div>',
			'comment_notes_after' => ' ',
			'label_submit' => __('Submit comment','bootstrapwp')
		);
		
		// Show Comment Form
		comment_form($comments_args); 
	?>


<?php endif; // Ends comments form ?>

</div><!-- #comments -->
