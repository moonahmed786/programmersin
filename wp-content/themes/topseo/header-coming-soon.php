<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<meta charset="<?php bloginfo('charset' ); ?>">
	<meta name="author" content="haintheme">
	<link rel="profile" href="#profile">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(). '/images/favicon.ico'; ?>">

	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone-no">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
