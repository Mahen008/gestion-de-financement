<?php
require_once 'config.php';

global $conn;
// $filename = $_FILES['filename'];
// $target_directory = __DIR__ . "\\img\\";
// $target_directory = "img\\";
// $target_file = $target_directory . basename($_FILES['file']['name']);
// $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// $newfilename = $target_directory . "." . $filetype;
$file = $_FILES['file']['name'];
// $action = $_POST['action'];
// echo $action;

// if ($formdataUser['action'] == 'CREATE') {
$output = "";
// if($completePdpError == 0)
$query = "INSERT INTO users SET 
      id= '', 
      profile = '$file'";

$res = mysqli_query($conn, $query);
// }

// if (move_uploaded_file($_FILES['file']['tmp_name'], $newfilename)) echo 1;
// else echo 0;
// basename("$_FILES['file']['tmp_name']", "")
if ($res) {
    move_uploaded_file($_FILES['file']['tmp_name'], $file);
    $output = "done";
} else {
    $output = "failed";
}

$resp = array(
    'output' =>  $output
);

echo json_encode($resp);
