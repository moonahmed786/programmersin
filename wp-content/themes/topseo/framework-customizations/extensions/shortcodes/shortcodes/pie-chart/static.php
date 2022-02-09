<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'topseo-shortcode-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/line-chart/static/js/chart.min.js')
);
wp_enqueue_script(
    'topseo-shortcode-progress',
    fw_ext('shortcodes')->locate_URI('/shortcodes/pie-chart/static/js/progress.circle.min.js')
);
wp_enqueue_script(
    'topseo-shortcode-progress-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/pie-chart/static/js/progress.chart.min.js')
);




if (!function_exists('topseo_shortcode_pie_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_pie_enqueue_dynamic_css($data) {
    $shortcode = 'pie-chart';
    $atts = topseo_shortcode_options( $data, $shortcode );
    if(!empty($atts['color'])){
    	$bdc = $atts['color'];
    	$color = topseo_rgb($atts['color']);
    	$aa = '';
    	foreach($color as $ss){
    		$aa .= $ss.',';
    	}
      wp_add_inline_style(
          'topseo-theme-style',
          '#ht-pie-'.$atts['id'].'{ '.
              'border-color: rgba('. $aa .'0.2);'.
          '}'
      );
    }

}
add_action(
    'fw_ext_shortcodes_enqueue_static:pie_chart',
    'topseo_shortcode_pie_enqueue_dynamic_css'
);

endif;
