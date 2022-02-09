<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'button' );
$options = array(
	'b_align' => array(
		'type' => 'select',
		'label' => esc_html__('Button position', 'topseo'),
		'choices' => array(
			'text-left' => esc_html__('Left', 'topseo'),
			'text-center' => esc_html__('Center', 'topseo'),
			'text-right' => esc_html__('Right', 'topseo'),
		),
		'value' => 'text-center',
		'desc' => esc_html__('Set position', 'topseo'),
	),
	'seo_button' => array(
		'label' => esc_html__('Button', 'topseo'),
		'desc' => esc_html__('Add your button', 'topseo'),
		'type' => 'addable-popup',
		'template' => '{{- label }}',
		'popup-options' => array(
			$button->get_options()
		),
	),
);
