<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style'        => array(
		'label'   => __( 'Styles', 'topseo' ),
		'type'    => 'image-picker',
		'value'   => 'choice-1',
		'attr'    => array(
			'data-height' => 60
		),
		'choices' => array(
			'choice-1' => array(
				'small' => array(
					'height' => 60,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_1.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_1.jpg'
				),
			),
			'choice-2' => array(
				'small' => array(
					'height' => 60,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_2.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_2.jpg'
				),
			),
			'choice-3' => array(
				'small' => array(
					'height' => 60,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_3.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => get_template_directory_uri() . '/images/picker-images/testi_3.jpg'
				),
			),
		),
	),
	'testimonials'      => array(
		'type'       => 'multi-select',
		'label'      => esc_attr__( 'Multi-Select: Testimonials', 'topseo' ),
		'population' => 'posts',
		'source'     => 'ht-testimonial',
		'desc'       => esc_attr__( 'Select multiple testimonials.', 'topseo' ),
	),
	'color' => array(
		'type' => 'color-picker',
		'label' => esc_html__('Text color', 'topseo'),
		'desc' => esc_html__('Choose color', 'topseo'),
		'value' => '#ffffff',
	),
);
