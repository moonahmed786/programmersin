<?php if (!defined('FW')) die( 'Forbidden' );
// stripe
$stripe = '';
if($atts['stripe']['gadget']=='yes'){
	$stripe = ' ht_prog_striped';
}
// animation
$animate = '';
if($atts['stripe']['gadget']=='yes' && $atts['stripe']['yes']['animation']=='yes'){
	$animate = ' ht_prog_animated';
}
// ht
$ht_prog_animate = $stripe.$animate;
// unit
$unit = $atts['unit'] != '' ? $atts['unit'] : '';
// title
if(!empty($atts['title'])):
?>
<h6 class="ht_prog_title"><?php echo esc_html($atts['title']); ?></h6>
<?php endif; ?>
<div class="ht_progress_bar">
	<?php foreach($atts['data'] as $key): ?>
	<div class="ht_single_bar">
		<small class="ht_prog_label"><?php echo esc_html($key['label']); ?> <span class="ht_prog_label_number"><?php echo esc_html($key['value']); ?></span><span class="ht_prog_unit"><?php echo esc_attr($unit); ?></span></small>
		<span id="ht-prog-<?php echo esc_attr($key['id']); ?>" class="ht_prog_bar<?php echo esc_attr($ht_prog_animate); ?>" data-percentage-value="<?php echo esc_attr($key['value']); ?>"></span>
	</div>
	<?php endforeach; ?>
</div>
