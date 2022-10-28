<?php
require_once 'config.php';

global $conn;
extract($_POST);
// $form = $_POST['completeRole'];
// $id = $_POST["completeRole"];
// echo $completeRole;
// echo "<pre>";
// print_r($_POST['formdataUser']);
// echo "</pre>";
// $formdataUser = $_POST['formdataUser'];

// echo $action;
// $completePdpName = $_FILES['completePdp']['name'];
// $completePdpSize = $_FILES['completePdp']['size'];
// $completePdpTmpName = $_FILES['completePdp']['Tmp_Name'];
// $completePdpError = $_FILES['completePdp']['error'];
// echo "<pre>";
// print_r($_FILES['completePdp']);
// print_r($form);
// echo "</pre>";
if ($action == 'CREATE') {

    // if($completePdpError == 0)
    $query = "INSERT INTO users SET 
      id_users = '', 
      name = '$completeName', 
      email = '$completeEmail', 
      gender = '$completeGenre', 
      role = '$completeRole', 
      fonction = '$completeFonction', 
      service = '$completeService', 
      profile = '$completePdp'";

    mysqli_query($conn, $query);
} elseif ($action == 'READ') {

    $projet = mysqli_query($conn, "SELECT * FROM users");
    $table =  "";
    foreach ($projet as $row) {
        $table .= '<tr id=projet-' . $row["id_users"] . '>
                    <td>
                        <a class="avatar">A</a>
                        <h2>' . $row["nom_projet_sub"] . '</h2>
                    </td>
                    <td>' . $row["montant"] . '</td>
                    <td>' . $row["date_signature"] . '</td>

                    <td class="text-right">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" onclick="editProjet(' . $row['id_users'] . ')" data-toggle="modal" data-target="#projet-update-modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" onclick="confirmDataDeleteProjet(' . $row['id_users'] . ')" data-toggle="modal" data-target="#PopupModalDelete"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                        </div>
                    </td>
                </tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    $query = "SELECT * FROM projet_sub WHERE id_users = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'UPDATE') {
    $query = "UPDATE projet_sub SET
                nom_projet_sub= '$updateName', 
                montant = '$updateMontant'
            WHERE id_users = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM projet_sub WHERE id_users = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM projet_sub WHERE id_users = $id";
    mysqli_query($conn, $query);
} else {
    echo "erreur de la requette";
}
