<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'contact' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Contact Info', 'topseo'),
        'desc' => esc_html__('Add your contact info', 'topseo'),
        'template' => '{{- info}}',
        'popup-options' => array(
            'icon' => array(
                'type' => 'icon',
                'set' => 'ionicon',
                'label' => esc_html__('Icon', 'topseo'),
                'desc' => esc_html__('Add icon', 'topseo'),
            ),
            'info' => array(
                'type' => 'text',
                'label' => esc_html__('Contact info', 'topseo'),
                'desc' => esc_html__('Write some text', 'topseo'),
            ),
        ),
    ),
);