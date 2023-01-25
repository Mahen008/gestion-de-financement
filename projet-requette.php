<?php
require_once 'config.php';
session_start();
global $conn;
extract($_POST);
// echo $action;

if ($action == 'CREATE') {
    if (!empty($competeName) && isset($competeName) 
    && !empty($competeMontant) && isset($competeMontant)) {
        $validationNom = false;
        $validationMontant = false;
        $validationresultat = array();
        if (preg_match("/^[a-zA-Z][a-zA-Z0-9\s!@#'-]*$/", $competeName)) {
            $validationNom = true;
        }
        if (is_numeric($competeMontant)) {
            $validationMontant = true;
        }
            if ($validationNom == true && $validationMontant == true) {

                $stmt = $conn->prepare("SELECT * FROM projet_sub WHERE nom_projet_sub = ?");
                $stmt->bind_param("s", $competeName);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if($result->num_rows === 0) {
                    $query = $conn->prepare("INSERT INTO projet_sub SET 
                    id_projet_sub= '', 
                    nom_projet_sub= '$competeName', 
                    montant_projet_sub = '$competeMontant', 
                    date_signature = NOW()");
                    $query->execute();
                    // mysqli_query($conn, $query);
                    echo "ajouter";
                } else {
                    echo "Le nom entrer existe déja, veuillez le changer";
                }
            }
            else {
                // $validationresultat[] = $validationNom;
                // $validationresultat[] = $validationMontant;
                // echo json_encode($validationresultat);
                echo "invalide";
            }
    }else {
        echo "vide";
    }
} elseif ($action == 'READ') {

    $projet = mysqli_query($conn, "SELECT * FROM projet_sub ORDER BY id_projet_sub DESC");
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
} 
elseif ($action == 'UPDATE') 
{
    if (!empty($updateName) && isset($updateName) 
    && !empty($updateMontant) && isset($updateMontant)) 
    {
        $validationNom = false;
        $validationMontant = false;
        $validationresultat = array();
        if (preg_match("/^[a-zA-Z][a-zA-Z0-9\s!@#'-]*$/", $updateName)) {
            $validationNom = true;
        }
        if (is_numeric($updateMontant)) {
            $validationMontant = true;       
        }
            if ($validationNom == true && $validationMontant == true) 
            {
                // $query = $conn->prepare( "UPDATE projet_sub SET
                //             nom_projet_sub= '$updateName', 
                //             montant_projet_sub = '$updateMontant'
                //         WHERE id_projet_sub = '$id'");
                // $query->execute();
                $query = $conn->prepare("UPDATE projet_sub SET nom_projet_sub = ?, montant_projet_sub = ? WHERE id_projet_sub = ?");
                $query->bind_param("sid", $updateName, $updateMontant, $id);
                $query->execute();
                echo "ajouter";
                // mysqli_query($conn, $query);
    
            }
            else 
            {
                echo "invalide";
            }
    }
    else 
    {
        echo "vide";
    }
} 
elseif ($action == 'DATADELETE') {
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
