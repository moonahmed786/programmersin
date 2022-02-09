<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button = $atts['button'];
// button icon
$button_size = ' '.$button['size'];
// button icon
$icon = $button['icon'];
$icon_position = '';
$ico = '';
if($icon['gadget']=='yes'){
	$icon_position = $icon['yes']['icon_position'];
	$ico = $icon['yes']['icon']['icon-class'];
}
?>
<div class="row ht-call-to-action">
	<div class="col-md-8 col-lg-8 bussiness-left">
		<?php if(!empty($atts['image'])){
			$image_alt = (get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Call to action image';
		?>
		<div class="call-to-action-img">
			<img src="<?php echo esc_url($atts['image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>">
		</div>
		<?php } ?>
		<div class="call-to-action-mess">
			<?php echo do_shortcode(wpautop($atts['message'], true)); ?>
		</div>
	</div>
	<div class="col-md-4 col-lg-4">
		<div id="ht-btn-<?php echo esc_attr($button['id']); ?>" class="box-button flw <?php echo esc_attr($button['align']); ?>">
			<span>
				<a target="<?php echo esc_attr($button['target']); ?>" href="<?php echo esc_url($button['link']); ?>" class="ht-btn<?php echo esc_attr($button_size); ?>">
					<?php echo ($icon_position == 'left' ? '<i class="ht-btn-icon ht-btn-icon-left '.$ico.'"></i>' : ''); ?>
					<?php echo esc_html($button['label']); ?>
					<?php echo ($icon_position == 'right' ? '<i class="ht-btn-icon ht-btn-icon-right '.$ico.'"></i>' : ''); ?>
				</a>
			</span>
		</div>
	</div>
</div>
