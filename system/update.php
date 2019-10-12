<?php 

include 'conn.php';

global $conn;

$id = $_POST['update'];
$nama_produk = htmlspecialchars($_POST['nama_produk']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$takaran = htmlspecialchars($_POST['takaran']);
$harga = htmlspecialchars($_POST['harga']);
$qty = htmlspecialchars($_POST['qty']);

$query = "UPDATE produk SET nama_produk = ?, deskripsi = ?, takaran = ?, harga = ?, qty = ? WHERE id = ?";
// $query = "UPDATE `produk` (`nama_produk`, `deskripsi`, `takaran`, `harga`, `qty`) SET ('$nama_produk', '$deskripsi', '$takaran' '$harga','$qty') WHERE id = '$id'";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssii", $nama_produk, $deskripsi, $takaran, $harga, $qty, $id);
$stmt->execute();

// mysqli_query($conn, $query);

header('Location: ../a_produk.php')
?>