<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );
$ava_image_alt = (get_post_meta( $atts['t_ava']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['t_ava']['attachment_id'], '_wp_attachment_image_alt', true) : 'Avatar image - testimonials';

$lg_image_alt = (get_post_meta( $atts['t_logo']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['t_logo']['attachment_id'], '_wp_attachment_image_alt', true) : 'Logo image - testimonials';
?>
<div class="tes-single flw">
	<div class="col-md-5 col-lg-5 tes-single-left">
		<div class="tes-single-ava">
			<div class="tes-single-ava-img">
				<img src="<?php echo esc_url($atts['t_ava']['url']); ?>" alt="<?php echo esc_attr($ava_image_alt); ?>">
			</div>
		</div>
	</div>
	<div class="col-md-7 col-lg-7 tes-single-right">
		<img class="tes-single-lg" src="<?php echo esc_url($atts['t_logo']['url']); ?>" alt="<?php echo esc_attr($lg_image_alt); ?>" >
		<div class="tes-single-rate">
			<?php
			switch($atts['t_rate']):
			case '1s' :
			?>
			<span class="fa fa-star"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<?php
			break;
			case '2s' :
			?>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<?php
			break;
			case '3s' :
			?>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star-half-o"></span>
			<span class="fa fa-star-half-o"></span>
			<?php
			break;
			case '4s' :
			?>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star-half-o"></span>
			<?php
			break;
			default :
			?>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<?php
			break;
			endswitch;
			?>
		</div>
		<div class="tes-single-content">
			<?php echo wp_kses($atts['t_content'], array('b'=>array(),'i'=>array(),'u'=>array(),'h1'=>array(),'h2'=>array(),'h3'=>array(),'h4'=>array(),'h5'=>array(),'h6'=>array(),'p'=>array(),'strong'=>array(),'span'=>array())); ?>
		</div>
		<h3 class="tes-single-author">
			<?php echo esc_html($atts['t_author']); ?>
		</h3>
		<div class="tes-single-company">
			<?php echo esc_html($atts['t_company']); ?>
		</div>
	</div>
</div>