<?php
/*
 * Template Name: accueil
 */
?>
<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<h1 class="FS-XL titles"><?php the_field('titre'); ?></h1>
		<div class="img_center"><img src="<?php the_field('image'); ?>"></div>
		<div class="FS-S texts main_article_position"><?php the_field('premier_texte'); ?></div>
<!-- 		<div class="video_container">
	<div class="subtitles FS-M">Web Tv Normande</div>

</div> -->
		<div class="FS-S texts main_article_position"><?php the_field('second_texte'); ?></div>
	</div>
<?php include("sidebar.php"); ?>
</div>

<?php get_footer(); ?>
