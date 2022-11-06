<?php
// require_once 'config.php';

// global $conn;
// extract($_POST);
// $filename = $_FILES['filename'];
// $target_directory = __DIR__ . "\\img\\";
// $target_directory = "img\\";
// $target_file = $target_directory . basename($_FILES['file']['name']);
// $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// $newfilename = $target_directory . "." . $filetype;
// $filetarget = "\\img\\" . $_FILES['file']['name'];
// $destination_path = getcwd() . DIRECTORY_SEPARATOR;
// echo '</pre>';
// $target_path = $destination_path . basename($file);
// $action = $_POST['action'];
// echo '<pre>';
// if ($formdataUser['action'] == 'CREATE') {
// if($completePdpError == 0)
// echo $completeName;
// }

// if (move_uploaded_file($_FILES['file']['tmp_name'], $newfilename)) echo 1;
// else echo 0;
// basename("$_FILES['file']['tmp_name']", "")
// if ($action == "CREATE") {
//     $file = $_FILES['file']['name'];
//     $file_destination = 'assets/img/' . $file;
//     $output = "";
//     $query = "INSERT INTO users SET 
//           id_users = '', 
//           name = '$completeName',
//           email = '$completeEmail',
//           gender = '$completeGenre',
//           role = '$completeRole',
//           fonction = '$completeFonction',
//           service = '$completeService',
//           profile = '$file'";

//     $res = mysqli_query($conn, $query);
//     if ($res) {
//         move_uploaded_file($_FILES['file']['tmp_name'], $file_destination);
//         $output = "done";
//     } else {
//         $output = "failed";
//     }

//     $resp = array(
//         'output' =>  $output
//     );

//     echo json_encode($resp);
// }
// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=ddp', 'root', '');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }
