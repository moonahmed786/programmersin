<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if ( 'line' == $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-line fw-divider-<?php echo esc_attr($atts['style']['line']['line_style']); ?>"></div>
<?php endif; ?>

<?php if ( 'space' == $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-space" style="margin-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php endif; ?>
