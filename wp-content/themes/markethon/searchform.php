<?php
/**
 * Template for displaying search forms in markethon
 *
 * @package WordPress
 * @subpackage markethon
 * @since 1.0
 * @version 1.0
 */

?>
<?php $unique_id = esc_html( uniqid( 'search-form-' ) ); ?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($unique_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'markethon' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'markethon' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'markethon' ); ?></span></button>
</form>