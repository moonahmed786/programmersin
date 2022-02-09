<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Title', 'topseo' ),
		'desc'  => esc_html__( 'Write the heading title content', 'topseo' ),
		'help' => esc_html__('Use [ ] if you want to highlight word.', 'topseo')
	),
	'white_title' => array(
		'type'    => 'switch',
		'label'   => esc_html__('White text', 'topseo'),
		'desc'   => esc_html__('Choose Yes if you want to the title is White color', 'topseo'),
	),
	'subtitle' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Heading Subtitle', 'topseo' ),
		'desc'  => esc_html__( 'Write the heading subtitle content. Add <br /> tag if the text is too long', 'topseo' ),
	),
	'heading' => array(
		'type'    => 'select',
		'label'   => esc_html__('Heading Size', 'topseo'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		),
		'value' => 'h2',
	),
	'centered' => array(
		'type'    => 'switch',
		'label'   => esc_html__('Centered', 'topseo'),
	)
);
