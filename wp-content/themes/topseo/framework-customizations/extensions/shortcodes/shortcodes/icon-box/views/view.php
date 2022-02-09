<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$g_ico = $atts['icon_box'];
// icon type
$g_i1 = $atts['icon_box']['i1'];

if(isset($g_i1['i_image']['attachment_id'])){
	$image_alt = (get_post_meta( $g_i1['i_image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $g_i1['i_image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Icon box image';
}

$g_i2 = $atts['icon_box']['i2'];
// icon style
$g_style = $atts['i_style'];
$i_center = $atts['i_center'];
?>
<div class="box-icon-item<?php if($g_style=='s2'){ echo esc_attr(' box-icon-ver-2' ); } ?><?php if($i_center=='yes'){echo esc_attr(' text-center' );} ?>" itemscope itemtype="http://schema.org/ImageObject">
	<?php if($g_ico['gadget']=='i1'){ ?>
		<div class="box-icon-img">
			<img itemprop="contentUrl" src="<?php echo esc_url($g_i1['i_image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
		</div>
	<?php }else{ ?>
		<div class="box-icon-font">
			<span style="font-size:<?php echo esc_attr($g_i2['i_size']); ?>px;color:<?php echo esc_attr($g_i2['i_color']); ?>" class="<?php echo esc_attr($g_i2['i_icon']); ?>"></span>
		</div>
	<?php } ?>
	<h6 class="box-icon-title" itemprop="name"><?php echo esc_html($atts['i_title']); ?></h6>
	<p class="box-icon-desc" itemprop="description"><?php echo esc_html($atts['i_content'] ); ?></p>
</div>