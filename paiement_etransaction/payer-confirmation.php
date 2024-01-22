
<?php
include('params.php');
include('traductions.php');
/* ------------------------------------------
   TESTS DE DISPONIBILITE DES SERVEURS
------------------------------------------ */

$serveurs = array('tpeweb.paybox.com', //serveur primaire
'tpeweb1.paybox.com'); //serveur secondaire
$serveurOK = "";

foreach($serveurs as $serveur){
	$doc = new DOMDocument();
	$doc->loadHTMLFile('https://'.$serveur.'/load.html');
	$server_status = "";
	$element = $doc->getElementById('server_status');
	if($element){
		$server_status = $element->textContent;
	}
	if($server_status == "OK"){
		// Le serveur est prêt et les services opérationnels
		$serveurOK = $serveur;
		break;
	}
	// else : La machine est disponible mais les services ne le sont pas.
}

if(!$serveurOK){
	die("Erreur : Aucun serveur n'a été trouvé");
}
// Activation de l'univers de préproduction
//$serveurOK = 'preprod-tpeweb.paybox.com';

//Création de l'url cgi paybox
$serveurOK = 'https://'.$serveurOK.'/cgi/MYchoix_pagepaiement.cgi';


/* ------------------------------------------
   VARIABLES POST
------------------------------------------ */

$pbx_total = str_replace(",",".",$_POST['PBX_MONTANT'])*100;
$pbx_bdd= $pbx_total/100;
//$pbx_bdd =  number_format($pbx_total, 2, '.','');
$qualite = $_POST['qualite'];
$pbx_cmd = $_POST['dossier'];
$nom = ucfirst($_POST['nom']);
$prenom = strtolower($_POST['prenom']);

$date_naissance = $_POST['date'];
$nationalite = $_POST['nationalite'];
$profession = $_POST['profession'];
$hebergement = $_POST['hebergement'];
//$dossier = $_POST['dossier'];

$taille_maillot = $_POST['taille_maillot'];
$qualite = $_POST['qualite'];
$date_naissance = $_POST['date'];
$email = $_POST['email'];
$pbx_porteur = $email;
$dossier = $_POST['dossier'];
$societe = $_POST['societe'];
$adresse = $_POST['adresse'];
$codepostal = $_POST['codepostal'];
$nb_participant = $_POST['nb_participant'];
$ville = ucfirst($_POST['ville']);
$tel = $_POST['tel'];
$message = addslashes($_POST['message']);

// $participants= array();
// // Suppression des partricipants non renseignés
// if ($_POST['participant']) {

// 	$participants_raw=$_POST['participant'];
// 	foreach ($participants_raw as $participant) {
// 		if ($participant['nom'] && $participant['prenom']) {

// 	if (!$participant['email']) {
// 		$participant['email']="N/C";
// 	}
// 		array_push($participants,["nom" =>$participant['nom'],'prenom'=>$participant['prenom'],'taille_maillot'=>$participant['taille_maillot'],"email" =>$participant[	'email']]);
// 		}
// 	}

// 	$participants_datas=json_encode($participants);

// }
$nb_repas=0;

if ($_POST['participant']) {
    $participants_raw = $_POST['participant'];

    foreach ($participants_raw as $participant) {
		if (!empty($participant['participation_repas'])) {
            $participation_repas = 1;
            }
            if (!empty($participant['participation_repas_sup'])) {
                $participation_repas = (int) $participation_repas + (int) $participant['participation_repas_sup'];
               $nb_repas = (int) $nb_repas + (int) $participation_repas;
            }
        if ($participant['nom'] && $participant['prenom']) {
            $participation_repas = 0;
            if (!$participant['email']) {
                $participant['email'] = "N/C";
            }
  
            array_push($participants, [
                "nb_repas" => $participation_repas,
                "nom" => $participant['nom'],
                'prenom' => $participant['prenom'],
                'taille_maillot' => $participant['taille_maillot'],
                "email" => $participant['email']
            ]);
        }
    }

    $participants_datas = json_encode($participants);

}


	/* ------------------------------------------
	   ON RECUPERE LES DONNEES DE LA TRANSACTION EN BDD
	------------------------------------------ */
	// on teste si la transaction n'est pas déjà enregistré (même montant et même numéro de dossier)

	global $wpdb;
	$query="SELECT * FROM `wp_pixelea_etransaction`  WHERE tpe_montant = '".$pbx_total."' AND dossier='".$dossier."'";
	$results_deja_existant = $wpdb->get_results($wpdb->prepare($query,$args)); ?>


