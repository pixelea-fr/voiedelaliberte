<?php
// -----------------------------------------------------------------------------
// Mise à jour du paiement!
// -----------------------------------------------------------------------------

$montant = $_REQUEST["Mt"];
$dossier = $_REQUEST["Ref"];
$hash = $_REQUEST['hash'];
?>

<?php if ($montant): ?>
<?php endif; ?>
	<?php
	/* ------------------------------------------
	   ON RECUPERE LES DONNEES DE LA TRANSACTION EN BDD
	------------------------------------------ */
	// on teste si la transaction n'est pas déjà enregistré (même montant et même numéro de dossier)

	global $wpdb;
	$query="SELECT * FROM `wp_pixelea_etransaction`  WHERE tpe_montant = '".$montant."' AND dossier='".$dossier."'";
	$results = $wpdb->get_results($wpdb->prepare($query,$args)); ?>

	<?php
	// -----------------------------------------------------------------------------
	// On execute le code uniquement si la transaction n'a pas déjà été validé
	// -----------------------------------------------------------------------------
  	?>
  	<?php if ($results): ?>


	<?php if ($results[0]->transactionstatus != "1"): ?>

		<div class="content">
		<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
  		<?php

  			/* ------------------------------------------
			  UPDATE EN BDD
			------------------------------------------ */
		$query_update="UPDATE `wp_pixelea_etransaction`  SET `transactionstatus`='1'  WHERE tpe_montant = '".$montant."' AND dossier='".$dossier."'";
		$wpdb->get_results($wpdb->prepare($query_update,$args));
		?>




			<?php
			//===============================================================================================================================
			//===============================================================================================================================
			// ENVOIE DE L'EMAIL
			//===============================================================================================================================
			//===============================================================================================================================

			// filtre pour autoriser la prise en charge du html dans le mail (a desactiver apres l'envoi du mail)
			function pixelea_set_mail_content_type(){
			    return "text/html";
			}
			add_filter( 'wp_mail_content_type','pixelea_set_mail_content_type' ); ?>

			<?php
			/* ------------------------------------------
			   CONTENU DE L'EMAIL -(mise dans le buffer)
			------------------------------------------ */
			 ob_start();
			?>
			<html>
				<thead>
					<style>
					table {
					    border-collapse: collapse;
					    width: 100%;
					}
					th, td {
					    text-align: left;
					    padding: 8px;
					}
					tr:nth-child(even) {background-color: #f2f2f2;}
					</style>
				</thead>
				<body>

					<h1>Nouvelle inscription à la course</h1>
					<hr>
					<h2>Détails</h2>
					<p>
					Un paiement pour une ou plusieurs inscriptions a été effectué.
					</p>
					<p>Ci-dessous, vous trouverez l'intégralité des participants de cette inscription.</p>
					<h3>
						Récapitulatif des participant(s) :
					</h3>

					<table>
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Email</th>
								<th>Taille Maillot</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($results as $result): ?>
							<tr>
								<td><?php echo $result->nomduclient; ?></td>
								<td><?php echo $result->prenomduclient; ?></td>
								<td><?php echo $result->email; ?></td>
								<td><?php echo $result->taille_maillot; ?></td>

							</tr>
						 	<?php $participants= json_decode( $result->participants); ?>
						 	<?php foreach ($participants as $participant): ?>
						 	<tr>
						 		<td><?php echo $participant->nom; ?></td>
						 		<td><?php echo $participant->prenom; ?></td>
						 		<td><?php echo $participant->email; ?></td>
						 		<td><?php echo $participant->taille_maillot; ?></td>
						 	</tr>

						 	<?php endforeach ?>
						<?php endforeach ?>
						</tbody>
					</table>
					<p>Adresse : <?php echo $result->adresse; ?><br><?php echo $result->codepostal; ?>, <?php echo $result->ville; ?></p>
					<p>Date de naissance :
						<?php $date_naissance=$result->date_naissance;
								$date_naissance= str_replace("/", "-", $date_naissance);
								$date_naissance= str_replace(".", "-", $date_naissance);
								if (!preg_match("/\d{4}-/", $date_naissance)) {
									echo $date_naissance;
								}else{
									$datenaissance = new DateTime($result->date_naissance);
									echo $datenaissance->format('d-m-Y');
								} ?>
					</p>
					<p>Téléphone : <?php echo $result->tel; ?></p>
					<p>Hébergement : <?php echo $result->hebergement; ?></p>
					<p>Message : <?php echo $result->message; ?></p>


					<p><a href="http://www.voiedelaliberte.fr/recapitulatif-course">Récapitulatif de la course</a></p>
				</body>
			</html>

			<?php $email_content = ob_get_clean();  ?>


			<?php
			// assumes $to, $subject, $message have already been defined earlier...

			$headers[] = 'From: La voie de la liberté <contact@voiedelaliberte.fr>';

			wp_mail( "pillon.damien@wanadoo.fr", "Nouvelle inscription à la course", $email_content, $headers );
			//wp_mail( "nicolas@pixelea.fr", "Nouvelle inscription à la course", $email_content, $headers );

			//Suppresion du filtre pour le corps du html
			remove_filter( 'wp_mail_content_type','pixelea_set_mail_content_type' ); ?>
	<?php else: ?>
		<h1>Cette transaction a déjà été validée.</h1>
  	<?php endif ?>
<?php else: ?>
	<h1>Erreur de validation du paiement</h1>
	<br>
	<h2>Votre paiement à été effectué, mais n'a pas encore été validé par notre site</h2>
<?php endif ?>
