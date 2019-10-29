<?php

require 'conn.php';

// Accept value from page
$nama_produk = htmlspecialchars($_POST['nama_produk']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$takaran = htmlspecialchars($_POST['takaran']);
$harga = htmlspecialchars($_POST['harga']);
$qty = htmlspecialchars($_POST['qty']);

// Clears dot and characters
$hargaArray = implode(explode("e", implode(explode(".", $harga))));
$qtyArray = implode(explode("e", implode(explode(".", $qty))));

if( $harga < 0 || $qty < 0 ) {
    echo "<script> alert('Angka dibawah 0'); document.location.href = '../tambah_produk.php' </script>";
    die;
}

$hargaArray = str_split($harga);
$qtyArray = str_split($qty);

// Turns price into dotted version
$hargaDb = [];
for( $i = 0; $i < strlen($harga); $i++ ) {
    array_push($hargaDb, array_pop($hargaArray));
    if( $i % 3 == 2 ){
        array_push($hargaDb, ".");
    }
}
if( end($hargaDb) == "." ) {
    array_pop($hargaDb);
}
$hargaDb = implode(array_reverse($hargaDb));

// Image check
$namaGambar = $_FILES['gambar']['name'];
$error = $_FILES['gambar']['error'];
$tmpName = $_FILES['gambar']['tmp_name'];

if($error == 4) {
    echo "<script> alert('Please choose an image'); document.location.href = '../a_produk.php' </script>";
    die;
}

$allowedExt = ['jpg', 'jpeg', 'png', "jfif"];
$extGambar = explode(".", $namaGambar);
$extGambar = end($extGambar);

if(!in_array(strtolower($extGambar), $allowedExt)) {
    echo "<script> alert('Uploaded file is not an image'); document.location.href = '../a_produk.php' </script>";
}

$stringGambar = random_str(16).".".$extGambar;
// var_dump($stringGambar); die;
move_uploaded_file($tmpName, '../img/produk/'.$stringGambar);

// Insert to database
$query = "INSERT INTO produk (nama_produk, gambar, deskripsi, takaran, harga, qty) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssi", $nama_produk, $stringGambar, $deskripsi, $takaran, $hargaDb, $qty);
$stmt->execute();

if(mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data added'); document.location.href = '../a_produk.php' </script>";
} else {
    echo "<script> alert('Something went wrong'); document.location.href = '../a_produk.php' </script>";
}


?>