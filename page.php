<?php get_header(); ?>
<div class="content_container">
	<div class="maincontent_container padright">
		<div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
			<?php endwhile; endif; ?>
		</div>

	</div>
	<?php include("sidebar.php"); ?>
</div>
<?php get_footer();?>