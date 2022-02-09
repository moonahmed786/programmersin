<?php 
/*
Plugin Name: Markethon Extensions	
Plugin URI: http://iqonicthemes.com/
Description: markethon plugin provides custom team post type, gallery post type with related functionality.
Author: iqonicthemes
Version: 1.0
Author URI: http://www.goldenmace.com/
Text Domain: markethon
*/

if( !defined( 'MARKETHON_TH_ROOT' ) ) 
	define('MARKETHON_TH_ROOT', plugin_dir_path( __FILE__ ));

if( !defined( 'MARKETHON_TH_URL' ) ) 
	define( 'MARKETHON_TH_URL', plugins_url( '', __FILE__ ) );

if( !defined( 'MARKETHON_NAME' ) ) 
	define( 'MARKETHON_NAME', 'markethon' );


// Register Team Member custom post type
add_action( 'init', 'markethon_team' );
function markethon_team() {
	$labels = array(
		'name'                  => esc_html__( 'Team Member', 'post type general name', 'markethon' ),
		'singular_name'         => esc_html__( 'Team Member', 'post type singular name', 'markethon' ),
		'featured_image'        => esc_html__( 'Team Member Photo', 'markethon'  ),
		'set_featured_image'    => esc_html__( 'Set Team Member Photo', 'markethon'  ),
		'remove_featured_image' => esc_html__( 'Remove Team Member Photo', 'markethon'  ),
		'use_featured_image'    => esc_html__( 'Use as Team Member Photo', 'markethon'  ),
		'menu_name'             => esc_html__( 'Our Team', 'admin menu', 'markethon' ),
		'name_admin_bar'        => esc_html__( 'Team Member', 'add new on admin bar', 'markethon' ),
		'add_new'               => esc_html__( 'Add New', 'Team Member', 'markethon' ),
		'add_new_item'          => esc_html__( 'Add New Team Member', 'markethon' ),
		'new_item'              => esc_html__( 'New Team Member', 'markethon' ),
		'edit_item'             => esc_html__( 'Edit Team Member', 'markethon' ),
		'view_item'             => esc_html__( 'View Team Member', 'markethon' ),
		'all_items'             => esc_html__( 'All Team Members', 'markethon' ),
		'search_items'          => esc_html__( 'Search Team Member', 'markethon' ),
		'parent_item_colon'     => esc_html__( 'Parent Team Member:', 'markethon' ),
		'not_found'             => esc_html__( 'No Classs found.', 'markethon' ),
		'not_found_in_trash'    => esc_html__( 'No Classs found in Trash.', 'markethon' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'markethonteam' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-businessman',
		'supports'           => array( 'title','editor','thumbnail')
	);

	register_post_type( 'markethonteam', $args );
}


// Register Portfolio custom post type
add_action( 'init', 'markethon_portfolio' );
function markethon_portfolio() {
	$labels = array(
		'name'                  => esc_html__( 'Portfolio', 'post type general name', 'markethon' ),
		'singular_name'         => esc_html__( 'Portfolio', 'post type singular name', 'markethon' ),
		'featured_image'        => esc_html__( 'Portfolio Photo', 'markethon'  ),
		'set_featured_image'    => esc_html__( 'Set Portfolio Photo', 'markethon'  ),
		'remove_featured_image' => esc_html__( 'Remove Portfolio Photo', 'markethon'  ),
		'use_featured_image'    => esc_html__( 'Use as Portfolio Photo', 'markethon'  ),
		'menu_name'             => esc_html__( 'Portfolio', 'admin menu', 'markethon' ),
		'name_admin_bar'        => esc_html__( 'Portfolio', 'add new on admin bar', 'markethon' ),
		'add_new'               => esc_html__( 'Add New', 'Portfolio', 'markethon' ),
		'add_new_item'          => esc_html__( 'Add New Portfolio', 'markethon' ),
		'new_item'              => esc_html__( 'New Portfolio', 'markethon' ),
		'edit_item'             => esc_html__( 'Edit Portfolio', 'markethon' ),
		'view_item'             => esc_html__( 'View Portfolio', 'markethon' ),
		'all_items'             => esc_html__( 'All Portfolio', 'markethon' ),
		'search_items'          => esc_html__( 'Search Portfolio', 'markethon' ),
		'parent_item_colon'     => esc_html__( 'Parent Portfolio :', 'markethon' ),
		'not_found'             => esc_html__( 'No Classs found.', 'markethon' ),
		'not_found_in_trash'    => esc_html__( 'No Classs found in Trash.', 'markethon' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'show_in_nav_menus'   => TRUE,
		'has_archive'        => true,
		'hierarchical'       => false,		
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-category',
		'supports'           => array( 'title', 'editor', 'thumbnail','excerpt','category','tag')
	);

	register_post_type( 'portfolio', $args );
}


// Custom taxonomy
add_action( 'after_setup_theme', 'markethon_custom_taxonomy' );
function markethon_custom_taxonomy() {
	$labels = '';
	register_taxonomy(
		'portfolio-categories',
		'portfolio',
		array(
			'label' => esc_html__( 'Portfolio Category', 'markethon' ),
			'rewrite' => true,
			'hierarchical' => true,
		)
	);
	register_taxonomy('portfolio-tag','portfolio',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag' ),
	));
}

// Register Testimonial type custom post
add_action( 'init', 'markethon_testimonial_gallery' );
function markethon_testimonial_gallery() {
	$labels = array(
		'name'               => esc_html__( 'Testimonial', 'post type general name', 'markethon' ),
		'singular_name'      => esc_html__( 'Testimonial', 'post type singular name', 'markethon' ),
		'featured_image'        => esc_html__( 'Photo', 'markethon'  ),
		'set_featured_image'    => esc_html__( 'Set Photo', 'markethon'  ),
		'remove_featured_image' => esc_html__( 'Remove Photo', 'markethon'  ),
		'use_featured_image'    => esc_html__( 'Use as Photo', 'markethon'  ),
		'menu_name'          => esc_html__( 'Testimonial', 'admin menu', 'markethon' ),
		'name_admin_bar'     => esc_html__( 'Testimonial', 'add new on admin bar', 'markethon' ),
		'add_new'            => esc_html__( 'Add New', 'Testimonial', 'markethon' ),
		'add_new_item'       => esc_html__( 'Add New Testimonial', 'markethon' ),
		'new_item'           => esc_html__( 'New Testimonial', 'markethon' ),
		'edit_item'          => esc_html__( 'Edit Testimonial', 'markethon' ),
		'view_item'          => esc_html__( 'View Testimonial', 'markethon' ),
		'all_items'          => esc_html__( 'All Testimonial', 'markethon' ),
		'search_items'       => esc_html__( 'Search Testimonial', 'markethon' ),
		'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'markethon' ),
		'not_found'          => esc_html__( 'No Testimonial found.', 'markethon' ),
		'not_found_in_trash' => esc_html__( 'No Testimonial found in Trash.', 'markethon' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'testimonial', $args );
}

// Register Team Member custom post type
add_action( 'init', 'markethon_client' );
function markethon_client() {
	$labels = array(
		'name'                  => esc_html__( 'Client Member', 'post type general name', 'markethon' ),
		'singular_name'         => esc_html__( 'Client Member', 'post type singular name', 'markethon' ),
		'featured_image'        => esc_html__( 'Client Member Photo', 'markethon'  ),
		'set_featured_image'    => esc_html__( 'Set Client Member Photo', 'markethon'  ),
		'remove_featured_image' => esc_html__( 'Remove Client Member Photo', 'markethon'  ),
		'use_featured_image'    => esc_html__( 'Use as Client Member Photo', 'markethon'  ),
		'menu_name'             => esc_html__( 'Our Client', 'admin menu', 'markethon' ),
		'name_admin_bar'        => esc_html__( 'Client Member', 'add new on admin bar', 'markethon' ),
		'add_new'               => esc_html__( 'Add New', 'Client Member', 'markethon' ),
		'add_new_item'          => esc_html__( 'Add New Client Member', 'markethon' ),
		'new_item'              => esc_html__( 'New Client Member', 'markethon' ),
		'edit_item'             => esc_html__( 'Edit Client Member', 'markethon' ),
		'view_item'             => esc_html__( 'View Client Member', 'markethon' ),
		'all_items'             => esc_html__( 'All Client Members', 'markethon' ),
		'search_items'          => esc_html__( 'Search Client Member', 'markethon' ),
		'parent_item_colon'     => esc_html__( 'Parent Client Member:', 'markethon' ),
		'not_found'             => esc_html__( 'No Classs found.', 'markethon' ),
		'not_found_in_trash'    => esc_html__( 'No Classs found in Trash.', 'markethon' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-businessman',
		'supports'           => array( 'title', 'thumbnail')
	);

	register_post_type( 'client', $args );
}




require_once(MARKETHON_TH_ROOT . 'widget/footer-contact.php');

require_once(MARKETHON_TH_ROOT . 'widget/footer-logo.php');

require_once(MARKETHON_TH_ROOT . 'widget/subscribe.php');

require_once(MARKETHON_TH_ROOT . 'widget/social_media.php');

require_once(MARKETHON_TH_ROOT . 'widget/recent-post.php');

require_once(MARKETHON_TH_ROOT . 'widget/testimonial.php');






require_once(MARKETHON_TH_ROOT . 'inc/elementor/init.php');


/*---------------------------------------
		markethon admin enque
---------------------------------------*/
function markethon_enqueue_custom_admin_style() {

	
	
	wp_enqueue_script('lottie', MARKETHON_TH_URL .'/assest/js/lottie.js', array(), '1.0.0' , true);
	wp_register_style( 'markethon_wp_admin_css', MARKETHON_TH_URL . '/extensions/assets/css/markethon.min.css', false, '1.0.0' );
	wp_enqueue_style( 'markethon_wp_admin_css' );

	
}
add_action( 'admin_enqueue_scripts', 'markethon_enqueue_custom_admin_style' );

function markethon_plugin_script()
{
	wp_enqueue_script('lottie', MARKETHON_TH_URL .'/assest/js/lottie.js', array(), '1.0.0' , true);
	wp_enqueue_script('timeline', MARKETHON_TH_URL .'/assest/js/timeline.js', array(), '1.0.0' , true);
}
add_action( 'wp_enqueue_scripts', 'markethon_plugin_script' );


if(!defined('ALLOW_UNFILTERED_UPLOADS'))
{
	define('ALLOW_UNFILTERED_UPLOADS', true);
}
add_action( 'admin_enqueue_scripts', 'markethon_enqueue_custom_admin_style' );
function markethon_cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['json'] = 'application/json';
	return $mimes;
}
add_filter('upload_mimes', 'markethon_cc_mime_types');
?>