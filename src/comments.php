<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kevinkissi
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'kevinkissi' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kevinkissi' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kevinkissi' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kevinkissi' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

<ol class="commentlist">
<?php
wp_list_comments( array(
//'style'      => 'ol',
'short_ping' => true,
'avatar_size'=>48,
//'walker'            => null,
//'max_depth'         => '',
'style'             => 'ul',
//'callback'          => null,
//'end-callback'      => null,
//'type'              => 'all',
//'page'              => '',
//'per_page'          => '',
//
//'reverse_top_level' => null,
//'reverse_children'  => '',
//'format'            => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
//'short_ping'        => false,
//'echo'              => true,
) );
?>
</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kevinkissi' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kevinkissi' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kevinkissi' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kevinkissi' ); ?></p>
	<?php endif; ?>

  
</div>    

    
<div class="container">
<div class="row">   

<?php
$mytheme_comment_form_args = array(
    'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" placeholder="" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
		/** This filter is documented in wp-includes/link-template.php */
//     'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
		'id_form'              => '',
		'id_submit'            => '',
		'class_form'           => 'comment-form',
		'class_submit'         => 'comment-submit',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a reply' ),
		'title_reply_to'       => __( 'Leave a reply to %s' ),
		'title_reply_before'   => '<div class="reply-header" >',
		'title_reply_after'    => '</div>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<input name="%1$s" class="comment-submit " type="submit"  value="Post Submit" />',
		'submit_field'         => '<div class="comment-submit-ct col-md-3">%1$s %2$s</div>',
		'format'               => 'xhtml',
);
comment_form( $mytheme_comment_form_args );
?>

</div>    
</div>
<!-- #comments -->
