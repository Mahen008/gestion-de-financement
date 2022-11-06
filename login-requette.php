<?php
include('function.php');
require_once 'config.php';
init_php_session();
// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=ddp', 'root', '');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }
global $conn;
extract($_POST);
// print_r($action);

if ($action == 'LOGIN') {
    $email = $_POST['form_username'];
    $password = $_POST['form_password'];

    $query = "SELECT * FROM users WHERE email = '" . $email . "' LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();

    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    if ($response) {
        if (password_verify($password, $response['password'])) {
            // $output = "connecte";
            init_php_session();
            $_SESSION['role'] = $response['role'];
            $_SESSION['img'] = $response['profile'];

            // $response['session_role'] =  $_SESSION['rank'];
            // $response['session_profile'] =  $_SESSION['img'];
            $response['output'] = true;
        }
    } else {
        $response['output'] = false;
    }
    // echo $_SESSION['rank'];
    // echo $_SESSION['img'];
    echo json_encode($response);
}
