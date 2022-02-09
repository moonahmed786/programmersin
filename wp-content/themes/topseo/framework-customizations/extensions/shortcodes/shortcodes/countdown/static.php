<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/countdown');
wp_enqueue_script(
    'topseo-shortcode-jquery-countdown',
    $uri . '/static/js/jquery.countdown.min.js'
);