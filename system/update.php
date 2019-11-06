<?php 

require 'conn.php';

session_start();

$id = $_POST['update'];
$nama_produk = htmlspecialchars($_POST['nama_produk']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$takaran = htmlspecialchars($_POST['takaran']);
$harga = htmlspecialchars($_POST['harga']);
$qty = htmlspecialchars($_POST['qty']);

if( $harga < 0 || $qty < 0 ) {
    echo "<script> alert('Please enter a valid number'); document.location.href = '../tambah_produk.php' </script>";
    die;
}

$harga = implode(explode("e", implode(explode(".", $harga))));
$qty = implode(explode("e", implode(explode(".", $qty))));

$cur_gambar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM produk WHERE id = $id"));

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
        die;
    }

    unlink("../img/users/".$cur_gambar['gambar']);

    $stringGambar = random_str(16).".".$extGambar;
    move_uploaded_file($tmpName, '../img/'.$stringGambar);
}

$query = "UPDATE produk SET nama_produk = ?, gambar = ?, deskripsi = ?, takaran = ?, harga = ?, qty = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssii", $nama_produk, $stringGambar, $deskripsi, $takaran, $harga, $qty, $id);
$stmt->execute();

if(mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Product updated'); document.location.href = ../a_produk.php </script>";
} else {
    echo "<script> alert('Something went wrong'); document.location.href = ../a_produk.php </script>";
}
?>