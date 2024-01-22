<?php get_header(); ?>
<div class="content_container">
	<div class="maincontent_container padright">
		<div class="inscription-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php echo the_content(); ?>
			<?php endwhile; endif; ?>

		</div>
		<?php include('paiement_etransaction/payer.php') ?>
	</div>
	<?php include("sidebar.php"); ?>
</div>
<?php get_footer();?>