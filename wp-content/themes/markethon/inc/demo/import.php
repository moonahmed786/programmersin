<?php
function markethon_import_files() { 
    return array(
        array(
            'import_file_name'             => esc_html__('Home Default','markethon'),
            //'categories'                   => array( 'Category 1', 'Category 2' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-1/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-1/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-1/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-1/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-1/preview_import_image1.jpg',
            'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/',
        ),

        array(
            'import_file_name'             => esc_html__('Home Agency','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-2/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-2/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-2/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-2/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-2/preview_import_image2.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home2/',
        ),

        array(
            'import_file_name'             => esc_html__('Home Product','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-3/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-3/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-3/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-3/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-3/preview_import_image3.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-3/',
        ),

        array(
            'import_file_name'             => esc_html__('Home Creative','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-4/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-4/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-4/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-4/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-4/preview_import_image4.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-2/',
        ),

        array(
            'import_file_name'             => esc_html__('Corporate Agency','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-5/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-5/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-5/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-5/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-5/preview_import_image5.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-5/',
        ),

        array(
            'import_file_name'             => esc_html__('Blog Standard','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-6/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-6/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-6/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-6/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-6/preview_import_image6.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-6/',
        ),

        array(
            'import_file_name'             => esc_html__('Corporate New','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-7/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-7/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-7/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-7/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-7/preview_import_image7.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-7/',
        ),

        array(
            'import_file_name'             => esc_html__('Portfolio Grid','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-8/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-8/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-8/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-8/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-8/preview_import_image8.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-8/',
        ),

        array(
            'import_file_name'             => esc_html__('Minimal Portfolio','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-9/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-9/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-9/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-9/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-9/preview_import_image9.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'http://iqonic.design/wp-themes/markethon/home-9/',
        ),

        array(
            'import_file_name'             => esc_html__('Corporate 3','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-10/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-10/preview_import_image10.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'http://iqonic.design/wp-themes/markethon/home-10/',
        ),

        array(
            'import_file_name'             => esc_html__('Modern Conslutancy','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-11/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-11/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-11/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-11/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-11/preview_import_image11.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/home-11/',
        ),

        array(
            'import_file_name'             => esc_html__('Digital Marketing Consultant','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-12/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-12/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-12/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-12/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-12/preview_import_image12.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/digital-marketing-consultant/',
        ),

        array(
            'import_file_name'             => esc_html__('Project Showcase','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-13/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-13/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-13/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-13/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-13/preview_import_image13.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/project-showcase-slider/',
        ),

        array(
            'import_file_name'             => esc_html__('Creative Service showcase','markethon'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-14/markethon-xml.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-14/markethon-widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-14/markethon-export.dat',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-14/markethon_redux.json',
                    'option_name' => 'markethon_options',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri().'/inc/demo/demo-14/preview_import_image14.jpg',
            'import_notice'                => esc_html__( 'A special note for this import.', 'markethon' ),
            'preview_url'                  => 'https://iqonic.design/wp-themes/markethon/creative-service-showcase/',
        ),
        
       
    );
}
add_filter( 'pt-ocdi/import_files', 'markethon_import_files' );

function markethon_after_import_setup($selected_import) {
    

    // Assign menus to their locations.
    $locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
    $menus = wp_get_nav_menus(); // registered menus
    
    if($menus) {				
        foreach($menus as $menu) { // assign menus to theme locations
            
            if( $menu->name == 'Main Menu' || $menu->name == 'main-menu' ) {
                $locations['top'] = $menu->term_id;
            }

            if( $menu->name == 'info_menu' ) {
                $locations['social'] = $menu->term_id;
            }					
        }
    }
    set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations 

            
            if ( 'Home Default' === $selected_import['import_file_name'] ) {
    
                // Assign front page and posts page (blog page).
                 $front_page_id = get_page_by_title( 'Home 1' );
                 $blog_page_id  = get_page_by_title( 'Blog' );
                
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Home Agency' === $selected_import['import_file_name'] ) {

                $front_page_id = get_page_by_title( 'Home 2' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Home Product' === $selected_import['import_file_name'] ) {

                $front_page_id = get_page_by_title( 'Home 3' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Home Creative' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 4' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Corporate Agency' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 5' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Blog Standard' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 6' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Corporate New' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 7' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Portfolio Grid' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 8' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Minimal Portfolio' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 9' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Corporate 3' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 10' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            } elseif ( 'Modern Conslutancy' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Home 11' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            }

            elseif ( 'Digital Marketing Consultant' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Digital Marketing Consultant' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            }

            elseif ( 'Project Showcase' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Project Showcase - Slider' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            }

            elseif ( 'Creative Service showcase' === $selected_import['import_file_name'] ) {
                
                $front_page_id = get_page_by_title( 'Creative Service showcase' );
                $blog_page_id  = get_page_by_title( 'Blog' );
            
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $front_page_id->ID );
                update_option( 'page_for_posts', $blog_page_id->ID );

            }

             //Import Revolution Slider
                if ( class_exists( 'RevSlider' ) ) {                    
                    $slider_array = array(
                    get_template_directory()."/inc/demo/demo-1/markethon-demo1.zip",
                    get_template_directory()."/inc/demo/demo-2/markethon-demo2.zip",
                    get_template_directory()."/inc/demo/demo-3/markethon-demo3.zip",
                    get_template_directory()."/inc/demo/demo-4/markethon-seo.zip",
                    get_template_directory()."/inc/demo/demo-5/markethon-demo5.zip",
                    get_template_directory()."/inc/demo/demo-6/markethon6.zip",
                    get_template_directory()."/inc/demo/demo-7/markethon-corporate.zip",
                    get_template_directory()."/inc/demo/demo-8/markethon8.zip",
                    get_template_directory()."/inc/demo/demo-9/markethon9.zip",
                    get_template_directory()."/inc/demo/demo-10/home-10.zip",
                    get_template_directory()."/inc/demo/demo-11/home-11.zip",
                    get_template_directory()."/inc/demo/demo-12/markethon-data-science.zip",
                    get_template_directory()."/inc/demo/demo-13/project-carousel1.zip",
                    get_template_directory()."/inc/demo/demo-14/art-gallery1.zip",

                );

                    $slider = new RevSlider();

                    foreach($slider_array as $filepath){
                        $slider->importSliderFromPost(true,true,$filepath);  
                    }
                }


    // remove default post
    wp_delete_post(1);

}
add_action( 'pt-ocdi/after_import', 'markethon_after_import_setup' );
?>