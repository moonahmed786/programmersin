<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Button', 'topseo' ),
	'description' => esc_html__( 'Add a Button', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'icon' => 'fa fa-hand-pointer-o',
	'title_template' => '{{- title }}: {{- o.label }}',
);