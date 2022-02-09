<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'type' => array(
        'label' => false,
        'desc' => false,
        'type' => 'multi-picker',
        'picker' => array(
            'gadget' => array(
                'label' => esc_html__('Service type', 'topseo'),
                'desc' => esc_html__('Choose type', 'topseo'),
                'type' => 'select',
                'choices' => array(
                    't1' => esc_html__('Service with Carousel', 'topseo'),
                    't2' => esc_html__('Service with Box', 'topseo'),
                    't3' => esc_html__('Normal', 'topseo'),
                ),
                'value' => 't1',
            ),
        ),
        'choices' => array(
            't2' =>array(
                't2_column' => array(
                    'type'    => 'short-select',
                    'label'   => esc_html__('Column', 'topseo'),
                    'choices' => array(
                        '6' => '2',
                        '4' => '3',
                        '3' => '4',
                    ),
                    'value' => '4',
                ),
                't2_eff' => array(
                    'type' => 'switch',
                    'label' => esc_html__('Special hover effect', 'topseo'),
                    'left-choice' => array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'topseo'),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'topseo'),
                    ),
                    'value' => 'yes'
                ),
            ),
        ),
    ),
    'item' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'gadget' => array(
                'type' => 'select',
                'label' => esc_html__('Pick post by:', 'topseo'),
                'desc' => false,
                'choices' => array(
                    'p1' => esc_html__('Single post', 'topseo'),
                    'p2' => esc_html__('Categories', 'topseo'),
                ),
            ),
        ),
        'choices' => array(
            'p1' => array(
                'p1_ops' => array(
                    'type' => 'multi-select',
                    'population' => 'posts',
                    'source' => 'ht-service',
                    'prepopulate' => 20,
                    'label' => esc_html__( 'Select post(s)', 'topseo' ),
                    'desc' => false,
                ),
            ),
            'p2' => array(
                'p2_ops' => array(
                    'type' => 'multi-select',
                    'population' => 'taxonomy',
                    'source' => 'ht-service-filter',
                    'prepopulate' => 20,
                    'label' => esc_html__( 'Select category(s)', 'topseo' ),
                    'desc' => false,
                ),
            ),
        ),
    ),
);