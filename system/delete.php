<?php 

require 'conn.php';

session_start();

if(!isset($_SESSION['email'])) {
    header('Location: ../produk.php');
    die;
} else if($_SESSION['role'] != 1) {
    header('Location: ../produk.php');
    die;
}

global $conn;

$id = $_GET['id'];

// mysqli_query($conn, "DELETE FROM produk WHERE id = ?");
// header('Location: ../a_produk.php');

$query = "DELETE FROM produk WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
header('Location: ../a_produk.php');


?>