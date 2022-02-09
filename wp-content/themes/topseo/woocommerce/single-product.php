<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$shop_layout = get_theme_mod('c_shop_layout', 'right');
$fw_page_layout = ( function_exists('fw_ext_sidebars_get_current_position') ) ? fw_ext_sidebars_get_current_position() : '';

$final_page_layout = $shop_layout;

if($fw_page_layout != null && $fw_page_layout != ''){
    $final_page_layout = $fw_page_layout;
}

get_header(); ?>
	<main id="main" class="page_content woo-single flw">
		<div class="container">
			<div class="row">
				<?php
				if($final_page_layout != 'full') : ?>
					<?php if($final_page_layout == 'right') : ?>
						<div class="col-md-9 col-lg-9">
						<?php
							do_action( 'woocommerce_before_main_content' );
						?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php wc_get_template_part( 'content', 'single-product' ); ?>
							<?php endwhile; // end of the loop. ?>
						<?php
							do_action( 'woocommerce_after_main_content' );
						?>
						</div>
						<div class="col-md-3 col-lg-3">
							<?php get_sidebar('shop'); ?>
						</div>
					<?php elseif ($final_page_layout == 'left') : ?>
						<div class="col-md-3 col-lg-3">
							<?php get_sidebar('shop'); ?>
						</div>
						<div class="col-md-9 col-lg-9">
						<?php
							do_action( 'woocommerce_before_main_content' );
						?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php wc_get_template_part( 'content', 'single-product' ); ?>
							<?php endwhile; // end of the loop. ?>
						<?php
							do_action( 'woocommerce_after_main_content' );
						?>
						</div>
					<?php endif; ?>

				<?php else : ?>
					<div class="col-md-12 col-lg-12">
						<?php do_action( 'woocommerce_before_main_content' ); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php wc_get_template_part( 'content', 'single-product' ); ?>
							<?php endwhile; // end of the loop. ?>
						<?php do_action( 'woocommerce_after_main_content' ); ?>
					</div>
				<?php endif; ?>
			</div>
				
		</div>
	</main>
<?php get_footer(); ?>
