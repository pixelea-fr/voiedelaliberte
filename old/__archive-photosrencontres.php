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
				$args = array(
					'post_type' => 'galerie',
					'posts_per_page'=>-1
					);
				$galerie = new WP_Query( $args );
		?>

		<?php if ( $galerie->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ( $galerie->have_posts() ) : $galerie->the_post(); ?>
				<?php $postid=get_the_ID();
				$img2 = get_field('image',$postid);
				?>
					<div class="bg_img" style="background-image:url('<?php echo $img2; ?>')">
					</div>
						<h2><?php the_title(); ?></h2>
						<div><?php 	the_field("description") ?></div>
						<div class=""><a href="<?php the_permalink(); ?>">Plus de détails</a></div>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

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
