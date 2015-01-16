<?php get_header(); ?>
<div id="nonprofit_container" >
	<div class='nonprofit-article'>		
		<section>
			<?php if ( have_posts() ) { 	  	
				the_post(); ?>
					<div id="post_<?php the_ID(); ?>" <?php post_class( 'nonprofit-post'); ?> > 
						<article> 	
							<div class="nonprofit-post-title">
								<header>
									<h2><?php the_title(); ?></h2>
								</header>
							</div><!-- end .nonpofit-post-title --> 
							<div class="nonprofit-page-edit">
								<p><?php edit_post_link( __( 'Edit', 'nonprofit' ), '<span class="edit-link">', '</span>' ); ?>
									</p>						
							</div><!-- end .nonprofit-page-edit -->							
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
						</article>
					</div><!-- end #post_ --> 
					<div class="nonprofit-border-bottom"></div>
					<article>
						<div class="nonprofit-comments">
						<?php if( comments_open() ) {
								 comments_template(); ?>
							<div class="nonprofit-border-bottom"></div>
						<?php } ?>			
						</div><!-- .nonprofit-comments -->
					</article>	
			<?php }
			else { ?>
				<article>
					<div class="nonprofit-post-content">
						<header>
							<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'nonprofit' ); ?></p>
						</header>
						<?php get_search_form(); ?>
					</div><!-- end .nonprofit-post-content" -->
				</article>
			<?php } ?>
			<nav>
				<div id="nonprofit_nav_link" class="nonprofit-nav-link">
					<?php posts_nav_link(); ?>
				</div>
			</nav>
		</section>		
	</div>		
<?php get_sidebar();		
get_footer();