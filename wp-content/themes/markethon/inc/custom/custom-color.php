<?php
if(class_exists('ReduxFramework'))
{
    add_action('wp_enqueue_scripts', 'markethon_color', 20);    
}

function markethon_color()
{
    //$sofbox_option = get_option('sofbox_options');
    $markethon_option = get_option('markethon_options');    
    
    $color_var = ':root { ';
    
    if ( $markethon_option['markethon_color'] == "2"  ){
        $color_var = ':root { ';

            if(!empty($markethon_option['primary_color'])) {
                $color = $markethon_option['primary_color'];
                $color_var .= ' --primary-color: '.$color.' !important;';
            }            

            if(!empty($markethon_option['primary_second_color'])) {
                $color = $markethon_option['primary_second_color'];
                $color_var .= ' --secondary-color: '.$color.' !important;';
            }

            if(!empty($markethon_option['tertiary_color'])) {
                $color = $markethon_option['tertiary_color'];
                $color_var .= ' --tertiary-color: '.$color.' !important;';
            }

            if(!empty($markethon_option['text_color'])) {
                $color = $markethon_option['text_color'];
                $color_var .= ' --text-color: '.$color.' !important;';
            }


        $color_var .='}';  
        wp_add_inline_style('markethon-style', $color_var);
    }
    
    
}
?>