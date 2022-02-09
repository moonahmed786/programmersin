<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );
{
	global $is_safari;

	if ($is_safari) {
		wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api');
	}
}
wp_enqueue_script(
	'topseo-shortcode-section-min',
	fw_ext('shortcodes')->locate_URI( '/shortcodes/section/static/js/fw.min.js' ),
	array( 'jquery' ),
	false,
	true
);