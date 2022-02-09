<?php

add_action( 'elementor/widgets/widgets_registered', 'register_elementor_widgets' );
function register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
		
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_blog.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_team.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_section_title.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_fancybox.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_button.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_price.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_image_overlay.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_faq.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_testimonial.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_client.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_list.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_counter.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_progressbar.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_contact.php';	
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_portfolio.php';	
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_servicebox.php';	
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_video.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_history.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_timeline.php';
		require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_process.php';
        require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_tabs.php';
        require  MARKETHON_TH_ROOT . '/inc/elementor/widget/markethon_work_process.php';
 	}
}

add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'markethon',
		[
			'title' => __( 'markethon', 'markethon' ),
			'icon' => 'fa fa-plug',
		]
	);
});

// Add Custom Icon 

require  MARKETHON_TH_ROOT . '/inc/elementor/icon/custom-icon.php';

add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_script('lottie', MARKETHON_TH_URL .'/assest/js/lottie.js', array(), '1.0.0' , true);
    wp_enqueue_script('timeline', MARKETHON_TH_URL .'/assest/js/timeline.js', array(), '1.0.0' , true);
});


add_action( 'wp_footer', function() {
	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return;
	}
	?>
	<script>
		jQuery( function( $ ) {
			// Add space for Elementor Menu Anchor link
			if ( window.elementorFrontend ) {
				jQuery("#load").fadeOut();
				jQuery("#loading").delay(0).fadeOut("slow");
				
				if(jQuery('header').hasClass('has-sticky'))
                {         
                    jQuery(window).on('scroll', function() {
                        if (jQuery(this).scrollTop() > 10) {
                            jQuery('header').addClass('menu-sticky');
                            jQuery('.has-sticky .logo').addClass('logo-display');
                        } else {
                            jQuery('header').removeClass('menu-sticky');
                            jQuery('.has-sticky .logo').removeClass('logo-display');
                        }
                    });

				}
				
			}
			
		} );
		
	</script>
	<?php
} );
?>