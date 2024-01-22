<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage voiedelaliberte
 * @since voiedelaliberte
			<a href="https://www.cavesaintetienne.com/"><img src="<?php the_field('logo','4'); ?>"></a>
 */
?><!doctype html>
<html class="html">
  <head>
    <title><?php echo wp_title() ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<?php wp_head(); ?>

  </head>
<header class="header">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<img class="top_img" src="<?php the_field('image','options'); ?>">
	<div class="navbar_container FS-S nav_titles">
<?php wp_nav_menu(); ?>
	</div>

</header>
