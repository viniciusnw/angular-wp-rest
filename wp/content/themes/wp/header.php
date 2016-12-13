<?php
/**
 *
 * Baby Boomer - Cabeçalho
 *
 * Please do not change this file, use the header-theme.php file or
 * use the wp_head hook in your functions.php file, for insert codes in this file
 *
 * @package WordPress
 * @subpackage Baby Boomer
 **/
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php if ( is_home() ) { echo bloginfo('title'); } else { wp_title('',true); } ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php
  /*================================
  =            Favicons            =
  ================================*/
  $settings = foundation_q_get_settings();
  $favicons = $settings['favicons'];
  // Icons & Favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
  <link rel="apple-touch-icon" href="<?php echo $favicons['apple_touch_icon']; ?>">
  <link rel="icon" href="<?php echo $favicons['png_favicon']; ?>">
  <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo $favicons['ico_favicon']; ?>">
  <![endif]-->
  <?php // or, set /favicon.ico for IE10 win ?>
  <meta name="msapplication-TileColor" content="<?php echo $favicons['win8_tile_icon_bg']; ?>">
  <meta name="msapplication-TileImage" content="<?php echo $favicons['win8_tile_icon']; ?>">
  <?php
  /*=====  End of Favicons  ======*/

	wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
if( file_exists( dirname( __FILE__ ) . '/header-theme.php' ) )
	get_header('theme'); ?>
