<?php
/*
 * Header Options
*/


$opt_name;
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page', 'markethon') ,
    'id' => 'editer-page',
    'icon' => 'eicon-product-pages',
    'customizer_width' => '1000px',
));

// Blog Page Settings
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Blog Page Settings','markethon'),
    'id'    => 'blog-section',
    'subsection' => true,
    'desc'  => esc_html__('This section contains options for Pages.','markethon'),
    'fields'=> array(

        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Blog Page Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'       => 'markethon_blog_banner_image',         
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Blog Page Default Banner Image','markethon'),
            'read-only'=> false,
            'subtitle' => esc_html__( 'Upload banner image for your Website. Otherwise blank field will be displayed in place of this section.','markethon'),
        ),

        array(
            'id'       => 'blog_btn',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Button Name', 'markethon' ),
            'subtitle' => esc_html__( 'Change Blog Button Name in blog page and singal blog page', 'markethon' ),
            'default'  => esc_html__('Read More','markethon' ),
        ),

        array(
            'id'        => 'markethon_blog',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Blog page Setting','markethon' ),
            'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar, 1column, 2column and 3column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','markethon' ), array( 'br' => array() ) ),            
            'options'   => array(

                    '1' => array( 'title' => esc_html__( 'One Columns','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/one-column.png' ), 
                    '2' => array( 'title' => esc_html__( 'Two Columns','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/two-column.png' ), 
                    '3' => array( 'title' => esc_html__( 'Three Columns','markethon' ), 'img' => get_template_directory_uri() . '/assets/images/backend/three-column.png' ),                                
            ),
            'default'   => '1',
        ),

        array(
            'id'        => 'markethon_display_pagination',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Previous/Next Pagination','markethon'),
            'subtitle' => esc_html__( 'Turn on to display the previous/next post pagination for blog page.','markethon'),
            'options'   => array(
                            'yes' => esc_html__('On','markethon'),
                            'no' => esc_html__('Off','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),

        array(
            'id'        => 'markethon_display_image',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Featured Image on Blog Archive Page','markethon'),
            'subtitle' => esc_html__( 'Turn on to display featured images on the blog or archive pages.','markethon'),
            'options'   => array(
                            'yes' => esc_html__('On','markethon'),
                            'no' => esc_html__('Off','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),       

        array(
            'id'        => 'markethon_display_comment',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Comments','markethon'),
            'subtitle' => esc_html__( 'Turn on to display comments.','markethon'),
            'options'   => array(
                            'yes' => esc_html__('On','markethon'),
                            'no' => esc_html__('Off','markethon')
                        ),
            'default'   => esc_html__('yes','markethon')
        ),

    )
));

Redux::setSection( $opt_name, array(
        'title' => esc_html__('404','markethon'),
        'id'    => 'fourzerofour-section',        
        'subsection' => true,
        'desc'  => esc_html__('This section contains options for 404.','markethon'),
        'fields'=> array(

            array(
                'id' => 'info_general'.rand(10,1000),
                'type' => 'info',
                'style' => 'custom',
                'color' => sanitize_hex_color($color),
    
                'title' => esc_html__('404 Page Options', 'markethon') ,
            ) ,
    
            array(
                'id' => 'section-general'.rand(10,1000),
                'type' => 'section',
                'indent' => true
            ) ,
    
            array(
                'id'       => 'markethon_404_banner_image',         
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404 Page Default Banner Image','markethon'),
                'read-only'=> false,
                'subtitle' => esc_html__( 'Upload banner image for your Website. Otherwise blank field will be displayed in place of this section.','markethon'),
            ),
    
            array(
                'id'        => 'markethon_fourzerofour_title',
                'type'      => 'text',
                'title'     => esc_html__( '404 Page Title','markethon'),
                'default'   => esc_html__( '404 Error','markethon' )
            ),

            array(
                'id'        => 'markethon_four_description',
                'type'      => 'textarea',
                'title'     => esc_html__( '404 Page Description','markethon'),
                'default'   => esc_html__( 'Oops! This Page is Not Found.','markethon' )
            ),

        )
) );
?>