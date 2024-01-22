<?php
/*
 * Template Name: galerie
 */
?>

<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<h1 class="FS-XL titles">Photos de rencontres</h1>
	<div class="grid_img_container">
		<script>
		    document.addEventListener('DOMContentLoaded', function(){
		        var imgs = document.querySelectorAll('img');
		        Array.prototype.forEach.call(imgs, function(el, i) {
		            if (el.tabIndex <= 0) el.tabIndex = 10000;
		        });
		    });
		</script>
		<?php

		$images = get_field('images');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $images ): ?>
		        <?php foreach( $images as $image ): ?>
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		        <?php endforeach; ?>
		<?php endif; ?>
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
