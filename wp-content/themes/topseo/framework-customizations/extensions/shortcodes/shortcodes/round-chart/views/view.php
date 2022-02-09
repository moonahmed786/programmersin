<?php if (!defined('FW')) die( 'Forbidden' );
	// enable tooltips
	$tt = $atts['tt'] == 'no' ? '0' : '1';
	// background chart
	$bg = $atts['bg'] == '' ? '' : $atts['bg'];
	// width size pie chart
	$width = $atts['width'] == '' ? '' : $atts['width'];
	//design
	$design = $atts['design'];
	// animation
	$animation = $atts['animation'];
	// value pie
	$value = '&quot;value&quot;:';
	// background pie
	$background = '&quot;color&quot;:';
	// highlight pie
	$highlight = '&quot;highlight&quot;:';
	// lagel pie
	$label = '&quot;label&quot;:';
	// quote "
	$i = '&quot;';
	// title
	if(!empty($atts['title'])):
?>
<div class="ht-chart-title">
	<?php echo esc_html($atts['title']); ?>
</div>
<?php endif; ?>
<div class="ht-round-chart"
	data-ht-tooltips="<?php echo esc_attr($tt); ?>"
	data-ht-stroke-color="<?php echo esc_attr($bg); ?>"
	data-ht-stroke-width="<?php echo esc_attr($width); ?>"
	data-ht-type="<?php echo esc_attr($design); ?>"
	data-ht-animation="<?php echo esc_attr($animation); ?>"
	data-ht-values="[<?php
			foreach($atts['data'] as $key):
				$dot = ($key === end($atts['data'])) ? '' : ',';
				echo '{'
					.$value.$key['value'].','
					.$background.$i.$key['sbg'].$i.','
					.$highlight.$i.$key['highlight'].$i.','
					.$label.$i.$key['label'].$i.'}'.$dot;
			endforeach;
		?>]">		
	<canvas></canvas>
</div>
<?php if($atts['legend']=='yes'): ?>
	<!-- show legend -->
	<ul class="ht-chart-legend">
		<?php foreach($atts['data'] as $key): ?>
			<li><span class="ht-legend-bg" style="background:<?php echo esc_attr($key['sbg']); ?>"></span><?php echo esc_html($key['label']); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>