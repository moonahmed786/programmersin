<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$title = !empty($atts['title']) ? ($atts['title']) : '';
$bg = !empty($atts['img']) ? ($atts['img']['url']) : '';
$label = !empty($atts['btn']) ? ($atts['btn']) : '';
$link = !empty($atts['btn_link']) ? ($atts['btn_link']) : '';
?>

<div class="landing-box flw">
	<div class="landing-img" style="background-image:url(<?php echo esc_url($bg); ?>);">
		<div class="landing-btn">
			<a target="_blank" class="no-fade" href="<?php echo esc_url($link); ?>"><?php echo esc_html($label); ?></a>
		</div>
	</div>
</div>
<div class="landing-title"><?php echo esc_html($title); ?></div>