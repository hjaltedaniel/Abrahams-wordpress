<?php 
setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Front page area 1',
		'id' => 'fp-1',
		'description' => 'Front page area 1',
		'before_widget' => '<div class="col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Front page area 2',
		'id' => 'fp-2',
		'description' => 'Front page area 2',
		'before_widget' => '<div class="col-sm-4">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Front page area 3',
		'id' => 'fp-3',
		'description' => 'Front page area 3',
		'before_widget' => '<div class="col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Hovedmenu' ));
}
add_action( 'init', 'register_my_menu' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function add_stylesheet() {
wp_register_style('bootstrap.min',get_template_directory_uri() . '/bootstrap/bootstrap.min.css');
wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'add_stylesheet' );

// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

function b4st_enqueues() {
	/* Styles */
	wp_register_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css', false, '4.0.0-beta', null);
	wp_enqueue_style('bootstrap-css');
	wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', null);
	wp_enqueue_style('font-awesome-css');
	/* Scripts */
	wp_enqueue_script( 'jquery' );
	/* Note: this enqueue above uses WordPress's onboard jQuery. You can enqueue other pre-registered scripts from WordPress too. See:
	https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress */
  	wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
	wp_enqueue_script('modernizr');
	wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', false, '1.11.0', true);
	wp_enqueue_script('popper');
    wp_register_script('j-query',  'https://code.jquery.com/jquery-3.2.1.js', false, '3.2.1', true);
	wp_enqueue_script('j-query');
  	wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js', false, '4.0.0-beta', true);
	wp_enqueue_script('bootstrap-js');
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'b4st_enqueues', 100);
remove_filter('widget_text_content', 'wpautop');
add_theme_support( 'post-thumbnails' ); 
add_theme_support('category-thumbnails');
?>
