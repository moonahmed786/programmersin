<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$image_alt = (get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Counter image';
if($atts['style']=='1'){ ?>
	<div class="counter-item flw" itemscope itemtype="http://schema.org/ImageObject">
		<p class="counter-title" itemprop="name"><?php echo esc_html($atts['title']); ?></p>
		<h2 class="counter-number"><?php echo esc_html($atts['number']); ?></h2>
		<div class="counter-effects">
			<div class="counter-circle"></div>
			<div class="counter-img">
				<img src="<?php echo esc_url($atts['image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop="contentUrl" />
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="counter-2-item" itemscope itemtype="http://schema.org/ImageObject">
		<div class="counter-2-img">
			<img src="<?php echo esc_url($atts['image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop="contentUrl" />
		</div>
		<div class="counter-number counter-2-number" itemprop="name"><?php echo esc_html($atts['number']); ?></div>
		<div class="counter-2-desc" itemprop="description"><?php echo esc_html($atts['title']); ?></div>
	</div>
<?php } ?>