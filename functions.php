<?php


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'natural_tours_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function natural_tours_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Natural_Tours, use a find and replace
		 * to change 'natural_tours' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'natural_tours', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'natural_tours' ),
			)
		);

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
				'natural_tours_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'natural_tours_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function natural_tours_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'natural_tours_content_width', 640 );
}
add_action( 'after_setup_theme', 'natural_tours_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function natural_tours_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'natural_tours' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'natural_tours' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'natural_tours_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function natural_tours_scripts() {
	wp_enqueue_style( 'premade-styles', get_stylesheet_uri(), array(), microtime() );

	wp_style_add_data( 'natural_tours-style', 'rtl', 'replace' );

	wp_enqueue_script( 'natural_tours-navigation', get_template_directory_uri() . '/js/navigation.js', array(), microtime(), true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri().'/js/app.js',  array(), microtime(), true );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), microtime() );

	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), microtime() );

	wp_enqueue_style( 'fontAwesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), microtime() );

	wp_enqueue_style( 'AOS-styling', 'https://unpkg.com/aos@2.3.1/dist/aos.css', NULL, microtime() );

	//Our custom styling
	wp_enqueue_style( 'custom-styles', get_theme_file_uri('main.css'), array(), microtime() );

	//Adds in the current version of jQuery
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'popperJS', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), NULL, true );

	wp_enqueue_script( 'BootstrapJS', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', NULL, NULL, true );

	wp_enqueue_script( 'AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', NULL, microtime(), true );


}
add_action( 'wp_enqueue_scripts', 'natural_tours_scripts' );






//Add Custom Post Types 

function custom_post_types() {

	//Landmarks Post Types
	register_post_type( 'landmarks', array(
		'map_meta_cap' => true,
		'supports' => array('title','editor','thumbnail'),
		'rewrite' => array('slug' => 'landmarks'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'landmarks',
            'add_new_item' => 'Add New Landmark',
            'edit_item' => 'Edit Landmark',
            'all_items' => 'All Landmarks',
            'singluar_name' => 'Landmark'
            ), 
        'menu_icon' => 'dashicons-admin-site-alt'
	));

	register_post_type( 'testimonials', array(
		'map_meta_cap' => true,
		'supports' => array('title','editor','thumbnail'),
		'rewrite' => array('slug' => 'testimonials'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'testimonials',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'all_items' => 'All Testimonials',
            'singluar_name' => 'Testimonial'
            ), 
        'menu_icon' => 'dashicons-editor-quote'
		));

};

add_action( 'init', 'custom_post_types');
