<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

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
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


/******************* Custom Code ********************/

add_image_size('banner',1400,650);
add_image_size('episode_big',1400,559);
add_image_size('episode_small',114,78);
add_image_size('episode_medium',274,154,true);
add_image_size('behind',274,154);
add_image_size('shows',183,274);
add_image_size('tv_background',1400,283);


/***************************************************/


$labels = array(
		'name'              => _x( 'Episode category', 'Episode category' ),
		'singular_name'     => _x( 'Episode category', 'Episode category' ),
		'search_items'      => __( 'Search Episode category' ),
		'all_items'         => __( 'All Episode category' ),
		'parent_item'       => __( 'Parent Episode category' ),
		'parent_item_colon' => __( 'Parent Episode category:' ),
		'edit_item'         => __( 'Edit Episode category' ),
		'update_item'       => __( 'Update Episode category' ),
		'add_new_item'      => __( 'Add New Episode category' ),
		'new_item_name'     => __( 'New Episode category' ),
		'menu_name'         => __( 'Episode category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'episode_category' ),
	);

	register_taxonomy( 'episode_category', array( 'episode_category' ), $args );

function codex_episode() {
  $labels = array(
    'name' => 'Episode Section',
    'singular_name' => 'Episode Section',
    'add_new' => 'Add Episode Section',
    'add_new_item' => 'Add New Episode Section',
    'edit_item' => 'Edit Episode Section',
    'new_item' => 'New Episode Section',
    'all_items' => 'All Episode Section',
    'view_item' => 'View Episode Section',
    'search_items' => 'Search Episode Section',
    'not_found' =>  'No Episode Section found',
    'not_found_in_trash' => 'No Episode Section found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Episode'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'episode' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 10,
	'taxonomies' => array('episode_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'episode', $args );
}
add_action( 'init', 'codex_episode' );


/********************************************************************************/

function codex_custom_slider() {
$labels = array(
'name' => 'Slider',
'singular_name' => 'Slider',
'add_new' => 'Add Slider',
'add_new_item' => 'Add New Slider',
'edit_item' => 'Edit Slider',
'new_item' => 'New Slider',
'all_items' => 'All Slider',
'view_item' => 'View Slider',
'search_items' => 'Search Slider',
'not_found' => 'No Slider',
'not_found_in_trash' => 'No Slider',
'parent_item_colon' => '',
'menu_name' => 'Slider'
);

$args = array(
'labels' => $labels, 
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'slider' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 10,
'taxonomies' => array('slider_category'),
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'slider', $args );
}
add_action( 'init', 'codex_custom_slider' );


/********************************************************************************/




$labels = array(
		'name'              => _x( 'Clips category', 'Clips category' ),
		'singular_name'     => _x( 'Clips category', 'Clips category' ),
		'search_items'      => __( 'Search Clips category' ),
		'all_items'         => __( 'All Clips category' ),
		'parent_item'       => __( 'Parent Clips category' ),
		'parent_item_colon' => __( 'Parent Clips category:' ),
		'edit_item'         => __( 'Edit Clips category' ),
		'update_item'       => __( 'Update Clips category' ),
		'add_new_item'      => __( 'Add New Clips category' ),
		'new_item_name'     => __( 'New Clips category' ),
		'menu_name'         => __( 'Clips category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'clips_category' ),
	);

	register_taxonomy( 'clips_category', array( 'clips_category' ), $args );

function codex_clips() {
  $labels = array(
    'name' => 'Clips Section',
    'singular_name' => 'Clips Section',
    'add_new' => 'Add Clips Section',
    'add_new_item' => 'Add New Clips Section',
    'edit_item' => 'Edit Clips Section',
    'new_item' => 'New Clips Section',
    'all_items' => 'All Clips Section',
    'view_item' => 'View Clips Section',
    'search_items' => 'Search Clips Section',
    'not_found' =>  'No Clips Section found',
    'not_found_in_trash' => 'No Clips Section found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Clips'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'clips' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 10,
	'taxonomies' => array('clips_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'clips', $args );
}
add_action( 'init', 'codex_clips' );



/********************************************************************************/




$labels = array(
		'name'              => _x( 'Behind category', 'Behind category' ),
		'singular_name'     => _x( 'Behind category', 'Behind category' ),
		'search_items'      => __( 'Search Behind category' ),
		'all_items'         => __( 'All Behind category' ),
		'parent_item'       => __( 'Parent Behind category' ),
		'parent_item_colon' => __( 'Parent Behind category:' ),
		'edit_item'         => __( 'Edit Behind category' ),
		'update_item'       => __( 'Update Behind category' ),
		'add_new_item'      => __( 'Add New Behind category' ),
		'new_item_name'     => __( 'New Behind category' ),
		'menu_name'         => __( 'Behind category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'behind_category' ),
	);

	register_taxonomy( 'behind_category', array( 'behind_category' ), $args );

function codex_behind() {
  $labels = array(
    'name' => 'Behind',
    'singular_name' => 'Behind',
    'add_new' => 'Add Behind',
    'add_new_item' => 'Add New Behind',
    'edit_item' => 'Edit Behind',
    'new_item' => 'New Behind',
    'all_items' => 'All Behind',
    'view_item' => 'View Behind',
    'search_items' => 'Search Behind',
    'not_found' =>  'No Behind found',
    'not_found_in_trash' => 'No Behind found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Behind The Scene'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'behind' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 10,
	'taxonomies' => array('behind_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'behind', $args );
}
add_action( 'init', 'codex_behind' );



/***************************************************************************/

function codex_custom_shows() {
$labels = array(
'name' => 'Shows',
'singular_name' => 'Shows',
'add_new' => 'Add Shows',
'add_new_item' => 'Add New Shows',
'edit_item' => 'Edit Shows',
'new_item' => 'New Shows',
'all_items' => 'All Shows',
'view_item' => 'View Shows',
'search_items' => 'Search Shows',
'not_found' => 'No Shows',
'not_found_in_trash' => 'No Shows',
'parent_item_colon' => '',
'menu_name' => 'TV Shows'
);

$args = array(
'labels' => $labels, 
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'shows' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 10,
'taxonomies' => array('shows_category'),
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'shows', $args );
}
add_action( 'init', 'codex_custom_shows' );


/*********************************************************************************/


function codex_custom_movies() {
$labels = array(
'name' => 'Movies',
'singular_name' => 'Movies',
'add_new' => 'Add Movies',
'add_new_item' => 'Add New Movies',
'edit_item' => 'Edit Movies',
'new_item' => 'New Movies',
'all_items' => 'All Movies',
'view_item' => 'View Movies',
'search_items' => 'Search Movies',
'not_found' => 'No Movies',
'not_found_in_trash' => 'No Movies',
'parent_item_colon' => '',
'menu_name' => 'Watch Movies'
);

$args = array(
'labels' => $labels, 
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'movies' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 10,
'taxonomies' => array('movies_category'),
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'movies', $args );
}
add_action( 'init', 'codex_custom_movies' );


/*********************************************************************************/



$labels = array(
		'name'              => _x( 'Cast category', 'Cast category' ),
		'singular_name'     => _x( 'Cast category', 'Cast category' ),
		'search_items'      => __( 'Search Cast category' ),
		'all_items'         => __( 'All Cast category' ),
		'parent_item'       => __( 'Parent Cast category' ),
		'parent_item_colon' => __( 'Parent Cast category:' ),
		'edit_item'         => __( 'Edit Cast category' ),
		'update_item'       => __( 'Update Cast category' ),
		'add_new_item'      => __( 'Add New Cast category' ),
		'new_item_name'     => __( 'New Cast category' ),
		'menu_name'         => __( 'Cast category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'cast_category' ),
	);

	register_taxonomy( 'cast_category', array( 'cast_category' ), $args );

function codex_cast() {
  $labels = array(
    'name' => 'Cast',
    'singular_name' => 'Cast',
    'add_new' => 'Add Cast',
    'add_new_item' => 'Add New Cast',
    'edit_item' => 'Edit Cast',
    'new_item' => 'New Cast',
    'all_items' => 'All Cast',
    'view_item' => 'View Cast',
    'search_items' => 'Search Cast',
    'not_found' =>  'No Cast found',
    'not_found_in_trash' => 'No Cast found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'The Cast'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cast' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 10,
	'taxonomies' => array('cast_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'cast', $args );
}
add_action( 'init', 'codex_cast' );


/*****************************************************************************************/




if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;



/********************************************************************************/




$labels = array(
		'name'              => _x( 'Wallpaper category', 'Wallpaper category' ),
		'singular_name'     => _x( 'Wallpaper category', 'Wallpaper category' ),
		'search_items'      => __( 'Search Wallpaper category' ),
		'all_items'         => __( 'All Wallpaper category' ),
		'parent_item'       => __( 'Parent Wallpaper category' ),
		'parent_item_colon' => __( 'Parent Wallpaper category:' ),
		'edit_item'         => __( 'Edit Wallpaper category' ),
		'update_item'       => __( 'Update Wallpaper category' ),
		'add_new_item'      => __( 'Add New Wallpaper category' ),
		'new_item_name'     => __( 'New Wallpaper category' ),
		'menu_name'         => __( 'Wallpaper category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'wallpaper_category' ),
	);

	register_taxonomy( 'wallpaper_category', array( 'wallpaper_category' ), $args );

function codex_wallpaper() {
  $labels = array(
    'name' => 'Wallpaper Section',
    'singular_name' => 'Wallpaper Section',
    'add_new' => 'Add Wallpaper Section',
    'add_new_item' => 'Add New Wallpaper Section',
    'edit_item' => 'Edit Wallpaper Section',
    'new_item' => 'New Wallpaper Section',
    'all_items' => 'All Wallpaper Section',
    'view_item' => 'View Wallpaper Section',
    'search_items' => 'Search Wallpaper Section',
    'not_found' =>  'No Wallpaper Section found',
    'not_found_in_trash' => 'No Wallpaper Section found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Wallpaper'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'wallpaper' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 10,
	'taxonomies' => array('wallpaper_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'wallpaper', $args );
}
add_action( 'init', 'codex_wallpaper' );



/********************************************************************************/


/*excerpt type in content*/

function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content); 
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}


/**************************************************************************************/

//REMOVE ADMIN BAR

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
show_admin_bar(false);
}
}




/*-----------------------------*/
function wpLoginForm() 
{

  	
  if ( isset( $_POST['wpLoginForm_nonce'] ) && wp_verify_nonce( $_POST['wpLoginForm_nonce'], 'wpLoginForm_html' ) ) 
  {
	$username = sanitize_text_field($_POST['username']);
	$password = $_POST['user_pass'];
	
	if ( username_exists( $username ) ) 
	{

	   $user = get_user_by( 'login', $username );
       /*
	   echo "<pre>";
       print_r($user);
	   echo "</pre>";
	   */
	   if ( $user && wp_check_password( $password, $user->data->user_pass, $user->ID) ) 
		{
		$login_data = array();
		$login_data['user_login'] = $username;
		$login_data['user_password'] = $password;
		$login_data['remember'] = $remember;
		wp_signon( $login_data, false );
	    
		echo "3"; 

		}
		else 
		{

		echo "2";

		}
	   
	   
	}
	else
	{
		echo "1";
	}
  
   die(); 

  }
 
}
add_action( 'wp_ajax_wpLoginForm', 'wpLoginForm' );
add_action( 'wp_ajax_nopriv_wpLoginForm', 'wpLoginForm' );


// Registeration Form


function wpRegisterForm() 
{

  if ( isset( $_POST['wpRegister_nonce'] ) && wp_verify_nonce( $_POST['wpRegister_nonce'], 'wpRegister_html' ) ) 
  {
	$userfname = sanitize_text_field($_POST['userFname']);
	$userlname = sanitize_text_field($_POST['userLname']);
	$username = sanitize_text_field($_POST['userName']);
	$email = sanitize_email($_POST['userEmail']);
	$password = $_POST['userPassword'];
	
	if (username_exists($username)) {

	  echo "1";

	}
	else if( email_exists( $email )) {

	  echo "2";

	}
	else
	{
		
    $user_id=wp_create_user( $username, $password, $email );
	update_user_meta( $user_id, "first_name", $userfname ); 
	update_user_meta( $user_id, "last_name", $userlname); 
    
	$from = get_option('admin_email');
    $headers = 'From: '.$from . "\r\n";
    $subject = "Registration successful";
    $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $password";
    wp_mail( $email, $subject, $msg, $headers );
	
	
    $login_data = array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    wp_signon( $login_data, false );
	echo "3";	
		
	}	
	
  
  die(); 

 }
}
add_action( 'wp_ajax_wpRegisterForm', 'wpRegisterForm' );
add_action( 'wp_ajax_nopriv_wpRegisterForm', 'wpRegisterForm' );



// LOGIN LOGO AND LINK


function my_loginlogo() {
  echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_template_directory_uri() . '/images/logo.jpg) !important;
      	
	background-size: 57% !important;
    height:85px;
	width: 100% !important;
    }
    .login h1 a:focus{box-shadow:none !important;}
  </style>';
}
add_action('login_head', 'my_loginlogo');

 function put_my_url(){
    return site_url();
    }
    add_filter('login_headerurl', 'put_my_url');
	
	
	
// Image Size Functions
add_image_size( 'c_synop', 1400, 500, true);
add_image_size( 'cast', 229, 232, true);
add_image_size( 'gallery', 229, 232,true);
add_image_size( 'behind', 315, 250,true);

// numeric pageination

function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
     }
}

