<?php
require_once 'config.php';
session_start();

global $conn;
extract($_POST);

if ($action == 'CREATE') {

    $query = "INSERT INTO bailleurs SET
    id_bai= '',
    nom= '$competeName',
    secteur_intervation = '$competeSecteurIntervation',
    maturite = '$competeMaturite',
    periode_grace = '$competePeriodeGrace',
    taux_interet = '$competeTauxInteret',
    mode_remboursement_principal = '$competeModeRemboursementPrincipal',
    periodisite_de_remboursement = '$competePeriodisteDeRemboursement',
    differenciel_interet = '$competeDifferencielInteret',
    frais_gestion = '$competeFraisDeGestion',
    commission_engagement= '$competeComissionEngagement',
    commission_service = '$competeCommissionDeService',
    commission_initiale = '$competeCommissionInitiale',
    commission_arragement = '$competeCommissionArragement',
    commission_agent = '$competeCommissionAgent',
    frais_rebours = '$competeFraisDeRebours',
    prime_assurance = '$competePrimeAssurenceFraisGarantie'";

    mysqli_query($conn, $query);
} elseif ($action == 'READ') {

    $bailleurs = mysqli_query($conn, "SELECT * FROM bailleurs");
    $i = 1;
    $table =  "";
    foreach ($bailleurs as $row) {

        $table .= '<tr id=bailleur-' . $row["id_bai"] . '>
                        <td>
                            <a href="#" class="avatar">' . $i++ . '</a>
                        </td>
                        <td>' . $row["nom"] . '</td>

                        <td>' . $row["maturite"] . '</td>
                        <td>' . $row["periode_grace"] . '</td>
                        <td>' . $row["taux_interet"] . '</td>
                        <td>' . $row["mode_remboursement_principal"] . '</td>
                        <td>' . $row["periodisite_de_remboursement"] . '</td>';
        if ($_SESSION['role'] == "Utilisateur") {
            $table .= '<td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a  onclick="editBailleur(' . $row['id_bai'] . ')" data-toggle="modal" data-target="#bailleur-update-modal" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDataDelete(' . $row['id_bai'] . ')" data-toggle="modal" data-target="#PopupModalDelete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>';
        }
        $table .= '</tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {

    $id = $_POST['editId'];
    $query = "SELECT * FROM bailleurs WHERE id_bai = $id LIMIT 1";
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
    maturite = '$updateMaturite',
    periode_grace = '$updatePeriodeGrace',
    taux_interet = '$updateTauxInteret',
    mode_remboursement_principal = '$updateModeRemboursementPrincipal',
    periodisite_de_remboursement = '$updatePeriodisteDeRemboursement',
    differenciel_interet = '$updateDifferencielInteret',
    frais_gestion = '$updateFraisDeGestion',
    commission_engagement= '$updateComissionEngagement',
    commission_service = '$updateCommissionDeService',
    commission_initiale = '$updateCommissionInitiale',
    commission_arragement = '$updateCommissionArragement',
    commission_agent = '$updateCommissionAgent',
    frais_rebours = '$updateFraisDeRebours',
    prime_assurance = '$updatePrimeAssurenceFraisGarantie'
    WHERE id_bai = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM bailleurs WHERE id_bai = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {

    $unique = $_POST['deleteid'];
    echo $unique;
    $query = "DELETE FROM bailleurs WHERE id_bai = $unique";
    mysqli_query($conn, $query);
    echo "Error: ";
} else {

    echo "erreur de la requette";
}
