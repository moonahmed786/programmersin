<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage markethon
 * @since 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<!-- Required meta tags -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php 
  $markethon_option = get_option('markethon_options');
	
		if ( ! function_exists( 'has_site_icon' ) || ! wp_site_icon() ) {
			if( !empty($markethon_option['markethon_background_favicon']['url']) ) { ?>
				<link rel="shortcut icon" href="<?php echo esc_url($markethon_option['markethon_background_favicon']['url']); ?>" />
				<?php 
      }
      else {
        ?>
        <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri().'/assets/images/favicon.ico'); ?>" />
        <?php 
      }
    }
   
wp_head(); ?>
</head>

<body data-spy="scroll" data-offset="80" <?php body_class(); ?>>
  <?php wp_body_open(); ?>
<?php
if(isset($markethon_option['markethon_loader_switch']))
{
  $options= $markethon_option['markethon_loader_switch'];
}
else {
  $options = '';
} ?> <?php 

if($options != 0  ) { ?>
    <!-- loading -->
    <div id="loading">
        <div id="loading-center"> <?php
            if($options == 1) {
                if(!empty($markethon_option['markethon_background_loader']['url'])){
                    $bgurl = $markethon_option['markethon_background_loader']['url']; ?>
                    <div class="load-img" >
                        <img src="<?php echo esc_url($bgurl); ?>" alt="<?php esc_attr_e('loader','markethon'); ?>">
                    </div> <?php
                }
            } else if($options == 2) {
                if(isset($markethon_option['markethon_loader_tag']))
                {
                  $tag= $markethon_option['markethon_loader_tag'];
                } else {
                    $tag = "2";
                }
                if(isset($markethon_option['markethon_loader_back_color_text'])) {
                    $style = "color:".$markethon_option['markethon_loader_back_color_text']."";
                } else {
                    $style = '';
                }
                echo '<'.esc_attr($tag).' style='.esc_attr($style).'>'.esc_html($markethon_option['markethon_loader_text']).'</'.esc_attr($tag).'>'; ?> <?php 
            } else {
                $bgurl = get_template_directory_uri().'/assets/images/loader.gif'; ?>
                <div class="load-img">
                    <img src="<?php echo esc_url($bgurl); ?>" alt="<?php esc_attr_e('loader','markethon'); ?>">
                </div> <?php
            } ?>
        </div>
    </div>
    <!-- loading End --> <?php 
} ?>
 


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html__( 'Skip to content', 'markethon' ); ?></a> <?php
        get_template_part( 'template-parts/header/header', 'one' );   
        if(function_exists('get_field')){
            if( get_field('show_header') == 'hide' ) {
            } else {
                if( get_field('header_setting') == 'custom' ){ 
                    markethon_display_acf_header();
                } else { 
                    markethon_display_header(); 
                }
            }
        } else {
            markethon_display_header(); 
        } ?>
 
	<div class="site-content-contain">
		<div id="content" class="site-content">