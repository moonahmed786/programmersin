<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Accordion', 'topseo' ),
	'description' => esc_html__( 'Add an Accordion', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'icon' => 'fa fa-map-o'
);