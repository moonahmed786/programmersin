<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */


if ( ! function_exists( 'topseo_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function topseo_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'topseo', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 870, 432, true );
		//add_image_size( 'topseo-full-width', 1038, 576, true );

		add_theme_support('title-tag');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		) );
		/**
		 * Support Selective Refresh
		 * WP 4.5
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}
endif;
add_action( 'after_setup_theme', 'topseo_action_theme_setup' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function topseo_filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('fw_ext_sidebars_get_current_position') ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_page_template( 'page-templates/full-width.php' )
		     || is_page_template( 'page-templates/contributors.php' )
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	$menu_logo_style = get_theme_mod( 'logo_image', 'menu-style-1' );
	if($menu_logo_style == 'menu-style-1'){
		$classes[] = 'menu-style-1';
	}
	return $classes;
}

add_filter( 'body_class', 'topseo_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function topseo_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'topseo_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function topseo_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'topseo' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'topseo_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function topseo_action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'fw_theme_category_count' );
}

add_action( 'edit_category', 'topseo_action_theme_category_transient_flusher' );
add_action( 'save_post', 'topseo_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function topseo_action_theme_customize_register( $wp_customize ) {
		// Add custom description to Colors and Background sections.
		$wp_customize->get_section( 'colors' )->description           = esc_html__( 'Background may only be visible on wide screens.','topseo' );
		$wp_customize->get_section( 'background_image' )->description = esc_html__( 'Background may only be visible on wide screens.','topseo' );

		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'topseo' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'topseo' );

	}

	add_action( 'customize_register', 'topseo_action_theme_customize_register' );
}

/**
 * Register widget areas.
 * @internal
 */
function topseo_action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'topseo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'topseo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'topseo' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'topseo' ),
		'before_widget' => '<div class="col-md-3 col-lg-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Register sidebar for shop page,
	// remove it if theme dose not support Woocomerce
	if(class_exists('Woocommerce')) {
		register_sidebar(array(
			'name' => esc_html__('Sidebar Shop Area', 'topseo'),
			'id' => 'sidebar-shop',
			'description' => esc_html__('Appears in the sidebar of shop page.', 'topseo'),
			'before_widget' => '<aside id="%1$s" class="widget shop %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
}

add_action( 'widgets_init', 'topseo_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'topseo_action_theme_display_form_errors' ) ):
		function topseo_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'topseo-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'topseo-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'topseo_action_theme_display_form_errors');

	/**
	 * Register page builder for custom post type
	 * in default
	 * @return array
	 */
	function topseo_register_page_builder(){
			$result = array(
					'page' => true,
					'ht-service' => true,
					'fw-portfolio' => true
			);
			return $result;
	}
	add_filter( 'fw_ext_page_builder_settings_options_post_types_default_value', 'topseo_register_page_builder' );
endif;

/**
 * Filter to wp_editor
 * to optimize fw_resize function
 */
add_filter( 'jpeg_quality', 'topseo_filter_theme_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'topseo_filter_theme_image_full_quality' );

function topseo_filter_theme_image_full_quality( $quality ) {
	return 100;
}

/**
 * Disable/Enable default section in customizer
 */
global  $wp_customize;
if ( isset($wp_customize) && $wp_customize->is_preview() ) {
    function topseo_customizer_remove_sections( $wp_customize ) {
        $wp_customize->remove_section( 'featured_content' );
    }
    add_action( 'customize_register' , 'topseo_customizer_remove_sections' );
}

// Register new option types
function topseo_include_custom_option_types() {
    get_template_part('/inc/includes/option-types/ht-switch/class-fw-option-type', 'ht-switch');
}
add_action('fw_option_types_init', 'topseo_include_custom_option_types');


/**
 * Custom css for admin
 * @return [type] [description]
 */
function topseo_load_custom_wp_admin_style() {
    wp_register_style( 'topseo_custom_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'topseo_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'topseo_load_custom_wp_admin_style' );

add_action( 'admin_enqueue_scripts', 'topseo_deregister_woocommerce_setting', 99 );
/**
 * Fixed problem Unyson & YITH
 * conflict color picker
 * @return [type] [description]
 */
function topseo_deregister_woocommerce_setting(){
	$screen = get_current_screen();
	if ( $screen->post_type == 'page' ){
			wp_deregister_script( 'woocommerce_settings' );
	}
}

/**
 * Install Demo content
 */
function topseo_backups_demos($demos) {
	$demos_array = array(
		'topseofull2' => array(
			'title' => esc_html__('Topseo Demo Full', 'topseo'),
			'screenshot' => get_template_directory_uri().'/screenshot.png',
			'preview_link' => '//boostifythemes.com/demo/wp/topseo/',
		)
		// ...
	);

	$download_url = 'https://boostifythemes.com/ht-demos/';

	foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);

		$demos[ $demo->get_id() ] = $demo;

		unset($demo);
	}

	return $demos;
}

add_filter('fw:ext:backups-demo:demos', 'topseo_backups_demos');
