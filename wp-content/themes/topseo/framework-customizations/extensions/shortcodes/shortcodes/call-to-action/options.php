<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'button' );
$options = array(
	'image'       => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Image', 'topseo' ),
		'desc'  => esc_html__( 'Choose image', 'topseo' ),
	),
	'message'       => array(
		'label' => esc_html__( 'Content', 'topseo' ),
		'desc'  => esc_html__( 'Enter some content for this Info Box. This input support some html tags.', 'topseo' ),
		'type'   => 'wp-editor',
		'reinit' => true,
		'size'  => 'large',
		'editor_type' => 'tinymce',
		'editor_height' => 400,
		'tinymce' => true,
		'teeny' => false,
		'wpautop' => false,
	),
	'button' => array(
		'type'          => 'popup',
		'popup-title'   => esc_html__( 'Button', 'topseo' ),
		'button'        => esc_html__( 'Add', 'topseo' ),
		'popup-options' => $button->get_options()
	),
);
