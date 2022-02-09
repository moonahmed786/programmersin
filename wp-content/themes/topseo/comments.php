<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h3 class="comment-total-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'topseo' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'topseo' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( ' Older Comments', 'topseo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments ', 'topseo' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'type' => 'comment',
					'callback' => 'topseo_comment_list'
				) );
			?>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'topseo' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( ' Older Comments', 'topseo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments ', 'topseo' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // have_comments() ?>
	<!-- comment form -->
	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'topseo' ); ?></p>
	<?php else :
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$required_text = '';
		$fields = array(
			'author' =>
				'<input id="author" type="text" name="author" placeholder="'.esc_attr__('Name', 'topseo').'" value="' . esc_attr( $commenter['comment_author'] ).'" '.$aria_req.'>',

			'email' =>
				'<input id="email" type="email" name="email" placeholder="'.esc_attr__('Email Address', 'topseo').'" value="' . esc_attr(  $commenter['comment_author_email'] )  . '" '.$aria_req.'>',

			'url' =>
				'<input id="url" name="url" class="form-control" type="text" placeholder="'. esc_attr__('Website', 'topseo'). '" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'"  />',
		);

		$args = array(
			'comment_field' =>  '<textarea id="comment" name="comment" placeholder="'.esc_attr__('Comment', 'topseo').'" '.$aria_req.'>' .
				'</textarea>',
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);
		 comment_form($args); ?>
	<?php endif; ?>



</div><!-- #comments -->
