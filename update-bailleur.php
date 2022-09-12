<?php
require_once 'config.php';

global $conn;
extract($_POST);

$query = "UPDATE bailleurs SET
            nom = '$updateName',
            secteur_intervation = '$updateSecteurIntervation',
            type_financement = '$updateTypeFinancement',
            part_financer = '$updatePartFinance',
            maturite = '$updateMaturite',
            periode_grace = '$updatePeriodeGrace',
            taux_interet = '$updateTauxInteret',
            differenciel_interet = '$updateDifferencielInteret',
            frais_gestion = '$updateFraisDeGestion',
            commission_engagement= '$updateComissionEngagement',
            commission_service = '$updateCommissionDeService',
            commission_initiale = '$updateCommissionInitiale',
            commission_arragement = '$updateCommissionArragement',
            frais_exposition = '$updateFraisExposition',
            commission_agent = '$updateCommissionAgent',
            maturite_lettre_credit = '$updateMaturiteLettreCredit',
            frais_ref_lettre_credit = '$updateFraisRefLettreCredit',
            frais_rebours = '$updateFraisDeRebours',
            prime_assurance_frais_garantie = '$updatePrimeAssurenceFraisGarantie',
            prime_attenuation_risque_credit = '$updatePrimeAttenuationRisqueCredit',
            frais_lies_mep_lettre_credit = '$updateFraisLiesMepLettreCredit'
            WHERE id = '$id'";
