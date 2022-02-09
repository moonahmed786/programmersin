<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'topseo-shortcode-progress-bar',
    fw_ext('shortcodes')->locate_URI('/shortcodes/progress-bar/static/js/progress.bar.min.js')
);


if (!function_exists('topseo_shortcode_progress_bar_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_progress_bar_enqueue_dynamic_css($data) {
    $shortcode = 'progress-bar';
    $atts = topseo_shortcode_options( $data, $shortcode );
	foreach($atts['data'] as $key){
		wp_add_inline_style(
			'topseo-theme-style',
			'.ht_single_bar #ht-prog-'.$key['id'].'{'.
				'background-color:'.$key['color'].';'.
			'}'
		);
	}

}
add_action(
    'fw_ext_shortcodes_enqueue_static:progress_bar',
    'topseo_shortcode_progress_bar_enqueue_dynamic_css'
);

endif;
