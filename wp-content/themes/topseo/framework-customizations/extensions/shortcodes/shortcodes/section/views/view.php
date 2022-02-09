<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

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

// custom id
$id = '';
if (!empty( $atts['id'])){
	$id = 'id="'.$atts['id'].'"';
}



$bg_video_data_attr    = '';
$section_extra_classes = '';
if ( ! empty( $atts['video'] ) ) {
	$filetype           = wp_check_filetype( $atts['video'] );
	$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$bg_video_data_attr = 'data-wallpaper-options="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $atts['video'] ) ) ) ) . '"';
	$section_extra_classes .= ' background-video';
}

// custom class
if(!empty($atts['sec_class'])){
	$section_extra_classes = ' '.$atts['sec_class'];
}

$section_style   = ( $bg_color || $bg_image ) ? 'style="' . $bg_color . $bg_image . $bg_rp . $bg_size . $bg_ps . $bg_at . '"' : '';
$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'fw-container-fluid' : 'fw-container';
?>
<div class="fw-main-row<?php echo esc_attr($section_extra_classes); ?>" <?php echo wp_kses_post($section_style); ?> <?php echo esc_html($bg_video_data_attr); ?> <?php echo wp_kses_post($id); ?>>
	<div class="<?php echo esc_attr($container_class); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>
