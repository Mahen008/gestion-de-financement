<?php
require_once 'config.php';
session_start();

global $conn;
extract($_POST);

if ($action == 'CREATE') {
    if (!empty($competeSecteur) && isset($competeSecteur)) {
        if (preg_match("/^[a-zA-Z][a-zA-Z0-9\s!@#]*$/", $competeSecteur)) {

            $stmt = $conn->prepare("SELECT * FROM secteur_intervation WHERE nom_secteur = ?");
            $stmt->bind_param("s", $competeSecteur);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows === 0) {
                $stmt = $conn->prepare("INSERT INTO secteur_intervation (nom_secteur) VALUES (?)");
                $stmt->bind_param("s", $competeSecteur);
                $stmt->execute();
                echo "ajouter";
            } else {
                echo "Ce nom existe déjà dans la table.";
            }
        }
        else {
            echo "invalide";
        }    
    } else {
        echo "vide";
    }    


    // $query = "INSERT INTO secteur_intervation SET
    // id_bai= ,
    // nom= $competeName";
    // mysqli_query($conn, $query);

} elseif ($action == 'READ') {

    $sql = "SELECT * FROM secteur_intervation ORDER BY id_secteur DESC";
    // $sql = "SELECT * FROM users ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $secteurs = $stmt->get_result();
    // while ($row = $stmt->fetch()) {
        // echo $row['username'] . "<br>";
    //     $secteurs 
    // }
    
    $i = 1;
    $table =  "";
    foreach ($secteurs as $row) {

        $table .= '<tr id=secteur-' . $row["id_secteur"] . '>
                        <td>
                            <a href="#" class="avatar">' . $i++ . '</a>
                        </td>
                        <td>' . $row["nom_secteur"] . '</td>';

        if ($_SESSION['role'] == "Utilisateur") {
            $table .= '<td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a  onclick="editSecteur(' . $row['id_secteur'] . ')" data-toggle="modal" data-target="#secteur-update-modal" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDataDeleteSecteur(' . $row['id_secteur'] . ')" data-toggle="modal" data-target="#PopupModalDelete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>';
        }
        $table .= '</tr>';
    };
    echo $table;
} elseif ($action == 'EDIT') {

    $id = $_POST['editId'];
    $query = $conn->prepare("SELECT * FROM secteur_intervation WHERE id_secteur = $id LIMIT 1");
    $query->execute();
    $result = $query->get_result();
    // $resultat = mysqli_query($conn, $query);

    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response = $row;
    }
    echo json_encode($response);
} 
elseif ($action == 'UPDATE') 
{
    if (!empty($updateSecteur) && isset($updateSecteur)) 
    {    
        if (preg_match("/^[a-zA-Z][a-zA-Z0-9\s!@#'-]*$/", $updateSecteur)) 
        {
            
            $query = $conn->prepare("UPDATE secteur_intervation SET
            nom_secteur = ?
            WHERE id_secteur = ?");
            $query->bind_param("si", $updateSecteur, $id);
            $query->execute();
            echo "ajouter";
               
        }
        else 
        {
            echo "invalide";
        }
    } else {
        echo "vide";
    }
} 
elseif ($action == 'DATADELETE') 
{
    $id = $_POST['id'];
    $stmt =  $conn->prepare("SELECT * FROM secteur_intervation WHERE id_secteur = $id LIMIT 1");
    // $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = $stmt->get_result();
    $response = array();
    while($row = $result->fetch_assoc()) {
    //     echo $row['nom'];
    // }
    // while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {

    $unique = $_POST['deleteid'];
    // echo $unique;
    $stmt =  $conn->prepare("DELETE FROM secteur_intervation WHERE id_secteur = $unique");
    $stmt->execute();
    // mysqli_query($conn, $query);
    // echo "Error: ";
} else {

    echo "erreur de la requette";
}