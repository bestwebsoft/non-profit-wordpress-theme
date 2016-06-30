<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Non Profit
 * @since      Non Profit 1.0
 */
get_header(); ?>
	<div id="nonprofit_container">
		<div class="nonprofit-article">
			<div id="post_<?php the_ID(); ?>" class="nonprofit-post">
				<header class="nonprofit-post-title">
					<h1><?php _e( 'Not Found', 'non-profit' ); ?></h1>
				</header>
				<div class="nonprofit-post-content">
					<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'non-profit' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .nonprofit-post-content -->
			</div><!-- .nonprofit-post -->
			<div class="nonprofit-border-bottom"></div>
		</div><!-- .nonprofit-article -->
		<?php get_sidebar(); ?>
		<div class="nonprofit-clear"></div>
	</div> <!-- end div id="nonprofit_container" -->
<?php get_footer();
