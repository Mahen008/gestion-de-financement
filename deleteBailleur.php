<?php
require_once 'config.php';

global $conn;

if (isset($_POST["deleteid"])) {
    $unique = $_POST['deleteid'];
    echo $unique;
    $query = "DELETE FROM bailleurs WHERE id = $unique";
    mysqli_query($conn, $query);
} else {
    echo "Error: ";
}
