<?php if (!defined('FW')) die('Forbidden');

	global $wpdb;
	$tablename = $wpdb->prefix."revslider_sliders";
	$id = 'id';
	$sql = $wpdb->prepare("SELECT id, title, alias FROM $tablename  ORDER BY %s ASC LIMIT 999", $id);
	$rs = $wpdb->get_results(
		$sql
	);
	$revsliders = array();
	if ( $rs ) {
		foreach ( $rs as $slider ) {
			$revsliders[$slider->alias] = $slider->title;
		}
	} else {
		$revsliders['0'] = esc_html__('No sliders found', 'topseo');
	}

$options = array(
	'alias' => array(
		'type' => 'select',
		'label' => esc_html__('Slider', 'topseo'),
		'choices' => $revsliders,
	),
);