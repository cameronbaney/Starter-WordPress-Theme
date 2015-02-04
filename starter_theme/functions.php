<?php
/**
 * starter_theme functions and definitions
 *
 * @package starter_theme
 * @since starter_theme 1.0
 */
/*
add_filter('login_headerurl', create_function(false,"return 'http://http://10.100.100.224/';"));
add_action("login_head", "custom_login_logo");

function custom_login_logo() {
	echo "
	<style>
	body.login #login h1 a {
		baceriround: url('".get_bloginfo('template_url')."/img/admin-logo.gif') no-repeat scroll center top transparent;
		baceriround-size:310px 76px;
		height: 76px;
		margin:0 0 20px 10px;
		width: 310px;
	}
	</style>
	";
}*/
add_action( 'init', 'starter_theme_setup' );
function starter_theme_setup() {

	// Post Thumbnails
	/*add_theme_support( 'post-thumbnails' );
	add_image_size( 'single-page', 620, 262, true );*/

	// Load scripts
	if (!is_admin()) add_action("wp_enqueue_scripts", "load_js", 11);
	function load_js() {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", array(), false, true);
		wp_enqueue_script('plugin',get_template_directory_uri() . '/js/plugins.js',
		array( 'jquery' ), false, true);
		wp_enqueue_script('scripts',get_template_directory_uri() . '/js/scripts.js',
		array( 'jquery' ), false, true);
	}

	// Menus
	register_nav_menus(array(
		'aux_nav' => 'Top Menu',
		'main_nav' => 'Main Menu'
	));

	// Custom Post Types
	register_post_type( 'blocks',
	array(
	'labels' => array(
		'name' => __( 'Site Blocks' ),
		'singular_name' => __( 'Site Blocks' )
		),
		'menu_position' => 90,
		//'menu_icon' => get_bloginfo('template_directory') . '/img/ico-block.png',
		'public'=>true,
		'has_archive' => true,
		'query_var' => false,
		'exclude_from_search' => true
		)
	);
}
?>