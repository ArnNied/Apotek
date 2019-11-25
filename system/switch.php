<?php

require 'conn.php';
session_start();

$id = $_SESSION['user']['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `role` FROM `users` WHERE `id` = $id"));

if($row['role'] == 0) {
    header("Location: ../produk.php?page=1");
    die;
}

if($_SESSION['user']['role'] == 1){
    $_SESSION['user']['role'] = 0;
} else {
    $_SESSION['user']['role'] = 1;
}

header("Location: ../produk.php?page=1")

?>