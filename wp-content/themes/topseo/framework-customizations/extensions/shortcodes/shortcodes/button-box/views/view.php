<?php if (!defined('FW')) die( 'Forbidden' );
	$g_button = $atts['seo_button'];
?>
<div class="box-button flw <?php echo esc_attr($atts['b_align']); ?>">
	<?php
		foreach($g_button as $key){
			// button size
			$buttonbox_size = ' '.$key['size'];
			// button icon
			$iconbox_gadget = $key['icon']['gadget'];
			$iconbox = $key['icon']['yes'];
			$iconbox_position = $iconbox['icon_position'];
			$icobox = '';
			if(!empty($iconbox['icon']['type'])){
				$icobox = $iconbox['icon']['icon-class'];
			}
		?>
		<span id="ht-btn-<?php echo esc_attr($key['id']); ?>">
			<a href="<?php echo esc_url($key['link']); ?>" class="ht-btn<?php echo esc_attr($buttonbox_size); ?>">
				<?php
					// icon left
					if($iconbox_gadget=='yes'):
						echo ($iconbox_position == 'left') ? '<i class="ht-btn-icon ht-btn-icon-left '.$icobox.'"></i>' : '';
					endif;
					// label
					echo esc_html($key['label']);
					// icon right
					if($iconbox_gadget=='yes'):
						echo ($iconbox_position == 'right') ? '<i class="ht-btn-icon ht-btn-icon-right '.$icobox.'"></i>' : '';
					endif;
				?>
			</a>
		</span>
	<?php } ?>
</div>
