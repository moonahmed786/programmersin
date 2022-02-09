<?php
/*
 * Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography','markethon' ),
    'id'    => 'default-style-section',
    'icon'  => 'eicon-typography',
    'desc'  => esc_html__('This section contains typography related options.','markethon'),
    'fields'=> array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Typography Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

    	array(
            'id'        => 'markethon_change_font',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change fonts?','markethon' ),
            'default'   => esc_html__( '0','markethon' ),
            'on'    	=> esc_html__( 'Yes','markethon' ),
            'off'   	=> esc_html__( 'No','markethon' )
        ),

    	array(
            'id'        => 'body_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'Poppins is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'Poppins','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'primary_menu',
            'type'      => 'typography',
            'title'     => esc_html__( 'Primary Menu','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'sub_menu',
            'type'      => 'typography',
            'title'     => esc_html__( 'Submenu Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h1_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H1 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h2_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H2 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h3_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H3 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h4_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H4 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h5_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H5 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'h6_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'H6 Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'page_title_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Page Title Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),

        array(
            'id'        => 'page_desc_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Page Description Font','markethon' ),
            'subtitle'  => esc_html__( 'Select the font.','markethon' ),
            'desc'      => esc_html__( 'PT+Sans is default font.','markethon' ),
            'required'  => array( 'markethon_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,            
            'default'       => array(
                'font-family' => esc_html__( 'PT+Sans','markethon' ),
                'google'      => true
            )
        ),
        
    )
));
?>