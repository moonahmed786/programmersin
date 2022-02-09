<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$style = $atts['style'];
$testimonials = $atts['testimonials'];
?>
<?php if($style == 'choice-1') : ?>
	<div class="our-partient-speak">
		<?php foreach($testimonials as $testi_id) :
			$post = get_post($testi_id);
			$rating = fw_get_db_post_option( $testi_id, 'rating' );
			$name = fw_get_db_post_option( $testi_id, 'name' );
			$position = fw_get_db_post_option( $testi_id, 'position' );
			$thumb_url = wp_get_attachment_url(get_post_thumbnail_id($testi_id));

			$img_id  = get_post_thumbnail_id($testi_id);
			$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Image thumbnail';
			?>
			<div class="our-partient-speak-item">
				<h3 class="our-partient-speak-title"><?php echo esc_html($post->post_title) ?></h3>
				<div class="our-partient-speak-rate">
					<?php topseo_testimonial_rating($rating); ?>
				</div>
				<div class="our-partient-speak-content"><p><?php echo wp_kses_post($post->post_content); ?></p></div>
				<div class="our-partient-speak-user-post">
					<div class="user-post-img">
						<a href="#"><img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"></a>
					</div>
					<div class="user-post-info">
						<h3 class="user-post-name"><?php echo esc_html($name); ?></h3>
						<span class="user-post-role"><?php echo esc_html($position); ?></span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

<?php elseif($style == 'choice-3') : ?>
	<div class="perfect-seo-crs">
		<?php
		foreach($testimonials as $testi_id){
			$post = get_post($testi_id);
			$rating = fw_get_db_post_option( $testi_id, 'rating' );
			$name = fw_get_db_post_option( $testi_id, 'name' );
			$position = fw_get_db_post_option( $testi_id, 'position' );
			$thumb_url = wp_get_attachment_url(get_post_thumbnail_id($testi_id));
			?>
			<div class="perfect-seo-item">
				<div class="perfect-rate">
					<?php topseo_testimonial_rating($rating); ?>
				</div>
				<h3 class="perfect-seo-title"><?php echo esc_html($post->post_title); ?></h3>
				<div class="perfect-seo-content">
					<p><?php echo wp_kses($post->post_content, array('b'=>array())); ?></p>
				</div>
				<h3 class="perfect-seo-author">
					<span><?php echo esc_html($name); ?></span>
					<span>/</span>
					<span><?php echo esc_html($position); ?></span>
				</h3>
			</div>
		<?php } ?>
	</div>
<?php else : ?>
	<div class="our-partient-speak-ver2">
		<?php
		foreach($testimonials as $testi_id){
			$post = get_post($testi_id);
			$rating = fw_get_db_post_option( $testi_id, 'rating' );
			$name = fw_get_db_post_option( $testi_id, 'name' );
			$position = fw_get_db_post_option( $testi_id, 'position' );
			$thumb_url = wp_get_attachment_url(get_post_thumbnail_id($testi_id));

			$img_id  = get_post_thumbnail_id($testi_id);
			$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Image thumbnail';
			?>
			<div class="our-partient-speak-item">
				<div class="our-partient-speak-user-post">
					<div class="user-post-img">
						<a href="#"><img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"></a>
					</div>
					<div class="user-post-info">
						<h3 class="user-post-name"><?php echo esc_html($name); ?></h3>
						<span class="user-post-role"><?php echo esc_html($position); ?></span>
					</div>
				</div>
				<h3 class="our-partient-speak-title"><?php echo esc_html($post->post_title); ?></h3>
				<div class="our-partient-speak-rate">
					<?php topseo_testimonial_rating($rating); ?>
				</div>
				<div class="our-partient-speak-content"><p><?php echo wp_kses($post->post_content, array('b'=>array())); ?></p></div>
			</div>
		<?php } ?>
	</div>
<?php endif; ?>
