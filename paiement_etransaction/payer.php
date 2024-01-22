<?php include('traductions.php'); ?>
<form class="pixelea_etransaction_form" method="POST" action="/paiement-confirmation" data-nbparticipant="1" data-nbrepas="0">

	<div class="nb_participant">
		<label for="nb_participant"><?php echo $nb_participant_trad; ?></label>
		<input type="number" name="nb_participant" id="nb_participant" min='1'  value="1"> *
	</div>

	<div class="participants">
		<div class="participant" data-item="1">
			<div class="wrapper">
				<h2>Participant n°1</h2>
				<div class="qualite">
					<label><?php echo $qualite_trad; ?></label>
					<input type="radio" name="qualite" checked value="M."><?php echo $qualite_m_trad; ?>
					<input type="radio" name="qualite" value="Mme"><?php echo $qualite_mme_trad; ?>
					<input type="radio" name="qualite" value="Mlle"> <?php echo $qualite_mlle_trad; ?>
				</div>

				<div class="nom" >
					<label for="nom"><?php echo $nom_trad; ?></label>
					<input type="text" name="nom"  size="40" maxlength="100"  required="required"  placeholder="<?php echo $nom_trad; ?>" > *
				</div>
				<div class="prenom">
					<label for="prenom"><?php echo $prenom_trad; ?></label>
					<input type="text" name="prenom" size="40" maxlength="100" required="required" placeholder="<?php echo $prenom_trad; ?>" > *
				</div>
				<div class="profession">
					<label for="profession" ><?php echo $profession_trad; ?></label>
					<input type="text" name="profession" size="40" maxlength="100"  required="required" placeholder="<?php echo $profession_trad; ?>" > *
				</div>
				<div class="date">
					<label for="date" ><?php echo $date_de_naissance_trad; ?></label>
					<input type="date" name="date" size="50" maxlength="100"  required="required" placeholder="<?php echo $date_de_naissance_trad; ?>" > *
				</div>

				<div class="tel">
					<label for="tel"><?php echo $tel_trad; ?></label>
					<input type="text" name="tel" size="50" maxlength="100" placeholder="<?php echo $tel_trad; ?>">
				</div>

				<div class="email">
					<label for="email" ><?php echo $email_trad; ?></label>
					<input type="email" name="email" size="50" maxlength="100"  required="required" placeholder="<?php echo $email_trad; ?>" > *
				</div>
				<div class="nationalite">
					<label for="nationalite" ><?php echo $nationalite_trad; ?></label>
					<input type="text" name="nationalite" size="50" maxlength="100"  required="required" placeholder="<?php echo $nationalite_trad; ?>" > *
				</div>

				<div class="taille_maillot">
					<label><?php echo $taille_du_maillot_trad; ?></label>
					<div class="taille_input">
						<input type="radio" name="taille_maillot" checked value="m"> M
						<input type="radio" name="taille_maillot" value="l"> L
						<input type="radio" name="taille_maillot" value="xl">XL
						<input type="radio" name="taille_maillot" value="xxl">XXL
						<input type="radio" name="taille_maillot" value="xxxl">XXXL
					</div>
				</div>
				<div class="participation_repas">
					<input class="participation_repas_check" name="participant[1][participation_repas]" type="checkbox" name="accept" id="accept"> Je participerai au repas de cloture ( + 20€)
				</div>
				<div class="participation_repas_supplementaire">
					Nombre d'accompagnants au repas<input class="participation_repas_sup" name="participant[1][participation_repas_sup]" style ='width:70px; text-align:center' min='0' max='20' type="number" value='0'> ( + 20€ par accompagnant)
					</div>
			</div>
		</div>
		<?php for ($i=2; $i <101 ; $i++) { ?>
		<div class="participant" data-item='<?php echo $i; ?>'>
			<div class="wrapper">
				<div>
				<h2>Participant n°<?php echo $i; ?> </h2>
				</div>
				<div class="nom">
					<label class="nom_<?php echo $i; ?>" for="_<?php echo $i; ?>"><?php echo $nom_trad; ?></label>
					<input type="text" name="participant[<?php echo $i; ?>][nom]"  size="40" maxlength="100" placeholder="<?php echo $nom_trad; ?> <?php echo $i; ?>" >
				</div>
				<div class="prenom">
					<label class="prenom_<?php echo $i; ?>" for="_<?php echo $i; ?>"><?php echo $prenom_trad; ?></label>
					<input type="text" name="participant[<?php echo $i; ?>][prenom]"  size="40" maxlength="100" placeholder="<?php echo $prenom_trad; ?> <?php echo $i; ?>	" >
				</div>
				<div class="email">
					<label class="email_<?php echo $i; ?>" for="_<?php echo $i; ?>"><?php echo $email_trad; ?></label>
					<input type="text" name="participant[<?php echo $i; ?>][email]"  size="40" maxlength="100" placeholder="<?php echo $email_trad; ?> <?php echo $i; ?>" 	>
				</div>
				<div class="taille_maillot_<?php echo $i; ?>">
					<label><?php echo $taille_du_maillot_trad; ?></label>
					<div class="taille_input">
						<input type="radio" name="participant[<?php echo $i; ?>][taille_maillot]" checked value="m"> M
						<input type="radio" name="participant[<?php echo $i; ?>][taille_maillot]" value="l"> L
						<input type="radio" name="participant[<?php echo $i; ?>][taille_maillot]" value="xl">XL
						<input type="radio" name="participant[<?php echo $i; ?>][taille_maillot]" value="xxl">XXL
						<input type="radio" name="participant[<?php echo $i; ?>][taille_maillot]" value="xxxl">XXXL
					</div>
				</div>
				<div class="participation_repas_<?php echo $i; ?>">
					<input class="participation_repas_check" name="participant[<?php echo $i; ?>][participation_repas]" type="checkbox" name="accept" id="accept"> Je participerai au repas de cloture ( + 20€)
				</div>
				<div class="participation_repas_supplementaire_<?php echo $i; ?>">
					Nombre d'accompagnants au repas<input class="participation_repas_sup" name="participant[<?php echo $i; ?>][participation_repas_sup]" style ='width:70px; text-align:center' type="number" value='0'> ( + 20€ par accompagnant)
					</div>
			</div>
		</div>
		<?php }	?>
	</div>



	<div class="dossier" >
		<input id="dossier" type="hidden" name="dossier" value="<?php echo  time(); ?>">
	</div>

	<div class="adresse"   >
		<label for="adresse"><?php echo $adresse_trad; ?></label>
		<input type="text" name="adresse" size="50" maxlength="100" placeholder="<?php echo $adresse_trad; ?>">
	</div>
	<div class="codepostal" >
		<label for="codepostal"><?php echo $code_postal_trad; ?></label>
		<input type="text" name="codepostal" maxlength="20" required="required" placeholder="<?php echo $code_postal_trad; ?>"> *
	</div>
	<div class="ville">
		<label for="ville"><?php echo $ville_trad; ?></label>
		<input type="text" name="ville" size="50" maxlength="100" required="required" placeholder="<?php echo $ville_trad; ?>" > *
	</div>

	<div class="hebergement">
		<label><?php echo $hebergement_trad; ?> :</label>
		<div class="padleft" style="display:inline-block;">
			<input type="radio" name="hebergement" checked value="NON"> <?php echo $hebergement_non_trad; ?><br>
			<input type="radio" name="hebergement" value="OUI"> <?php echo $hebergement_oui_trad; ?><br>
			<input type="radio" name="hebergement" value="CAMPING CAR"> <?php echo $hebergement_camping_trad; ?>
		</div>
	</div>

	<div class="textarea">
			<label for="message">
			Message
		</label>
		<textarea name="message" rows="10" cols="80"></textarea>
	</div>
		<div class="pbx_montant">
		<label for="PBX_MONTANT"><?php echo $montant_trad; ?></label>
		<input readonly class="montant" type="text" required="required" name="PBX_MONTANT" value="<?php echo get_field('price',"option"); ?>">
		<span class="euro"> €</span>
	</div>
	<div class="center">
		<input type="submit" value="Payer">
	</div>
