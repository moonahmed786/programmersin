<?php
// @codingStandardsIgnoreStart
/*
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$shop_layout = get_theme_mod('c_shop_layout', 'right');
$fw_page_layout = ( function_exists('fw_ext_sidebars_get_current_position') ) ? fw_ext_sidebars_get_current_position() : '';

$final_page_layout = $shop_layout;

if($fw_page_layout != null && $fw_page_layout != ''){
	$final_page_layout = $fw_page_layout;
}

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	$final_page_layout = 'full';
}

get_header();
?>
	<main id="main" class="page_content page_woo flw">
		<?php if($final_page_layout != 'full' ) : /*SHOP WITH SIDEBAR*/ ?>
			<div class="container">
    			<div class="row">
    				<?php if($final_page_layout == 'right') : ?>
    				<div class="col-md-9 col-lg-9">
    					<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
    						<?php
    							/**
    							 * @hooked woocommerce_result_count - 20
    							 * @hooked woocommerce_catalog_ordering - 30
    							 */
    							do_action( 'woocommerce_before_shop_loop' );
    						?>
    						<?php woocommerce_product_loop_start(); ?>
    							<?php woocommerce_product_subcategories(); ?>
    							<?php while ( have_posts() ) : the_post(); ?>
    								<?php wc_get_template_part( 'content', 'product' ); ?>
    							<?php endwhile; ?>
    						<?php woocommerce_product_loop_end(); ?>
    						<?php
    							 // @hooked woocommerce_pagination - 10
    							do_action( 'woocommerce_after_shop_loop' );
    						?>
    					<?php else : ?>
							<?php do_action( 'woocommerce_no_products_found' ); ?>
						<?php endif; ?>
    				</div>
    				<div class="col-md-3 col-lg-3">
    					<?php get_sidebar('shop'); ?>
    				</div>

    				<?php elseif ($final_page_layout == 'left') : ?>
    				<div class="col-md-3 col-lg-3">
    					<?php get_sidebar('shop'); ?>
    				</div>

    				<div class="col-md-9 col-lg-9">
    					<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
    						<?php
    						/**
    						 * @hooked woocommerce_result_count - 20
    						 * @hooked woocommerce_catalog_ordering - 30
    						 */
    						do_action( 'woocommerce_before_shop_loop' );
    						?>
    						<?php woocommerce_product_loop_start(); ?>
    						<?php woocommerce_product_subcategories(); ?>
    						<?php while ( have_posts() ) : the_post(); ?>
    							<?php wc_get_template_part( 'content', 'product' ); ?>
    						<?php endwhile; ?>
    						<?php woocommerce_product_loop_end(); ?>
    						<?php
    						// @hooked woocommerce_pagination - 10
    						do_action( 'woocommerce_after_shop_loop' );
    						?>
    					<?php else : ?>
							<?php do_action( 'woocommerce_no_products_found' ); ?>
						<?php endif; ?>
    				</div>

    				<?php endif; ?>
    			</div>
    		</div>
		<?php else : /*SHOP NO SIDEBAR*/ ?>
			<div class="container shop_full">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
							<?php
							/**
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							?>
							<?php woocommerce_product_loop_start(); ?>
							<?php woocommerce_product_subcategories(); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php wc_get_template_part( 'content', 'product' ); ?>
							<?php endwhile; ?>
							<?php woocommerce_product_loop_end(); ?>
							<?php
							// @hooked woocommerce_pagination - 10
							do_action( 'woocommerce_after_shop_loop' );
							?>
						<?php else : ?>
							<?php do_action( 'woocommerce_no_products_found' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</main>

<?php
get_footer();

