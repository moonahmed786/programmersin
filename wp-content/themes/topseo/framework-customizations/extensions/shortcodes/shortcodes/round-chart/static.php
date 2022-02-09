<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'topseo-shortcode-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/line-chart/static/js/chart.min.js')
);
wp_enqueue_script(
    'topseo-shortcode-round-chart',
    fw_ext('shortcodes')->locate_URI('/shortcodes/round-chart/static/js/round.chart.min.js')
);