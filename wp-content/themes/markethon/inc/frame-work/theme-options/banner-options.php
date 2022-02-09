<?php
/*
 * Header Options
 */
$opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Banner Setting','markethon'),
    'id'    => 'breadcrumbs-fevicon',
    'icon'  => 'eicon-banner',
    'desc'  => esc_html__('This section contains options for Breadcrumbs.','markethon'),
    'fields'=> array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Banner Layout Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'      => 'bg_image',
            'type'    => 'image_select',
            'title'   => esc_html__('Select Image', 'markethon'),
            'subtitle' => esc_html__( 'A preview of the selected image will appear underneath the select box.', 'markethon' ),
            'options' => array(
                '1'      => array(
                    'alt' => 'Style1',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-1.jpg',
                ),
                '2'      => array(
                    'alt' => 'Style2',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-2.jpg',
                ),
                '3'      => array(
                    'alt' => 'Style3',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-3.jpg',
                ),
                '4'      => array(
                    'alt' => 'Style4',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-4.jpg',
                ),
                '5'      => array(
                    'alt' => 'Style5',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-5.jpg',
                ),
                '6'      => array(
                    'alt' => 'Style6',
                    'img' => get_template_directory_uri() . '/assets/images/backend/bg-5.jpg',
                ),
            ),
            esc_html__( 'default','markethon') => '2'
        ),

        array(
            'id'        => 'display_banner',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Banner','markethon'),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            esc_html__( 'default','markethon')   => esc_html__('yes','markethon')
        ),

        array(
            'id'        => 'display_breadcrumbs',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Breadcrumbs on Banner','markethon'),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'required'  => array( 'display_banner', '=', 'yes' ),
         
                esc_html__( 'default','markethon' )   => esc_html__('yes','markethon')
        ),

        array(
            'id'        => 'display_title',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Title on Banner','markethon'),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'required'  => array( 'display_banner', '=', 'yes' ),
         
                'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id'        => 'display_banner_rightimage',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Left Image on Banner','markethon'),
            'options'   => array(
                    'yes' => esc_html__('Yes','markethon'),
                    'no' => esc_html__('No','markethon')
            ),
            'required'    => array( 'bg_image', '=', '6', array( 'display_banner', '=', 'yes' ) ),
            'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id' => 'iq_leftbanner_image',
            'type' => 'media',
            'title'    => esc_html__('Upload Left Banner Image', 'markethon'),               
            'desc' => 'upload gif image here',
            'url' => false,
            'required'  => array( 'display_banner_rightimage', '=', 'yes' ),
            'default'   => esc_html__('yes','markethon')
        ) ,

        array(
            'id'            => 'breadcrumbs_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Breadcrumb Color', 'markethon' ),
            'subtitle'      => esc_html__( 'Choose Title Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'breadcrumbs_hover_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Breadcrumb Active Color', 'markethon' ),
            'subtitle'      => esc_html__( 'Choose Title Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'            => 'bg_title_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Title Color', 'markethon' ),
            'subtitle'      => esc_html__( 'Choose Title Color', 'markethon' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'       => 'bg_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Header Set Option', 'markethon' ),
            'subtitle' => esc_html__( 'Select this option for Background Type color or image and video.', 'markethon' ),
            'options'  => array(
                '1' => 'Color',
                '2' => 'Image',
                '3' => 'Video'
            ),
            'default'  => '1'
        ),

        array(
            'id'       => 'banner_image',         
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Set Body Image','markethon'),
            'read-only'=> false,
            'required'  => array( 'bg_type', '=', '2' ),
            'subtitle' => esc_html__( 'Upload Image for your body.','markethon'),
            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/bg.jpg' ),
        ), 

        array(
            'id'            => 'bg_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Background Color', 'markethon' ),
            'subtitle'      => esc_html__( 'Choose Background Color', 'markethon' ),
            'required'  => array( 'bg_type', '=', '1' ),
            'mode'          => 'background',
            'transparent'   => false
        ),

        array(
            'id'       => 'bg_video_link',
            'type'     => 'text',
            'title'    => esc_html__( 'Your Video Path', 'markethon' ),
            'required'  => array( 'bg_type', '=', '3' ),
            'subtitle' => esc_html__( 'Upload video in media and paste video link over here.', 'markethon' ),
            'default'  => esc_html__('http://localhost/markethon/wordpress/wp-content/uploads/2019/08/SampleVideo.mp4','markethon' ),
        ),

        array(
            'id'       => 'bg_opacity',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Background Opacity Color', 'markethon' ),
            'required' => array( 
                array('bg_type','!=','1') 
            ),
            'subtitle' => esc_html__( 'Select this option for Background Opacity Color.', 'markethon' ),
            'options'  => array(
                '1' => 'None',
                '2' => 'Dark',
                '3' => 'Custom'
            ),
            'default'  => '1'
        ),

        array(
            'id'            => 'opacity_color',
            'type'          => 'color_rgba',
            'title'         => esc_html__( 'Background Gradient Color', 'markethon' ),
            'required'  => array( 'bg_opacity', '=', '3' ),
            'subtitle'      => esc_html__( 'Choose body Gradient background color', 'markethon' ),
            'default'       => 'rgba(2, 13, 30, 0.9)',
            'transparent'   => false
        ),

    )
)); 
?>