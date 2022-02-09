<?php

if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$alt       = get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true );
$image_alt = ! empty( $alt ) ? $alt : esc_attr__( 'Pricing table image', 'topseo' );
?>

<div class="pricing-table-item <?php if($atts['checkbox']['yes']['highlight']!='0'){echo esc_attr('pricing-table-item-highlight');} ?>">
	<div class="pricing-table-img">
		<?php if($atts['checkbox']['gadget']=='yes'){ ?>
		<span class="pricing-table-corner"><?php echo esc_html($atts['checkbox']['yes']['popular']); ?></span>
		<?php } ?>
		<img src="<?php echo esc_url($atts['image']['url']); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
		<h3><?php echo esc_html($atts['name']); ?></h3>
	</div>
	<h3 class="pricing-table-price"><?php echo esc_html($atts['price'])?><span><?php echo esc_html($atts['time']); ?></span></h3>
	<ul class="pricing-table-list">
		<?php foreach($atts['content'] as $key){ ?>
		<li><?php echo esc_html($key['textbox']); ?></li>
		<?php } ?>
	</ul>
	<h3 class="pricing-table-get"><a href="<?php echo esc_url($atts['link']); ?>"><?php echo esc_html($atts['label']); ?></a></h3>
</div>