<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
$rating_count = $product->get_rating_count();
$average      = $product->get_average_rating();
$rating       = wc_get_rating_html( $average, $rating_count );
// @codingStandardsIgnoreStart
?>

<li>
	<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
	</a>
	<div class="product-content">
		<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" class="product-title"><?php echo $product->get_title(); ?></a>
		<span class="product-price"><?php echo $product->get_price_html(); ?></span>
		<div class="product-rating"><?php if ( ! empty( $rating ) ) : ?>
			<?php echo $rating; ?>
			<?php endif; ?>
		</div>
	</div>
</li>
