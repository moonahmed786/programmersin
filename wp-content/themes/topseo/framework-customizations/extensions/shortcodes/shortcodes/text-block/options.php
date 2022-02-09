<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => __( 'Content', 'topseo' ),
		'desc'   => __( 'Enter some content for this texblock', 'topseo' ),
        'shortcodes' => true
	),
);
