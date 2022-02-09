<?php
/*
 * Global Options
*/
$opt_name;
Redux::setSection($opt_name, array(
    'title' => esc_html__('Global', 'markethon') ,
    'id' => 'editer-global',
    'icon' => 'el el-globe',
    'customizer_width' => '500px',
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Body Layout', 'markethon') ,
    'id' => 'site-global',    
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'info_general',
            'type' => 'info',
            'style' => 'custom',            
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Layout Options', 'markethon') ,
            'desc' => esc_html__('This Section Contain Option For Your Site Layout.','markethon'),
        ) ,

        array(
            'id' => 'section-general',
            'type' => 'section',            
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_site_layout_genaral',
            'type' => 'image_select',
            'desc' => esc_html__('Choose From Above Suitable Option For Your Site.','markethon'),
            'options' => array(
                '1' => array(
                    'title' => esc_html__('Boxed', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/style/boxed.png',
                ) ,
                '2' => array(
                    'title' => esc_html__('Full Width', 'markethon') ,
                    'img' => get_template_directory_uri() . '/assets/images/theme-option/style/full-width.png',
                ) ,
            ) ,           
        ) ,
        
        array(
            'id' => 'info_general' . rand(0, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => esc_attr(sanitize_hex_color($color)),
            'desc' => esc_html__('This Section Contain Option For Your Grid Container Width.','markethon'),
            'title' => esc_html__('Grid Container Width', 'markethon') ,
        ) ,
        array(
            'id' => 'opt-slider-label',
            'type' => 'slider',
            'desc' => esc_html__('Adjust Your Site Container Width Wtih Help Of Above Opiton.','markethon'),            
            'min' => 960,
            'step' => 1,
            'max' => 1920,
            'display_value' => 'select',
            'default' => 1200
        ) ,       

        
        array(
            'id' => 'info_general_background',
            'type' => 'info',
            'style' => 'custom',
            'color' => esc_attr(sanitize_hex_color($color)),
            'desc' => esc_html__('This Section Contain Optin For Your Page Body Background.','markethon'),
            'title' => esc_html__('Body Background', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general-background',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_background_genaral',
            'type' => 'button_set',                        
            'desc' => esc_html__('Select Your Page Background Style', 'markethon') ,            
            'options' => array(
                '1' => 'Image',
                '2' => 'Color',
                '3' => 'none'
            ) ,
            'default' => '3'
        ) ,

        array(
            'id' => 'markethon_background_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('upload image', 'markethon') ,
            'read-only' => true,
            'default' => array (
                'url' =>  get_template_directory_uri() . '/assets/images/theme-option/style/07.png',
            ),
            'required' => array(
                'markethon_background_genaral',
                '=',
                '1'
            ) ,
            
        ) ,

        array(
            'id' => 'markethon_background_color',
            'type' => 'color',
            'title' => esc_html__('Set Background Color', 'markethon') ,
            
            'default' => '#ffffff',
            'mode' => 'background',
            'required' => array(
                'markethon_background_genaral',
                '=',
                '2'
            ) ,
            'transparent' => false
        ) ,

       

        

    )
));
//Favicon Option
Redux::setSection($opt_name, array(
    'title' => esc_html__('Favicon', 'markethon') ,
    'id' => 'site-favicon',
    
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'info_general_favicon',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Favicon', 'markethon') ,
            'desc' => esc_html__('Upload .ico File For Favicon Icon', 'markethon')
        ) ,
        array(
            'id' => 'section-general-favicon',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_background_favicon',
            'type' => 'media',            
            'url' => true,
            'read-only' => false,
            

        ) ,
    )
));

