<?php if (!defined('FW')) die('Forbidden');
$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');

$bg_color = '';
if ( ! empty( $atts['background_color'] ) ) {
	$bg_color = 'background-color:' . $atts['background_color'] . ';';
}

$bg_image = '';
if (!empty($atts['background_image'])&&!empty($atts['background_image']['data']['icon'])){
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}

// background repeat
$bg_rp = '';
if (!empty( $atts['background_repeat'])){
	$bg_rp = 'background-repeat:' . $atts['background_repeat'].';';
}
// background size
$bg_size = '';
if (!empty( $atts['background_size'] )){
	$bg_size = 'background-size:' . $atts['background_size'].';';
}
// background position
$bg_ps = '';
if (!empty( $atts['background_position'])){
	$bg_ps = 'background-position:' . $atts['background_position'].';';
}
// background attachment
$bg_at = '';
if (!empty( $atts['background_attachment'])){
	$bg_ps = 'background-attachment:' . $atts['background_attachment'].';';
}

$section_style   = ( $bg_color || $bg_image ) ? 'style="' . $bg_color . $bg_image . $bg_rp . $bg_size . $bg_ps . $bg_at . '"' : '';
// animate options
$data = '';
$animate_style = '';
if($atts['en_animate']['gadget']=='yes'){
	$gadget = $atts['en_animate']['gadget'];
	$animate_style = $atts['en_animate']['yes']['animate'];
	$animate_delay = $atts['en_animate']['yes']['animate_delay'];
	$data = ' data-wow-delay="'.$animate_delay.'"';
}

?>
<div class="<?php echo esc_attr($class).' '.esc_attr($animate_style); ?>" <?php echo wp_kses_post($data); ?> <?php echo wp_kses_post($section_style); ?>>
    <?php echo do_shortcode($content); ?>
</div>
