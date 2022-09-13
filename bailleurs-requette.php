<?php
require_once 'config.php';

global $conn;
extract($_POST);

if ($action == 'CREATE') {

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
} elseif ($action == 'READ') {

    $bailleurs = mysqli_query($conn, "SELECT * FROM bailleurs");
    $i = 1;
    $table =  "";
    foreach ($bailleurs as $row) {
        $table .= '<tr id=bailleur-' . $row["id"] . '>
                        <td>' . $i++ . '</td>
                        <td>' . $row["nom"] . '</td>
                        <td>' . $row["part_financer"] . '</td>
                        <td>' . $row["maturite"] . '</td>
                        <td>' . $row["periode_grace"] . '</td>
                        <td>' . $row["taux_interet"] . '</td>
                        <td>' . $row["differenciel_interet"] . '</td>
                        
                        <td>
                            <button class="btn btn-dark" onclick="editBailleur(' . $row['id'] . ')" data-toggle="modal" data-target="#bailleur-update-modal">Editer</button>
                            <button class="btn btn-danger" onclick="deleteBailleur(' . $row['id'] . ')">Supprimer</button>
                        </td>
                    </tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {

    $id = $_POST['editId'];
    $query = "SELECT * FROM bailleurs WHERE id = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'UPDATE') {

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
    mysqli_query($conn, $query);
} elseif ($action == 'DELETE') {

    $unique = $_POST['deleteid'];
    echo $unique;
    $query = "DELETE FROM bailleurs WHERE id = $unique";
    mysqli_query($conn, $query);
    echo "Error: ";
} else {

    echo "erreur de la requette";
}
