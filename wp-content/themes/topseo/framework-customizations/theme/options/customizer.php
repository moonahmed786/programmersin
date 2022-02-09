<?php

$options = array(
    // general ---------------
    'general' => array(
        'type' => 'box',
        'title' => esc_html__('General', 'topseo'),
        'wp-customizer-args' => array(
            'priority' => 0,
        ),
        'options' => array(
            // page loader
            'page_loader' => array(
                'type' => 'ht-switch',
                'label' => esc_html__('Enable Page Loader Animation', 'topseo'),
                'desc' => esc_html__('This option shows animated page loader', 'topseo'),
                'value' => 'no',
            ),
            'c_page_transition' => array(
                'type' => 'ht-switch',
                'label' => esc_html__('Enable Page Loader Transition', 'topseo'),
                'desc' => esc_html__('This option shows transition when click to new page', 'topseo'),
                'value' => 'yes',
            ),
            'c_blog_detail' => array(
                'type' => 'text',
                'label' => esc_html('Blog detail title', 'topseo'),
                'desc' => esc_html('Change blog detail title in page header', 'topseo'),
                'value' => 'Blog detail',
            ),
            'infinite_scroll' => array(
                'type' => 'ht-switch',
                'label' => esc_html__('Enable Infinite Scroll', 'topseo'),
                'desc' => esc_html__('Infinite Scroll will be enable in Blog Maonsry Layout', 'topseo'),
                'value' => 'yes',
            ),
        ),
    ),
    // header ---------------
    'c_header' => array(
        'type' => 'box',
        'title' => esc_html__('Page Header', 'topseo'),
        'wp-customizer-args' => array(
            'priority' => 5,
        ),
        'options' => array(
            'c_page_header' => array(
                'label' => esc_html__('Page Header', 'topseo'),
                'desc' => esc_html__('Enable/Disable page header in all page.', 'topseo'),
                'type' => 'ht-switch',
                'value' => 'yes',
            ),
            'c_breadcrumb' => array(
                'label' => esc_html__('Breadcrumb', 'topseo'),
                'desc' => esc_html__('Enable/Disable breadcrumb in all page.', 'topseo'),
                'type' => 'ht-switch',
                'value' => 'yes',
            ),
        ),
    ),
    // footer ---------------
    'c_footer' => array(
        'type' => 'box',
        'title' => esc_html__('Footer', 'topseo'),
        'wp-customizer-args' => array(
            'priority' => 6,
        ),
        'options' => array(
            'c_copyright' => array(
                'type' => 'textarea',
                'label' => esc_html__('Copyright', 'topseo'),
                'desc' => esc_html__('Write some text', 'topseo'),
                'value' => 'Copyright &#169; 2016 <a href="#" class="site-name">TopSEO</a>, Developed by <a href="http://themeforest.net/user/haintheme" class="designed-by">Haintheme</a>'
            ),
            'c_social_links'            => array(
          		'label'  => esc_html__( 'Soical Links', 'topseo' ),
          		'type'   => 'addable-option',
          		'option' => array(
          			'type' => 'text',
          		),
          		'value'  => array( 'http://facebook.com', 'http://twitter.com', 'http://vimeo.com' ),
          		'desc'   => esc_html__( 'Add the list of social link icon to the footer.',
          			'topseo' ),
          	),
        ),
    ),
    // 404---------------
    'c_404' => array(
        'type' => 'box',
        'title' => esc_html__('404', 'topseo'),
        'options' => array(
            'c_contact_btn' => array(
                'type' => 'text',
                'label' => esc_html__('Contact label', 'topseo'),
                'desc' => esc_html__('Contact label button', 'topseo'),
                'value' => 'Contact'
            ),
            'c_contact_link'            => array(
          		'label'  => esc_html__( 'Contact URL', 'topseo' ),
          		'type'   => 'text',
          		'value'  => '#',
          		'desc'   => esc_html__( 'Add the link of your contact page.',
          			'topseo' ),
          	),
        ),
    ),
);
