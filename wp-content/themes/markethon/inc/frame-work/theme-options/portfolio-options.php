<?php
/*
 * Portfolio Options
 */
$opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Portfolio', 'markethon' ),
    'id'    => 'portfolio-editor',
    'icon'  => 'el el-th',
    'customizer_width' => '500px',
    'fields'           => array(

        array(
            'id'        => 'portfolio_top',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Portfolio Detail Top','markethon'),
            'subtitle' => esc_html__( 'Display Portfolio Detail Top on Singal Portfolio Page', 'markethon' ),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id'       => 'portfolio_sub_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Detail Page Title', 'markethon' ),
            'subtitle' => esc_html__( 'Change Title On Portfolio Detail page', 'markethon' ),
            'required'  => array( 'portfolio_top', '=', 'yes' ),
            'default'  => esc_html__('We work with you to address your most critical business priorities.','markethon'),
        ),

        array(
            'id'        => 'markethon_exploreall_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Button Title','markethon'),
            'desc'   => esc_html__('Change Title (e.g.Explore All).','markethon'),
        ),
        array(
            'id'        => 'markethon_exploreall_link',
            'type'      => 'text',
            'title'     => esc_html__( 'Button Link','markethon'),
            'desc'   => esc_html__('Add download link.','markethon'),
        ),

    )
) );
?>