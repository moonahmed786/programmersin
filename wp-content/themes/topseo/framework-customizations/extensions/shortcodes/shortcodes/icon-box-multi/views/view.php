<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$m_ico = $atts['multi_icon']; ?>
<div class="multi-iconbox flw">
	<div class="row">
	<?php foreach($m_ico as $key):
		$g_ico = $key['icon_box'];
		// icon type
		$g_i1 = $key['icon_box']['i1'];
		$g_i2 = $key['icon_box']['i2'];

		/*alt text*/
		if(isset($g_i1['i_image']['attachment_id'])){
			$image_alt = (get_post_meta( $g_i1['i_image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $g_i1['i_image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Icon box image';
		}

		// icon style
		$g_style = $key['i_style'];
		$i_center = $key['i_center'];

		$m_title = $key['i_title'];
		$m_content = $key['i_content'];
	?>

		<div class="box-icon-item col-md-4 col-lg-4<?php if($g_style=='s2'){ echo esc_attr(' box-icon-ver-2' ); } ?><?php if($i_center=='yes'){echo esc_attr(' text-center' );} ?>">
			<?php if($g_ico['gadget']=='i1'){ ?>
				<div class="box-icon-img">
					<img src="<?php echo esc_url($g_i1['i_image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>">
				</div>
			<?php }else{ ?>
				<div class="box-icon-font">
					<span style="font-size:<?php echo esc_attr($g_i2['i_size']); ?>px;color:<?php echo esc_attr($g_i2['i_color']); ?>" class="<?php echo esc_attr($g_i2['i_icon']); ?>"></span>
				</div>
			<?php } ?>
			<h4 class="box-icon-title"><?php echo esc_html($m_title); ?></h4>
			<div class="box-icon-desc"><?php
			$r = array('<h3 class="multi-icon-spc">','</h3>');
			$s = array('[',']');
			$result = str_replace($s, $r, $m_content);
			echo wp_kses($result, array('h3'=>array('class'=>array())));
			?></div>
		</div>

	<?php endforeach; ?>
	</div>
</div>