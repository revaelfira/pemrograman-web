<?php
session_start();

require_once("database.php");
require_once("user.php");

$username = $_POST["Input_Username"];
$password = $_POST["Input_Password"];

$db = new Database();
$conn = $db->koneksi();
$user = new User($conn);

$ditemukan = $user->login($username, $password);

if($ditemukan == false){
    $_SESSION['pesan_kesalahan'] = "Login Gagal";
    header("Location: index.php");
    exit;
}else{
    $_SESSION['is_logged_in'] = true;
    $_SESSION['username'] = $username;

    // Hitung jumlah login
    if(isset($_COOKIE['jumlah_login'])){
        $jumlah_login = $_COOKIE['jumlah_login'] + 1;
    }else{
        $jumlah_login = 1;
    }

    // Simpan cookie selama 30 hari
    setcookie("jumlah_login", $jumlah_login, time() + (86400 * 30), "/");

    header("Location: dashboard/index.php");
    exit;
}