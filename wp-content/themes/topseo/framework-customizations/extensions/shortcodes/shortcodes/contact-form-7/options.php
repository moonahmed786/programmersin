<?php if (!defined('FW')) die('Forbidden');
$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
$rs = array();
if( $data = get_posts($args)){
	foreach($data as $key){
		$rs[$key->ID] = $key->post_title;
	}
}else{
	$rs['0'] = esc_html__('No Contact Form found', 'topseo');
}

$options = array(
    'ctf' => array(
        'type' => 'select',
        'label' => esc_html__('Contact Form', 'topseo'),
        'desc' => esc_html__('Choose your Contact form', 'topseo'),
        'choices' => $rs
    ),
);