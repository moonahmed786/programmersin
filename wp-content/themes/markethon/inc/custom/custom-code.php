<?php 
global $markethon_options;
// TGM plugin activation
require_once get_template_directory() . '/inc/tgm/markethon-required-plugins.php';
// Breadcrumbs
require_once get_template_directory() . '/inc/custom/breadcrumbs.php';
// Demo import
require_once get_template_directory() . '/inc/demo/import.php';
// Header Breadcrumbs
require_once get_template_directory() . '/inc/custom/markethon-breadcrumbs.php';
// Comment
require_once get_template_directory() . '/inc/custom/markethon-comment.php';
// Pagination
require_once get_template_directory() . '/inc/custom/markethon-pagination.php';
// Widget
require_once get_template_directory() . '/inc/custom/markethon-widget.php';
// Dynamic Style
require_once get_template_directory() . '/inc/custom/markethon-dynamic-style.php';
require_once get_template_directory() . '/inc/custom/color-style.php';
require_once get_template_directory() . '/inc/custom/custom-color.php';

function markethon_custom_fonts_url() 
{
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not

	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
	

	/* Translators: If there are characters in your language that are not
	* supported by Quicksand, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$Quicksand = _x( 'on', 'Quicksand font: on or off', 'markethon' );
	$poppins = _x( 'on', 'Poppins font: on or off', 'markethon' );

	if (  'off' !== $Quicksand || 'off' !== $poppins ) {

	    $font_families = array();

	    if ( 'off' !== $Quicksand ) {
		$font_families[] = 'Quicksand:400,500,600,700&display=swap';
	    }

	    if ( 'off' !== $poppins ) {
		$font_families[] = 'Poppins:100,200,300,400,500,600,700,800,900';
	    }

	    $query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	    );

	    $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

function markethon_load_js_css(){
	$markethon_option = get_option('markethon_options');
	
	/* Custom JS */
	wp_enqueue_script('bootstrap', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array(), '4.1.3' , true);
	
	wp_enqueue_script('countdown', get_template_directory_uri() .'/assets/js/countdown.js', array(),'1.0', true);

	wp_enqueue_script('appear', get_template_directory_uri() .'/assets/js/appear.js', array(),'1.0', true);
	
	wp_enqueue_script('jquery-count', get_template_directory_uri() .'/assets/js/jquery.countTo.js', array( 'jquery' ),'1.0', true);

	wp_enqueue_script('jquery-magnific', get_template_directory_uri().'/assets/js/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ),'1.1.0', true);

	wp_enqueue_script('isotope', get_template_directory_uri() .'/assets/js/isotope.pkgd.min.js', array( 'jquery' ),'1.0', true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array(),'2.3.4', true);
	
	wp_enqueue_script('popper', get_template_directory_uri() .'/assets/js/popper.min.js', array(), '1.0', true);
	
	wp_enqueue_script('wow', get_template_directory_uri() .'/assets/js/wow.min.js', array(), '1.3.0', true);

   wp_enqueue_script('circle-progress', get_template_directory_uri() .'/assets/js/circle-progress.min.js', array(), '1.2.2', true);
    wp_enqueue_script('jquery-scrollme', get_template_directory_uri() .'/assets/js/jquery.scrollme.min.js', array( 'jquery' ), '1.0', true);

	wp_enqueue_script('markethon-custom', get_template_directory_uri() .'/assets/js/markethon-custom.js', array(),'1.1', true);
	
	/* Custom CSS */
	wp_enqueue_style( 'markethon-font', markethon_custom_fonts_url(), array(), null);
	wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css',array(), '4.1.3', 'all');
    ///////////////////////////////////////////////////////////////////////////
	wp_enqueue_style('ionicons', get_template_directory_uri() .'/assets/css/ionicons.min.css',array(), '2.0.0', 'all');
    //////////////////////////////////////////////////////////
	wp_enqueue_style('typicon', get_template_directory_uri() .'/assets/css/typicon.min.css',array(), '2.0.0', 'all');
	
	wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css', array(), '3.5.2', 'all');
	
	wp_enqueue_style('magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '3.5.2', 'all');
	
	wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.min.css',array(), '2.3.4', 'all');

	wp_enqueue_style('wow', get_template_directory_uri() .'/assets/css/wow.css',array(), '3.7.0', 'all');          	
        
        wp_enqueue_style('timeline', get_template_directory_uri() .'/assets/css/timeline.css',array(), '1.0', 'all');
		
	wp_enqueue_style('markethon-style', get_template_directory_uri() .'/assets/css/markethon-style.css',array(), '1.1', 'all');
	
	wp_enqueue_style('markethon-responsive', get_template_directory_uri() .'/assets/css/markethon-responsive.css',array(), '1.1', 'all');

        if ( class_exists( 'mega-menu-wrap' ) ) :	

		wp_enqueue_style('markethon-megamenu', get_template_directory_uri() .'/assets/css/megamenu.css',array(), '1.0', 'all');

	endif;
	
}
add_action( 'wp_enqueue_scripts', 'markethon_load_js_css' );

// function markethon_wp_admin_style() {

// 	wp_enqueue_style('admin-style', get_template_directory_uri() .'/assets/css/markethon-admin-style.css',array(), '1.0', 'all');

// }
// add_action( 'admin_enqueue_scripts', 'markethon_wp_admin_style' );

function markethon_searchfilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','markethon_searchfilter');


if ( !function_exists( 'markethon_dynamic_style' ) ) {
    
    function markethon_dynamic_style ( $markethon_css_array ){
        foreach ( $markethon_css_array as $css_part ) {
            if ( ! empty( $css_part[ 'value' ] ) ) {
                echo esc_attr($css_part[ 'elements' ]) . "{\n";
                echo esc_attr($css_part[ 'property' ]) . ":" . esc_attr($css_part[ 'value' ]) . ";\n";
                echo "}\n\n";
            }
        }
    }
}
?>