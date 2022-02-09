<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<div class="ht_pie_chart ht_ready"
	data-pie-value="<?php echo esc_attr($atts['value']); ?>"
	data-pie-units="<?php echo esc_attr($atts['unit']); ?>"
	data-pie-color="<?php echo esc_attr($atts['color']); ?>">
	<div class="ht_pie_wrapper">
		<span class="ht_pie_chart_back"></span>
		<span id="ht-pie-<?php echo esc_attr($atts['id']); ?>" class="ht_pie_chart_value"></span>
		<canvas></canvas>
	</div>
</div>
<?php if(!empty($atts['title'])): ?>
	<div class="ht-chart-title ht-pie-chart-title">
		<?php echo esc_html($atts['title']); ?>
	</div>
<?php endif; ?>