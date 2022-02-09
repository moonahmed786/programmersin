<?php

/*CUSTOM ID*/
TopSeo_Kirki::add_config( 'topseo', array(
 	'option_type' => 'theme_mod',
 	'capability'  => 'edit_theme_options',
 ) );

/*ADD CUSTOM SECTION*/
TopSeo_Kirki::add_section( 'colors', array(
 	'title'      => esc_attr__( 'Colors', 'topseo' ),
 	'priority'   => 1,
 	'capability' => 'edit_theme_options',
) );

TopSeo_Kirki::add_section( 'typography', array(
 	'title'      => esc_attr__( 'Typography', 'topseo' ),
 	'priority'   => 2,
 	'capability' => 'edit_theme_options',
) );

TopSeo_Kirki::add_section( 'c_menu', array(
 	'title'      => esc_attr__( 'Navigation', 'topseo' ),
 	'priority'   => 3,
 	'capability' => 'edit_theme_options',
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'menu_transparent_typography',
 	'label'       => esc_attr__( 'Mainmenu Transparent Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the typography options for your Main menu transparent.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 1,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => '600',
        'font-size'   => '14px',
        'color'       => '#ffffff',
 	),
 	'transport'   => 'auto',
 	'output'      => array(
 		array(
 			'element' => '.menu-style-1 .primary-menu > li > a',
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'menu_typography',
 	'label'       => esc_attr__( 'Mainmenu Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the typography options for your Main menu.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 1,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => '600',
        'font-size'   => '14px',
        'color'       => '#232323',
 	),
 	'transport'   => 'auto',
 	'output'      => array(
 		array(
 			'element' => '.menu-style-2 .primary-menu > li > a, .menu-box.topseo-not-top .primary-menu > li > a',
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'submenu_typography',
 	'label'       => esc_attr__( 'Submenu Mainmenu Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the typography options for your Submenu.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 1,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => '600',
        'font-size'   => '12px',
        'color'       => '#999999',
 	),
 	'transport'   => 'auto',
 	'output'      => array(
 		array(
 			'element' => 'body #mainview .sub-menu:not(.mega-menu-row) a',
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'megamenu_heading_typography',
 	'label'       => esc_attr__( 'Megamenu Heading Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the typography options for your Megamenu Heading.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 1,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => '600',
        'font-size'   => '16px',
        'color'       => '#232323',
 	),
 	'transport'   => 'auto',
 	'output'      => array(
 		array(
 			'element' => '.menu-item-has-mega-menu .mega-menu-row > li > a',
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'sub_megamenu_typography',
 	'label'       => esc_attr__( 'Submenu Megamenu Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the typography options for your Main menu.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 1,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => '600',
        'font-size'   => '12px',
        'color'       => '#999999',
 	),
 	'transport'    => 'auto',
 	'output'       => array(
 		array(
 			'element' => 'body #mainview .menu-box-right .menu-item-has-mega-menu .mega-menu-row .sub-menu a',
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'body_typography',
 	'label'       => esc_attr__( 'Body Typography', 'topseo' ),
 	'description' => esc_attr__( 'Select the main typography options for your site.', 'topseo' ),
 	'section'     => 'typography',
 	'priority'    => 2,
 	'default'     => array(
        'font-family' => 'Lato',
        'font-weight' => '400',
        'font-size'   => '14px',
        'line-height' => '24px',
        'color'       => '#686868',
 	),
 	'output'      => array(
 		array(
 			'element' => array(
                'body p, .fw-desc, .servide-desc',
                '.textblock-shortcode, .accordion_in .acc_content span',
                '.ourblog-bottom-info a, .ourblog-bottom-info dd, input, textarea, .footer-contact-info li'
            )
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'topbar_text',
 	'label'       => esc_attr__( 'Topbar Text', 'topseo' ),
 	'description' => esc_attr__( 'Select the topbar typography options for your site.', 'topseo' ),
 	'section'     => 'typography',
	'priority'    => 3,
 	'default'     => array(
        'font-family' => 'Lato',
        'font-weight' => 'regular',
 	),
 	'output'      => array(
 		array(
 			'element' => '.topbar-text'
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
 	'type'        => 'typography',
 	'settings'    => 'topbar_link',
 	'label'       => esc_attr__( 'Topbar Link/Button', 'topseo' ),
 	'description' => esc_attr__( 'Select the topbar typography options for your site.', 'topseo' ),
 	'section'     => 'typography',
	'priority'    => 3,
 	'default'     => array(
        'font-family' => 'Poppins',
        'font-weight' => 600,
 	),
 	'output'      => array(
 		array(
 			'element' => '.tel, .topbar-btn'
 		),
 	),
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'typography',
    'settings' => 'heading_typography',
    'label'    => esc_attr__( 'Heading', 'topseo' ),
    'section'  => 'typography',
    'priority' => 3,
    'default'  => array(
         'font-family' => 'Poppins',
         'font-weight' => '700',
         'color'       => '#232323',
 	),
 	'output'    => array(
 		array(
 			'element' => array(
                'h1, h2, h3, h4, h5, h6',
                '.accordion_in .acc_head',
                '.services-rm-btn', 
                '.ht-btn',
                '.ht-btn-normal',
                '.our-blog-top-news a',
                '.footer-email-submit',
                '.contact-form input[type="submit"]',
                '.services-title-btn',
                '.our-blog-special-rm',
                '.case-readmore'
			)
 		),
 	),
 ));


/* GENARAL
******************************************************************************************************/

/*CUSTOM CSS*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'code',
    'settings'    => 'customizer_css',
    'label'       => esc_attr__( 'Custom CSS', 'topseo' ),
    'description' => esc_attr__( 'Add your custom CSS here to change style of theme.', 'topseo' ),
    'section'     => 'general',
    'priority'    => 30,
    'choices'     => array(
        'language' => 'css',
    )
) );

/*BLOG SIDEBAR*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'radio-image',
    'settings'    => 'c_blog_layout',
    'label'       => esc_html__( 'Blog Layout', 'topseo' ),
    'section'     => 'general',
    'description' => esc_attr__( 'Select the layout of Blog & blog single.', 'topseo' ),
    'default'     => 'right',
    'priority'    => 19,
    'choices'     => array(
        'full'  => get_template_directory_uri() . '/images/picker-images/full.png',
        'left'  => get_template_directory_uri() . '/images/picker-images/left.png',
        'right' => get_template_directory_uri() . '/images/picker-images/right.png',
    ),
) );

/*SHOP SIDEBAR*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'radio-image',
    'settings'    => 'c_shop_layout',
    'label'       => esc_html__( 'Shop Layout', 'topseo' ),
    'section'     => 'general',
    'description' => esc_attr__( 'Select the layout of Archive product page .', 'topseo' ),
    'default'     => 'right',
    'priority'    => 20,
    'choices'     => array(
        'full'  => get_template_directory_uri() . '/images/picker-images/full.png',
        'left'  => get_template_directory_uri() . '/images/picker-images/left.png',
        'right' => get_template_directory_uri() . '/images/picker-images/right.png',
    ),
) );

/*LOGO*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'image',
    'priority' => 3,
    'settings' => 'logo_image_1',
    'label'    => esc_attr__( 'Logo', 'topseo' ),
    'section'  => 'general',
));

/*LOGO FOR STICK MENU*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'image',
    'priority' => 4,
    'settings' => 'logo_image_2',
    'label'    => esc_attr__( 'Logo for stick menu', 'topseo' ),
    'section'  => 'general',
));


/* HEAADER
******************************************************************************************************/

/*BACKGROUND*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'radio',
    'settings'    => 'c_header_bg',
    'label'       => esc_attr__( 'Background Header', 'topseo' ),
    'description' => esc_attr__('If select background image option, the theme recommends a header size of at least 1170 width pixels', 'topseo'),
    'section'     => 'c_header',
    'default'     => 'bg_color',
    'priority'    => 20,
    'choices'     => array(
        'bg_image' => esc_attr__( 'Background Image', 'topseo' ),
        'bg_color' => esc_attr__( 'Background Color', 'topseo' ),
    )
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'image',
    'settings'        => 'c_header_bg_image',
    'label'           => esc_attr__( 'Upload Image', 'topseo' ),
    'section'         => 'c_header',
    'description'     => esc_attr__( 'Upload background image of page header here!', 'topseo' ),
    'priority'        => 30,
    'active_callback' => array(
        array(
            'setting'  => 'c_header_bg',
            'operator' => '==',
            'value'    => 'bg_image',
        ),
    )
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'      => 'color',
    'settings'  => 'c_header_bg_color',
    'label'     => esc_attr__( 'Select Color', 'topseo' ),
    'section'   => 'c_header',
    'default'   => '#252c44',
    'transport' => 'auto',
    'priority'  => 40,
    'output' => array(
        array(
            'element'  => 'body .breadcrumb',
            'property' => 'background-color',
        )
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'c_header_bg',
            'operator' => '!=',
            'value'    => 'bg_image',
        ),
    )
));

/*PARTEN IMAGE*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'radio',
    'settings'    => 'c_pattern_bg',
    'label'       => esc_attr__( 'Pattern images', 'topseo' ),
    'description' => esc_attr__('This option supports 3 patterns', 'topseo'),
    'section'     => 'c_header',
    'default'     => 'off',
    'choices'     => array(
        'on'  => esc_attr__( 'On', 'topseo' ),
        'off' => esc_attr__( 'Off', 'topseo' ),
    ),
    'partial_refresh' => array(
        'breadcrumb_edit_location' => array(
            'selector'        => '#breadcrumb-edit-location',
            'render_callback' => 'topseo_edit_location',
        ),
    ),
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'radio',
    'settings'        => 'c_enable_animate',
    'label'           => esc_attr__( 'Enable Animate', 'topseo' ),
    'description'     => esc_attr__('Choose Yes if you want to display animate on Page header', 'topseo'),
    'section'         => 'c_header',
    'active_callback' => array(
        array(
            'setting'  => 'c_pattern_bg',
            'operator' => '==',
            'value'    => 'on',
        ),
    ),
    'choices'     => array(
        'yes' => esc_attr__( 'Yes', 'topseo' ),
        'no'  => esc_attr__( 'No', 'topseo' ),
    ),
    'default' => 'yes'
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'image',
    'settings'        => 'c_pattern_bg_1',
    'label'           => esc_attr__( 'Upload Pattern 1', 'topseo' ),
    'section'         => 'c_header',
    'active_callback' => array(
        array(
            'setting'  => 'c_pattern_bg',
            'operator' => '==',
            'value'    => 'on',
        ),
    )
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'image',
    'settings'        => 'c_pattern_bg_2',
    'label'           => esc_attr__( 'Upload Pattern 2', 'topseo' ),
    'section'         => 'c_header',
    'active_callback' => array(
        array(
            'setting'  => 'c_pattern_bg',
            'operator' => '==',
            'value'    => 'on',
        ),
    )
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'image',
    'settings'        => 'c_pattern_bg_3',
    'label'           => esc_attr__( 'Upload Pattern 3', 'topseo' ),
    'section'         => 'c_header',
    'active_callback' => array(
        array(
            'setting'  => 'c_pattern_bg',
            'operator' => '==',
            'value'    => 'on',
        ),
    )
) );

/*TOPBAR LEFT*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'code',
    'settings' => 'c_topbar_left',
    'label'    => esc_attr__( 'Topbar Left', 'topseo' ),
    'section'  => 'c_header',
    'choices'  => array(
        'language' => 'html',
    ),
    'default' =>
        '<div class="lang">
            <select>
                <option>English</option>
            </select>
        </div>
        <div class="tel ion-ios-telephone">1-800-888-6789</div>
        <div class="chathead">
        <span><a href="#" class="ion-social-skype"></a></span>
        <span><a href="#" class="ion-chatbubble-working"></a></span>
        </div>',
    'priority' => 50,
    'partial_refresh' => array(
        'topbar_edit_location' => array(
            'selector'        => '#topbar-edit-location',
            'render_callback' => 'topseo_edit_location',
        ),
    ),
) );

/*TOPBAR RIGHT*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'code',
    'settings' => 'c_topbar_right',
    'label'    => esc_attr__( 'Topbar Right', 'topseo' ),
    'section'  => 'c_header',
    'choices'  => array(
        'language' => 'html',
    ),
    'default' =>
        '<span class="topbar-text">Check your rankings 24 x 7 in your SEO client</span>
        <a href="#" class="topbar-btn ion-speedometer">FREE SEO SCAN</a>',
    'priority' => 60,
) );

/*SOLID BORDER*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'color',
    'settings'    => 'solid_vertical',
    'label'       => esc_attr__( 'Background Solid Vertical', 'topseo' ),
    'description' => esc_attr__( 'Choose color', 'topseo' ),
    'section'     => 'c_header',
    'default'     => '#454b60',
    'priority'    => 40,
    'output'      => array(
        array(
            'element'  => '.breadcrumb .bread:after',
            'property' => 'background'
        ),
    ),
) );


/* COLOR
******************************************************************************************************/

/*PRIMARY COLOR*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'color',
    'settings'    => 'primary_color',
    'label'       => esc_attr__( 'Primary color', 'topseo' ),
    'description' => esc_attr__( 'Choose color', 'topseo' ),
    'section'     => 'colors',
    'default'     => '#27ae61',
    'priority'    => 1,
    'transport'   => 'auto',
    'output'      => array(
		/*COLOR*/
		array(
			'element' => array(
				'#mainview .search-form-button:hover',
				'#mainview .collapse-button:hover',
				'#mainview .fw-special-title span',
				'#mainview .current-style-menu-1 > a',
				'#mainview .sub-menu a:hover',
				'#mainview .services-rm-btn',
				'#mainview .case-readmore-btn:hover',
				'#mainview .our-blog-special-btn:hover',
				'#mainview .footer-tw-cmt a.footer-tweet-user',
				'#mainview .right-copyright a:hover',
				'#mainview .our-blog-top-news h4:hover a',
				'#mainview .our-blog-top-news h4:hover i',
				'#mainview .footer-email-input:focus',
				'#mainview .left-copyright .site-name',
				'#mainview .footer-link-list a:hover',
				'#mainview .footer-popular-post a:hover',
				'#mainview .acc_rm',
				'#mainview .action-menu > li > a:hover',
				'#mainview .menu-box-right .primary-menu > li:hover > a',
				'#mainview .green-color',
				'#mainview .btn-no-bg',
				'#mainview .btn-normal:hover',
				'#mainview .services-get-quote button:hover',
				'#mainview .services-get-quote input:focus',
				'#mainview .services-get-quote textarea:focus',
				'#mainview .services-faqs li:hover a',
				'#mainview .services-faqs li:hover i',
				'#mainview .comment-form input[type="submit"]',
				'#mainview .comment-btn-reply',
				'#mainview .blog-btn-read-more a:hover',
				'#mainview .contact-info-btn a:hover',
				'#mainview .contact-form button',
				'#mainview .contact-form input:focus',
				'#mainview .action-menu > li > a:hover',
				'#mainview .has-seo-children-menu:hover > a',
				'#mainview .primary-menu > li.current-menu-item > a',
				'#mainview .primary-menu > li.current-menu-ancestor > a',
				'.ht-btn:hover','.box-button .ht-btn.ht-btn-normal:hover',
				'#mainview .our-blog-special-item.blog-post-2-columns .our-blog-date',
				'#mainview .contact-form input[type="submit"]:hover',
				'#mainview .primary-menu li:not(.menu-item-has-mega-menu) .sub-menu li:hover > a',
				'#mainview .contact-form-2 input[type="submit"]:hover',
				'.seotabs-v4 .seotab-nav a:hover',
				'#mainview .menu-box-right .sub-menu li',
				'#mainview .menu-box-right .menu-item-has-mega-menu .mega-menu-row .sub-menu i',
				'.woo-pro .button:hover',
				'.add_to_wishlist:hover:before',
				'.yith-wcwl-wishlistaddedbrowse:before',
				'.yith-wcwl-wishlistexistsbrowse:before',
				'.added_to_cart:hover:before',
				'.action-menu .buttons a:hover',
				'.action-menu .mini_cart_item a:not(.remove):hover',
				'.action-menu .has-shopping-cart-icon:hover > a',
				'.footer-contact-info span',
				'.woo-single .cart button:hover',
				'.woo-single .woo-pro .button',
				'.place-order input[type="submit"]:hover',
				'.woocommerce-info a.showlogin',
				'.woocommerce .login input[type="submit"]:hover',
				'.woocommerce .woocommerce-MyAccount-navigation li a',
				'.woocommerce .woocommerce-MyAccount-orders .view:hover',
				'.woocommerce .woocommerce-MyAccount-content input[type="submit"]:hover',
				'.service-detail-sidebar-quote input[type="submit"]:hover',
				'.primary-menu > li > .sub-menu li a:before',
				'.f-copyright a',
				'.landing-btn a'
            ),
			'property' => 'color'
		),

		/*BACKGROUND*/
		array(
			'element' => array(
				'.topbar-btn',
				'.btn-normal',
				'.free-seo-col button',
				'.footer-email-submit',
				'.btn-no-bg:hover',
				'.about-video-btn',
				'.footer-tag-list a:hover',
				'.menu-style-2 .primary-menu > li > a:before',
				'.menu-style-2 .primary-menu > li > a:after',
				'.services-rm-btn:hover',
				'.srvice-detail-info-bottom',
				'.services-get-quote button',
				'.btn-buss',
				'.comment-form input[type="submit"]:hover',
				'.blog-btn-read-more a',
				'.blog-post-video-btn:hover',
				'.case-detail-quote-submit',
				'.contact-info-btn a',
				'.contact-form button:hover',
				'.our-blog-overlay:before',
				'.case-overlay-banner',
				'#mainview .menu-style-2 .primary-menu > li.current-menu-ancestor > a:before',
				'#mainview .menu-style-2 .primary-menu > li.current-menu-ancestor > a:after',
				'#mainview .menu-style-2 .primary-menu > li.current-menu-item > a:before',
				'#mainview .menu-style-2 .primary-menu > li.current-menu-item > a:after',
				'.ht-btn',
				'.play-btn',
				'.contact-form input[type="submit"]',
				'.project-nav button.is-checked',
				'.contact-form-2 input[type="submit"]',
				'.service-special-hover-effect:after',
				'.service-special-hover-effect .services-box-item-read-more',
				'.seotabs-v4 .seotab-nav a.current-tabs',
				'.pricing-table-item-highlight .pricing-table-get',
				'.pricing-table-item-highlight .pricing-table-img',
				'.woo-pro .button',
				'.action-menu .buttons a',
				'.woo-single .cart button',
				'.woo-single .woo-pro .button:hover',
				'.place-order input[type="submit"]',
				'.woocommerce .login input[type="submit"]',
				'.woocommerce .woocommerce-MyAccount-orders .view',
				'.woocommerce .woocommerce-MyAccount-content input[type="submit"]',
				'.woocommerce .woocommerce-MyAccount-content input[type="submit"]:focus',
				'.service-detail-sidebar-quote input[type="submit"]',
				'.service-detail-sidebar-quote input[type="submit"]:focus'
            ),
			'property' => 'background-color',
		),
		
        /*BORDER*/
		array(
			'element' => array(
				'.right-copyright a:hover',
				'.footer-email-submit:hover',
				'.footer-email-input:focus',
				'.btn-normal:hover',
				'.btn-no-bg',
				'.free-seo-col button:hover',
				'.services-get-quote button:hover',
				'.services-get-quote input:focus',
				'.services-get-quote textarea:focus',
				'.comment-form input[type="submit"]',
				'.comment-btn-reply',
				'.blog-btn-read-more a:hover',
				'.case-detail-quote-submit:hover',
				'.contact-info-btn a:hover',
				'.contact-form button',
				'.ht-btn:hover',
				'.contact-form input[type="submit"]',
				'.project-nav button.is-checked',
				'.project-nav button:hover',
				'.contact-form-2 input[type="submit"]',
				'.seotabs-v4 .seotab-nav a.current-tabs',
				'.seotabs-v4 .seotab-nav a:hover',
				'.woo-pro .button:hover',
				'.woo-pro .button',
				'.add_to_wishlist:hover',
				'.yith-wcwl-wishlistaddedbrowse',
				'.yith-wcwl-wishlistexistsbrowse',
				'.added_to_cart:hover',
				'.action-menu .buttons a',
				'.action-menu .buttons a:hover',
				'.woo-single .cart button',
				'.woo-single .woo-pro .button',
				'.woo-single .woo-pro .button:hover',
				'.place-order input[type="submit"]',
				'.place-order input[type="submit"]:hover',
				'.woocommerce .login input[type="submit"]',
				'.woocommerce .login input[type="submit"]:hover',
				'.woocommerce .woocommerce-MyAccount-orders .view',
				'.woocommerce .woocommerce-MyAccount-orders .view:hover',
				'.woocommerce .woocommerce-MyAccount-content input[type="submit"]',
				'.woocommerce .woocommerce-MyAccount-content input[type="submit"]:hover',
				'.service-detail-sidebar-quote input[type="submit"]',
				'.service-detail-sidebar-quote input[type="submit"]:hover'
            ),
			'property' => 'border-color'
		)
	),
) );

/*SECONDARY COLOR*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'color',
    'settings'    => 'secondary_color',
    'label'       => esc_attr__( 'Secondary color', 'topseo' ),
    'description' => esc_attr__( 'Choose color', 'topseo' ),
    'section'     => 'colors',
    'default'     => '#ffa506',
    'transport'   => 'auto',
    'priority'    => 2,
    'output'      => array(
		/*COLOR*/
		array(
			'element' => array(
				'.tel:before',
				'.error-desc a',
				'.case-like span:before',
				'.case-name-btn:hover',
				'.case-cate:before',
				'.case-cate a:hover',
				'.free-seo-times span',
				'.ourblog-name a:hover',
				'.ourblog-bottom-info dt:before',
				'.ourblog-bottom-info dd:before',
				'.about-live-desc a',
				'.about-live-by .accordion_in .acc_content a',
				'.comment-time',
				'.comment-btn-reply:hover',
				'.control-post-name a:hover',
				'.control-post-btn',
				'.blog-post-date-number',
				'.blog-post-under-date a:hover',
				'.blog-total-post a',
				'.pagination span',
				'.pagination a:hover',
				'.blog-single .blog-post-sumary p a',
				'.blog-post-name a:hover',
				'.widget_categories a:hover',
				'.widget_twitter .tweet-link',
				'.victorious-list-tabs li:before',
				'.victorious-ccordion .accordion_in .acc_head:before',
				'.services-tes-rate span',
				'.srvice-detail-info-bottom .btn-normal',
				'.case-detail-content a',
				'.chathead a:hover',
				'.our-blog-date',
				'.our-brand-text-name',
				'.seo-lists li:before',
				'.widget_archive a:hover',
				'.widget_archive li:hover:before',
				'.widget_calendar .calendar_wrap #wp-calendar td a',
				'.widget_pages ul li a:hover',
				'.widget_meta ul li a:hover',
				'.widget_recent_entries li > a:hover',
				'.widget_nav_menu .menu li a:hover',
				'#mainview .widget_nav_menu .menu li ul li a:hover',
				'.widget_recent_comments ul li a:hover',
				'.widget_rss ul li .rsswidget:hover',
				'.woo-pro h3:hover',
				'.widget_products .product_list_widget .product-title:hover',
				'.widget_top_rated_products .product_list_widget .product-title:hover',
				'.widget_recent_reviews ul li > a:hover',
				'.product-categories a:hover',
				'.product-categories a:hover + .count',
				'.widget_layered_nav_filters ul li a:hover',
				'.widget_layered_nav ul a:hover',
				'.widget_layered_nav ul a:hover + .count',
				'.widget_shopping_cart_content li a:not(.remove):hover',
				'.widget_shopping_cart_content .buttons a:hover',
				'.woo-shopping-cart form table .product-name a:hover',
				'.woocommerce-info a.showcoupon',
				'.blog-post-under-date span:before',
				'.coming-soon-page .coming-soon-contact-form button:hover'
            ),
			'property' => 'color'
		),

        /*BACKGROUND*/
		array(
			'element' => array(
				'.counter-circle',
				'.reputation-crs .owl-page.active span',
				'.reputation-crs .owl-page.active span:hover',
				'.services-crs .owl-page:after',
				'.services-crs .owl-page.active span',
				'.services-crs .owl-page.active span:hover',
				'.services-crs .owl-page span:before',
				'.services-crs .owl-page span:after',
				'.services-effect:before',
				'.services-title:before',
				'.services-title:after',
				'.about-team-title:before',
				'.about-team-title:after',
				'.about-team-effect:before',
				'.about-live-by .accordion_in.acc_active .acc_head .acc_icon_expand:before',
				'.blog-post-video-btn',
				'.widget_tag_cloud a:hover',
                '.widget_product_tag_cloud a:hover',
				'.victorious-item:before',
				'.services-tes-author:before',
				'.service-detail-accordin .accordion_in.acc_active .acc_head .acc_icon_expand:before',
				'.srvice-detail-info-bottom .btn-normal:hover',
				'.counter-2-img:before',
				'.case-detail-more-crs .case-study .owl-page.active span',
				'.case-detail-more-crs .case-study .owl-page.active span:hover',
				'.topbar-btn:hover',
				'.action-menu > li > span',
				'.full-range-crs .slick-active button',
				'.full-range-accordion .accordion_in.acc_active .acc_head:before',
				'.our-brand-text-name:after',
				'.our-branding-accordion .accordion_in.acc_active > .acc_head .acc_icon_expand:before',
				'.our-partient-speak .owl-page.active span',
				'.client .slick-active button',
				'.pricing-results-crs .owl-page.active span',
				'.pricing-results-crs .owl-page.active span:hover',
				'.seotabs-v9 .seotab-nav a.current-tabs',
				'.case-detail-more-crs .owl-page.active span',
				'.blog-masonry .bottom-info-cmt',
				'.woo-pro .onsale',
				'.product-categories a:hover:before',
				'.price_slider',
				'.widget_layered_nav ul a:hover:before',
				'.coming-soon-page .coming-soon-contact-form button'
            ),
			'property' => 'background'
		),

        /*BORDER*/
		array(
			'element' => array(
				'.about-live-by .accordion_in.acc_active .acc_head .acc_icon_expand:before',
				'.comment-btn-reply:hover',
				'.widget_tag_cloud a:hover',
                '.widget_product_tag_cloud a:hover',
				'.victorious-tabs-menu-current .victorious-item:after',
				'.victorious-item:hover:after',
				'.service-detail-accordin .accordion_in.acc_active .acc_head .acc_icon_expand:before',
				'.srvice-detail-info-bottom .btn-normal:hover',
				'.counter-2-img:hover:after',
				'.seotabs-v9 .seotab-nav a.current-tabs:after',
				'.seotabs-v9 .seotab-nav a:hover:after',
				'.coming-soon-page .coming-soon-contact-form button',
				'.coming-soon-page .coming-soon-contact-form button:hover'
            ),
			'property' => 'border-color'
		),

		array(
			'element' => '.features-services-item:hover',
			'property' => 'border-left-color'
		)
	),
) );


/* MENU SECTION
******************************************************************************************************/

/*BACKGROUND*/
TopSeo_Kirki::add_field('topseo', array(
    'type'        => 'select',
    'priority'    => 1,
    'settings'    => 'logo_image',
    'label'       => esc_attr__( 'Menu background', 'topseo' ),
    'section'     => 'c_menu',
    'default'     => 'menu-style-1',
    'choices'     => array(
        'menu-style-1' => esc_html__( 'Transparent', 'topseo' ),
        'menu-style-2' => esc_html__( 'Solid color', 'topseo' ),
    )
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'color',
    'settings'        => 'custom_menu_sticky_color',
    'label'           => esc_attr__( 'Background color', 'topseo' ),
    'description'     => esc_attr__( 'Choose background color for Menu', 'topseo' ),
    'section'         => 'c_menu',
    'default'         => '#ffffff',
    'transport'       => 'auto',
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'logo_image',
            'operator' => '==',
            'value'    => 'menu-style-2',
        ),
    ),
    'output' => array(
        array(
            'element'  => array(
                '.menu-style-2, .menu-box',
                '.menu-style-2, .menu-box.topseo-not-top.sticky-menu'
            ),
            'property' => 'background'
        ),
        array(
            'element'  => '.menu-style-2',
            'property' => 'border-color'
        )
    ),
));

/*LAYOUT: NORMAL || STICK*/
TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'select',
    'priority'    => 2,
    'settings'    => 'custom_menu_sticky',
    'label'       => esc_attr__( 'Menu layout', 'topseo' ),
    'section'     => 'c_menu',
    'choices'     => array(
        'default-menu' => esc_html__( 'Normal', 'topseo' ),
        'sticky-menu'  => esc_html__( 'Sticky', 'topseo' ),
    ),
    'default'     => 'default-menu'
));


/* FOOTER
******************************************************************************************************/
TopSeo_Kirki::add_field('topseo', array(
    'type'        => 'radio',
    'priority'    => 1,
    'settings'    => 'footer_bg',
    'label'       => esc_attr__('Footer Background', 'topseo'),
    'description' => esc_attr__('Select footer background', 'topseo'),
    'section'     => 'c_footer',
    'default'     => 'footer-bg-color',
    'choices'     => array(
        'footer-bg-image' => esc_html__('Background Image', 'topseo'),
        'footer-bg-color' => esc_html__('Background Color', 'topseo'),
    ),
    'partial_refresh' => array(
        'footer_edit_location' => array(
            'selector'        => '#footer-edit-location',
            'render_callback' => 'topseo_edit_location',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'image',
    'settings'        => 'footer-bg-image',
    'label'           => esc_attr__( 'Upload Background Image', 'topseo' ),
    'section'         => 'c_footer',
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'footer_bg',
            'operator' => '==',
            'value'    => 'footer-bg-image',
        ),
    )
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'            => 'color',
    'settings'        => 'footer-bg-color',
    'label'           => esc_attr__( 'Background color', 'topseo' ),
    'description'     => esc_attr__( 'Choose background color for Footer', 'topseo' ),
    'section'         => 'c_footer',
    'default'         => '#232323',
    'transport'       => 'auto',
    'priority'        => 2,
    'active_callback' => array(
        array(
            'setting'  => 'footer_bg',
            'operator' => '==',
            'value'    => 'footer-bg-color',
        ),
    ),
    'output' => array(
        array(
            'element'  => '.ht-footer',
            'property' => 'background'
        ),
    ),
) );

TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'color',
    'settings'    => 'copyright-bg-color',
    'label'       => esc_attr__( 'Copyright Background', 'topseo' ),
    'description' => esc_attr__( 'Choose background color for Copyright', 'topseo' ),
    'section'     => 'c_footer',
    'default'     => '#111111',
    'transport'   => 'auto',
    'priority'    => 2,
    'output'      => array(
        array(
            'element'  => '.copyright',
            'property' => 'background'
        ),
    ),
    'partial_refresh' => array(
        'copyright_edit_location' => array(
            'selector'        => '#copyright-edit-location',
            'render_callback' => 'topseo_edit_location',
        ),
    ),
) );

/* TYPOGRAPGY
******************************************************************************************************/
TopSeo_Kirki::add_field( 'topseo', array(
     'type'     => 'typography',
     'settings' => 'h1_typography',
     'label'    => esc_attr__( 'H1', 'topseo' ),
     'section'  => 'typography',
     'priority' => 4,
     'default'  => array(
         'font-size'   => '48px',
         'font-family' => 'Poppins',
         'font-weight' => '700',
         'color'       => '#232323',
    ),
    'output'    => array(
        array(
            'element' => 'h1',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
     'type'     => 'typography',
     'settings' => 'h2_typography',
     'label'    => esc_attr__( 'H2', 'topseo' ),
     'section'  => 'typography',
     'priority' => 5,
     'default'  => array(
         'font-size'   => '36px',
         'font-family' => 'Poppins',
         'font-weight' => '700',
         'color'       => '#232323',
    ),
    'output'    => array(
        array(
            'element' => 'h2',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'typography',
    'settings' => 'h3_typography',
    'label'    => esc_attr__( 'H3', 'topseo' ),
    'section'  => 'typography',
    'priority' => 6,
    'default'  => array(
        'font-size'      => '30px',
        'font-family' => 'Poppins',
        'font-weight' => '700',
        'color' => '#232323',
    ),
    'output'   => array(
        array(
            'element' => 'h3',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'typography',
    'settings' => 'h4_typography',
    'label'    => esc_attr__( 'H4', 'topseo' ),
    'section'  => 'typography',
    'priority' => 7,
    'default'  => array(
        'font-size'   => '24px',
        'font-family' => 'Poppins',
        'font-weight' => '700',
        'color'       => '#232323',
    ),
    'output'   => array(
        array(
            'element' => 'h4',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'     => 'typography',
    'settings' => 'h5_typography',
    'label'    => esc_attr__( 'H5', 'topseo' ),
    'section'  => 'typography',
    'priority' => 8,
    'default'  => array(
        'font-size'   => '22px',
        'font-family' => 'Poppins',
        'font-weight' => '700',
        'color'       => '#232323',
    ),
    'output'   => array(
        array(
            'element' => 'h5',
        ),
    ),
));

TopSeo_Kirki::add_field( 'topseo', array(
    'type'        => 'typography',
    'settings'    => 'h6_typography',
    'label'       => esc_attr__( 'H6', 'topseo' ),
    'section'     => 'typography',
    'priority'    => 9,
    'default'     => array(
        'font-size'   => '18px',
        'font-family' => 'Poppins',
        'font-weight' => '700',
        'color'       => '#232323',
    ),
    'output' => array(
        array(
            'element' => 'h6',
        ),
    ),
));