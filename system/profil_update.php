<?php 

require 'conn.php';

$id = $_POST['update'];
$nama = htmlspecialchars($_POST['nama']);
$umur = htmlspecialchars($_POST['umur']);
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
$alamat = htmlspecialchars($_POST['alamat']);

if($umur <= 0) {
    echo "<script> alert('Please enter a valid age'); document.location.href = '../profil.php' </script>";
    die;
}

// $query = "SELECT gambar FROM users WHERE id = '$id'";
$cur_gambar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM users WHERE id = '$id'"));
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
        echo "<script> alert('Uploaded file is not an image'); document.location.href = '../profil.php' </script>";
    }

    $stringGambar = random_str(16).".".$extGambar;
    move_uploaded_file($tmpName, '../img/users/'.$stringGambar);
}

// $query = "UPDATE `produk` (`nama`, `umur`, `takaran`, `alamat`, `email`) SET ('$nama_produk', '$umur', '$takaran' '$alamat','$email') WHERE id = '$id'";
// mysqli_query($conn, $query);

$query = "UPDATE users SET nama = ?, umur = ?, jenis_kelamin = ?, alamat = ?, gambar = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sisssi", $nama, $umur, $jenis_kelamin, $alamat, $stringGambar, $id);
$stmt->execute();

header('Location: ../profil.php')
?>