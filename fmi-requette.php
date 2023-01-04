<?php
require_once 'config.php';
session_start();

global $conn;
extract($_POST);
// echo $action;

if ($action == 'CREATE') {

    $query = "INSERT INTO plafond_fmi SET 
      id_plafond= '', 
      date_debut= '$completeDateDebut', 
      duree = '$completeDuree', 
      montant = '$completeMontant'";

    mysqli_query($conn, $query);
} elseif ($action == 'READ') {

    $plafond = mysqli_query($conn, "SELECT * FROM plafond_fmi");
    $i = 1;
    $table =  "";
    foreach ($plafond as $row) {
        $table .= '<tr id=plafond-' . $row["id_plafond"] . '>
                    <td>' . $i++ . '</td>
                    <td>' . $row["date_debut"] . '</td>
                    <td>' . $row["duree"] . '</td>
                    <td>' . $row["montant"] . '</td>';
        if ($_SESSION['role'] == "Utilisateur") {
            $table .= '<td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a  onclick="editPlafondFmi(' . $row['id_plafond'] . ')" data-toggle="modal" data-target="#fmi-update-modal" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" onclick="confirmDataDeleteFmi(' . $row['id_plafond'] . ')" data-toggle="modal" data-target="#PopupModalDeleteFMI"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>';
        }
        $table .= '</tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    $query = "SELECT * FROM plafond_fmi WHERE id_plafond = $id LIMIT 1";
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
            WHERE id_plafond = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM plafond_fmi WHERE id_plafond = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM plafond_fmi WHERE id_plafond = $id";
    mysqli_query($conn, $query);
} else {
    echo "erreur de la requette";
}
