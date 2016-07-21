<?php
/**
 * Vogue functions and definitions
 *
 * @package Vogue
 */
define( 'VOGUE_THEME_VERSION' , '1.0.9' );

// Get help / Premium Page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';

if ( ! function_exists( 'vogue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vogue_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vogue, use a find and replace
	 * to change 'vogue' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vogue', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'vogue_blog_img_side', 500, 380, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'vogue' ),
        'top-bar-menu' => __( 'Top Bar Menu', 'vogue' ),
        'footer-bar' => __( 'Footer Bar Menu', 'vogue' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
        'default-image' => '',
		'width'         => 280,
		'height'        => 145,
		'flex-width'    => false,
		'flex-height'   => true,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vogue_custom_background_args', array(
		'default-color' => 'F9F9F9',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'woocommerce' );
}
endif; // vogue_setup
add_action( 'after_setup_theme', 'vogue_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function vogue_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vogue' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'vogue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vogue_scripts() {
	wp_enqueue_style( 'vogue-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), VOGUE_THEME_VERSION );
	wp_enqueue_style( 'vogue-heading-font-default', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic', array(), VOGUE_THEME_VERSION );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.3.0' );
	wp_enqueue_style( 'vogue-style', get_stylesheet_uri(), array(), VOGUE_THEME_VERSION );
	
	wp_enqueue_style( 'vogue-header-style-one', get_template_directory_uri().'/templates/css/header-one.css', array(), VOGUE_THEME_VERSION );
	
	if ( vogue_is_woocommerce_activated() ) :
		wp_enqueue_style( 'vogue-standard-woocommerce-style', get_template_directory_uri().'/templates/css/woocommerce-standard-style.css', array(), VOGUE_THEME_VERSION );
	endif;
	
	wp_enqueue_style( 'vogue-footer-social-style', get_template_directory_uri().'/templates/css/footer-social.css', array(), VOGUE_THEME_VERSION );

	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), VOGUE_THEME_VERSION, true );
	
	wp_enqueue_script( 'vogue-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), VOGUE_THEME_VERSION, true );
	
	wp_enqueue_script( 'vogue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), VOGUE_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vogue_scripts' );

/**
 * Add theme stying to the theme content editor
 */
function vogue_add_editor_styles() {
    add_editor_style( 'style-theme-editor.css' );
}
add_action( 'admin_init', 'vogue_add_editor_styles' );

/**
 * Enqueue admin styling.
 */
function vogue_load_admin_script( $hook ) {
	global $pagenow;
	if ( $pagenow == 'themes.php' || $pagenow == 'index.php' ) {
    	wp_enqueue_style( 'vogue-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'vogue_load_admin_script' );

/**
 * Enqueue vogue custom customizer styling.
 */
function vogue_load_customizer_script() {
	wp_enqueue_script( 'vogue-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), VOGUE_THEME_VERSION, true );
	$vogue_upgrade_button = array(
		'link' => admin_url( 'themes.php?page=theme_info' ),
		'text' => __( 'Upgrade to Vogue Premium', 'vogue' )
	);
	wp_localize_script( 'vogue-customizer-js', 'upgrade_button', $vogue_upgrade_button );
    wp_enqueue_style( 'vogue-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'vogue_load_customizer_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'vogue_is_woocommerce_activated' ) ) :
	function vogue_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif; // vogue_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( vogue_is_woocommerce_activated() ) {
	require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/**
 * Adjust is_home query if vogue-blog-cats is set
 */
function vogue_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'vogue-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'vogue-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'vogue_set_blog_queries' );

/**
 * Exclude slider category from sidebar widgets
 */
function vogue_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'vogue-slider-cats', false ) ) {
        $exclude = esc_attr( get_theme_mod( 'vogue-slider-cats' ) );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'vogue_exclude_slider_categories_widget' );

/**
 * Display recommended plugins with the TGM class
 */
function vogue_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => 'Page Builder',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Widgets Bundle',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => 'Meta Slider',
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'vogue',
		'menu'         => 'tgmpa-install-plugins',
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vogue_register_required_plugins' );
