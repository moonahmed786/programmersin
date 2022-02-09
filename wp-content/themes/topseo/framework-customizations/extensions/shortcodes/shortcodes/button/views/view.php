<?php if (!defined('FW')) die( 'Forbidden' );
// button size
$button_size = ' '.$atts['size'];
// button icon
$icon = $atts['icon'];
$icon_position = '';
$ico = '';
if($icon['gadget']=='yes'){
	$icon_position = $icon['yes']['icon_position'];
	if(!empty($icon['yes']['icon']['type'])){
		$ico = $icon['yes']['icon']['icon-class'];
	}
}
?>

<div id="ht-btn-<?php echo esc_attr($atts['id']); ?>" class="box-button flw <?php echo esc_attr($atts['align']); ?>">
	<span>
		<a target="<?php echo esc_attr($atts['target']); ?>" href="<?php echo esc_url($atts['link']); ?>" class="ht-btn<?php echo esc_attr($button_size); ?>">
			<?php
				// icon left
				echo ($icon_position == 'left' ? '<i class="ht-btn-icon ht-btn-icon-left '.$ico.'"></i>' : '');
				// label
				echo esc_html($atts['label']);
				// icon right
				echo ($icon_position == 'right' ? '<i class="ht-btn-icon ht-btn-icon-right '.$ico.'"></i>' : '');
			?>
		</a>
	</span>
</div>
