<?php
if ( !function_exists( 'markethon_create_dynamic_style' ) ) {
    
    function markethon_create_dynamic_style() {

        $markethon_dynamic_css = array();
        $markethon_dynamic_css_min_width_1200px = array();

        $markethon_option = get_option('markethon_options');
       
        if(!empty($markethon_option["logo-dimensions"]["width"])) { $logo_width = $markethon_option["logo-dimensions"]["width"]; }
        if(!empty($markethon_option["logo-dimensions"]["height"])) { $logo_height = $markethon_option["logo-dimensions"]["height"]; }

        if(!empty($markethon_option["sticky-logo-dimensions"]["width"])) { $logo_width = $markethon_option["sticky-logo-dimensions"]["width"]; }
        if(!empty($markethon_option["sticky-logo-dimensions"]["height"])) { $logo_height = $markethon_option["sticky-logo-dimensions"]["height"]; }

        if(!empty($markethon_option["loader-dimensions"]["width"])) {  $loader_width = $markethon_option["loader-dimensions"]["width"]; }
        if(!empty($markethon_option["loader-dimensions"]["height"])) { $loader_height = $markethon_option["loader-dimensions"]["height"]; }

        if(!empty($markethon_option["footerlogo-dimensions"]["width"])) { $footerlogo_width = $markethon_option["footerlogo-dimensions"]["width"]; }
        if(!empty($markethon_option["footerlogo-dimensions"]["height"])) { $footerlogo_height = $markethon_option["footerlogo-dimensions"]["height"]; }

        

        if(isset($markethon_option["body_font"]["font-family"])) { $body_family = $markethon_option["body_font"]["font-family"]; }
        if(isset($markethon_option["body_font"]["font-size"])){ $body_size = $markethon_option["body_font"]["font-size"]; }
        if(isset($markethon_option["body_font"]["font-weight"])){ $body_weight = $markethon_option["body_font"]["font-weight"]; }

        if(isset($markethon_option["primary_menu"]["font-family"])) { $primary_family = $markethon_option["primary_menu"]["font-family"]; }
        if(isset($markethon_option["primary_menu"]["font-size"])) { $primary_size = $markethon_option["primary_menu"]["font-size"]; }
        if(isset($markethon_option["primary_menu"]["font-weight"])) { $primary_weight = $markethon_option["primary_menu"]["font-weight"]; }

        if(isset($markethon_option["sub_menu"]["font-family"])) { $sub_family = $markethon_option["sub_menu"]["font-family"]; }
        if(isset($markethon_option["sub_menu"]["font-size"])) { $sub_size = $markethon_option["sub_menu"]["font-size"]; }
        if(isset($markethon_option["sub_menu"]["font-weight"])) { $sub_weight = $markethon_option["sub_menu"]["font-weight"]; }

        if(isset($markethon_option["h1_font"]["font-family"])) { $h1_family = $markethon_option["h1_font"]["font-family"]; }
        
        if(isset($markethon_option["h1_font"]["font-size"])) { $h1_size = $markethon_option["h1_font"]["font-size"]; }
        if(isset($markethon_option["h1_font"]["font-weight"])) { $h1_weight = $markethon_option["h1_font"]["font-weight"]; }

        if(isset($markethon_option["h2_font"]["font-family"])) { $h2_family = $markethon_option["h2_font"]["font-family"]; }
        if(isset($markethon_option["h2_font"]["font-size"])) { $h2_size = $markethon_option["h2_font"]["font-size"]; }
        if(isset($markethon_option["h2_font"]["font-weight"])) { $h2_weight = $markethon_option["h2_font"]["font-weight"]; }

        if(isset($markethon_option["h3_font"]["font-family"])) { $h3_family = $markethon_option["h3_font"]["font-family"]; }
        if(isset($markethon_option["h3_font"]["font-size"])) { $h3_size = $markethon_option["h3_font"]["font-size"]; }
        if(isset($markethon_option["h3_font"]["font-weight"])) { $h3_weight = $markethon_option["h3_font"]["font-weight"]; }

        if(isset($markethon_option["h4_font"]["font-family"])) { $h4_family = $markethon_option["h4_font"]["font-family"]; }
        if(isset($markethon_option["h4_font"]["font-size"])) { $h4_size = $markethon_option["h4_font"]["font-size"]; }
        if(isset($markethon_option["h4_font"]["font-weight"])) { $h4_weight = $markethon_option["h4_font"]["font-weight"]; }

        if(isset($markethon_option["h5_font"]["font-family"])) { $h5_family = $markethon_option["h5_font"]["font-family"]; }
        if(isset($markethon_option["h5_font"]["font-size"])) { $h5_size = $markethon_option["h5_font"]["font-size"]; }
        if(isset($markethon_option["h5_font"]["font-weight"])) { $h5_weight = $markethon_option["h5_font"]["font-weight"]; }

        if(isset($markethon_option["h6_font"]["font-family"])) { $h6_family = $markethon_option["h6_font"]["font-family"]; }
        if(isset($markethon_option["h6_font"]["font-size"])) { $h6_size = $markethon_option["h6_font"]["font-size"]; }
        if(isset($markethon_option["h6_font"]["font-weight"])) { $h6_weight = $markethon_option["h6_font"]["font-weight"]; }

        if(isset($markethon_option["page_title_font"]["font-family"])) { $page_title_family = $markethon_option["page_title_font"]["font-family"]; }
        if(isset($markethon_option["page_title_font"]["font-size"])) { $page_title_size = $markethon_option["page_title_font"]["font-size"]; }
        if(isset($markethon_option["page_title_font"]["font-weight"])) { $page_title_weight = $markethon_option["page_title_font"]["font-weight"]; }

        if(isset($markethon_option["page_desc_font"]["font-family"])) { $page_desc_family = $markethon_option["page_desc_font"]["font-family"]; }
        if(isset($markethon_option["page_desc_font"]["font-size"])) { $page_desc_size = $markethon_option["page_desc_font"]["font-size"]; }
        if(isset($markethon_option["page_desc_font"]["font-weight"])) { $page_desc_weight = $markethon_option["page_desc_font"]["font-weight"]; }
	
	if(!empty($loader_width)){
		$markethon_dynamic_css[] = array( 
		    'elements'  =>  '#loading img',
		    'property'  =>  'width',
		    'value'     =>  $loader_width. '!important'
		);
	}	
	if(!empty($loader_height)){
		$markethon_dynamic_css[] = array(
		    'elements'  =>  '#loading img',
		    'property'  =>  'height',
		    'value'     =>  $loader_height. '!important'
		);
	}
        // Change font 1
        if( $markethon_option['markethon_change_font'] == 1 ){
            // body
            $markethon_dynamic_css[] = array(
                'elements'  =>  'body',
                'property'  =>  'font-family',
                'value'     =>  $body_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'body',
                'property'  =>  'font-size',
                'value'     =>  $body_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'body',
                'property'  =>  'font-weight',
                'value'     =>  $body_weight. '!important'
            );

            // primary menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#primary-menu',
                'property'  =>  'font-family',
                'value'     =>  $primary_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#primary-menu',
                'property'  =>  'font-size',
                'value'     =>  $primary_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#primary-menu',
                'property'  =>  'font-weight',
                'value'     =>  $primary_weight. '!important'
            );

            // sub menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#sub-menu',
                'property'  =>  'font-family',
                'value'     =>  $sub_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#sub-menu',
                'property'  =>  'font-size',
                'value'     =>  $sub_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '#sub-menu',
                'property'  =>  'font-weight',
                'value'     =>  $sub_weight. '!important'
            );

            // h1 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h1',
                'property'  =>  'font-family',
                'value'     =>  $h1_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h1',
                'property'  =>  'font-size',
                'value'     =>  $h1_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h1',
                'property'  =>  'font-weight',
                'value'     =>  $h1_weight. '!important'
            );

            // h2 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h2',
                'property'  =>  'font-family',
                'value'     =>  $h2_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h2',
                'property'  =>  'font-size',
                'value'     =>  $h2_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h2',
                'property'  =>  'font-weight',
                'value'     =>  $h2_weight. '!important'
            );

            // h3 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h3',
                'property'  =>  'font-family',
                'value'     =>  $h3_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h3',
                'property'  =>  'font-size',
                'value'     =>  $h3_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h3',
                'property'  =>  'font-weight',
                'value'     =>  $h3_weight. '!important'
            );

            // h4 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h4',
                'property'  =>  'font-family',
                'value'     =>  $h4_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h4',
                'property'  =>  'font-size',
                'value'     =>  $h4_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h4',
                'property'  =>  'font-weight',
                'value'     =>  $h4_weight. '!important'
            );

            // h5 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h5',
                'property'  =>  'font-family',
                'value'     =>  $h5_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h5',
                'property'  =>  'font-size',
                'value'     =>  $h5_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h5',
                'property'  =>  'font-weight',
                'value'     =>  $h5_weight. '!important'
            );

            // h6 menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h6',
                'property'  =>  'font-family',
                'value'     =>  $h6_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h6',
                'property'  =>  'font-size',
                'value'     =>  $h6_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  'h6',
                'property'  =>  'font-weight',
                'value'     =>  $h6_weight. '!important'
            );

            // page_title menu
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.page_title',
                'property'  =>  'font-family',
                'value'     =>  $page_title_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.page_title',
                'property'  =>  'font-size',
                'value'     =>  $page_title_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.page_title',
                'property'  =>  'font-weight',
                'value'     =>  $page_title_weight. '!important'
            );

             // page_desc menu
             $markethon_dynamic_css[] = array(
                'elements'  =>  '.page_desc',
                'property'  =>  'font-family',
                'value'     =>  $page_desc_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.page_desc',
                'property'  =>  'font-size',
                'value'     =>  $page_desc_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.button',
                'property'  =>  'font-weight',
                'value'     =>  $page_desc_weight. '!important'
            );

            $markethon_dynamic_css[] = array(
                'elements'  =>  '.button',
                'property'  =>  'font-family',
                'value'     =>  $page_desc_family. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.button',
                'property'  =>  'font-size',
                'value'     =>  $page_desc_size. '!important'
            );
            $markethon_dynamic_css[] = array(
                'elements'  =>  '.button',
                'property'  =>  'font-weight',
                'value'     =>  $page_desc_weight. '!important'
            );
            
            
        }
       // }

        // Start generating if related arrays are populated
        if ( count( $markethon_dynamic_css ) > 0 ) {
            echo "<style type='text/css' id='markethon-dynamic-css'>\n\n";
            
            // Basic dynamic CSS
            if ( count( $markethon_dynamic_css ) > 0 ) {
                markethon_dynamic_style( $markethon_dynamic_css );
            }            
            echo '</style>';
        }
    }
}
add_action( 'wp_head', 'markethon_create_dynamic_style' );

