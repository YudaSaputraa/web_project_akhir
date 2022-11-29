<?php
session_start();
include '../connection/connection.php';
$usr = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username = '$usr' AND password = '$pass'";
$query = mysqli_query($connect, $sql);

$check = mysqli_num_rows($query);
if ($check > 0) {
    $_SESSION['username'] = $usr;
    $_SESSION['status'] = "login";
    header("location:../admin/dashboard.php");
} else {
    header("location:../admin/index.php?message=failed");
}
