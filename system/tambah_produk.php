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

$nama_produk = htmlspecialchars($_POST['nama_produk']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$takaran = htmlspecialchars($_POST['takaran']);
$harga = htmlspecialchars($_POST['harga']);
$qty = htmlspecialchars($_POST['qty']);

$namaGambar = $_FILES['gambar']['name'];
$error = $_FILES['gambar']['error'];
$tmpName = $_FILES['gambar']['tmp_name'];

if($error == 4) {
    echo "<script> alert('Pilih gambar terlebih dahulu'); document.location.href = '../a_produk.php' </script>";
}

$allowedExt = ['jpg', 'jpeg', 'png'];
$extGambar = explode(".", $namaGambar);
$extGambar = end($extGambar);

if(!in_array(strtolower($extGambar), $allowedExt)) {
    echo "<script> alert('Yang anda upload bukan gambar'); document.location.href = '../a_produk.php' </script>";
}

$stringGambar = random_str(16).".".$extGambar;
// var_dump($stringGambar); die;
move_uploaded_file($tmpName, '../img/produk/'.$stringGambar);

$query = "INSERT INTO produk (nama_produk, gambar, deskripsi, takaran, harga, qty) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssi", $nama_produk, $stringGambar, $deskripsi, $takaran, $harga, $qty);
$stmt->execute();
// mysqli_query($conn, $query);

var_dump(mysqli_affected_rows($conn)); die;
if(mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data berhasil ditambahkan'); document.location.href = '../a_produk.php' </script>";
} else {
    echo "<script> alert('Terjadi kesalahan'); document.location.href = '../a_produk.php' </script>";
}


?>