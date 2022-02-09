<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }
	$name_ico = $atts['name_ico'] != '' ? $atts['name_ico']['icon-class'] : '';
	$mail_ico = $atts['mail_ico'] != '' ? $atts['mail_ico']['icon-class'] : '';
 ?>
<form class="row coming-soon-contact-form" action="<?php echo esc_url($atts['action']); ?>">
	<div class="col-md-2 col-lg-2"><span class="keep-me-update"><?php echo esc_html($atts['title']); ?></span></div>
	<div class="col-md-4 col-lg-4 cms-has-ico"><input type="text" required placeholder="<?php echo esc_attr($atts['name']); ?>"><i class="<?php echo esc_attr($name_ico); ?>"></i></div>
	<div class="col-md-4 col-lg-4 cms-has-ico"><input type="email" required placeholder="<?php echo esc_attr($atts['mail']); ?>"><i class="<?php echo esc_attr($mail_ico); ?>"></i></div>
	<div class="col-md-2 col-lg-2"><button type="submit"><?php echo esc_html($atts['submit']); ?></button></div>
</form>