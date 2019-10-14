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

$id = $_POST['update'];
$nama_produk = htmlspecialchars($_POST['nama_produk']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$takaran = htmlspecialchars($_POST['takaran']);
$harga = htmlspecialchars($_POST['harga']);
$qty = htmlspecialchars($_POST['qty']);

$query = "SELECT gambar FROM produk WHERE id = '$id'";
$cur_gambar = mysqli_fetch_assoc(mysqli_query($conn, $query));
if($_FILES['gambar']['error'] == 4) {
    $stringGambar = $cur_gambar['gambar'];
} else {
    $namaGambar = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    $allowedExt = ['jpg', 'jpeg', 'png'];
    $extGambar = explode(".", $namaGambar);
    $extGambar = end($extGambar);

    if(!in_array(strtolower($extGambar), $allowedExt)) {
        echo "<script> alert('Yang anda upload bukan gambar'); document.location.href = ../a_produk.php </script>";
    }

    $stringGambar = random_str(16).".".$extGambar;
    move_uploaded_file($tmpName, '../img/'.$stringGambar);
}

// $query = "UPDATE `produk` (`nama_produk`, `deskripsi`, `takaran`, `harga`, `qty`) SET ('$nama_produk', '$deskripsi', '$takaran' '$harga','$qty') WHERE id = '$id'";
// mysqli_query($conn, $query);

$query = "UPDATE produk SET nama_produk = ?, gambar = ?, deskripsi = ?, takaran = ?, harga = ?, qty = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssii", $nama_produk, $stringGambar, $deskripsi, $takaran, $harga, $qty, $id);
$stmt->execute();

header('Location: ../a_produk.php')
?>