<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'icon' => array(
        'label' => esc_html__('Icon', 'topseo'),
        'desc' => esc_html__('Choose icon', 'topseo'),
        'type' => 'icon',
        'set' => 'ionicon',
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'topseo'),
        'desc' => esc_html__('Write some text', 'topseo'),
    ),
    'content' => array(
        'type' => 'textarea',
        'label' => esc_html__('Content', 'topseo'),
        'desc' => esc_html__('Write some text', 'topseo'),
    ),
);