<?php if (!$results_deja_existant): ?>



	<?php
	// --------------- TRAITEMENT DES VARIABLES ---------------

	// On récupère la date au format ISO-8601
	$dateTime = date("c");

	// On crée la chaîne à hacher sans URLencodage
	$msg = "PBX_SITE=".$pbx_site.
	"&PBX_RANG=".$pbx_rang.
	"&PBX_IDENTIFIANT=".$pbx_identifiant.
	"&PBX_TOTAL=".$pbx_total.
	"&PBX_DEVISE=978".
	"&PBX_CMD=".$pbx_cmd.
	"&PBX_PORTEUR=".$pbx_porteur.
	"&PBX_REPONDRE_A=".$pbx_repondre_a.
	"&PBX_RETOUR=".$pbx_retour.
	"&PBX_EFFECTUE=".$pbx_effectue.
	"&PBX_ANNULE=".$pbx_annule.
	"&PBX_REFUSE=".$pbx_refuse.
	"&PBX_HASH=SHA512".
	"&PBX_TIME=".$dateTime;


	// Si la clé est en ASCII, On la transforme en binaire
	$binKey = pack("H*", $keyTest);

	// On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et //
	// la clé binaire
	// On envoi via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
	// Pour afficher la liste des algorithmes disponibles sur votre environnement, décommentez la ligne //
	// suivante
	// print_r(hash_algos());
	$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

	// La chaîne sera envoyée en majuscule, d'où l'utilisation de strtoupper()
	// On crée le formulaire à envoyer
	// ATTENTION : l'ordre des champs est extrêmement important, il doit
	// correspondre exactement à l'ordre des champs dans la chaîne hachée

	/* ------------------------------------------
	   INSERTION EN BDD
	------------------------------------------ */
	// Get a db connection.
	// $db = JFactory::getDbo();
	// Create a new query object.
	// $query = $db->getQuery(true);
	// Insert columns.
	$columns= array();
	$values= array();
	if (!$tel) {
		$tel = "N/C";
	}

	$datas= array(
		'qualite' => $qualite,
		'montant' => $pbx_bdd,
		'date_naissance' => $date_naissance,
		'hebergement' => $hebergement,
		'tpe_montant' => $pbx_total,
		'transactionstatus' =>'0',
		'message' =>  $message,
		'nomduclient' =>  $nom,
		'prenomduclient' => $prenom,
		"nb_repas" => $nb_repas,
		'codepostal' =>$codepostal,
		'taille_maillot' => $taille_maillot,
		'ville' => $ville,
		'tel' => $tel,
		'email' =>  $email,
		'adresse' => $adresse,
		'dossier' => $dossier,
		'participants' => $participants_datas,
		'checked_out_time'=> date('Y-m-d H:i:s'),
		'hash' => $hmac,
		);

	foreach ($datas as $key => $value) {
		array_push($columns, $key );
		array_push($values, $value);

	}?>


	<?php
	$wpdb->insert('wp_pixelea_etransaction', $datas);
	?>


	<div class="content">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<div class="pixelea_etransaction_form paiement_confirmation">
		<div class="wrapper">
		<div>
			<span class="label"><?php echo $client_trad ?> : </span><?php echo $qualite; ?> <?php echo $nom; ?> <?php echo $prenom; ?>
		</div>
		<?php if ($nb_participant): ?>
			<span class="label"><?php echo $nb_participant_trad; ?> : </span><?php echo $nb_participant; ?>
		<?php endif ?>
		<div>
			<span class="label">Email :</span> <?php echo $email; ?>
		</div>




		<div>
			<span class="label">
			<?php echo $adresse_trad ?> :
			</span>
			<?php if ($adresse): ?>
				 <?php echo $adresse.", "; ?>
			<?php endif ?>

			<?php if ($codepostal): ?><?php echo $codepostal; ?><?php endif ?>

			<?php if ($ville): ?>
				<?php echo " ".$ville; ?>
			<?php endif ?>

		</div>
		<?php if ($message): ?>
		<div class="message">
			<span class="label">Message : </span> <?php echo stripslashes($message); ?>
		</div>
		<?php endif ?>
		<?php if ($participants): ?>
			<div class="other_participant">
			<p><?php echo $autres_participants_trad; ?> :</p>
			<ul>
			<?php foreach ($participants as $participant): ?>
				<li><?php echo $participant['nom'] ?> <?php echo $participant['prenom'] ?></li>
			<?php endforeach ?>
			</ul>
			</div>
		<?php endif ?>


		<div class="montant">
			<div class="label"><?php echo $montant_trad ?> :</div>
			<div><?php echo  number_format($pbx_total/100, 2, ',', ' '); ?> €</div>
		</div>
		</div>
		<!--  ENVOI DES INFORMATIONS A PAYBOX (Formulaire)  -->
		<form class="pixelea_etransaction_form" method="POST" action="<?php echo $serveurOK; ?>">
			<input type="hidden" name="PBX_SITE" value="<?php echo $pbx_site; ?>">
			<input type="hidden" name="PBX_RANG" value="<?php echo $pbx_rang; ?>">
			<input type="hidden" name="PBX_IDENTIFIANT" value="<?php echo $pbx_identifiant; ?>">
			<input type="hidden" name="PBX_TOTAL" value="<?php echo $pbx_total; ?>">
			<input type="hidden" name="PBX_DEVISE" value="978">
			<input type="hidden" name="PBX_CMD" value="<?php echo $pbx_cmd; ?>">
			<input type="hidden" name="PBX_PORTEUR" value="<?php echo $pbx_porteur; ?>">
			<input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $pbx_repondre_a; ?>">
			<input type="hidden" name="PBX_RETOUR" value="<?php echo $pbx_retour; ?>">
			<input type="hidden" name="PBX_EFFECTUE" value="<?php echo $pbx_effectue; ?>">
			<input type="hidden" name="PBX_ANNULE" value="<?php echo $pbx_annule; ?>">
			<input type="hidden" name="PBX_REFUSE" value="<?php echo $pbx_refuse; ?>">
			<input type="hidden" name="PBX_HASH" value="SHA512">
			<input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
			<input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
			<div class="center">
				<input type="submit" value="<?php echo $confirmer_et_payer_trad; ?>">
				<a class="cancel" href="/inscription"><?php echo $annule_trad; ?></a>
			</div>
		</form>
	</div>

	</div>
<?php else: ?>
	<div class="content">
		<h1>Erreur</h1>
		Veuillez recommencer votre inscription
			<a class="cancel" href="/inscription"><?php echo $annule_trad; ?></a>
	</div>
<?php endif ?>