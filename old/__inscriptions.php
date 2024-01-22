<?php
/*
 * Template Name: inscriptions
 */
?>

<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<h1 class="FS-XL titles"><?php the_field('titre'); ?></h1>
		<div class="FS-S texts"><?php the_field('texte'); ?></div>
		<div><a href="" class="FS-S links_color texts">Télécharger le Bulletin d'inscription 2016</a></div>
	</div>
	<div class="sidecontent_container">
		<div class="langage_container sideborder">
		<div id="weglot_here"></div>
		</div>
		<div class="sidefirst_container sideborder">
			<div class="sidetitles FS-M"><?php the_field('side_title1','options'); ?></div>
			<div><a href="http://dev.voiedelaliberte.fr/arret-sur-image/"><img src="<?php the_field('side_image1','options'); ?>"></a></div>
		</div>
		<div class="sidesecond_container sideborder">
			<div class="sidetitles FS-M"><?php the_field('side_title2','options'); ?></div>
			<div class="img_position"><a href="http://dev.voiedelaliberte.fr/wp-content/uploads/reglement2016.pdf"><img src="<?php the_field('side_image2','options'); ?>"></a></div>
			<div class="link_position texts"><a href="http://dev.voiedelaliberte.fr/wp-content/uploads/reglement2016.pdf" download="Reglement" class="FS-S">Télécharger le réglement</a></div>
		</div>
		<div class="sidethird_container">
			<div class="sidetitles FS-M">Liens</div>
			<div><a href="" class="FS-S texts">Site Belge de la "Voie de la Liberté"</a></div>
			<div class="links_position"><a href="" class="FS-S texts">Ville de Périers</a></div>
			<div><a href="" class="FS-S texts">Ville de Bastogne</a></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
