
			<div class="nonprofit-clear"></div>
		</div> <!-- end div id="nonprofit_container" -->	
		<footer class="nonprofit-main-footer">
			<div class="nonprofit-footer">
				<div class="nonprofit-footer-powered">
					<p><?php  echo __( 'Powered by', 'nonprofit' ) . '&nbsp;'; ?><a href="<?php echo esc_url( wp_get_theme()->get( 'AuthorURI' ) ); ?>">BestWebSoft</a> <?php  _e( 'and', 'nonprofit' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>">WordPress</a></p>
				</div> <!-- end .nonprofit-footer-powered -->
				<div class="nonprofit-footer-bot">
					<p><span><?php echo  '&copy;'.'&nbsp;'; ?></span><?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
				</div><!-- end .nonprofit-footer-bot -->
				<div class="nonprofit-clear"></div>
			</div><!-- end .nonprofit-footer -->
		</footer><!-- end footer -->
	</div><!-- end #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