if ( !function_exists( 'markethon_create_dynamic_style' ) ) {
    
    function markethon_create_dynamic_style() {

        $markethon_dynamic_css = array();
        $markethon_dynamic_css_min_width_1200px = array();

        $markethon_option = get_option('markethon_options');

        $loader_width = '';
        $loader_height = '';
       if(isset($markethon_option["logo-dimensions"]["width"]))
        {
        if(!empty($markethon_option["logo-dimensions"]["width"])) { $logo_width = $markethon_option["logo-dimensions"]["width"]; }
        if(!empty($markethon_option["logo-dimensions"]["height"])) { $logo_height = $markethon_option["logo-dimensions"]["height"]; }

        if(!empty($markethon_option["loader-dimensions"]["width"])) { $loader_width = $markethon_option["loader-dimensions"]["width"]; }
        if(!empty($markethon_option["loader-dimensions"]["height"])) { $loader_height = $markethon_option["loader-dimensions"]["height"]; }

        if(!empty($markethon_option["footerlogo-dimensions"]["width"])) { $footerlogo_width = $markethon_option["footerlogo-dimensions"]["width"]; }
        if(!empty($markethon_option["footerlogo-dimensions"]["height"])) { $footerlogo_height = $markethon_option["footerlogo-dimensions"]["height"]; }
        
        $markethon_dynamic_css[] = array(
            'elements'  =>  '.navbar-brand img',
            'property'  =>  'width',
            'value'     =>  $logo_width. '!important'
        );
        $markethon_dynamic_css[] = array(
            'elements'  =>  '.navbar-brand img',
            'property'  =>  'height',
            'value'     =>  $logo_height. '!important'
        );
	
        $markethon_dynamic_css[] = array(
            'elements'  =>  'footer .footer-logo img',
            'property'  =>  'width',
            'value'     =>  $footerlogo_width. '!important'
        );
        $markethon_dynamic_css[] = array(
            'elements'  =>  'footer .footer-logo img',
            'property'  =>  'height',
            'value'     =>  $footerlogo_height. '!important'
        );
       

        // Start generating if related arrays are populated
        if ( count( $markethon_dynamic_css ) > 0 ) {
            echo "<style type='text/css' id='markethon-dynamic-css'>\n\n";
            
            // Basic dynamic CSS
            if ( count( $markethon_dynamic_css ) > 0 ) {
                markethon_dynamic_style( $markethon_dynamic_css );
            }            
            echo '</style>';
        }
}
    }
}
add_action( 'wp_head', 'markethon_create_dynamic_style' );
?>