<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' ); ?>
<div class="seo-process flw">
	<div class="row">
		<?php foreach($atts['process'] as $key):
			$image_alt = (get_post_meta( $key['image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $key['image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Process thumbnail';
		?>
		<div class="col-md-3 col-lg-3 seo-process-item">
			<div class="seo-process-img">
				<img src="<?php echo esc_url($key['image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>">
			</div>
			<h3 class="seo-process-title"><?php echo esc_html($key['title']); ?></h3>
		</div>
		<?php endforeach; ?>
	</div>
</div>