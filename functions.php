<?php
/**
 *Functions and definitions.
 *
 *
 * @subpackage Non Profit
 * @since      Non Profit
 */
/*
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620;
}
/**
 *Theme setup.
 *
 */
function nonprofit_setup() {
	/* This theme styles the visual editor with editor-style.css to match the theme style. */
	add_editor_style();
	/* Makes Non Profit available for translation. */
	load_theme_textdomain( 'non-profit', get_template_directory() . '/languages' );
	/* This theme supports all available post formats */
	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
	) );
	/* This theme uses post thumbnails */
	add_theme_support( 'post-thumbnails' );
	/* This theme uses slider */
	add_theme_support( 'nonprofit_slider' );
	/* This theme uses wp_nav_menu() in one location. */
	register_nav_menu( 'header-menu', __( 'Header Menu', 'non-profit' ) );
	/* Adds RSS feed links to <head> for posts and comments. */
	add_theme_support( 'automatic-feed-links' );
	/* This theme uses body background */
	$defaults = array(
		'default-color'          => 'f7f7f7',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $defaults );
	/* This theme uses custom header */

	$args = array(
		'width'              => 1920,
		'height'             => 126,
		'flex-width'         => true,
		'default-image'      => '',
		'uploads'            => true,
		'header-text'        => true,
		'default-text-color' => '#4a4a4a',
		'wp-head-callback'   => 'nonprofit_header_style',
	);
	add_theme_support( 'custom-header', $args );
	/* Set size of thumbnails */
	add_image_size( 'nonprofit_post', 560, 9999 );
	/* Set size of slider */
	add_image_size( 'nonprofit_slider', 1920, 385, true );
	add_theme_support( 'title-tag' );
}

/**
 * Style the text displayed on the blog.
 *
 */
function nonprofit_header_style() {
	$text_color   = get_header_textcolor();
	$display_text = display_header_text();
	/* If no custom options for text are set, let's bail. */
	if ( HEADER_TEXTCOLOR == $text_color ) {
		return;
	}
	/* If we get this far, we have custom styles. Let's do this. */ ?>
	<style type="text/css">
		<?php if ( 'blank' == $text_color ) { /* Has the text been hidden? */?>
			#nonprofit_title {
				position: relative;
			}
		<?php } else { /* If the user has set a custom color for the text use that */ ?>
			#nonprofit_title a,
			#nonprofit_slogan {
				color: <?php echo '#' . esc_html( $text_color ); ?> !important;
			}
		<?php }
		if ( ! $display_text ) { /* Display text or not */ ?>
			#nonprofit_title,
			#nonprofit_slogan {
				display: none;
			}

			#search {
				float: right;
			}
		<?php } ?>
	</style>
<?php } /*nonprofit_header_style */

/**
 * Register our sidebars and widgetized areas.
 *
 */
function nonprofit_register_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'non-profit' ),
		'id'            => 'right_nonprofit',
		'before_widget' => '<div class="nonprofit-widget"><div class="widget">',
		'after_widget'  => '</div><div class="nonprofit-border-bottom" ></div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4><div class="title-botom"></div>',
	) );
}

/**
 *Add metabox for slider
 *
 */
function nonprofit_metabox_for_slider() {
	add_meta_box( 'nonprofit_checkbox_for_slider', __( 'Add to slider', 'non-profit' ), 'nonprofit_metabox_for_slider_callback', 'post', 'side', 'default' );
}

/**
 *Our customize metabox.
 *
 */
function nonprofit_metabox_for_slider_callback() {
	global $post;
	$screen = get_current_screen(); ?>
	<input type='checkbox' name='nonprofit_add_slide' id='nonprofit_add_slide' value='on' <?php checked( get_post_meta( $post->ID, 'nonprofit_add_slide', true ), 'on' ); ?>/>
	<label for='nonprofi_add_slide'><?php echo __( 'To add this', 'non-profit' ) . '&nbsp;' . $screen->post_type . '&nbsp;' . __( 'into the slider, mark it', 'non-profit' ); ?></label>
<?php }

/**
 *Add and save meta for post.
 *
 */
function nonprofit_save_post_meta_for_slider( $post_id ) {
	global $post, $post_id;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	if ( wp_is_post_revision( $post_id ) ) {
		return $post_id;
	}
	if ( null != $post ) {
		if ( ( isset( $_POST['nonprofit_add_slide'] ) ) && ( 'on' == $_POST['nonprofit_add_slide'] ) ) {
			update_post_meta( $post->ID, 'nonprofit_add_slide', esc_html( trim( $_POST['nonprofit_add_slide'] ) ) );
		} else {
			update_post_meta( $post->ID, 'nonprofit_add_slide', 'off' );
		}
	}
}

