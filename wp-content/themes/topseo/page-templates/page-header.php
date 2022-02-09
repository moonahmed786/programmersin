<?php
// @codingStandardsIgnoreStart
/**
 * Displaying the page template infor
 */
// Customizer/Metabox variable
$c_page_header = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_page_header') : 'yes';
$c_breadcrumb = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_breadcrumb') : 'no';
$c_blog_detail = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_blog_detail') : 'Blog detail';

// id page
$pid = get_queried_object_id();
$page_option = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'page_option_page_header') : '';

// Kirki customizer option
$c_header_bg = get_theme_mod( 'c_header_bg', $default = 'bg_color' );
$c_header_bg_color = get_theme_mod( 'c_header_bg_color' , $default = '#252c44' );
$c_header_bg_image = get_theme_mod( 'c_header_bg_image' , $default = false );
$c_pattern_bg = get_theme_mod( 'c_pattern_bg', $default = 'off' );
$c_pattern_bg_1 = get_theme_mod( 'c_pattern_bg_1', $default = false );
$c_pattern_bg_2 = get_theme_mod( 'c_pattern_bg_2', $default = false );
$c_pattern_bg_3 = get_theme_mod( 'c_pattern_bg_3', $default = false );

// Default Variable
$final_bg_color = '';
$final_bg_img = '';
$final_page_header = $c_page_header;

if( $c_header_bg == 'bg_color' ){
  $final_bg_color = $c_header_bg_color;
}else{
  $final_bg_img = $c_header_bg_image;
}


if(function_exists('FW')){

    $c_breadcrumb_bg_select = fw_get_db_customizer_option('c_breadcrumb_bg_select');
    if(is_page() || is_singular() || is_home()){
        if($page_option['gadget'] == 'disable'){
            $final_page_header = 'no';
        }
        // Override value if enable custom page header
        if($page_option['gadget'] == 'enable'){
            $p_breadcrumb_bg_select = $page_option['enable']['p_breadcrumb_bg_select'];
            if($p_breadcrumb_bg_select['gadget'] == 'color'){
                $final_bg_color = $p_breadcrumb_bg_select['color']['p_header_bg_color'];
            }else{
                $final_bg_img = $p_breadcrumb_bg_select['image']['p_header_bg_image']['url'];
            }
        }
    }

}

// animate
$breadcrumb_animate = '';
if ( true == get_theme_mod( 'c_enable_animate', true ) ){
    $breadcrumb_animate = ' breadcrumb-animate';
}
// custom page header in backend
$p_switch_gadget = '';
$p_pattern = '';
if(isset($page_option['gadget']) && $page_option['gadget']=='enable'){
    $p_switch_gadget = $page_option['enable']['p_switch']['gadget'];
    $p_pattern = $page_option['enable']['p_switch']['p_on']['p_pattern'];
    ?>

        <nav class="breadcrumb topseo-breadcrumb-custom flw<?php echo esc_attr($breadcrumb_animate); ?>" style="background-color: <?php echo esc_attr($final_bg_color); ?>; background-image: url('<?php echo esc_url($final_bg_img); ?>') ">

            <div class="container">
            <?php topseo_edit_location( $id = 'breadcrumb', $position = 'left: 50px;' ); ?>
                <div class="bread flw">
                    <h1 class="page-title">
                        <?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'topseo' ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'topseo' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'topseo' ) ) );
                        elseif(is_author()):
                            $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
                            echo esc_html($curauth->display_name);
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'topseo' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'topseo' ) ) );

                        elseif( is_page() || is_home() ) :
                            /**
                             * Replace page titile with alternative title
                             * if it's not empty
                             */
                            $page_title = get_the_title($pid);
                            if(isset($page_option['gadget']) && $page_option['gadget'] == 'enable' && $page_option['enable']['page_alternative_title'] != ''){
                                $page_title = $page_option['enable']['page_alternative_title'];
                            }
                            echo esc_html($page_title);
                        elseif( is_tax() ) :
                            global $wp_query;
                            $term = $wp_query->get_queried_object();
                            $page_title = $term->name;
                            echo esc_html($page_title);
                        elseif( is_search() ):
                            esc_html_e('Search Result', 'topseo');
                        elseif( is_singular( $post_types = 'ht-service' )) :
                            the_title();
                        elseif( is_singular( $post_types = 'fw-portfolio' )) :
                            the_title();
                        elseif(is_single()) :
                            if(class_exists( 'WooCommerce' ) && is_product()):
                              esc_html_e('Shop detail', 'topseo');
                            else :
                                $blog_spc_title = function_exists('fw_get_db_post_option') ? (fw_get_db_post_option($post->ID, 'spc_opt')) : '';
                                if(isset($blog_spc_title['gadget']) && $blog_spc_title['gadget'] == 'yes'){
                                    echo esc_html($blog_spc_title['yes']['spc_title']);
                                }else{
                                    esc_html_e('Blog detail', 'topseo');
                                }
                            endif;
                        elseif(class_exists( 'WooCommerce' ) && is_shop()) :
                            esc_html_e('Shop', 'topseo');
                        elseif(class_exists( 'WooCommerce' ) && is_product()) :
                            esc_html_e('Shop detail', 'topseo');
                        elseif(is_404()) :
                            esc_html_e('404', 'topseo');
                        else :
                            esc_html_e( 'Archives', 'topseo' );
                        endif;
                        ?>
                    </h1>
                    <?php
                    if (function_exists('fw_ext_breadcrumbs')) {
                        if($c_breadcrumb == 'yes'){
                          fw_ext_breadcrumbs();
                        }
                    }
                    ?>
                </div>
            </div>     
               
            <?php if( $p_switch_gadget=='p_on') : ?>
                <?php foreach($p_pattern as $key): ?>
                    <img data-offset="10" src="<?php echo esc_url($key['p_p1']['url']); ?>" alt="<?php esc_attr_e('breadcrumb_patterm', 'topseo'); ?>" class="prl"
                    style="<?php echo esc_attr($key['p_p2']); ?>:<?php echo esc_attr($key['p_p3']); ?>%;<?php echo esc_attr($key['p_p4']); ?>:<?php echo esc_attr($key['p_p5']); ?>px;">
                <?php endforeach; ?>
            <?php endif; ?>    
        </nav>

