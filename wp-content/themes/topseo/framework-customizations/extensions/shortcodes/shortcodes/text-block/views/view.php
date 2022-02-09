<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<div class="textblock-shortcode clear">
	<?php
		// $r = array('<span class="block-background">','</span>');
		// $s = array('[',']');
		// $result = str_replace($s, $r, $atts['text']);
		echo do_shortcode($atts['text']);
	?>
</div>