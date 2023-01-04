<?php
require_once 'config.php';
session_start();
global $conn;
extract($_POST);
// echo $action;

if ($action == 'CREATE') {

    $query = "INSERT INTO projet_sub SET 
      id_projet_sub= '', 
      nom_projet_sub= '$competeName', 
      montant_projet_sub = '$competeMontant', 
      date_signature = NOW()";

    mysqli_query($conn, $query);
} elseif ($action == 'READ') {

    $projet = mysqli_query($conn, "SELECT * FROM projet_sub");
    $table =  "";
    $i = 1;
    foreach ($projet as $row) {
        $table .= '<tr id=projet-' . $row["id_projet_sub"] . '>
                    <td>
                        <a class="avatar">' . $i++ . '</a>
                        <h2>' . $row["nom_projet_sub"] . '</h2>
                    </td>
                    <td>' . $row["montant_projet_sub"] . '</td>
                    <td>' . $row["date_signature"] . '</td>';
        if ($_SESSION['role'] == "Utilisateur") {
            $table .= '<td class="text-right">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" onclick="editProjet(' . $row['id_projet_sub'] . ')" data-toggle="modal" data-target="#projet-update-modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" onclick="confirmDataDeleteProjet(' . $row['id_projet_sub'] . ')" data-toggle="modal" data-target="#PopupModalDelete"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                        </div>
                    </td>';
        }
        $table .= '</tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    $query = "SELECT * FROM projet_sub WHERE id_projet_sub = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'UPDATE') {
    $query = "UPDATE projet_sub SET
                nom_projet_sub= '$updateName', 
                montant_projet_sub = '$updateMontant'
            WHERE id_projet_sub = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM projet_sub WHERE id_projet_sub = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM projet_sub WHERE id_projet_sub = $id";
    mysqli_query($conn, $query);
} else {
    echo "erreur de la requette";
}
