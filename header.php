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
	<meta charset="<?php bloginfo ( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if lt IE 9]> 
	   <script src="<?php echo get_template_directory_uri() . '/js/scripts.js'; ?> >"</script> 
	  <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div id="wrapper">
		<header> 
			<div class="nonprofit-header">
				<img class="nonprofit-header-bgimg" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<div id="nonprofit-header-top" >
					<div  id="nonprofit-title-slogan" >
						<h1 id="nonprofit_title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<p id="nonprofit_slogan"><?php bloginfo( 'description' ); ?></p>					
					</div><!-- end div id="nonprofit-title-slogan"  -->
					<div id="saerch" >
						<?php get_search_form(); ?>
					</div><!-- end div id="saerch"  -->							
				</div><!-- end div id="nonprofit-header-top" -->
			</div><!-- end .nonprofit-header -->
			<hr>
		</header><!-- end header -->
		<div class="nonprofit-header-menu">
			<div id="header-bottom" class="nonprofit-nav">
				<nav id="menu" class="nonprofit-site-navigation site-navigation main-navigation">	
					<h1 class="nonprofit-assistive-text"> <?php _e( 'Menu', 'nonprofit' ); ?> </h1>
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</nav>
			</div><!-- end div "header-bottom" -->
			<hr>
		</div>
		<section>
			<div class="nonprofit-header-breadcrumb">		
				<div id="headline" >
					<p class="nonprofit-headline" id="headline_top"><?php do_action( 'nonprofit_the_breadcrumb' ) ?></p>
					<p class="nonprofit-headline" id="headline_bottom"><?php do_action( 'nonprofit_page_title' ) ?></p>
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
		<?php } ?>
	
