<?php

require '../conn.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header('Location: ../../produk.php');
    die;
}

if(isset($_POST['tambah'])) {
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $takaran = htmlspecialchars($_POST['takaran']);
    $harga = htmlspecialchars($_POST['harga']);
    $qty = htmlspecialchars($_POST['qty']);

    // Clears dot and characters
    $hargaArray = implode(explode("e", implode(explode(".", $harga))));
    $qtyArray = implode(explode("e", implode(explode(".", $qty))));

    if( $harga < 0 || $qty < 0 ) {
        echo "<script> alert('Value below 0!'); document.location.href = '../../tambah_produk.php' </script>";
        die;
    }

    // Image check
    $namaGambar = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error == 4) {
        echo "<script> alert('Please choose an image'); document.location.href = '../../produk.php' </script>";
        die;
    }

    $allowedExt = ['jpg', 'jpeg', 'png', "jfif"];
    $extGambar = end(explode(".", $namaGambar));

    if(!in_array(strtolower($extGambar), $allowedExt)) {
        echo "<script> alert('Uploaded file is not an image'); document.location.href = '../../produk.php' </script>";
        die;
    }

    $stringGambar = random_str(16).".".$extGambar;
    move_uploaded_file($tmpName, '../../img/produk/'.$stringGambar);

    // Insert to database
    $query = "INSERT INTO `produk` (`nama_produk`, `gambar`, `deskripsi`, `takaran`, `harga`, `qty`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $nama_produk, $stringGambar, $deskripsi, $takaran, $hargaDb, $qty);
    $stmt->execute();

    if(mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Data added'); document.location.href = '../../produk.php' </script>";
    } else {
        echo "<script> alert('Something went wrong'); document.location.href = '../../produk.php' </script>";
    }
} else {
    header("Location: ../../produk.php");
}

?>