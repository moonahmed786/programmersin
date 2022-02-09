<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="seo-social-media-services flw">
	<div class="row">
		<?php foreach($atts['sms'] as $key): ?>
		<div class="col-md-3 col-lg-3">
			<div class="seo-sms-item flw" style="background: <?php echo esc_attr($key['bg']); ?>">
				<span class="seo-sms-icon <?php echo esc_attr($key['icon']); ?>"></span>
				<h3 class="seo-sms-title">
					<a href="<?php echo esc_url($key['link']); ?>"><?php echo esc_html($key['title']); ?></a>
				</h3>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>