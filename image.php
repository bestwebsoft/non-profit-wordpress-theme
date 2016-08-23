<?php
/**
 * The template for displaying image attachments
 *
 * @subpackage nonprofit
 * @since      nonprofit 1.0
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();
get_header(); ?>
	<div id="nonprofit_container">
		<div class="nonprofit-article">
			<section>
				<?php if ( have_posts() ) {
					the_post(); ?>
					<div id="post_<?php the_ID(); ?>" <?php post_class( 'nonprofit-post' ); ?> >
						<article>
							<div class="nonprofit-post-title">
								<header>
									<h2>
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h2>
								</header>
							</div><!-- end .nonpofit-post-title -->
							<div class="nonprofit-post-date">
								<p><?php echo __( 'Posted on', 'non-profit' ); ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
									<?php echo _x( 'at', 'Image resolution', 'non-profit' ); ?>
									<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" target="_blank" title="<?php _e( 'Open image in full size', 'non-profit' ); ?>"><?php echo $metadata['width'] . ' &times; ' . $metadata['height']; ?></a>
									<?php _e( 'in', 'non-profit' ); ?>
									<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
									<?php edit_post_link( __( 'Edit', 'non-profit' ), '<span class="edit-link">', '</span>' ); ?>
								</p>
							</div>
							<div class="nonprofit-post-thumbnail">
								<?php do_action( 'nonprofit_the_attached_image' ); ?>
								<div class="nonprofit-clear"></div>
							</div>  <!-- end .nonprofit-post-thumbnail -->
							<?php if ( ! empty( $post->post_excerpt ) ) { ?>
								<div class="wp-caption-text">
									<?php the_excerpt(); ?>
								</div>
							<?php } ?>
							<div class="nonprofit-post-content">
								<?php the_content(); ?>
								<div class="nonprofit-clear"></div>
							</div><!-- end .nonprofit-post-content -->
							<footer>
								<nav id="image_navigation" class="nonpofit-navigation image-navigation">
									<div class="nonprofit-atachment-links">
										<div class="previous-image-nonprofit">
											<?php previous_image_link( false, __( 'Previous Image', 'non-profit' ) ); ?>
											<div class="nonprofit-see-prev">
												<?php previous_image_link(); ?>
											</div>
										</div>
										<div class="next-image-nonprofit">
											<?php next_image_link( false, __( 'Next Image', 'non-profit' ) ); ?>
											<div class="nonprofit-see-next">
												<?php next_image_link(); ?>
											</div>
										</div>
									</div><!-- .nonprofit-atachment-links -->
								</nav><!-- #image_navigation -->
								<div class="nonprofit-clear"></div>
							</footer>
						</article>
					</div><!-- end #post_ -->
					<div class="nonprofit-border-bottom"></div>
					<div class="nonprofit-comments">
						<?php if ( comments_open() ) { ?>
							<nav>
								<?php comments_template(); ?>
								<div class="nonprofit-border-bottom"></div>
							</nav>
						<?php } ?>
					</div><!-- .nonprofit-comments -->
				<?php } ?>
			</section>
		</div><!-- .nonprofit-article -->
		<div class="nonprofit-clear"></div>
	</div> <!-- end div id="nonprofit_container" -->
<?php get_footer();