function nonprofit_fonts_url() {
	$fonts_url = '';
	$subsets   = 'latin,latin-ext';
	$fonts     = '';
	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'non-profit' ) ) {
		$fonts = 'Open Sans:400,600,700,800';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'non-profit' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( $fonts ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Proper way to enqueue scripts and styles
 *
 */
function nonprofit_scripts() {
	//sites with threaded comments (when in use).
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'nonprofit-fonts', nonprofit_fonts_url(), array(), null );
	wp_enqueue_style( 'nonprofit-style', get_stylesheet_uri() );
	wp_enqueue_script( 'nonprofit-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	wp_enqueue_script( 'nonprofit-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_script( 'nonprofit-html5', get_template_directory_uri() . '/js/html5shiv.js' );
	wp_script_add_data( 'nonprofit-html5', 'conditional', 'lt IE 9' );
	/*array with elements to localize in scripts*/
	$script_localization = array(
		'choose_file'          => __( 'Choose file', 'non-profit' ),
		'file_is_not_selected' => __( 'File is not selected', 'non-profit' ),
		'nonprofit_home_url'   => esc_url( home_url() ),
	);
	wp_localize_script( 'nonprofit-script', 'script_loc', $script_localization );/*localization in scripts*/
}

/**
 *Our Breadcrumb for header.
 *
 */
function nonprofit_the_breadcrumb() {
	global $post;
	if ( ! is_front_page() ) { ?>
		<a href='<?php echo esc_url( home_url() ); ?>'><?php _e( 'Home', 'non-profit' ); ?></a> /
		<?php if ( is_category() || is_single() ) {
			/*if single page to check for parents*/
			if ( is_single() ) {
				if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) {
					echo the_title() . ' / ' . esc_html( trim( $_GET['page'] ) );
				} elseif ( is_attachment() ) {
					echo the_title();
				} elseif ( is_singular( 'portfolio' ) ) {
					echo the_title();
				} elseif ( is_singular( 'gallery' ) ) {
					echo the_title();
				} else {
					echo get_the_title();
				}
			} /*if page category print category*/
			elseif ( is_category() ) {
				echo single_cat_title();
			}
		} elseif ( is_tag() ) { /*if page tag print tag*/
			echo single_tag_title( '', false );
		} elseif ( is_page() ) {
			/*Reverse post ancestors if it has*/
			if ( $post->ancestors ) {
				$ancestors = array_reverse( $post->ancestors );
				for ( $i = 0; $i < count( $ancestors ); $i ++ ) {
					if ( 0 == $i ) {
						echo '<a href=' . esc_url( get_permalink( $ancestors[ $i ] ) ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>' . ' / ';
					} else {
						echo '<a href=' . esc_url( get_permalink( $ancestors[ $i ] ) ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>' . ' / ';
					}
				}
			} else {
				$ancestors = get_the_title();
			}
			/*Display elements of array as breadcrumbs*/
			echo get_the_title();
		} /*if page search*/
		elseif ( is_search() ) {
			echo get_search_query();
		} /*if page archive*/
		elseif ( is_archive() ) {
			if ( is_author() ) {
				echo __( 'Author archives', 'non-profit' );
			} else {
				echo get_the_date( 'F Y' );
			}
		} /*if Page not found*/
		elseif ( is_404() ) {
			_e( 'Page not found', 'non-profit' );
		}
	} else { ?>
		<a href='<?php echo esc_url( home_url() ); ?>'><?php _e( 'Home', 'non-profit' ); ?></a>
	<?php }
} // end nonprofit_the_breadcrumb

/**
 *Our page title in header.
 *
 */
function nonprofit_page_title() {
	global $post;
	$page_title = null;
	if ( ! is_front_page() ) {
		/*Check page and return archives name or else*/
		if ( is_category() ) {
			$page_title = sprintf( __( 'Category Archives: %s', 'non-profit' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$page_title = sprintf( __( 'Tag Archives: %s', 'non-profit' ), single_tag_title( '', false ) );
		} elseif ( is_search() ) {
			$page_title = sprintf( __( 'Search Results for:', 'non-profit' ) . '&nbsp;' . get_search_query() );
		} elseif ( is_archive() ) {
			if ( is_author() ) {
				$page_title = sprintf( __( 'All posts by %s', 'non-profit' ), get_the_author() );
			} else {
				if ( is_day() ) {
					$page_title = sprintf( __( 'Daily Archives: %s', 'non-profit' ), get_the_date() );
				} elseif ( is_month() ) {
					$page_title = sprintf( __( 'Monthly Archives: %s', 'non-profit' ), get_the_date( 'F Y' ) );
				} elseif ( is_year() ) {
					$page_title = sprintf( __( 'Yearly Archives: %s', 'non-profit' ), get_the_date( 'Y' ) );
				} else {
					$page_title = __( 'Archives', 'non-profit' );
				}
			}
		} elseif ( is_404() ) {
			$page_title = __( 'Page not found', 'non-profit' );
		} elseif ( is_singular( 'portfolio' ) ) {
			$page_title = __( 'Portfolio', 'non-profit' );
		} elseif ( is_singular( 'gallery' ) ) {
			$page_title = __( 'Gallery', 'non-profit' );
		} elseif ( is_page() ) {
			$page_title = get_the_title();
		}
	}
	if ( ! empty( $page_title ) ) {
		echo '<p class="nonprofit-headline" id="headline_bottom">' . $page_title . '</p>';
	}

}

/**
*Our excerpt in the slider.
*
*/
function nonprofit_excerpt_for_slider( $more ) {
	return ''; //remove the ellipsis in the slider.
}/* new_excerpt_more */

function nonprofit_length_for_slider( $length ) {
	return 25; //number of input words in the slider.
}/* new_excerpt_length */

/**
 *Our comments
 *
 */
function nonprofit_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
			// display trackbacks differently than normal comments. ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'non-profit' );
				comment_author_link();
				edit_comment_link( __( 'Edit', 'non-profit' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php break;
		default : ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<div class="comment-meta commentmetadata">
						<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ) ?>"><?php echo get_comment_date() . '&nbsp;' . __( 'at', 'non-profit' ) . '&nbsp;' . get_comment_time(); ?></a><?php edit_comment_link( __( 'Edit', 'non-profit' ) ) ?>
					</div>
					<cite class="fn"><?php echo get_comment_author_link(); ?></cite>&nbsp;<span class="says"><?php _e( 'says:', 'non-profit' ); ?> </span>
				</div>
				<?php if ( '0' == $comment->comment_approved ) { ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'non-profit' ) ?></em>
					<br />
				<?php } ?>
				<div class="nonprofit-coments-text">
					<?php comment_text() ?>
				</div>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					) ) ) ?>
				</div>
			</div>
			<?php break;
	endswitch; // end comment_type check
}

/**
 *Our format for image page
 *
 */
function nonprofit_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'nonprofit_attachment_size', array( 560, 560 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids      = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => 999,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
		'no_found_rows'  => true,
	) );
	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		$next_id = false;
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		} else { // or get the URL of the first image attachment.
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}
	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}

