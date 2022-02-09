<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Table', 'topseo' ),
	'description' => esc_html__( 'Add new table', 'topseo' ),
	'tab'         => esc_html__( 'TopSeo', 'topseo' ),
	'icon' => 'fa fa-table',
	'popup_size'  => 'large'
);