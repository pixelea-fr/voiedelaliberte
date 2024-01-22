<?php
/*
 * Template Name: arretsurimage
 */
?>

<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<div class="article_container">
			<div class="FS-XL titles article_title"><?php the_field('titre1'); ?></div>
			<div class="img_center"><a href="https://www.youtube.com/watch?v=kpEdwEkI4dQ"><img src="<?php the_field('image1'); ?>"></a></div>
			<div class="FS-S texts"><?php the_field('texte1'); ?></div>
		</div>
		<div class="article_container article_position">
			<div class="FS-XL titles article_title"><?php the_field('titre2'); ?></div>
			<div class="img_center"><a href="http://www.tvlux.be/video/bastogne-arlon-voie-de-la-liberte-commemoration-a-velo_7530.html"><img src="<?php the_field('image2'); ?>"></a></div>
			<div class="FS-S texts"><?php the_field('texte2'); ?></div>
		</div>
		<div class="article_container">
			<div class="FS-XL titles article_title"><?php the_field('titre3'); ?></div>
			<div class="img_center"><a href="http://www.tvlux.be/video/bastogne-voie-de-la-liberte_13612.html"><img src="<?php the_field('image3'); ?>"></a></div>
			<div class="FS-S texts"><?php the_field('texte3'); ?></div>
		</div>
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
