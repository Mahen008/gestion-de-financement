<?php
require_once 'config.php';

function init_php_session(): bool
{
  if (!session_id()) {
    session_start();
    session_regenerate_id();
    return true;
  }
  return false;
}

function clean_php_session(): void
{
  session_unset();
  session_destroy();
}

function is_logged(): bool
{
  return true; 
}

function is_admin(): bool
{
  return true;
}

if (isset($_POST["action"])) {
  if ($_POST["action"] == "insert") {
    insert();
  } else if ($_POST["action"] == "edit") {
    edit();
  } else {
    delete();
  }
}

function insert()
{
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "INSERT INTO users VALUES('', '$name', '$email', '$gender')";
  mysqli_query($conn, $query);
  echo "Inserted Successfully";
}

function edit()
{
  global $conn;

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "UPDATE users SET name = '$name', email = '$email', gender = '$gender' WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Updated Successfully";
}

function delete()
{
  global $conn;

  $id = $_POST["action"];

  $query = "DELETE FROM users WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}

function calcul_commission_de_gestion()
{
  // return 
}

// function commission_de_gestion($frais_gestion)
// {
//   if (condition) {
//     # code...
//   } elseif (condition) {
//     # code...
//   }
// }
