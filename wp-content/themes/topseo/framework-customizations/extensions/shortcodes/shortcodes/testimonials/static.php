<?php if (!defined('FW')) die('Forbidden');

if (!function_exists('topseo_shortcode_testimonials_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_testimonials_enqueue_dynamic_css($data) {
    $shortcode = 'testimonials';
    $atts = topseo_shortcode_options( $data, $shortcode );
    if(!empty($atts['color'])){
		wp_add_inline_style('topseo-theme-style',
			'.perfect-seo-item *, .our-partient-speak-item *{color:'.$atts['color'].'}'
		);
	}
}
add_action(
    'fw_ext_shortcodes_enqueue_static:testimonials',
    'topseo_shortcode_testimonials_enqueue_dynamic_css'
);

endif;
