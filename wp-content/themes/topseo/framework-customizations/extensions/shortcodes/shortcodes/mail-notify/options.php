<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'title' => array(
		'label' => esc_html__('Title', 'topseo'),
		'desc'  => esc_html__('Enter title', 'topseo'),
		'type'  => 'text',
		'value' => 'KEEP ME UPDATE'
	),
	'name' => array(
		'label' => esc_html__('Your name', 'topseo'),
		'desc'  => esc_html__('Enter your name', 'topseo'),
		'type'  => 'text',
		'value' => 'Your name'
	),
	'name_ico' => array(
		'label' => esc_html__('Icon name', 'topseo'),
		'type'  => 'icon-v2',
	),
	'mail' => array(
		'label' => esc_html__('Your email', 'topseo'),
		'desc'  => esc_html__('Enter your email', 'topseo'),
		'type'  => 'text',
		'value' => 'Your email'
	),
	'mail_ico' => array(
		'label' => esc_html__('Icon email', 'topseo'),
		'type'  => 'icon-v2',
	),
	'submit' => array(
		'label' => esc_html__('Button label', 'topseo'),
		'desc'  => esc_html__('Enter button label', 'topseo'),
		'type'  => 'text',
		'value' => 'NOTIFY ME!'
	),
	'action' => array(
		'label' => esc_html__('Form action', 'topseo'),
		'desc'  => esc_html__('Enter form action', 'topseo'),
		'type'  => 'text',
		'value' => '#'
	),
);
