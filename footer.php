<footer class="nonprofit-main-footer">
	<div class="nonprofit-footer">
		<div class="nonprofit-footer-powered">
			<p><?php printf( __( 'Powered by %1$s and %2$s', 'non-profit' ), '<a href="' . esc_url( wp_get_theme()->get( 'AuthorURI' ) ) . '">' . wp_get_theme()->get( 'Author' ) . '</a>', '<a href="' . esc_url( 'http://wordpress.org' ) . '">WordPress</a>' ); ?></p>
		</div> <!-- end .nonprofit-footer-powered -->
		<div class="nonprofit-footer-bot">
			<p><span><?php echo '&copy;' . '&nbsp;'; ?></span><?php echo date_i18n( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
		</div><!-- end .nonprofit-footer-bot -->
		<div class="nonprofit-clear"></div>
	</div><!-- end .nonprofit-footer -->
</footer><!-- end footer -->
</div><!-- end #wrapper -->
<?php wp_footer(); ?>
</body>
</html>
