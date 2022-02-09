<?php
/*
 * Footer Options
 */
$opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Footer', 'markethon' ),
    'id'    => 'footer-editor',
    'icon'  => 'el el-arrow-down',
    'customizer_width' => '500px',
) );

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer Image','markethon'),
    'id'    => 'footer-logo',
    'subsection' => true,
    'desc'  => esc_html__('This section contains options for footer.','markethon'),
    'fields'=> array(        

        array(
            'id'       => 'logo_footer',         
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Footer Logo','markethon'),            
            'read-only'=> false,
            'subtitle' => esc_html__( 'Upload Footer Logo for your Website.','markethon'),
            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
        ),

        array(
            'id'       => 'footer_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Footer Option', 'markethon' ),
            'options'  => array(
                '1' => 'Default',
                '2' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'       => 'footer_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Footer Set Option', 'markethon' ),
            'required'  => array( 'footer_option', '=', '2' ),
            'subtitle' => esc_html__( 'Select this option for Background Type color and image.', 'markethon' ),
            'options'  => array(
                '1' => 'Color',
                '2' => 'Image',
            ),
            'default'  => '1'
        ),
        
        array(
            'id'       => 'footer_image',         
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Footer Background Image','markethon'),
            'required'  => array( 'footer_type', '=', '2' ),
            'read-only'=> false,
            'subtitle' => esc_html__( 'Upload Footer image for your Website. Otherwise site title will be displayed in place of Logo.','markethon'),
            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/footer-img.jpg' ),
        ), 

        array(
            'id'       => 'footer_opacity',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Background Opacity Color', 'markethon' ),
            'required' => array( 
                array('footer_type','!=','1') 
            ),
            'subtitle' => esc_html__( 'Select this option for Background Opacity Color.', 'markethon' ),
            'options'  => array(
                '1' => 'None',
                '2' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'            => 'footer_opacity_color',
            'type'          => 'color_rgba',
            'title'         => esc_html__( 'Background Gradient Color', 'markethon' ),
            'required'  => array( 'footer_opacity', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose body Gradient background color', 'markethon' ),
            'default'   => array(
                'color'     => '#eff1fe',
                'alpha'     => 0.9
            ),
            'transparent'   => false
        ),

        array(
            'id'            => 'footer_color',
            'type'          => 'color_rgba',
            'title'         => esc_html__( 'Footer Color', 'markethon' ),
            'subtitle'      => esc_html__( 'Choose Footer Background Color', 'markethon' ),
            'required'  => array( 'footer_type', '=', '1' ),
            'default'   => array(
                'color'     => '#eff1fe',
                'alpha'     => 0.9
            ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'footer_heading_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Footer Heading Color', 'markethon' ),
            'required'  => array( 'footer_type', '=', '1' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'footer_text_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Footer Text Color', 'markethon' ),
            'required'  => array( 'footer_type', '=', '1' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'footer_link_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Footer Link Color', 'markethon' ),
            'required'  => array( 'footer_type', '=', '1' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

    )
));  

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer Option','markethon'),
    'id'    => 'footer-section',
    'subsection' => true,    
    'desc'  => esc_html__('This section contains options for footer.','markethon'),
    'fields'=> array(

        array(
            'id'        => 'markethon_footer_display',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Footer','markethon'),
            'subtitle' => esc_html__( 'Display Footer On All Pages', 'markethon' ),
            'options'   => array(
                    'yes' => esc_html__('Yes','markethon'),
                    'no' => esc_html__('No','markethon')
            ),
            'default'   => esc_html__('yes','markethon')
        ),
        
        array(
            'id'        => 'markethon_footer_width',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Footer Layout Type','markethon' ),
            'required'  => array( 'markethon_footer_display', '=', 'yes' ),
            'subtitle'  => wp_kses( __( '<br />Choose among these structures (1column, 2column and 3column) for your footer section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','markethon' ), array( 'br' => array() ) ),            
            'options'   => array(
                    '1' => array( 'title' => esc_html__( 'One Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_first.png' ),
                    '2' => array( 'title' => esc_html__( 'Two Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_second.png' ),
                    '3' => array( 'title' => esc_html__( 'Three Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_third.png' ),
                    '4' => array( 'title' => esc_html__( 'Four Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_four.png' ),  
                    '5' => array( 'title' => esc_html__( '4+3+3+2 Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_four.png' ),   
                    '6' => array( 'title' => esc_html__( '12/4+2+2+4 Column','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/footer_five.png' ),
            ),
            'default'   => '4',
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Footer Copyright', 'markethon' ),
    'id'         => 'footer-copyright',
    'subsection' => true,    
    'fields'     => array(

        array(
            'id'        => 'display_copyright',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Footer Copyright','markethon'),
            'subtitle' => esc_html__( 'Display Footer Copyright On All page', 'markethon' ),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id' => 'marfooter_copyright_variation',
            'title' => esc_html__( 'Footer Copyright Variation','markethon'),
            'type' => 'image_select',
            'required'  => array( 'display_copyright', '=', 'yes' ),
            'options' => array(
                'copyright_default' => array(
                    'title' => esc_html__('Default', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/classic.png',
                ) ,
                'copyright_center' => array(
                    'title' => esc_html__('Footer Copyright Center', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/header/split.png',
                ) ,

            ) ,
            'default' => 'copyright_default',
        ) ,

        array(
            'id'        => 'footer_copyright',
            'type'      => 'textarea',
            'required'  => array( 'display_copyright', '=', 'yes' ),
            'title'     => esc_html__( 'Copyright Text','markethon'),
            'default'   => esc_html__( 'Copyright 2019 markethon All Rights Reserved.','markethon'),
        ),

        array(
            'id'       => 'footer_copy_color',
            'type'     => 'button_set',
            'required'  => array( 'display_copyright', '=', 'yes' ),
            'title'    => esc_html__( 'Change Footer Copyright Color', 'markethon' ),
            'options'  => array(
                '1' => 'Default',
                '2' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'            => 'footer_copyright_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Footer Link Color', 'markethon' ),
            'required'  => array( 'footer_copy_color', '=', '2' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

    )) 
);

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Top Footer Option','markethon'),
    'id'    => 'markethon-footer-top-section',
    'subsection' => true,    
    'desc'  => esc_html__('This section contains options for footer.','markethon'),
    'fields'=> array(
        array(
            'id'        => 'markethon_footer_top_display',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Top Footer','markethon'),
            'subtitle' => esc_html__( 'Display Top Footer On All Pages', 'markethon' ),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),
        array(
            'id' => 'markethon_footer_top_background',
            'type' => 'button_set',                        
            'desc' => esc_html__('Select Footer Background Style', 'markethon') ,            
            'options' => array(
                '1' => 'Image',
                '2' => 'Color',
                '3' => 'Default'
            ) ,
            'default' => '3',
            'required' => array(
                'markethon_footer_top_display',
                '=',
                'yes'
            ) ,
        ) ,

        array(
            'id' => 'markethon_footer_top_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('upload image', 'markethon') ,
            'read-only' => true,
            'default' => array (
                'url' =>  get_template_directory_uri() . '/assets/images/theme-option/style/07.png',
            ),
            'required' => array(
                'markethon_footer_top_background',
                '=',
                '1'
            ) ,
            
        ) ,

        array(
            'id' => 'markethon_footer_top_color',
            'type' => 'color',
            'title' => esc_html__('Set Background Color', 'markethon') ,            
            'default' => '#ffffff',
            'mode' => 'background',
            'required' => array(
                'markethon_footer_top_background',
                '=',
                '2'
            ) ,
            'transparent' => false
        ) ,
    )
    ));
?>