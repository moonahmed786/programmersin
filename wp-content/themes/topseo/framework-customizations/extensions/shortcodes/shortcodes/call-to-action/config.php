<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Call To Action', 'topseo' ),
	'description' => esc_html__( 'Add a Call to Action', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	// 'title_template' => '{{- title }}: {{- o.message }}',
	'icon' 				=> 'fa fa-cubes'
);
