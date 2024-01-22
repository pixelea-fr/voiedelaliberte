<?php
/*
 * Template Name: photosrencontres
 */
?>

<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<h1 class="FS-XL titles"><?php the_field('titre'); ?></h1>
	<?php

	// check if the repeater field has rows of data
	if( have_rows('galerie_liste') ):

	 	// loop through the rows of data
	    while ( have_rows('galerie_liste') ) : the_row();

	        // display a sub field value
	        the_sub_field('galerie');

	    endwhile;

	else :

	    // no rows found

	endif;

	?>
	</div>
	<div class="sidecontent_container">
		<div class="langage_container sideborder">
			<span>🇫🇷</span>
			<span>🇬🇧</span>
		</div>
		<div class="sidefirst_container sideborder">
			<div class="sidetitles FS-M"><?php the_field('side_title1','options'); ?></div>
			<div><img src="<?php the_field('side_image1','options'); ?>"></div>
		</div>
		<div class="sidesecond_container sideborder">
			<div class="sidetitles FS-M"><?php the_field('side_title2','options'); ?></div>
			<div class="img_position"><img src="<?php the_field('side_image2','options'); ?>"></div>
			<div class="link_position texts"><a href="" class="FS-S">Télécharger le réglement</a></div>
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
