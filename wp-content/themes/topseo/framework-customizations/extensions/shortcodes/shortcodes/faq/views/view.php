<?php if (!defined('FW')) die('Forbidden'); ?>
<div class="pricing-common-item <?php echo esc_attr($atts['icon']); ?>">
	<h3 class="pricing-common-item-title"><?php echo esc_html($atts['title']); ?></h3>
	<p class="pricing-common-item-desc"><?php echo esc_html($atts['content']); ?></p>
</div>