//Loader Options
Redux::setSection($opt_name, array(
    'title' => esc_html__('Loader', 'markethon') ,
    'id' => 'site-loader-global',
    
    'subsection' => true,

    'fields' => array(
        array(
            'id' => 'info_general_favicon'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Loader Options', 'markethon') ,
        ) ,
        array(
            'id' => 'section-general-favicon'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_loader_switch',
            'type' => 'button_set',
            'title' => esc_html__('', 'markethon') ,
            'subtitle' => esc_html__('', 'markethon') ,
            'desc' => esc_html__('', 'markethon') ,
            'options' => array(
                '0' => esc_html__('none','markethon'),
                '1' => esc_html__('Image','markethon'),
                '2' => esc_html__('text', 'markethon'),
                
            ) ,
            'default' => esc_html__('0','markethon')
            
        ) ,


        array(
            'id' => 'markethon_background_loader',
            'type' => 'media',
            'title'    => esc_html__('Upload Loader Image', 'markethon'),               
            
            'desc' => 'upload gif image here',
            'url' => false,
            'read-only' => false,
            'required' => array(
                'markethon_loader_switch',
                '=',
                '1'
            ) ,
        ) ,   
          array(
            'id' => 'loader-dimensions',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) , // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true', // Allow users to select any type of unit
            'title' => esc_html__('Stikcy Header Logo (Width/Height) Option', 'markethon') ,
            'subtitle' => esc_html__('Allow your users to choose width, height, and/or unit.', 'markethon') ,
            'desc' => esc_html__('You can enable or disable any piece of this field. Width, Height, or Units.', 'markethon') ,
            'required' => array(
                'markethon_loader_switch',
                '=',
                '1'
            ) ,

        ) ,     
        array(
            'id'        => 'markethon_loader_text',
            'type'      => 'text',   
            'title'    => esc_html__('Enter Loader Text', 'markethon'),                      
            'default'   => esc_html__( 'Loading....','markethon' ),
            'desc' => esc_html__('Enter Text', 'markethon') ,
            'required' => array(
                'markethon_loader_switch',
                '=',
                '2'
            ) ,
        ),
        array(
            'id'       => 'markethon_loader_tag',
            'type'     => 'select',
            'title'    => esc_html__('Select Html Tag', 'markethon'),             
            'desc'     => esc_html__('Select Tag For Loader Text.', 'markethon'),
            'options'  => array(
                'h1' => esc_html__('h1', 'markethon'),
                'h2' => esc_html__('h2', 'markethon'),
                'h3' => esc_html__('h3', 'markethon'),
                'h4' => esc_html__('h4', 'markethon'),
                'h5' => esc_html__('h5', 'markethon'),
                'h6' => esc_html__('h6', 'markethon'),
                
            ),
            'required' => array(
                'markethon_loader_switch',
                '=',
                '2'
            ) ,
            'default' => esc_html__('h2', 'markethon'),
        ),
        array(
            'id' => 'markethon_loader_back_color',
            'type' => 'color',   
            'title'    => esc_html__('Background Color', 'markethon'),                        
            'desc' => esc_html__('Choose Background Color For  Loader.', 'markethon') ,
            'default' => '#ffffff',
            'mode' => 'background',            
            'transparent' => false,
                
            
           
        ) ,

        array(
            'id' => 'markethon_loader_back_color_text',
            'type' => 'color', 
            'title'    => esc_html__('Choose Color Loader Text', 'markethon'),                                 
            'desc' => esc_html__('Choose Color For Loader Text .', 'markethon') ,
            'default' => '#ffffff',
            'mode' => 'background',            
            'transparent' => false,
            'required' => array(
                'markethon_loader_switch',
                '=',
                '2'
            ) ,

          
        ) ,
    )
));
// Back To Top Options
Redux::setSection($opt_name, array(
    'title' => esc_html__('Back To Top', 'markethon') ,
    'id' => 'site-back-to-top',
    
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'info_'. rand(10,100),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Back To Top Options', 'markethon') ,
        ) ,
        array(
            'id' => 'section-sticky-header-logo',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'       => 'markethon_back_to_top',
            'type'     => 'button_set',          
            
            
            'options'  => array(
                'yes' => 'Yes',
                'no' => 'No'
            ),
            'default'  => 'yes'
        ),

       
    )
));


