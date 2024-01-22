<?php get_header(); ?>

<div class="content_container">
	<div class="maincontent_container " style="max-width: 100%;">
		<div class="content scroll">
		<h1>Participants à la course</h1>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
			<?php endwhile; endif; ?>

<?php if ( ! post_password_required() ): ?>
			<?php
				global $wpdb;
				$query="SELECT * FROM `wp_pixelea_etransaction` WHERE `transactionstatus` = 1 ORDER BY `id` DESC";

				$all = $wpdb->get_results($wpdb->prepare($query,$args));
			?>
			<!-- <pre><?php var_dump($all); ?></pre> -->


			<table class="simple" id="recapitulatif">
				<thead>
					<tr>
						<th>Nom & Prénom</th>
						<th>Date de naissance</th>
						<th>Email / Tel</th>
						<th>Taille Maillot</th>
						<th>Nbre. Repas</th>
						<th>Hébergement</th>
						<th>Adresse</th>
						<th>Date du paiement</th>
						<th>Montant</th>

					</tr>
				</thead>
				<tbody>
				<?php foreach ($all as $result): ?>
					<tr class="payeur" data-id='<?php echo $result->id; ?>'>
						<td><?php echo $result->nomduclient; ?> <?php echo $result->prenomduclient; ?></td>
				
						<td><?php $date_naissance=$result->date_naissance;
							$date_naissance= str_replace("/", "-", $date_naissance);
							$date_naissance= str_replace(".", "-", $date_naissance);
							if (!preg_match("/\d{4}-/", $date_naissance)) {
								echo $date_naissance;
							}else{
								$datenaissance = new DateTime($result->date_naissance);
								echo $datenaissance->format('d-m-Y');
							}
						?>

						</td>
						<td><a href="mailto:<?php echo $result->email; ?>"><?php echo $result->email; ?></a><br><?php echo $result->tel; ?></td>
						<td><?php echo $result->taille_maillot; ?></td>
						<td><em><?php echo $result->nb_repas; ?></strong></td>
						<td><?php echo $result->hebergement; ?></td>
						<td><?php echo $result->adresse; ?><br><?php echo $result->codepostal; ?>, <?php echo $result->ville; ?></td>
						<td><?php echo $dateFormatee = date("d-m-Y", strtotime($result->checked_out_time));?></td>
						<td><?php echo $result->montant; ?>€</td>

					</tr>
				 	<?php $participants= json_decode( $result->participants); 
					 if ($participants !== null):?>
				 	<?php foreach ($participants as $participant): ?>
					<tr class="guest">
						<td><?php echo $participant->nom; ?> <?php echo $participant->prenom; ?></td>
					
						<td>.</td>
						<td><?php echo $participant->email; ?></td>
						<td><?php echo $participant->taille_maillot; ?></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php endforeach ?>
					<?php endif; ?>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>

</div>
<script>
	(function($){
		$(document).ready(function() {
			$(document).ready(function() {
			    //$('#recapitulatif').DataTable();
			} );
		});
	})(jQuery);
</script>
<?php endif; ?>
<?php get_footer();?>




