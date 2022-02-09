<?php
/*
 * Header Options
*/
$opt_name;
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'markethon') ,
    'id' => 'header-editor',
    'icon' => 'eicon-arrow-up',
    'customizer_width' => '500px',
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Layout', 'markethon') ,
    'id' => 'header-variation',    
    'subsection' => true,
    'desc' => esc_html__('This section contains options for header.', 'markethon') ,
    'fields' => array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Header Layout Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_header_variation',
            'type' => 'image_select',

            'options' => array(
                'header_default' => array(
                    'title' => esc_html__('Default', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/classic.png',
                ) ,
                'header_left' => array(
                    'title' => esc_html__('Logo left', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/stack-left.png',
                ) ,
                'header_right' => array(
                    'title' => esc_html__('Logo right', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/stack-right.png',
                ) ,

                'header_center' => array(
                    'title' => esc_html__('Logo center', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/stack-center.png',
                ) ,
                'header_split' => array(
                    'title' => esc_html__('Split menu logo center', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/split.png',
                ) ,

            ) ,
            'default' => 'header_default',
        ) ,

        array(
            'id' => 'header_back_opt_switch',
            'type' => 'button_set',
            'title' => esc_html__('Header Background Type', 'markethon') ,
            
            'options' => array(
                '0' => esc_html__('none', 'markethon') ,
                '1' => esc_html__('Image', 'markethon') ,
                '2' => esc_html__('Color', 'markethon'),
                '3' => esc_html__('Transparent', 'markethon')
            ) ,
            'default' => esc_html__('0', 'markethon')
        ) ,
        

        array(
            'id' => 'markethon_header_back_img',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Header background image', 'markethon') ,
            'read-only' => false,            
            
            'required' => array(
                'header_back_opt_switch',
                '=',
                '1'
            ) ,
        ) ,

        array(
            'id' => 'markethon_header_back_color',
            'type' => 'color',
            'title' => esc_html__('Set Background Header Color', 'markethon') ,            
            'default' => '#ffffff',
            'mode' => 'background',
            'required' => array(
                'header_back_opt_switch',
                '=',
                '2'
            ) ,
            'transparent' => false
        ) ,   

    )
));

//Top Header Options
Redux::setSection($opt_name, array(
    'title' => esc_html__('Top Header', 'markethon') ,
    'id' => 'header-variation-top',    
    'subsection' => true,
    'desc' => esc_html__('This section contains options for Top header.', 'markethon') ,
    'fields' => array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Top Header Setting', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_top_header_switch',
            'title' => esc_html__('Enable Top Header', 'markethon') ,
            'type' => 'switch',
            'default' => true,
        ) ,

        array(
            'id' => 'markethon_top_header_var',
            'type' => 'image_select',
            'options' => array(
                '1' => array(
                    'title' => esc_html__('Default', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-1.jpg',
                ) ,
                '2' => array(
                    'title' => esc_html__('Style 1', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-2.jpg',
                ) ,
                '3' => array(
                    'title' => esc_html__('Style 2', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-3.jpg',
                ) ,

                '4' => array(
                    'title' => esc_html__('Style 3', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-4.jpg',
                ) ,
                '5' => array(
                    'title' => esc_html__('Style 4', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-5.jpg',
                ) ,
                '6' => array(
                    'title' => esc_html__('Style 5', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/top-6.jpg',
                ) ,

            ) ,
            'required' => array(
                'markethon_top_header_switch',
                '=',
                true
            ) ,
            'default' => esc_html__('1', 'markethon')
        ) ,

        array(
            'id' => 'sticky_top_header_back_opt_switch',
            'type' => 'button_set',
            'title' => esc_html__('Top Header Background Type', 'markethon') ,            
            'options' => array(
                '0' => esc_html__('none','markethon'),
                '1' => esc_html__('Image', 'markethon') ,
                '2' => esc_html__('color', 'markethon'),
                '3' => esc_html__('Transparent', 'markethon')
                
            ) ,
            'default' => esc_html__('0', 'markethon'),
            'required' => array(
                'markethon_top_header_switch',
                '=',
                true
            ) ,
        ) ,


        

        array(
            'id' => 'top_header_back_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Background Color', 'markethon') ,            
            'default' => '#ffffff',
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'sticky_top_header_back_opt_switch',
                '=',
                '2'
            ) ,
        ) ,

        array(
            'id' => 'top_header_back_img',
            'type' => 'media',
            'title' => esc_html__('Image', 'markethon') ,            
            'default' => '#ffffff',
            'url'=>true,
            'required' => array(
                'sticky_top_header_back_opt_switch',
                '=',
                '1'
            ) ,
        ) ,

        array(
            'id' => 'top_header_text_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Text Color', 'markethon') ,            
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'markethon_top_header_switch',
                '=',
                true
            ) ,
        ) ,

        array(
            'id' => 'top_header_text_hover_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Text Hover Color', 'markethon') ,           
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'markethon_top_header_switch',
                '=',
                true
            ) ,
        ) ,
    )
));

