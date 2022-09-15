<?php
require_once 'config.php';

global $conn;
extract($_POST);
// echo $action;

if ($action == 'CREATE') {

    $query = "INSERT INTO plafond_fmi SET 
      id= '', 
      date_debut= '$completeDateDebut', 
      duree = '$completeDuree', 
      montant = '$completeMontant'";

    mysqli_query($conn, $query);
} elseif ($action == 'READ') {

    $plafond = mysqli_query($conn, "SELECT * FROM plafond_fmi");
    $i = 1;
    $table =  "";
    foreach ($plafond as $row) {
        $table .= '<tr id=plafond-' . $row["id"] . '>
                    <td>' . $i++ . '</td>
                    <td>' . $row["date_debut"] . '</td>
                    <td>' . $row["duree"] . '</td>
                    <td>' . $row["montant"] . '</td>
                    
                    <td>
                        <button class="btn btn-dark" onclick="editPlafondFmi(' . $row['id'] . ')" data-toggle="modal" data-target="#fmi-update-modal">Editer</button>
                        <button class="btn btn-danger" onclick="confirmDataDeleteFmi(' . $row['id'] . ')" data-toggle="modal" data-target="#PopupModalDeleteFMI">Supprimer</button>
                    </td>
                </tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    $query = "SELECT * FROM plafond_fmi WHERE id = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'UPDATE') {
    $query = "UPDATE plafond_fmi SET
                date_debut= '$updateDateDebut', 
                duree = '$updateDuree', 
                montant = '$updateMontant'
            WHERE id = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM plafond_fmi WHERE id = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM plafond_fmi WHERE id = $id";
    mysqli_query($conn, $query);
} else {
    echo "erreur de la requette";
}
