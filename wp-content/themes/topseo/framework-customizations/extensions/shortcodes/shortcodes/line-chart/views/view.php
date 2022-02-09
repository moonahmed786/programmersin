<?php if (!defined('FW')) die( 'Forbidden' );
	// enable tooltips
	$tt = $atts['tt'] == 'no' ? '0' : '1';
	//design
	$design = $atts['design'];
	// animation
	$animation = $atts['animation'];
	// values
	$values = "\"".str_replace(';','", "',$atts['values'])."\"";
	// title
	if(!empty($atts['title'])):
?>
<div class="ht-chart-title">
	<?php echo esc_html($atts['title']); ?>
</div>
<?php endif; ?>
<div class="ht-line-chart"
	data-ht-tooltips="<?php echo esc_attr($tt); ?>"
	data-ht-type="<?php echo esc_attr($design); ?>"
	data-ht-animation="<?php echo esc_attr($animation); ?>"
	data-ht-values="{
		&quot;labels&quot;:[<?php echo esc_attr($values); ?>],
		&quot;datasets&quot;:
		[
		<?php
			foreach($atts['data'] as $key):
			$dot = ($key === end($atts['data'])) ? '' : ',';
			$sub_values = "\"".str_replace(';','", "',$key['value'])."\"";
			$color = topseo_rgb($key['color']);
			$aa = '';
			$bb = '';
			foreach($color as $ss){
				$aa .= $ss.',';
				($ss > 80) ? ($bb .= ($ss - 80).',') : ($bb .= $ss.',');
			}
		?>
			{
				&quot;label&quot;:&quot;<?php echo esc_attr($key['label']); ?>&quot;,
				&quot;fillColor&quot;:&quot;<?php echo ($design=='bar' ? esc_attr('rgba('.$aa.'1)') : esc_attr('rgba('.$aa.'0.05)')); ?>&quot;,
				&quot;strokeColor&quot;:&quot;<?php echo ($design!='bar' ? esc_attr('rgba('.$aa.'1)') : 'transparent'); ?>&quot;,
				&quot;pointColor&quot;:&quot;<?php echo esc_attr($key['color']); ?>&quot;,
				&quot;pointStrokeColor&quot;:&quot;<?php echo esc_attr($key['color']); ?>&quot;,
				&quot;pointHighlightStroke&quot;:&quot;<?php echo esc_attr('rgba('.$bb.'1)'); ?>&quot;,
				&quot;pointHighlightFill&quot;:&quot;<?php echo esc_attr('rgba('.$bb.'1)'); ?>&quot;,
				&quot;highlightFill&quot;:&quot;<?php echo esc_attr('rgba('.$aa.'0.8)'); ?>&quot;,
				&quot;data&quot;:[<?php echo esc_attr($sub_values); ?>]
			}<?php echo esc_attr($dot); endforeach; ?>]}">
    <canvas></canvas>
</div>
<?php if($atts['legend']=='yes'): ?>
	<!-- show legend -->
	<ul class="ht-chart-legend">
		<?php foreach($atts['data'] as $key): ?>
			<li><span class="ht-legend-bg" style="background:<?php echo esc_attr($key['color']); ?>"></span><?php echo esc_html($key['label']); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>