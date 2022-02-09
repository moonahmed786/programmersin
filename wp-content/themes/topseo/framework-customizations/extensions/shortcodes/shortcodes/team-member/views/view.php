<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$social = $atts['social'];
$style = $atts['style'];

$image_alt = (get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Team member image';
?>

<div class="about-team-item<?php if($style=='t2'){echo esc_attr(' about-team-item-with-img-circle' );} ?>">
	<div class="about-team-img">
		<a href="#"><img src="<?php echo esc_url($atts['image']['url']); ?>" alt="<?php echo esc_html($image_alt); ?>"></a>
		<ul class="about-team-social">
			<?php foreach($social as $key){ ?>
			<li><a href="<?php echo esc_url($key['social_link']); ?>"></a></li>
			<?php } ?>
		</ul>
	</div>
	<div class="about-team-info">
		<h3 class="about-team-title">
			<a href="#" class="about-team-title-btn"><?php echo esc_html($atts['name']); ?></a>
			<span class="about-team-effect"></span>
		</h3>
		<p class="about-team-desc"><?php echo esc_html($atts['job']); ?></p>
	</div>
</div>