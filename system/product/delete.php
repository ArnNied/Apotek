<?php 

require '../conn.phpconn.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['role'] != 1) {
    header('Location: ../../produk.php');
    die;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // mysqli_query($conn, "DELETE FROM produk WHERE id = ?");
    // header('Location: ../a_produk.php');

    $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `gambar` FROM `produk` WHERE `id` = $id"));
    unlink("../img/produk/".$query['gambar']);

    $query = "DELETE FROM `produk` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: ../../produk.php');
} else {
    header("Location: ../../produk.php");
}
?>