<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'type' => array(
        'label' => false,
        'desc' => false,
        'type' => 'multi-picker',
        'picker' => array(
            'gadget' => array(
                'label' => esc_html__('Project type', 'topseo'),
                'desc' => esc_html__('Choose type', 'topseo'),
                'type' => 'select',
                'choices' => array(
                    't1' => esc_html__('Project with Filter menu', 'topseo'),
                    't2' => esc_html__('Project with Carousel small thumbnail', 'topseo'),
                    't3' => esc_html__('Project with Carousel large thumbnail', 'topseo'),
                ),
                'value' => 't1',
            ),
        ),
        'choices' => array(
            't1' =>array(
                't1_filter' => array(
                    'type'  => 'switch',
                    'value' => 'on',
                    'label' => esc_html__('Filter', 'topseo'),
                    'left-choice' => array(
                        'value' => 'on',
                        'label' => esc_html__('On', 'topseo'),
                    ),
                    'right-choice' => array(
                        'value' => 'off',
                        'label' => esc_html__('Off', 'topseo'),
                    ),
                    'desc' => esc_html__('Switch On if you want display Filter', 'topseo'),
                ),
                't1_column' => array(
                    'label'   => esc_html__( 'Columns', 'topseo' ),
                    'type'    => 'short-select',
                    'value'   => '3',
                    'desc'    => esc_html__( 'It can be display with 2, 3 and 4 columns.', 'topseo' ),
                    'choices' => array(
                        '6' => '2',
                        '4' => '3',
                        '3' => '4',
                    ),
                    'value' => '4',
                ),
                't1_style' => array(
                    'type'    => 'short-select',
                    'label'   => esc_html__('Style', 'topseo'),
                    'choices' => array(
                        'normal' => 'Normal',
                        'no_margin' => 'No Margin',
                    ),
                    'value' => 'normal',
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
                    'source' => 'fw-portfolio',
                    'prepopulate' => 20,
                    'label' => esc_html__( 'Select post(s)', 'topseo' ),
                    'desc' => false,
                ),
            ),
            'p2' => array(
                'p2_ops' => array(
                    'type' => 'multi-select',
                    'population' => 'taxonomy',
                    'prepopulate' => 20,
                    'source' => 'fw-portfolio-category',
                    'label' => esc_html__( 'Select category(s)', 'topseo' ),
                    'desc' => false,
                ),
            ),
        ),
    ),
);