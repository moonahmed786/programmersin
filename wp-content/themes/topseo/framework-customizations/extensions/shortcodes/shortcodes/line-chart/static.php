<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'topseo-shortcode-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/line-chart/static/js/chart.min.js')
);
wp_enqueue_script(
    'topseo-shortcode-line-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/line-chart/static/js/line.chart.min.js')
);