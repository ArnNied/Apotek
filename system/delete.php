<?php 

include 'conn.php';

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