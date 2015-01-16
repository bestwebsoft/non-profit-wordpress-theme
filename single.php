<?php /**
 * The Template for displaying all single posts.
 *
 * @subpackage NON PROFIT
 * @since non profit 1.0
 */
get_header(); ?>
<div id="nonprofit_container" >
	<div class="nonprofit-article">
		<section>
			<?php if ( have_posts() ) { 
				the_post(); ?>		
					<div id="post_<?php the_ID(); ?>" <?php post_class( 'nonprofit-post' ); ?> > 
						<article> 
							<div class="nonprofit-post-title"> 
								<header>
									<h2><?php the_title(); ?></h2>
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
							<?php if ( has_post_thumbnail()) { ?>
								<div class="nonprofit-post-thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
									<?php the_post_thumbnail( "nonprofit_post" ); ?>
									</a>
									<div class="nonprofit-clear"></div>
								</div>	<!-- end .nonprofit-post-thumbnail --> 
							<?php } ?>					
							<div class="nonprofit-post-content">
								<?php the_content(); ?>
								<div class="nonprofit-clear"></div>
							</div><!-- end .nonprofit-post-content"-content -->					
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
				<nav id="nonprofit_nav_link" class="nonprofit-nav-link nav-single">
					<span class="nonprofit-nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . '&larr;' . '</span> %title' ); ?></span>
					<span class="nonprofit-nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . '&rarr;' . '</span>' ); ?></span>
				</nav><!-- .nav-single -->				
				<?php if ( comments_open() || get_comments_number() ) { ?>
					<div class="nonprofit-comments">
						<?php comments_template(); ?>	
						<div class="nonprofit-border-bottom"></div>
					</div><!-- .nonprofit-comments -->	
				<?php }
			} ?>
		</section>	
	</div> <!-- end .nonprofit-article --> 		
<?php get_sidebar();	
get_footer(); ?>