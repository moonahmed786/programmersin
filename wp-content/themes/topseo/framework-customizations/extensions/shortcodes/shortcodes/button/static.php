<?php if (!defined('FW')) die('Forbidden');

if (!function_exists('topseo_shortcode_button_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_button_enqueue_dynamic_css($data) {
    $shortcode = 'button';
    $atts = topseo_shortcode_options( $data, $shortcode );
    // button style
    if( $atts['style']['gadget'] == 'yes' ){
      $text_color = $atts['style']['yes']['text_color'];
      $bg_color = $atts['style']['yes']['bg_color'];
      $text_hover = $atts['style']['yes']['text_hover'];
      $bg_hover = $atts['style']['yes']['bg_hover'];

      wp_add_inline_style(
          'topseo-theme-style',
          '#ht-btn-'. $atts['id'] .' .ht-btn { '.
              'color: '. $text_color .';'.
              'background-color: '. $bg_color .';'.
          '}
          #ht-btn-'. $atts['id'] .' .ht-btn:hover{ '.
            'color: '. $text_hover .';'.
            'background-color: '. $bg_hover .';'.
          '}'
      );
    }
    // button border
    if($atts['border']['gadget']=='yes'){
      $button_size = $atts['size'];
      $border_style = $atts['border']['yes']['border_style'];
      $border_color = $atts['border']['yes']['border_color'];
      $border_width = $atts['border']['yes']['border_width'];
      $border_hover = $atts['border']['yes']['border_hover'];
      wp_add_inline_style(
        'topseo-theme-style',
        '#ht-btn-'. $atts['id'] . ' .' .$button_size.' {'.
          'border-style:' .$border_style.';'.
          'border-color:' .$border_color.';'.
          'border-width:' .$border_width.'px;'.
        '}
        #ht-btn-'.$atts['id'].' .'.$button_size.':hover {'.
          'border-color:'.$border_hover.';'.
        '}'
      );
    }

}
add_action(
    'fw_ext_shortcodes_enqueue_static:button',
    'topseo_shortcode_button_enqueue_dynamic_css'
);

endif;
