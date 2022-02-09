<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Landing Box', 'topseo' ),
	'description' => esc_html__( 'Add some Landing box', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'icon' => 'fa fa-eye',
	'title_template' => '{{- title }}: {{- o.title }}',
);