<?php
/*
 * Template Name: galerie
 */
?>

<?php get_header();  ?>

<div class="content_container">
	<div class="maincontent_container">
		<h1 class="FS-XL titles">Photos de rencontres</h1>
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
					<div class="archive_galerie_container">
					<div class="archive_card_container">

							<img src="<?php the_field('image'); ?>">
						<div class="content_galerie_container">
							<h2 class="subtitles FS-M"><?php the_title(); ?></h2>
							<div class="texts FS-S"><?php 	the_field("description") ?></div>
							<div class="texts FS-S"><a href="<?php the_permalink(); ?>">Plus de détails</a></div>
						</div>
					</div>
					</div>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

	</div>




		<?php include("sidebar.php"); ?>
</div>
<?php get_footer(); ?>
