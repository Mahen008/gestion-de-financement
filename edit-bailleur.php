<?php
require_once 'config.php';

global $conn;
// if (isset($_POST["editId"])) {
$id = $_POST['editId'];
// echo $id;
// die();
// echo $unique;
$query = "SELECT * FROM bailleurs WHERE id = $id LIMIT 1";
$resultat = mysqli_query($conn, $query);
$response = array();
while ($row = mysqli_fetch_assoc($resultat)) {
    $response = $row;
}
echo json_encode($response);
// } else {
//     echo "Error: ";
// }
// var_dump($resultat);
