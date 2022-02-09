<?php if (!defined('FW')) die('Forbidden');
	$cont = $atts['contact'];
?>
<div class="contact-info-box flw">
	<?php foreach($cont as $key): ?>
		<div class="contact-info-detail">
			<span class="<?php echo esc_attr($key['icon']); ?>"></span>
			<h3><?php echo esc_html($key['info']); ?></h3>
		</div>
	<?php endforeach; ?>
</div>