<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'video_type' => array(
		'label' => esc_html__('Video embed', 'topseo'),
		'type' => 'short-select',
		'choices' => array(
			'youtube' => esc_html__('Youtube', 'topseo'),
			'vimeo' => esc_html__('Vimeo', 'topseo'),
		),
		'value' => 'youtube'
	),
	'url'    => array(
		'type'  => 'short-text',
		'label' => esc_html__( 'Insert Video URL', 'topseo' ),
		'desc' => wp_kses_post('Input only ID Video from Youtube or Vimeo. For exp:<br>https://www.youtube.com/watch?v=nrJtHemSPW4, only pick <b>nrJtHemSPW4</b><br>https://vimeo.com/180307714, only pick <b>180307714</b>', 'topseo'),
		'value' => 'nrJtHemSPW4'
	),
);
