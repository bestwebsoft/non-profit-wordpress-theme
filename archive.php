<?php
/**
 * The template for displaying Archive pages
 *
 * @subpackage Non Profit
 * @since Non Profit 1.0
 */
get_header(); ?>
<div id="nonprofit_container">
	<div class="nonprofit-article">
		<section>
			<?php if ( have_posts() ) {  
				while( have_posts() ) { 
					the_post() ;?>
						<div id="post_<?php the_ID(); ?>" <?php post_class( 'nonprofit-post' ); ?> > 
							<article>
								<div class="nonprofit-post-title"> 
									<header>
										<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> <?php the_title(); ?></a></h2>
									</header>
								</div><!-- end .nonpofit-post-title --> 
								<div class="nonprofit-post-date">
									<p><?php echo __( 'Posted on', 'nonprofit' ). '&nbsp;';
										if ( get_the_title() ) {
											$archive_year  = get_the_time( 'Y' ); 
											$archive_month = get_the_time( 'm' ); 
											$archive_day   = get_the_time( 'd' ); ?>
											<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"> 
										<?php } 
										else { ?>
											<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" >
										<?php } 
										the_time( 'd M, Y' ); ?></a>
										<?php if ( has_category() ) 
											echo '&nbsp;' . __( 'in', 'nonprofit' ) . '&nbsp;' ;
										the_category( ', ' );
										edit_post_link( __( 'Edit', 'nonprofit' ), '<span class="edit-link">', '</span>' ); ?>
									</p>			
								</div><!-- end .nonpofit-post-date --> 
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="nonprofit-post-thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'nonprofit_post' ); ?></a>
									</div>	<!-- end .nonprofit-post-thumbnail --> 
								<?php } ?>
								<div class="nonprofit-post-content">
									<?php the_excerpt(); ?>
									<div class="nonprofit-clear"></div>
								</div><!-- end .nonprofit-post-content" -->
								<?php wp_link_pages(); ?>							
								<footer>
									<?php if ( has_tag() ) { ?>
										<div class="nonprofit-post-teg">
											<p><?php the_tags( "", ", ", "" ); ?></p>
										</div>	<!-- end .nonprofit-post-teg --> 
									<?php } ?> <!-- end for  teg-->
								</footer>
							</article>
						</div><!-- end #post --> 
					<div class="nonprofit-border-bottom"></div>
				<?php } 	
			}
			else { ?>
				<div class="nonprofit-post nonprofit-no-post"> 	
					<article>
						<header class="nonprofit-post-title">
							<h1><?php _e( 'Nothing Found', 'nonprofit' ); ?></h1>
						</header>
						<div class="nonprofit-post-content">
							<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'nonprofit' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- end .nonprofit-post-content" -->
					</article>
				</div><!-- .nonprofit-post .nonprofit-no-post -->		
				<div class="nonprofit-border-bottom"></div>
			<?php }?>
			<div id="nonprofit_nav_link" class="nonprofit-nav-link">
				<nav>
					<?php do_action( 'nonprofit_pagination' ); ?>
				</nav>
			</div><!-- .nonprofit-nav-link -->		
		</section>	
	</div> <!-- .nonprofit-article -->					
<?php get_sidebar();
get_footer();