</form>
<div class="consignes"><?php echo $champ_obligatoires_trad; ?></div>
<script>
	document.getElementById('dossier').onpaste = function(){
    alert('Merci de ne pas faire de copier/coller pour le numéro de dossier.');        // on prévient
    return false;        // on empêche
};

(function($){

  $('.participant').hide();
  $('.participant:first-of-type').show();

  $("body").on('change','#nb_participant' ,function() {
    var nbParticipant = $(this).val();
    $(this).closest("form").attr('data-nbparticipant', nbParticipant);
   
    // Cacher tous les éléments .participant d'abord
    $('.participant').hide();
    
    // Afficher autant d'éléments .participant que la valeur sélectionnée
    $('.participant').each(function(index, el) {
      var dataItem = parseInt($(this).attr('data-item'), 10);
      if (dataItem <= nbParticipant) {
        $(this).show();
      }else{
		$(this).find('.participation_repas_sup').val(0);
		$(this).find('.participation_repas_check').prop('checked', false);
		var nbrepas = calculateTotalRepas();
	$(this).closest("form").attr('data-nbrepas', nbrepas);
	  }

    });
	updateCost();
  });

  $("body").on('change',".participation_repas_sup, .participation_repas_check", function() {
	var nbrepas = calculateTotalRepas();
	$(this).closest("form").attr('data-nbrepas', nbrepas);
	updateCost();
  });

  // Fonction pour calculer le total en fonction des règles spécifiées
  function calculateTotalRepas() {
	var nb=0;
    // Pour chaque case à cocher
    $(".participation_repas_check:checked").each(function() {
	  nb += 1;
    });
    // Pour chaque champ numérique
    $(".participation_repas_sup").each(function() {
      var value = parseInt($(this).val(), 10);
	  nb += value;
    });

    return nb; // Retourne le total calculé
  }

  function updateCost() {
  var nbrepas = $('.pixelea_etransaction_form').attr('data-nbrepas');
  var nbparticipant = $('.pixelea_etransaction_form').attr('data-nbparticipant');
  // Vérifier si nbrepas est un nombre
  if (!isNaN(parseInt(nbrepas))) {
    nbrepas = parseInt(nbrepas, 10);
	nbparticipant  = parseInt(nbparticipant, 10);
    console.log("nbrepas : " + nbparticipant);

    var repasCost = nbrepas * 20;
    var participationCost = nbparticipant  * 120;
    var total = repasCost + participationCost;

    $('.montant').val(total);
  } else {
    console.error("Erreur : data-nbrepas n'est pas un nombre valide.");
    // Gérer l'erreur ou effectuer une action appropriée en cas de non-nombre
  }
}

})(jQuery);
</script>