<?php
    // custom page header in customizer
    }else{
    if($final_page_header == 'yes'):
?>
        <nav class="breadcrumb topseo-breadcrumb flw<?php echo esc_attr($breadcrumb_animate); ?>" style="background-image: url('<?php echo esc_url($final_bg_img); ?>')">

            <div class="container">
            <?php topseo_edit_location( $id = 'breadcrumb', $position = 'left: 50px; top:30px;' ); ?>
                <div class="bread flw">
                    <h1 class="page-title">
                        <?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'topseo' ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'topseo' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'topseo' ) ) );
                        elseif(is_author()):
                            $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
                            echo esc_html($curauth->display_name);
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'topseo' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'topseo' ) ) );

                        elseif( is_page() || is_home() ) :
                            /**
                             * Replace page titile with alternative title
                             * if it's not empty
                             */
                            $page_title = get_the_title($pid);
                            if(isset($page_option['gadget']) && $page_option['gadget'] == 'enable' && $page_option['enable']['page_alternative_title'] != ''){
                                $page_title = $page_option['enable']['page_alternative_title'];
                            }
                            echo esc_html($page_title);
                        elseif( is_tax() ) :
                            global $wp_query;
                            $term = $wp_query->get_queried_object();
                            $page_title = $term->name;
                            echo esc_html($page_title);
                        elseif( is_search() ):
                            esc_html_e('Search Result', 'topseo');
                        elseif( is_singular( $post_types = 'ht-service' )) :
                            the_title();
                        elseif( is_singular( $post_types = 'fw-portfolio' )) :
                            the_title();
                        elseif(is_single()) :
                            if(class_exists( 'WooCommerce' ) && is_product()):
                              esc_html_e('Shop detail', 'topseo');
                            else :
                                $blog_spc_title = function_exists('fw_get_db_post_option') ? (fw_get_db_post_option($post->ID, 'spc_opt')) : '';
                                if(isset($blog_spc_title['gadget']) && $blog_spc_title['gadget'] == 'yes'){
                                    echo esc_html($blog_spc_title['yes']['spc_title']);
                                }else{
                                    echo esc_html($c_blog_detail);
                                }                         
                            endif;
                        elseif(class_exists( 'WooCommerce' ) && is_shop()) :
                            esc_html_e('Shop', 'topseo');
                        elseif(class_exists( 'WooCommerce' ) && is_product()) :
                            esc_html_e('Shop detail', 'topseo');
                        elseif(is_404()) :
                            esc_html_e('404', 'topseo');
                        else :
                            esc_html_e( 'Archives', 'topseo' );
                        endif;
                        ?>
                    </h1>
                    <?php
                    if (function_exists('fw_ext_breadcrumbs')) {
                        if($c_breadcrumb == 'yes'){
                          fw_ext_breadcrumbs();
                        }
                    }
                    ?>
                </div>
            </div>     

            <?php if( $c_pattern_bg != 'off' ) : ?>
              <?php if( $c_pattern_bg_1 != '' ) :  ?>
                <img data-offset="10" src="<?php echo esc_url($c_pattern_bg_1); ?>" alt="<?php esc_attr_e('breadcrumb_patterm', 'topseo'); ?>" class="prl nav-bg-1">
              <?php endif; ?>
              <?php if( $c_pattern_bg_2 != '' ) :  ?>
                <img data-offset="15" src="<?php echo esc_url($c_pattern_bg_2); ?>" alt="<?php esc_attr_e('breadcrumb_patterm', 'topseo'); ?>" class="prl nav-bg-2">
              <?php endif; ?>
              <?php if( $c_pattern_bg_3 != '' ) :  ?>
                <img data-offset="5" src="<?php echo esc_url($c_pattern_bg_3); ?>" alt="<?php esc_attr_e('breadcrumb_patterm', 'topseo'); ?>" class="prl nav-bg-3">
              <?php endif; ?>
            <?php endif; ?>    
        </nav>
    <?php endif; ?>
<?php } ?>

