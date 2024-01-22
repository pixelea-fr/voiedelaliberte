<?php
$local=get_locale();
if ($local=='fr_FR') {
	$qualite="Qualité";
	$qualite_m    ="M.";
	$qualite_mme  ="Mme";
	$qualite_mlle ="Mlle *";
}else{
	$qualite="Quality";
	$qualite_m    ="Mr";
	$qualite_mme  ="Mrs";
	$qualite_mlle ="Ms *";
}
?>











<form class="pixelea_etransaction_form" method="POST" action="/paiement-confirmation">


	<div class="nom" >
		Nom *
		<input type="text" name="nom"  size="40" maxlength="100"  required="required"  placeholder="Nom" >
	</div>
	<div class="prenom">
		Prenom *
		<input type="text" name="prenom" size="40" maxlength="100" required="required" placeholder="Prenom" >
	</div>
	<div class="email">
		Email *
		<input type="text" name="email" size="50" maxlength="100"  required="required" placeholder="Email" >
	</div>
	<div class="tel">
		Tel
		<input type="text" name="tel" size="50" maxlength="100" placeholder="Tel">
	</div>
	<div class="dossier"   >
		Numero de dossier *
		<input id="dossier" type="text"  onkeydown="if(event.keyCode==32) return false;" name="dossier" size="50" maxlength="100" required="required" placeholder="Numero de dossier">
	</div>
	<div class="societe"   >
		Société
		<input type="text" name="societe" size="50" maxlength="100" placeholder="Société">
	</div>
	<div class="adresse"   >
		Adresse
		<input type="text" name="adresse" size="50" maxlength="100" placeholder="Adresse">
	</div>
	<div class="codepostal" >
		Code Postal *
		<input type="text" name="codepostal" maxlength="20" required="required" placeholder="Code Postal">
	</div>
	<div class="ville">
		Ville *
		<input type="text" name="ville" size="50" maxlength="100" required="required" placeholder="Ville" >
	</div>
	<div class="pbx_montant">
		Montant *
		<input class="montant" type="text" required="required" name="PBX_MONTANT" value="<?php echo $montant; ?>">
		 €
	</div>
	<div class="textarea">
			<label for="message">
			Message
		</label>

	</div>
	<div class="center">
		<input type="submit" value="Payer">
	</div>
</form>
Les champs indiqués par une * sont obligatoires
<script>
	document.getElementById('dossier').onpaste = function(){
    alert('Merci de ne pas faire de copier/coller pour le numéro de dossier.');        // on prévient
    return false;        // on empêche
};
</script>