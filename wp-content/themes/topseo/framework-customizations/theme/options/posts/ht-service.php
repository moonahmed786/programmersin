<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'page_option' => array(
        'title'   => esc_html__('Page Options', 'topseo'),
        'type'    => 'box',
        'options' => array(
            'page_option_page_header'       => array(
                'type'         => 'multi-picker',
                'label'        => false,
                'desc'         => false,
                'picker'       => array(
                    'gadget' => array(
                        'label'        => esc_html__( 'Custom Page Header', 'topseo' ),
                        'type'         => 'short-select',
                        'choices' => array(
                            'default' => 'Default',
                            'enable' => esc_html__( 'Enable', 'topseo' ),
                            'disable' => esc_html__( 'Disable', 'topseo' )
                        ),
                        'value'        => 'default',
                        'desc'         => esc_html__('Choose Enable if you want to custom Page Header for this page only.', 'topseo'),
                        'help'         => esc_html__( 'Page header will show image, page title and breadcrumb of page.','topseo' ),
                    )
                ),
                'choices'      => array(
                    'enable'  => array(
                        'p_breadcrumb_bg_select'        => array(
                            'type'         => 'multi-picker',
                            'label'        => false,
                            'desc'         => false,
                            'value'        => array(
                                'gadget' => 'color',
                            ),
                            'picker'       => array(
                                'gadget' => array(
                                    'label'   => esc_html__( 'Select Background', 'topseo' ),
                                    'type'    => 'radio',
                                    'choices' => array(
                                        'color'  => esc_html__( 'Background Color', 'topseo' ),
                                        'image' => esc_html__( 'Background Image', 'topseo' )
                                    ),
                                    'desc'    => esc_html__( 'If select background image option, the theme recommends a header size of at least 1170 width pixels','topseo' ),
                                )
                            ),
                            'choices'      => array(
                                'color'  => array(
                                    'p_header_bg_color' => array(
                                        'label' => esc_html__( 'Background Color', 'topseo' ),
                                        'type'  => 'color-picker',
                                        'value' => '#252c44',
                                    ),
                                ),
                                'image' => array(
                                    'p_header_bg_image'       => array(
                                        'label' => esc_html__( 'Single Upload (Images Only)', 'topseo' ),
                                        'type'  => 'upload',
                                    ),
                                ),
                            ),
                        ),
                        'p_switch' => array(
                            'label' => false,
                            'desc' => false,
                            'type' => 'multi-picker',
                            'picker' => array(
                                'gadget' => array(
                                    'label' => esc_html__('Pattern image', 'topseo'),
                                    'desc' => false,
                                    'type' => 'switch',
                                    'right-choice' => array(
                                        'label' => esc_html__('On', 'topseo'),
                                        'value' => 'p_on'
                                    ),
                                    'left-choice' => array(
                                        'label' => esc_html__('Off', 'topseo'),
                                        'value' => 'p_off'
                                    ),
                                    'value' => 'p_off',
                                )
                            ),
                            'choices' => array(
                                'p_off' => array(),
                                'p_on' => array(
                                    'p_pattern' => array(
                                        'label' => esc_html__('Add your image', 'topseo'),
                                        'desc' => false,
                                        'type' => 'addable-popup',
                                        'limit' => 3,
                                        'template' => '{{- p_p2 }}',
                                        'popup-options' => array(
                                            'p_p1' => array(
                                                'label' => esc_html__('Pattern image', 'topseo'),
                                                'desc' => esc_html__('Choose image', 'topseo'),
                                                'type' => 'upload'
                                            ),
                                            'p_p2' => array(
                                                'label' => esc_html__('Position: Right/Left', 'topseo'),
                                                'type' => 'short-select',
                                                'choices' => array(
                                                    'left' => esc_html__('Left', 'topseo'),
                                                    'right' => esc_html__('Right', 'topseo'),
                                                ),
                                                'value' => 'right'
                                            ),
                                            'p_p3' => array(
                                                'label' => esc_html__('Value', 'topseo'),
                                                'type' => 'slider',
                                                'properties' => array(
                                                    'min' => -20,
                                                    'max' => 20,
                                                    'step' => 1,
                                                ),
                                                'value' => 0
                                            ),
                                            'p_p4' => array(
                                                'label' => esc_html__('Position: Top/Bottom', 'topseo'),
                                                'type' => 'short-select',
                                                'choices' => array(
                                                    'top' => esc_html__('Top', 'topseo'),
                                                    'bottom' => esc_html__('Bottom', 'topseo'),
                                                ),
                                                'value' => 'right'
                                            ),
                                            'p_p5' => array(
                                                'label' => esc_html__('Value', 'topseo'),
                                                'type' => 'slider',
                                                'properties' => array(
                                                    'min' => -20,
                                                    'max' => 20,
                                                    'step' => 1,
                                                ),
                                                'value' => 0
                                            ),
                                        ),
                                    ),
                                ),
                            )
                        ),
                    ),
                ),
                'show_borders' => true,
            ),
        )
    )
);
