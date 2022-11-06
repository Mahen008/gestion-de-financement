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
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
    } else {
        $file = "user.jpg";
    }
    $file_destination = 'assets/img/' . $file;
    $output = "";
    $hash = password_hash($completePassword, PASSWORD_BCRYPT);
    $query = "INSERT INTO users SET 
          id_users = '', 
          name = '$completeName',
          email = '$completeEmail',
          gender = '$completeGenre',
          role = '$completeRole',
          password = '$hash',
          service = '$completeService',
          profile = '$file'";

    $res = mysqli_query($conn, $query);
    if ($res) {
        if (isset($_FILES['file']['name'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], $file_destination);
        }
        $output = "done";
    } else {
        $output = "failed";
    }

    $resp = array(
        'output' =>  $output
    );

    echo json_encode($resp);
} elseif ($action == 'READ') {

    $projet = mysqli_query($conn, "SELECT * FROM users ORDER BY id_users DESC");
    $users =  "";
    foreach ($projet as $row) {
        if (isset($row["profile"]) && !empty($row["profile"])) {
            $img = $row["profile"];
        } elseif ($row["gender"] == "Homme" && empty($row["profile"])) {
            $img = "user.jpg";
        } else {
            $img = "user.jpg";
        }
        $users .= '<div id=user-' . $row["id_users"] . ' class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/' . $img . '"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item"  onclick="editUser(' . $row["id_users"] . ')" data-toggle="modal" data-target="#user-update-modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDataDeleteUser(' . $row["id_users"] . ')" data-toggle="modal" data-target="#PopupModalDeleteUser"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html">' . $row["name"] . '</a></h4>
                            <div class="doc-prof">' . $row["role"] . '</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                            </div>
                        </div>
                    </div>';
    };
    echo $users;
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    // $query = "";
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id_users = $id LIMIT 1");
    // print_r($user);
    $user = array();
    $editUser = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $user = $row;
    }
    $editUser = '<div class="col-md-12">
                    <div class="profile-img-wrap">
                        <img class="inline-block" src="assets/img/' . $user["profile"] . '" alt="user">
                        <div class="fileupload btn">
                            <span class="btn-text">edit</span>
                            <input class="upload" type="file">
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Nom</label>
                                    <input type="text" class="form-control floating" value="' . $user["name"] . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Email</label>
                                    <input type="email" class="form-control floating" value="' . $user["email"] . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label">Gendar</label>
                                    <select class="select form-control floating">';
    // echo $user["gender"];
    if ($user["gender"] == "Femme") {
        $editUser .= '<option value="Femme">Femme</option>
                      <option value="Homme">Homme</option>';
    } else {
        $editUser .= '<option value="Homme">Homme</option>
                      <option value="Femme">Femme</option>';
    }

    $editUser .= '</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Birth Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text" value="05/06/1985">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

    // $resultat = mysqli_query($conn, $query);
    // $response = array();
    // while ($row = mysqli_fetch_assoc($resultat)) {
    //     $response = $row;
    // }
    // echo json_encode($response);
    echo $editUser;
} elseif ($action == 'UPDATE') {
    $query = "UPDATE projet_sub SET
                nom_projet_sub= '$updateName', 
                montant = '$updateMontant'
            WHERE id_users = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == 'DATADELETE') {
    $id = $_POST['id'];
    $query = "SELECT * FROM users WHERE id_users = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM users WHERE id_users = $id";
    mysqli_query($conn, $query);
} else {
    echo "erreur de la requette";
}
