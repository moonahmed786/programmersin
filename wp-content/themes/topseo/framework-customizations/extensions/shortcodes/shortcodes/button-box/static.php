<?php if (!defined('FW')) die('Forbidden');

if (!function_exists('topseo_shortcode_button_box_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_button_box_enqueue_dynamic_css($data) {
    $shortcode = 'button-box';
    $atts = topseo_shortcode_options( $data, $shortcode );

    foreach( $atts['seo_button'] as $button ){
        // button box style
      if( $button['style']['gadget'] == 'yes' ){
        $text_color = $button['style']['yes']['text_color'];
        $bg_color = $button['style']['yes']['bg_color'];
        $text_hover = $button['style']['yes']['text_hover'];
        $bg_hover = $button['style']['yes']['bg_hover'];

        wp_add_inline_style(
            'topseo-theme-style',
            '#ht-btn-'. $button['id'] .' .ht-btn { '.
                'color: '. $text_color .';'.
                'background-color: '. $bg_color .';'.
            ' }
            #ht-btn-'. $button['id'] .' .ht-btn:hover{ '.
              'color: '. $text_hover .';'.
              'background-color: '. $bg_hover .';'.
            '}'
        );
      }
      // button box border
      if( $button['border']['gadget'] == 'yes' ){
        $btb_size = $button['size'];
        $btb_color = $button['border']['yes']['border_color'];
        $btb_width = $button['border']['yes']['border_width'];
        $btb_style = $button['border']['yes']['border_style'];
        $btb_hover = $button['border']['yes']['border_hover'];

        wp_add_inline_style(
            'topseo-theme-style',
            '#ht-btn-'. $button['id'] .' .'.$btb_size.' { '.
                'border-style:'.$btb_style.';'.
                'border-width:'.$btb_width.'px;'.
                'border-color:'.$btb_color.';'.
            ' }
            #ht-btn-'. $button['id'] .' .'.$btb_size.':hover{ '.
              'border-color:'. $btb_hover .';'.
            '}'
        );
      }
    }

}
add_action(
    'fw_ext_shortcodes_enqueue_static:button_box',
    'topseo_shortcode_button_box_enqueue_dynamic_css'
);

endif;
