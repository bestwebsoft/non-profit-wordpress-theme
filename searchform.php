<?php
/**
 * The template for displaying search form.
 * @subpackage Non Profit
 * @since      Non Profit 1.0
 */
?>
<div class="nonprofit-search">
	<form action="<?php echo esc_url( home_url() ); ?>" method="get">
		<input type="text" placeholder="<?php _e( 'Enter search keyword', 'non-profit' ); ?>" class="form" name="s" value="<?php echo get_search_query(); ?>">
		<input type="submit" class="header-image" value="">
	</form>
	<div class="nonprofit-clear"></div>
</div><!-- nonprofit_search -->
