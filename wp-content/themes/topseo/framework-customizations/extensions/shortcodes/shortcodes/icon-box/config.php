<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Icon box', 'topseo' ),
	'description' => esc_html__( 'Add some Icon box', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'title_template' => '{{- title }}: {{- o.i_title }}',
);