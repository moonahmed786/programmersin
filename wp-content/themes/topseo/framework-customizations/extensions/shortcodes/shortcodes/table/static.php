<?php if (!defined('FW')) die('Forbidden');

if (fw_ext('shortcodes')->get_shortcode('button')) {
	fw_ext('shortcodes')->get_shortcode('button')->_enqueue_static();
}