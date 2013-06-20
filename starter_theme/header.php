<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package starter_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
<? /*
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/eri-icon-iphone.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/img/eri-icon-ipad.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/img/eri-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/img/eri-icon-ipad-retina.png"> */ ?>
<link rel="shortcut icon" href="/favicon.png">
<?php wp_head(); ?>
</head>

<body <?php body_class('loading'); ?>>