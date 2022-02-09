<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'datetime' => array(
		'label' => esc_html__('Time', 'topseo'),
		'desc'  => esc_html__('Enter date. For example: April 1, 2015 00:00:00', 'topseo'),
		'type'  => 'text',
		'value' => 'April 1, 2020 00:00:00'
	),
	'day_text' => array(
		'label' => esc_html__('Day Text', 'topseo'),
		'type'  => 'text',
		'value' => 'Day'
	),
	'bg_day_text' => array(
		'label' => esc_html__('Background Text', 'topseo'),
		'type'  => 'color-picker',
		'value' => '#27ae60'
	),
	'hou_text' => array(
		'label' => esc_html__('Hour Text', 'topseo'),
		'type'  => 'text',
		'value' => 'Hour'
	),
	'bg_hou_text' => array(
		'label' => esc_html__('Background Hour Text', 'topseo'),
		'type'  => 'color-picker',
		'value' => '#ffa506'
	),
	'min_text' => array(
		'label' => esc_html__('Minute Text', 'topseo'),
		'type'  => 'text',
		'value' => 'Minute'
	),
	'bg_min_text' => array(
		'label' => esc_html__('Background Minute Text', 'topseo'),
		'type'  => 'color-picker',
		'value' => '#ce1bcc'
	),
	'sec_text' => array(
		'label' => esc_html__('Second Text', 'topseo'),
		'type'  => 'text',
		'value' => 'Second'
	),
	'bg_sec_text' => array(
		'label' => esc_html__('Background Second Text', 'topseo'),
		'type'  => 'color-picker',
		'value' => '#12cbc0'
	),
);