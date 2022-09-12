<?php
require_once 'config.php';

global $conn;
extract($_POST);

if (isset($_POST['competeName'])) {

  $query = "INSERT INTO bailleurs SET 
    id= '', 
    nom= '$competeName', 
    secteur_intervation = '$competeSecteurIntervation', 
    type_financement = '$completeTypeFinancement', 
    part_financer = '$completePartFinance', 
    maturite = '$competeMaturite', 
    periode_grace = '$competePeriodeGrace', 
    taux_interet = '$competeTauxInteret', 
    differenciel_interet = '$competeDifferencielInteret', 
    frais_gestion = '$competeFraisDeGestion', 
    commission_engagement= '$competeComissionEngagement', 
    commission_service = '$competeCommissionDeService', 
    commission_initiale = '$competeCommissionInitiale', 
    commission_arragement = '$competeCommissionArragement', 
    frais_exposition = '$competeFraisExposition', 
    commission_agent = '$competeCommissionAgent', 
    maturite_lettre_credit = '$competeMaturiteLettreCredit', 
    frais_ref_lettre_credit = '$competeFraisRefLettreCredit', 
    frais_rebours = '$competeFraisDeRebours', 
    prime_assurance_frais_garantie = '$competePrimeAssurenceFraisGarantie', 
    prime_attenuation_risque_credit = '$competePrimeAttenuationRisqueCredit', 
    frais_lies_mep_lettre_credit ='$competeFraisLiesMepLettreCredit'";

  mysqli_query($conn, $query);
}

    // echo "Inserted Successfully";
