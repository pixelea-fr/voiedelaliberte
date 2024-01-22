<?php
/* ------------------------------------------
   Recupération des paramètres du module
------------------------------------------ */
$phrase = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
// --------------- VARIABLES ---------------

//PROD
//--------------------------------------------------

		// Ennonciation de variables
		$pbx_site = "0833191";
		$pbx_rang = "02";
		$pbx_identifiant = '766050646';
		//$pbx_cmd = 'TEst 1';
		//Email de retour du ticket ( le Client)
		$pbx_porteur = "nicolas@pixelea.fr";
		$pbx_total = "100";
		$pbx_hmac = "4765b75d8163273708e6c3cc0b0002adaf5aeb18b5087d11d9fd2e1df8c0de887243c4f8ad96209e29ccc4840ee5240419fb2a3fb65dbcff764b3bd67377ca08";


		// PREPROD
		// --------------------------------------------------
//
//		// Ennonciation de variables
//		$pbx_site = "0833191";
//		$pbx_rang = "02";
//		$pbx_identifiant = '766050646';
//		//$pbx_cmd = 'TEst 1';
//		//Email de retour du ticket ( le Client)
//		$pbx_porteur = "nicolas@pixelea.fr";
//		$pbx_total = "100";
//		$pbx_hmac = "222f7d8fabef7889046d59ea7c3f1746a4529e468f9affd7e042d242c0a28cb4a5942eda8b749e205fb4694dd1528152f69b423bc81391d3b5682bb801882432";





$pbx_effectue= "paiement-effectue";
$pbx_annule="paiement-annule";
$pbx_refuse="paiement-refuse";
$pbx_repondre_a="";
$pbx_retour	="Mt:M;Ref:R;Auto:A;Erreur:E";

$keyTest=$pbx_hmac;
$pbx_effectue= home_url()."/".$pbx_effectue;
$pbx_annule= home_url()."/".$pbx_annule;
$pbx_refuse= home_url()."/".$pbx_refuse;
$pbx_repondre_a= home_url()."/".$pbx_repondre_a;
$pbx_retour=$pbx_retour;