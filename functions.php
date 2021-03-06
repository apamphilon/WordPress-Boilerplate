<?php
/**
 * wordpress_boilerplate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress_boilerplate
 */

if ( ! function_exists( 'wordpress_boilerplate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpress_boilerplate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wordpress_boilerplate, use a find and replace
	 * to change 'wordpress_boilerplate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wordpress_boilerplate', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
  add_image_size ( 'post', 1335, 467, true );

	// This theme uses wp_nav_menu().
	register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'wordpress_boilerplate' ),
    'footer' => __( 'Footer Nav', 'wordpress_boilerplate' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wordpress_boilerplate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'wordpress_boilerplate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_boilerplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_boilerplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_boilerplate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_boilerplate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordpress_boilerplate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wordpress_boilerplate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wordpress_boilerplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_boilerplate_scripts() {
  // style.css
	wp_enqueue_style( 'wordpress_boilerplate-style', get_stylesheet_uri() );

  // skip link focus fix
	wp_enqueue_script( 'wordpress_boilerplate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  /*
   * If comments are enabled by the user, and we are on a post page,
   * then the comment reply script will be loaded. Otherwise, it will not.
   */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  /*
   * jQuery
   * add version 1 of jQuery
   */
  if( !is_admin() ){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'), array(), null, true);
  }

  // main.min.js
  wp_enqueue_script( 'wordpress_boilerplate-main-min', get_template_directory_uri() . '/js/main.min.js', array ( 'jquery' ), 1, true);

  // modernizr
  wp_enqueue_script( 'wordpress_boilerplate-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', '', '', '');
}
add_action( 'wp_enqueue_scripts', 'wordpress_boilerplate_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom post types.
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Load custom taxonomies.
 */
require get_template_directory() . '/inc/custom-taxonomy.php';

/**
 * Load custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';
