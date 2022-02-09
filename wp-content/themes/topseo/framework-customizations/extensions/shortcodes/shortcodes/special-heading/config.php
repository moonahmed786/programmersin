<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
	'title'         => esc_html__('Special Heading', 'topseo'),
	'description'   => esc_html__('Add a Special Heading', 'topseo'),
	'tab'           => esc_html__('Content Elements', 'topseo'),
	'title_template' => '{{- title }}: {{- o.title }}',
);
