<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Lists', 'topseo' ),
	'description' => esc_html__( 'Add some Lists', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'icon' => 'fa fa-list-ol'
);