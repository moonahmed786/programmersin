<?php
/**
 * The header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package topseo
 */

$topbar_left = get_theme_mod( 'c_topbar_left',
'<div class="lang">
    <select>
        <option>English</option>
    </select>
</div>
<div class="tel ion-ios-telephone">1-800-888-6789</div>
<div class="chathead">
<span><a href="#" class="ion-social-skype"></a></span>
<span><a href="#" class="ion-chatbubble-working"></a></span>
</div>'
);
$topbar_right = get_theme_mod( 'c_topbar_right',
'<span class="topbar-text">Check your rankings 24 x 7 in your SEO client</span>
<a href="#" class="topbar-btn ion-speedometer">FREE SEO SCAN</a>'
);

$logo_img  = ! empty( get_theme_mod( 'logo_image_1' ) ) ? get_theme_mod( 'logo_image_1' ) : get_template_directory_uri() . '/images/lg.png';
$logo2_img = ! empty( get_theme_mod( 'logo_image_2' ) ) ? get_theme_mod( 'logo_image_2' ) : get_template_directory_uri() . '/images/lg-2.png';
$c_page_transition = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'c_page_transition' ) : 'yes';


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php topseo_enable_page_loader();// page loader animated ?>
	<?php 
		if($c_page_transition == 'yes'){
			echo '<div class="topseo-animation"></div>';
		}
	?>
	<div id="mainview" class="hfeed site">
		<!-- HEADER -->
		<header class="flw topseo-header">
		<?php topseo_edit_location( $id = 'topbar', $position = 'left: 50px; top: 10px;' ); ?>
			<!-- topbar -->
			<?php if( ($topbar_left != '') || ($topbar_right != '') ): ?>

				<div class="topbar flw">
					<div class="container">
						<div class="topbar-left">
							<?php 
								if($topbar_left != false) {
									echo wp_kses_decode_entities($topbar_left);
								}
							?>
						</div>
						<div class="topbar-right">
							<?php if($topbar_right != false) 
							echo wp_kses($topbar_right, array('span'=> array('class'=> array()),'a'=> array('href'=> array(),'class'=> array()),)); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- menu -->
			<div class="seo-wrap-menu">
				<div class="menu-box flw <?php echo topseo_menu_background(); ?> <?php echo topseo_menu_layout(); ?>">
					<div class="container">
						<div class="menu-box-nav flw">
							<!-- box left -->
							<div class="menu-box-left">
								<div class="logo lg-top">
								    <?php topseo_edit_location( $id = 'logo', $position = 'left: 60px; top:20px' ); ?>

									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php if( 'sticky-menu' == topseo_menu_layout() ): ?>
                                            <img class="logo-img-sticky" src="<?php echo esc_url( $logo2_img ); ?>" alt="<?php esc_attr_e( 'Logo image', 'topseo' ); ?>">
                                        <?php endif; ?>
                                        <img class="logo-img" src="<?php echo esc_url( $logo_img ); ?>" alt="<?php esc_attr_e( 'Logo image', 'topseo' ); ?>">
									</a>
								</div>
							</div>
							<!-- box right -->
							<div class="menu-box-right" id="navside">
								<?php
									// primary menu
									if(has_nav_menu('primary')){
										$args = array(
											'theme_location' => 'primary',
											'menu_class' => 'primary-menu',
											'container' => 'ul'
										);
										wp_nav_menu( $args );
									}
								?>
								<span class="search-form-button ion-search"></span>
								<?php echo topseo_search_form_mobile(); ?>
								<!-- shop cart -->
								<?php topseo_shopping_cart(); ?>
							</div>
							<!-- search form -->
							<?php echo topseo_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php /*NAV*/ get_template_part('page-templates/page', 'header'); ?>