// Logo Options
Redux::setSection($opt_name, array(
    'title' => esc_html__('Logo', 'markethon') ,
    'id' => 'editer-logo',
    'icon' => 'eicon-logo',
    'customizer_width' => '500px',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Logo', 'markethon') ,
    'id' => 'site-logo-global',
    
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'info_header_logo',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Header Logo Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-start',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Header Logo Type', 'markethon') ,            
            'desc' => esc_html__('', 'markethon') ,            
            'options' => array(
                '1' => esc_html__('Image','markethon'),
                '2' => esc_html__('text', 'markethon'),
                
            ) ,
            'default' => esc_html__('1','markethon')
            
        ) ,

        array(
            'id' => 'markethon_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Image', 'markethon') ,
            'read-only' => false,
            'indent' => true,
            'required' => array(
                'markethon_logo_type',
                '=',
                '1'
            ) ,
            
        ) ,
        array(
            'id' => 'logo-dimensions',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) , // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true', // Allow users to select any type of unit
            'title' => esc_html__('Header Logo (Width/Height) Option', 'markethon') ,
            'subtitle' => esc_html__('Allow your users to choose width, height, and/or unit.', 'markethon') ,
            'desc' => esc_html__('You can enable or disable any piece of this field. Width, Height, or Units.', 'markethon') ,
            'required' => array(
                'markethon_logo_type',
                '=',
                '1'
            ) ,

        ) ,

        array(
            'id' => 'markethon_header_logo_text',
            'type' => 'text',
            'title' => esc_html__('Header Logo Text', 'markethon') ,
            'required' => array(
                'markethon_logo_type',
                '=',
                '2'
            ) ,

        ) ,
         array(
            'id'       => 'markethon_header_logo_tag',
            'type'     => 'select',
            'title'    => esc_html__('Select Html Tag', 'markethon'),             
            'desc'     => esc_html__('Select Tag For Text.', 'markethon'),
            'options'  => array(
                'h1' => esc_html__('h1', 'markethon'),
                'h2' => esc_html__('h2', 'markethon'),
                'h3' => esc_html__('h3', 'markethon'),
                'h4' => esc_html__('h4', 'markethon'),
                'h5' => esc_html__('h5', 'markethon'),
                'h6' => esc_html__('h6', 'markethon'),
                
            ),
            'required' => array(
                'markethon_logo_type',
                '=',
                '2'
            ) ,
            'default' => esc_html__('2', 'markethon'),
        ),

       

        array(
            'id' => 'header_logo_color',
            'type' => 'color',
            'title' => esc_html__('Set Header Logo Color', 'markethon') ,
            'subtitle' => esc_html__('Choose Header Logo Color', 'markethon') ,
            'default' => '#ffffff',
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'markethon_logo_type',
                '=',
                '2'
            ) ,
        ) ,
      

        array(
            'id' => 'divider_' . rand(0, 999) ,
            'type' => 'divide'
        ) ,
       

        

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Sticky Header Logo', 'markethon') ,
    'id' => 'site-sticky-logo-global',
    
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'info_sticky_header_logo',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Stikcy Header Logo Options', 'markethon') ,
        ) ,
        array(
            'id' => 'section-sticky-header-logo',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'markethon_logo_sticky_type',
            'type' => 'button_set',
            'title' => esc_html__('Stikcy Header Logo Type', 'markethon') ,
            'options' => array(
                '1' => esc_html__('Image','markethon'),
                '2' => esc_html__('text', 'markethon'),
                
            ) ,
            'default' => esc_html__('1','markethon')
            
        ) ,

        array(
            'id' => 'markethon_header_logo_sticky',
            'type' => 'media',
            'url' => false,
            'title' => esc_html__('Image', 'markethon') ,
            'read-only' => false,
            'required' => array(
                'markethon_logo_sticky_type',
                '=',
                '1'
            ) ,
            'subtitle' => esc_html__('', 'markethon') ,
        ) ,
        array(
            'id' => 'sticky-logo-dimensions',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) , // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true', // Allow users to select any type of unit
            'title' => esc_html__('Stikcy Header Logo (Width/Height) Option', 'markethon') ,
            'subtitle' => esc_html__('Allow your users to choose width, height, and/or unit.', 'markethon') ,
            'desc' => esc_html__('You can enable or disable any piece of this field. Width, Height, or Units.', 'markethon') ,
            'required' => array(
                'markethon_logo_sticky_type',
                '=',
                '1'
            ) ,

        ) ,

        array(
            'id' => 'markethon_header_logo_sticky_text',
            'type' => 'text',
            'title' => esc_html__('Stikcy Header Logo Text', 'markethon') ,
            'required' => array(
                'markethon_logo_sticky_type',
                '=',
                '2'
            ) ,

        ) ,

         array(
            'id'       => 'markethon_header_logo_sticky_tag',
            'type'     => 'select',
            'title'    => esc_html__('Select Html Tag', 'markethon'),             
            'desc'     => esc_html__('Select Tag For Text.', 'markethon'),
            'options'  => array(
                'h1' => esc_html__('h1', 'markethon'),
                'h2' => esc_html__('h2', 'markethon'),
                'h3' => esc_html__('h3', 'markethon'),
                'h4' => esc_html__('h4', 'markethon'),
                'h5' => esc_html__('h5', 'markethon'),
                'h6' => esc_html__('h6', 'markethon'),
                
            ),
            'required' => array(
                'markethon_logo_sticky_type',
                '=',
                '2'
            ) ,
            'default' => esc_html__('2', 'markethon'),
        ),

       

        array(
            'id' => 'header_logo_sticky_color',
            'type' => 'color',
            'title' => esc_html__('Set Stikcy Header Logo Color', 'markethon') ,
            'subtitle' => esc_html__('Choose Stikcy Header Logo Color', 'markethon') ,
            'default' => '#ffffff',
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'markethon_logo_sticky_type',
                '=',
                '2'
            ) ,
        ) ,
       
    )
));
?>