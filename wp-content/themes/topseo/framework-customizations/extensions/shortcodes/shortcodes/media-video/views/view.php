<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="seo-media-video use-plyr-render flw">
	<div data-type="<?php echo esc_attr($atts['video_type']); ?>" data-video-id="<?php echo esc_attr($atts['url']); ?>"></div>
</div>