//Sticky Header Options
Redux::setSection($opt_name, array(
    'title' => esc_html__('Sticky Header', 'markethon') ,
    'id' => 'header-variation-sticky',    
    'subsection' => true,
    'desc' => esc_html__('This section contains options for Stikcy header.', 'markethon') ,
    'fields' => array(
        
        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Sticky Header Settings', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_sticky_header_switch',
            'title' => esc_html__('Enable Sticky Header', 'markethon') ,
            'type' => 'switch',
            'default' => true,
        ) ,

        

        
        array(
            'id' => 'sticky_header_back_opt_switch',
            'type' => 'button_set',
            'title' => esc_html__('Stikcy Header Background Type', 'markethon') ,    
            'options' => array(
                '0' => esc_html__('none', 'markethon') ,
                '1' => esc_html__('Image', 'markethon') ,
                '2' => esc_html__('color', 'markethon'),
                '3' => esc_html__('Transparent', 'markethon')
            ) ,
            'default' => esc_html__('0', 'markethon'),
            'required' => array(
                'markethon_sticky_header_switch',
                '=',
                true
            ) ,
        ) ,
        

        array(
            'id' => 'markethon_sticky_header_back_img',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Sticky Header Background Image', 'markethon') ,
            'read-only' => false,                        
            'required' => array(
                'sticky_header_back_opt_switch',
                '=',
                '1'
            ) ,
        ) ,

        array(
            'id' => 'markethon_sticky_header_back_color',
            'type' => 'color',
            'title' => esc_html__('Sticky Header Background Color', 'markethon') ,            
            'default' => '#ffffff',
            'mode' => 'background',
            'required' => array(
                'sticky_header_back_opt_switch',
                '=',
                '2'
            ) ,
            'transparent' => true
        ) ,
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Menu Color', 'markethon') ,
    'id' => 'default-variation',    
    'subsection' => true,
    'desc' => esc_html__('This section contains options for Top Menu.', 'markethon') ,
    'fields' => array(

        //top menu start
        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Top Header Menu Color Settings', 'markethon') ,
        ) ,
        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_menu_color',
            'type' => 'color',
            'title' => esc_html__('Set Menu Text Color', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'markethon_menu_hover_color',
            'type' => 'color',
            'title' => esc_html__('Set Menu Hover Text Color', 'markethon') ,  
            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'markethon_submenu_color',
            'type' => 'color',
            'title' => esc_html__('Set Sub Menu Text Color', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'markethon_sub_menu_back_color',
            'type' => 'color',
            'title' => esc_html__('Set Sub Menu Background Color', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

        
        //Sticky menu start
        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Sticky Menu Setting', 'markethon') ,
        ) ,
        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_sticky_menu_color',
            'type' => 'color',
            'title' => esc_html__('Set Sticky Menu Color Settings', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'markethon_menu_sticky_hover_color',
            'type' => 'color',
            'title' => esc_html__('Set Hover Sticky Menu Color', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

         array(
            'id' => 'markethon_sticky_sub_menu_color',
            'type' => 'color',
            'title' => esc_html__('Set Sticky Sub Menu Color', 'markethon') , 
            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'markethon_sub_sticky_menu_back_color',
            'type' => 'color',
            'title' => esc_html__('Set Sticky Sub Menu BackGround Color', 'markethon') ,
            'mode' => 'background',            
            'transparent' => false
        ) ,

        
    )
));   

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Button', 'markethon') ,
    'id' => 'hader-button-variation',    
    'subsection' => true,
    'desc' => esc_html__('This section contains options for button in header.', 'markethon') ,
    'fields' => array(

      array(
            'id'        => 'header_display_button',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Login/CTA Button','markethon'),
            'subtitle' => esc_html__( 'Turn on to display the Login and CTA button in top header.','markethon'),
            'options'   => array(
                            'yes' => esc_html__('On','markethon'),
                            'no' => esc_html__('Off','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id'        => 'markethon_download_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Title(Download)','markethon'),
            'required'  => array( 'header_display_button', '=', 'yes' ),
            'default'   => 'Get Started',
            'desc'   => esc_html__('Change Title (e.g.Download).','markethon'),
        ),
        array(
            'id'        => 'markethon_download_link',
            'type'      => 'text',
            'title'     => esc_html__( 'Link(Download)','markethon'),
            'required'  => array( 'header_display_button', '=', 'yes' ),
            'desc'   => esc_html__('Add download link.','markethon'),
        ),

        array(
            'id'       => 'he_button_color',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Header Button Colors', 'markethon' ),
            'options'  => array(
                '1' => 'Default',
                '2' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'            => 'header_button_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Header Button Color', 'markethon' ),
            'required'  => array( 'he_button_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose Header Button Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'header_button_hover_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Header Button Hover Color', 'markethon' ),
            'required'  => array( 'he_button_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose Header Hover Button Hover Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'header_button_text_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Header Button Text Color', 'markethon' ),
            'required'  => array( 'he_button_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose Header Button Text Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'header_button_hover_text_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Header Button Hover Text Color', 'markethon' ),
            'required'  => array( 'he_button_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose Header Button Text Hover Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        
    )
));   
?>