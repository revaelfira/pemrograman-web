<?php
require_once "../database.php";
require_once "../user.php";

$username = $_POST["username"];
$email = $_POST["email"];
$asal = $_POST["asal"];
$password = $_POST["password"];
$id = $_POST["id"];

   $database = new Database;
    $koneksi_db = $database->koneksi();
   
    $user = new User($koneksi_db);
    $user 