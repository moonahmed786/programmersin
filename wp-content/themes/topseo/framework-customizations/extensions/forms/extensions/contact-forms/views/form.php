<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */

/*display flash messages*/
if (defined('FW')) { FW_Flash_Messages::_print_frontend(); } ?>

<div class="form-wrapper fw-contact-form contact-form">
	<?php echo $form_html; ?>
</div>