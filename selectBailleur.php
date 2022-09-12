<?php
require_once 'config.php';

global $conn;

// if (isset($_POST['displaySend'])) {
$rows = mysqli_query($conn, "SELECT * FROM bailleurs");
$i = 1;
// }else {
//     echo "Error: ";
// }
