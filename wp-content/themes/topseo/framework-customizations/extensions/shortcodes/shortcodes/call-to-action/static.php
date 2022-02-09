<?php if (!defined('FW')) die('Forbidden');

if (!function_exists('topseo_shortcode_call_to_action_enqueue_dynamic_css')):

/**
 * @internal
 * @param array $data
 */
function topseo_shortcode_call_to_action_enqueue_dynamic_css($data) {
    $shortcode = 'call-to-action';
    $atts = topseo_shortcode_options( $data, $shortcode );
    // button style
    if( $atts['button']['style']['gadget'] == 'yes' ){
      $text_color = $atts['button']['style']['yes']['text_color'];
      $bg_color = $atts['button']['style']['yes']['bg_color'];
      $text_hover = $atts['button']['style']['yes']['text_hover'];
      $bg_hover = $atts['button']['style']['yes']['bg_hover'];
      wp_add_inline_style(
          'topseo-theme-style',
          '#ht-btn-'. $atts['button']['id'] .' .ht-btn { '.
              'color: '. $text_color .';'.
              'background-color: '. $bg_color .';'.
          ' }
          #ht-btn-'. $atts['button']['id'] .' .ht-btn:hover{ '.
            'color: '. $text_hover .';'.
            'background-color: '. $bg_hover .';'.
          '}'
      );
    }
    // button border
    if( $atts['button']['border']['gadget'] == 'yes' ){
      $cta_size = $atts['button']['size'];
      $cta_color = $atts['button']['border']['yes']['border_color'];
      $cta_width = $atts['button']['border']['yes']['border_width'];
      $cta_style = $atts['button']['border']['yes']['border_style'];
      $cta_hover = $atts['button']['border']['yes']['border_hover'];
      wp_add_inline_style(
          'topseo-theme-style',
          'body #ht-btn-'. $atts['button']['id'] .' .'.$cta_size.' { '.
              'border-color: '. $cta_color .';'.
              'border-width: '. $cta_width .'px;'.
              'border-style: '. $cta_style .';'.
          ' }
          body #ht-btn-'. $atts['button']['id'] .' .'.$cta_size.':hover{ '.
            'border-color: '. $cta_hover .';'.
          '}'
      );
    }

}
add_action(
    'fw_ext_shortcodes_enqueue_static:call_to_action',
    'topseo_shortcode_call_to_action_enqueue_dynamic_css'
);

endif;
