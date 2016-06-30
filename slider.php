<?php
/**
 * The template with code of slider.
 * @subpackage Non profit
 * @since      Non profit 1.0
 */

$args  = array(
	'post_type'           => 'post',
	'meta_key'            => 'nonprofit_add_slide',
	'meta_value'          => 'on',
	'posts_per_page'      => 100,
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => true,
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) { ?>
	<div class="flexslider nonprofit-flexslider">
		<ul class="slides nonprofit-slides">
			<?php add_filter( 'excerpt_more', 'nonprofit_excerpt_for_slider' );
			add_filter( 'excerpt_length', 'nonprofit_length_for_slider' ); ?>
			<?php while ( $query->have_posts() ) {
				$query->the_post(); ?>
				<li>
					<div class="nonprofit-slider-text aligncenter">
						<div class="nonprofit-slider-head aligncenter">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="nonprofit-slider-content aligncenter">
							<?php the_excerpt(); ?>
						</div><!-- .nonprofit-slider-content -->
						<a class="slider-more" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'non-profit' ); ?></a>
					</div><!-- .nonprofit-slider-text -->
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'nonprofit_slider' );
					} ?>
				</li>
			<?php } ?>
			<?php remove_filter( 'excerpt_more', 'nonprofit_excerpt_for_slider' );
			remove_filter( 'excerpt_length', 'nonprofit_length_for_slider' ); ?>
		</ul><!-- .slides -->
	</div><!-- .flexslider -->
<?php }
wp_reset_postdata();