/**
 *Numbered Pagination
 *
 */
function nonprofit_pagination() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $wp_query->max_num_pages,
	) );
}

/**
 * Return the post URL.
 *
 */
function nonprofit_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 *Theme setup.
 *
 */
add_action( 'after_setup_theme', 'nonprofit_setup' );
/**
 * Register our sidebars and widgetized areas.
 *
 */
add_action( 'widgets_init', 'nonprofit_register_sidebar' );
/**
 *Add metabox for slider
 *
 */
add_action( 'add_meta_boxes', 'nonprofit_metabox_for_slider' );
/**
 *Add and save meta for post.
 *
 */
add_action( 'save_post', 'nonprofit_save_post_meta_for_slider' );
/**
 * Proper way to enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'nonprofit_scripts' );

/**
 *Our Breadcrumb for header.
 *
 */
add_action( 'nonprofit_the_breadcrumb', 'nonprofit_the_breadcrumb' );
/**
 *Our page title in header.
 *
 */
add_action( 'nonprofit_page_title', 'nonprofit_page_title' );
/**
 *Our format for image page
 *
 */
add_action( 'nonprofit_the_attached_image', 'nonprofit_the_attached_image' );
/**
 *Numbered Pagination
 *
 */
add_action( 'nonprofit_pagination', 'nonprofit_pagination' );
/**
 *Our excerpt in the slider.
 *
 */
add_filter( 'excerpt_more', 'nonprofit_excerpt_for_slider' );
add_filter( 'excerpt_length', 'nonprofit_length_for_slider' );
