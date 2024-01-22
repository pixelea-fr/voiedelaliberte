<?php $lang= get_locale(); ?>
<?php if ($lang=="en_US"): ?>
<div class="sidecontent_container">
	<div class="langage_container sideborder">
	 	<div id="weglot_here"></div>
	 <?php 	the_widget('qTranslateXWidget', array('type' => 'both', 'hide-title' => true) );  ?>
	</div>
	<div class="sidefirst_container sideborder">
		<div class="sidetitles FS-M"><?php the_field('side_title1','options'); ?></div>
		<div><a href="http://www.voiedelaliberte.fr/arret-sur-image/"><img src="<?php the_field('side_image1','options'); ?>"></a></div>
	</div>
	<div class="sidesecond_container sideborder">
		<div class="sidetitles FS-M"><strong>2024 FRENCH RULES</strong></div>
		<div class="img_position"><a href="https://www.voiedelaliberte.fr/wp-content/uploads/reglement-2024.pdf" target="_blank"><img src="<?php the_field('side_image2','options'); ?>"></a></div>
		<div class="link_position texts"><a href="http://www.voiedelaliberte.fr/wp-content/uploads/subscription-form-2024.pdf" target="_blank" class="FS-S">Download "Inscription for Liberty Ride 2024"</a></div>
	</div>
	<div class="sidethird_container">
		<div class="sidetitles FS-M">Useful links</div>
		<div><a href="" class="FS-S texts">Belgian site of "La voie de la Liberté"</a></div>
		<div class="links_position"><a href="" class="FS-S texts">City of Périers</a></div>
		<div><a href="" class="FS-S texts">City of Bastogne</a></div>
	</div>
</div>
<?php else: ?>
	<div class="sidecontent_container">
		<div class="langage_container sideborder">
		 	<div id="weglot_here"></div>
		 <?php 	the_widget('qTranslateXWidget', array('type' => 'both', 'hide-title' => true) );  ?>
		</div>
		<div class="sidefirst_container sideborder">
			<div class="sidetitles FS-M"><?php the_field('side_title1','options'); ?></div>
			<div><a href="http://www.voiedelaliberte.fr/arret-sur-image/"><img src="<?php the_field('side_image1','options'); ?>"></a></div>
		</div>
		<div class="sidesecond_container sideborder">
			<div class="sidetitles FS-M"><strong>RÉGLEMENT 2024</strong></div>
			<div class="img_position"><a href="https://www.voiedelaliberte.fr/wp-content/uploads/reglement-2024.pdf" target="_blank"><img src="<?php the_field('side_image2','options'); ?>"></a></div>
			<div class="link_position texts"><a href="http://www.voiedelaliberte.fr/wp-content/uploads/bulletin-inscription-2024.pdf" target="_blank" class="FS-S">Télécharger le Bulletin d'inscription 2024</a></div>
		</div>
		<div class="sidethird_container">
			<div class="sidetitles FS-M">Liens vers nos partenaires</div>
			<div><a href="" class="FS-S texts">Site Belge de la "Voie de la Liberté"</a></div>
			<div class="links_position"><a href="" class="FS-S texts">Ville de Périers</a></div>
			<div><a href="" class="FS-S texts">Ville de Bastogne</a></div>
		</div>
	</div>
<?php endif ?>