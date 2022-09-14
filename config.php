<?php
// session_start(); 
$conn = new mysqli("localhost", "root", "", "ddp");
if (!($conn)) {
    die(mysqli_error($conn));
}
