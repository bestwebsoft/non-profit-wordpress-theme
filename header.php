<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> >
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> >
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif;
	wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div id="wrapper">
	<header>
		<div class="nonprofit-header">
			<img class="nonprofit-header-bgimg" src="<?php header_image(); ?>" height="<?php echo esc_html( get_custom_header()->height ); ?>" width="<?php echo esc_html( get_custom_header()->width ); ?>" alt="" />
			<div id="nonprofit-header-top">
				<div id="nonprofit-title-slogan">
					<h1 id="nonprofit_title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<p id="nonprofit_slogan"><?php bloginfo( 'description' ); ?></p>
				</div><!-- end div id="nonprofit-title-slogan"  -->
				<div id="search">
					<?php get_search_form(); ?>
				</div><!-- end div id="search"  -->
			</div><!-- end div id="nonprofit-header-top" -->
		</div><!-- end .nonprofit-header -->
		<hr>
	</header><!-- end header -->
	<div class="nonprofit-header-menu">
		<div id="header-bottom" class="nonprofit-nav">
			<nav id="menu" class="nonprofit-site-navigation site-navigation main-navigation">
				<h1 class="nonprofit-assistive-text"> <?php _e( 'Menu', 'non-profit' ); ?> </h1>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</nav>
		</div><!-- end div "header-bottom" -->
		<hr>
	</div>
	<section>
		<div class="nonprofit-header-breadcrumb">
			<div id="headline">
				<p class="nonprofit-headline" id="headline_top"><?php do_action( 'nonprofit_the_breadcrumb' ) ?></p>
				<?php do_action( 'nonprofit_page_title' ) ?>
			</div> <!-- end #hedline -->
			<hr>
		</div>
	</section>
	<?php if ( is_front_page() ) { ?>
	<section>
		<div id="nonprofit_slider">
			<?php get_template_part( 'slider' ); ?>
		</div> <!-- end div id="slider" -->
	</section>
<?php }
