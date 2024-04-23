<?php
/**
 * Blankslate_Child_Speakup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blankslate_Child_Speakup
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blankslate_child_speakup_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blankslate_Child_Speakup, use a find and replace
	 * to change 'blankslate_child_speakup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('blankslate_child_speakup', get_stylesheet_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	// register_nav_menus(
	// 	array(
	// 		'menu-1' => esc_html__('Primary', 'blankslate_child_speakup'),
	// 	)
	// );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blankslate_child_speakup_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'blankslate_child_speakup_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blankslate_child_speakup_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blankslate_child_speakup_content_width', 640);
}
add_action('after_setup_theme', 'blankslate_child_speakup_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blankslate_child_speakup_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'blankslate_child_speakup'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'blankslate_child_speakup'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'blankslate_child_speakup_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blankslate_child_speakup_scripts()
{
	wp_enqueue_style('blankslate_child_speakup-style', get_stylesheet_directory_uri() . '/style.css', array(), _S_VERSION);
	wp_enqueue_style('blankslate_child_speakup-main', get_stylesheet_directory_uri() . '/css/main.css', array(), _S_VERSION);
	wp_enqueue_style('blankslate_child_speakup-fontawesome', get_stylesheet_directory_uri() . '/css/fontawesome/css/all.css', array(), _S_VERSION);

	wp_style_add_data('blankslate_child_speakup-style', 'rtl', 'replace');

	wp_enqueue_script('blankslate_child_speakup-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('blankslate_child_speakup-bootstrap', get_stylesheet_directory_uri() . '/css/boostrap/dist/js/bootstrap.min.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blankslate_child_speakup_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_stylesheet_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_stylesheet_directory() . '/inc/jetpack.php';
}

// Custom Functions
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Register Custom Comment Walker
 */
function register_comment_walker(){
	require_once get_stylesheet_directory() . '/class-wp-boostrap-comment-walker.php';
}
add_action( 'after_setup_theme', 'register_comment_walker' );

/**
 * Get custom logo url
 */
function get_custom_logo_url()
{
	return esc_url(wp_get_attachment_url(get_theme_mod('custom_logo')));
}

// WP-Admin Login Page Functions
function custom_login_logo()
{ ?>
	<style>
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>);
            width: 12rem;
            height: 10rem;
            background-size: 12rem;
            background-repeat: no-repeat;
            padding-bottom: .1rem;
        }
	</style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

function custom_login_logo_url_title()
{
	return get_option('name');
}
add_filter('login_headertext', 'custom_login_logo_url_title');

function custom_login_background_color() {
	$background_color = get_theme_mod('background_color', '#ffffff'); // Default to white if no color is set
	echo '<style>
        body {
            background-color: #'.$background_color.' !important;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'custom_login_background_color');

