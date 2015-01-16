<?php
/**
 * The template for displaying Comments
 * The area of the page that contains comments and the comment form.
 *
 * @subpackage Non_Profit
 * @since Non Profit 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
		<h2 class="nonpofit-coments comments-title">
			<?php printf ( _n( 'One thought on %2$s', '%1$s thoughts on %2$s', get_comments_number(),  'nonprofit' ), number_format_i18n( get_comments_number() ), '<span>'. '&ldquo;'. get_the_title() .'&rdquo;'. '</span>' ); ?>
		</h2>	
		<?php if ( get_comment_pages_count() > 5 || get_option( 'page_comments' ) ) { ?>
			<nav id="comment_nav_above" class="navigation comment-navigation nonprofit-nav-link" role="navigation">
				<div class="nonprofit-nav-previous"><?php previous_comments_link(); ?></div>
				<div class="nonprofit-nav-next"><?php next_comments_link(); ?></div>
			</nav><!-- #comment_nav_above -->
		<?php } // Check for comment navigation. ?>
		<ol class="nonpofit-comment-list">
			<?php wp_list_comments( array(
										'callback'	 => 'nonprofit_comment',
										'short_ping' => true,
										) ); ?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav id="comment_nav_below" class="navigation comment-navigation nonprofit-nav-link" role="navigation">
				<div class="nonprofit-nav-previous"> <?php previous_comments_link(); ?></div>
				<div class="nonprofit-nav-next"> <?php next_comments_link(); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php } // Check for comment navigation. 
	} // have_comments() 
	comment_form(); ?>
</div><!-- #comments -->
