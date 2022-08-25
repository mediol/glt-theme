<?php

// WIDGET functions
include( get_template_directory() . '/widget/widget_function.php' );

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 );          //remove dns-prefetch
remove_action('wp_head', 'wp_generator');                   //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link');               //remove wlwmanifest
remove_action('wp_head', 'rsd_link');                       //remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');       //remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical');                  //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10);       //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links');  //remove alternate

// styles
add_action('wp_enqueue_scripts', 'site_styles');
function site_styles () {
    $version = '0.0.0.1';
    wp_dequeue_style('wp-block-library');
    wp_enqueue_style('normalize-style',     get_template_directory_uri() . '/assets/css/normalize.css', [], $version);
    wp_enqueue_style('slick-style',         get_template_directory_uri() . '/assets/slick/slick.css', [], $version);
    wp_enqueue_style('slick-theme-style',   get_template_directory_uri() . '/assets/slick/slick-theme.css', [], $version);
    // wp_enqueue_style('thank-style',          get_template_directory_uri() . '/assets/css/thank.css', [], $version );
    wp_enqueue_style('location-hero-style', get_template_directory_uri() . '/assets/css/location-hero.css', [], $version);
    wp_enqueue_style('options-style',       get_template_directory_uri() . '/assets/css/options.css', [], $version);
    wp_enqueue_style('hiw-style',           get_template_directory_uri() . '/assets/css/hiw.css', [], $version);
    wp_enqueue_style('location-style',      get_template_directory_uri() . '/assets/css/location.css', [], $version);
    wp_enqueue_style('flip-style',          get_template_directory_uri() . '/assets/css/flip-cards.css', [], $version );
    wp_enqueue_style('main-style',          get_stylesheet_uri(), [], $version );
}

// special styles for pages
add_action( 'wp_enqueue_scripts', 'contact_us_styles', 51 );
function contact_us_styles() {
	if( is_page( 'contact-us' ) ) {
        wp_enqueue_style('reset-style', get_template_directory_uri() . '/assets/css/resset.css', []);
	}
}
add_action( 'wp_enqueue_scripts', 'thank_you_styles', 107 );
function thank_you_styles() {
	if( is_page( 'thank-you' ) ) {
        wp_enqueue_style('thank-style', get_template_directory_uri() . '/assets/css/thank.css', [] );
	}
}

// scripts
add_action('wp_enqueue_scripts', 'site_scripts');
function site_scripts() {
    $version = '0.0.0.1';
    wp_deregister_script( 'jquery' );
    wp_deregister_script('wp-embed');
    wp_enqueue_script('slick',         get_template_directory_uri() . '/assets/slick/slick.min.js', ['jquery'], $version, 'footer');
	wp_register_script( 'jquery',      get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', [], $version, 'footer');
	wp_enqueue_script( 'sidebar-menu', get_template_directory_uri() . '/assets/js/sidebar-menu.js', [], $version, 'footer');
	wp_enqueue_script( 'flip',         get_template_directory_uri() . '/assets/js/flip.js', [], $version, 'footer');
	wp_enqueue_script( 'theme',        get_template_directory_uri() . '/assets/js/theme.js', [], $version, 'footer');
}

// Carbon Fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( 'includes/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields () {
    require_once('includes/carbon-fields-options/theme-options.php');
    require_once('includes/carbon-fields-options/post-meta.php');
}

add_action('init', 'create_global_variable');
function create_global_variable() {
    global $alliance_stat;
    $alliance_stat = [
        'phone_number_href' => carbon_get_theme_option('phone_number_href'),
        'phone_number' => carbon_get_theme_option('phone_number'),
        'social_logo_ig' => carbon_get_theme_option('social_logo_ig'),
        'social_logo_fb' => carbon_get_theme_option('social_logo_fb'),
        'social_logo_ld' => carbon_get_theme_option('social_logo_ld'),
        'social_logo_g' => carbon_get_theme_option('social_logo_g'),
        'instagram_url' => carbon_get_theme_option('insta_url'),
        'facebook_url' => carbon_get_theme_option('fb_url'),
        'linkedin_url' => carbon_get_theme_option('ld_url'),
        'google_url' => carbon_get_theme_option('g_url'),
    ];
}

// Register sidebar
function register_wp_sidebars() {
 
	/* in footer */
	register_sidebar(
		array(
			'id' => 'foot_sidebar_one',
			'name' => '1/4 Footer',
			'description' => 'Move here the widgets you need to add them in footer.',
			'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
        )
	);
	register_sidebar(
		array(
			'id' => 'foot_sidebar_two',
			'name' => '2/4 Footer',
			'description' => 'Move here the widgets you need to add them in footer.',
			'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'foot_sidebar_three',
			'name' => '3/4 Footer',
			'description' => 'Move here the widgets you need to add them in footer.',
			'before_widget' => '<div id="%1$s" class="foot_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'register_wp_sidebars' );

// hide front page text editor
function disable_content_editor()
{
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }

    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }

    $page_template = get_post_meta($post_ID, '_wp_page_template', true);
    if ($page_template == 'front-page.php') {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'disable_content_editor');

add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
  register_nav_menu( 'sidebar_menu', 'Sidebar menu' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-logo' );
  add_theme_support('post-thumbnails');
  add_image_size('page_img', 1920, 750, true);
  add_image_size('hero_img', 960, 1080, true);
  add_image_size('hero_mob_img', 375, 566, true);
  add_image_size('product', 500, 313, true);
  add_image_size('slider', 360, 300, true);
  add_image_size('location', 550, 450, true);
}