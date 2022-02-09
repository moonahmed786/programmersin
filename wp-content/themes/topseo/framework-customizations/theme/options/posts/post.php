<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => esc_html__('Post Options', 'topseo'),
		'type'    => 'box',
		'options' => array(
			'spc_opt' => array(
				'label' => false,
				'desc'  => false,
				'type'  => 'multi-picker',
				'picker' => array(
					'gadget' => array(
						'label'   => esc_html__('Custom Page Header', 'topseo'),
			            'type'    => 'switch',
			            'left-choice' => array(
			            	'label' => esc_html__('No', 'topseo'),
			            	'value' => 'no'
		            	),
		            	'right-choice' => array(
			            	'label' => esc_html__('Yes', 'topseo'),
			            	'value' => 'yes'
		            	),
		            	'value' => 'no',
					),
				),
				'choices' => array(
					'yes' => array(
						'spc_title' => array(
							'label' => esc_html__( 'Alternative Title', 'topseo' ),
							'desc'  => esc_html__( 'This will replace heading page title', 'topseo' ),
							'type'  => 'text',
						)
					),
				)
			),
				
			'galleries'       => array(
				'label' => esc_html__( 'Gallery Upload', 'topseo' ),
				'desc'  => esc_html__( 'Multiple Images for Gallery post format.',
					'topseo' ),
				'type'  => 'multi-upload',
			),
			'video_type' => array(
				'label' => esc_html__('Video embed', 'topseo'),
				'type' => 'short-select',
				'choices' => array(
					'youtube' => esc_html__('Youtube', 'topseo'),
					'vimeo' => esc_html__('Vimeo', 'topseo'),
				),
				'value' => 'youtube'
			),
			'video_url' => array(
				'label' => esc_html__('Video ID', 'topseo'),
				'desc' => wp_kses_post('Input only ID Video from Youtube or Vimeo. For exp:<br>https://www.youtube.com/watch?v=nrJtHemSPW4, only pick <b>nrJtHemSPW4</b><br>https://vimeo.com/180307714, only pick <b>180307714</b>', 'topseo'),
				'type' => 'short-text',
				'value' => esc_html('nrJtHemSPW4')
			),
			'audio' => array(
				'label' => esc_html__('Audio SoundCloud', 'topseo'),
				'desc' => esc_html__('Input SoundCloud iframe', 'topseo'),
				'type' => 'text',
			),
			'quote_thumb'             => array(
				'label' => esc_html__( 'Quote Thumbnail', 'topseo' ),
				'desc'  => esc_html__( 'Upload the background image for quote!',
					'topseo' ),
				'type'  => 'upload',
			),
			'quote' => array(
				'label' => esc_html__('Quote', 'topseo'),
				'desc' => esc_html__('Input a quote here!', 'topseo'),
				'type' => 'wp-editor',
			),
		),
	),
);