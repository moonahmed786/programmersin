<?php if (!defined('FW')) die('Forbidden');
	if($atts['ctf']!='0'){
		echo do_shortcode('[contact-form-7 id="'.$atts['ctf'].'"]' );
	}else{
		echo '<p>Please create your Contact Form.</p>';
	}
?>