<?php
/*
 * Color Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Color Attribute','markethon' ),
    'id'    => 'color-section',
    'icon'  => 'eicon-paint-brush',
    'desc'  => esc_html__('This section change the site default color.','markethon'),
    'fields'=> array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Color Scheme Options', 'markethon') ,
        ) ,
        
        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'       => 'markethon_color',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Color Scheme Settings', 'markethon' ),
            'options'  => array(
                '1' => 'Default',
                '2' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Primary Singal Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose primary color for main theme color and main background color.', 'markethon' ),
            'default'       =>'#a37cfc',
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'primary_second_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Secondary Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose primary second color for main theme color and main background color.', 'markethon' ),
            'default'       =>'#33e2a0',
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'tertiary_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Tertiary Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose tertiary color for main title color', 'markethon' ),
            'default'       =>'#8e989f',
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'text_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Text Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose text color for description color', 'markethon' ),
            'default'       =>'#8e989f',
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'primary_color_rgba',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Primary Gradient Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose primary gradient color for main theme color and main background color.', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'secondary_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Secondary Color', 'markethon' ),
            'required'  => array( 'markethon_color', '=', '2' ),
            'subtitle'      => esc_html__( 'Choose secondary color for dark title and background.', 'markethon' ),
            'default'       =>'#1e1e1e',
            'mode'          => 'background',
            'transparent'   => false
        ),
       
    )
));
?>