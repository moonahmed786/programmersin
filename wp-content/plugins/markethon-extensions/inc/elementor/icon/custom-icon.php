<?php 
add_filter( 'elementor/icons_manager/additional_tabs', function(){
	return [
		'ion-ionicons' => [
			'name' => 'ion-ionicons',
			'label' => __( 'Ionic Custom', 'markethon' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'ion-',
			'displayPrefix' => 'ion',
			'labelIcon' => 'ion ion-android-add',
			'ver' => '1.0',
			'fetchJson' => MARKETHON_TH_URL.'/assest/js/ionicons.js',
			'native' => true,
        ],
        'typ-typicons' => [
			'name' => 'typ-typicons',
			'label' => __( 'Typicons', 'markethon' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'typcn-',
			'displayPrefix' => 'typcn',
			'labelIcon' => 'typcn typcn-anchor',
			'ver' => '1.0',
			'fetchJson' => MARKETHON_TH_URL.'/assest/js/typicons.js',
			'native' => true,
		],
	];
}
);


add_action('elementor/editor/before_enqueue_scripts', function() {
	wp_enqueue_style('ionicons', MARKETHON_TH_URL.'/assest/css/ionicons.min.css',array(), '2.0.0', 'all');
	wp_enqueue_style('typicon', MARKETHON_TH_URL.'/assest/css/typicon.min.css',array(), '2.0.9', 'all');
});
?>