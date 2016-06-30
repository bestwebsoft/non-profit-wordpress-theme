<?php get_header(); ?>
	<div id="nonprofit_container">
		<div class="nonprofit-article">
			<section>
				<?php if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); ?>
						<div id="post_<?php the_ID(); ?>" <?php post_class( 'nonprofit-post' ); ?> >
							<article>
								<div class="nonprofit-post-title">
									<header>
										<?php $nonprofit_post_format = get_post_format();
										$nonprofit_print_title       = true;
										switch ( $nonprofit_post_format ) {
											case 'link' : ?>
												<h2><a href="<?php echo esc_url( nonprofit_get_link_url() ); ?>"><?php the_title(); ?></a></h2>
												<?php break;
											case 'aside' :
												$nonprofit_print_title = false;
												break;
											case 'status' :
												$nonprofit_print_title = false;
												break;
											case 'quote' :
												$nonprofit_print_title = false;
												break;
											default : ?>
												<h2>
													<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?></a>
												</h2>
												<?php break;
										} ?>
									</header>
								</div><!-- end .nonpofit-post-title -->
								<div class="nonprofit-post-date">
									<p>
										<?php echo __( 'Posted on', 'non-profit' );
										if ( get_the_title() && $nonprofit_print_title ) {
											$archive_year  = get_the_time( 'Y' );
											$archive_month = get_the_time( 'm' ); ?>
											<a href="<?php echo esc_url( get_month_link( $archive_year, $archive_month ) ); ?>">
										<?php } else { ?>
											<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php }
										echo get_the_date(); ?></a>
										<?php if ( has_category() ) {
											echo __( 'in', 'non-profit' ) . '&nbsp;';
											the_category( ', ' );
										}
										edit_post_link( __( 'Edit', 'non-profit' ), '<span class="edit-link">', '</span>' ); ?>
									</p>
								</div><!-- end .nonpofit-post-date -->
								<?php if ( has_post_thumbnail() && ( ! has_post_format( 'image' ) ) ) { ?>
									<div class="nonprofit-post-thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'nonprofit_post' ); ?></a>
									</div>  <!-- end .nonprofit-post-thumbnail -->
								<?php } ?>
								<div class="nonprofit-post-content">
									<?php the_content(); ?>
									<div class="nonprofit-clear"></div>
								</div><!-- end .nonprofit-post-content" -->
								<?php wp_link_pages(); ?>
								<footer>
									<?php if ( has_tag() && ! has_post_format( 'link' ) ) { ?>
										<div class="nonprofit-post-teg">
											<p><?php the_tags( '', ', ', '' ); ?></p>
										</div>  <!-- end .nonprofit-post-teg -->
									<?php } ?> <!-- end for  teg-->
								</footer>
							</article>
						</div><!-- end #post_ -->
						<div class="nonprofit-border-bottom"></div>
					<?php } ?>
					<nav>
						<div id="nonprofit-nav-link" class="nonprofit-nav-link">
							<?php do_action( 'nonprofit_pagination' ); ?>
						</div>
					</nav>
				<?php } else { ?>
					<div class="nonprofit-post nonprofit-no-post">
						<article>
							<header class="nonprofit-post-title">
								<h1><?php _e( 'Nothing Found', 'non-profit' ); ?></h1>
							</header>
							<div class="nonprofit-post-content">
								<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'non-profit' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- end .nonprofit-post-content" -->
						</article>
					</div><!-- end .nonprofit-post .nonprofit-no-post -->
					<div class="nonprofit-border-bottom"></div>
				<?php } ?>
			</section>
		</div><!-- end .nonprofit-article -->
		<?php get_sidebar(); ?>
		<div class="nonprofit-clear"></div>
	</div> <!-- end div id="nonprofit_container" -->
<?php get_footer();
