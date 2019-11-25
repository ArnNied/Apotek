<?php

require '../conn.php';

session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../../index.php");
    die;
}

if(isset($_POST['cart'])) {
    $id = $_POST['cart'];

    $item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `produk` WHERE `id` = $id"));
    
    if($_POST['jumlah'] <= 0) {
        echo "<script> alert('Invalid input'); document.location.href = '../../produk.php';</script>";
        die;
    } else if($_POST['jumlah'] == "") {
        $_POST['jumlah'] = 1;
    }

    session_start();

    if(!isset($_SESSION['cart']['total'])) {
        $_SESSION['cart']['total']['harga'] = $item['harga'] * $_POST['jumlah'];
        $_SESSION['cart']['total']['qty'] = $_POST['jumlah'];
    } else {
        $_SESSION['cart']['total']['harga'] += $item['harga'] * $_POST['jumlah'];
        $_SESSION['cart']['total']['qty'] += $_POST['jumlah'];
    }
    
    if(!isset($_SESSION['cart']['item'][$item['id']])){
        $_SESSION['cart']['item'][$item['id']]['id'] = $item['id'];
        $_SESSION['cart']['item'][$item['id']]['gambar'] = $item['gambar'];
        $_SESSION['cart']['item'][$item['id']]['nama_produk'] = $item['nama_produk'];
        $_SESSION['cart']['item'][$item['id']]['harga'] = $item['harga'];
        $_SESSION['cart']['item'][$item['id']]['qty'] = $_POST['jumlah'];
        
    } else {
        $_SESSION['cart']['item'][$item['id']]['qty'] += $_POST['jumlah'];
    }
    $_SESSION['cart']['item'][$item['id']]['total'] = $_SESSION['cart']['item'][$item['id']]['harga'] * $_SESSION['cart']['item'][$item['id']]['qty'];

    if($_SESSION['cart']['item'][$item['id']]['qty'] > $item['qty']){
        echo "<script> alert('Item exceeded stock'); document.location.href = '../../produk.php'; </script>";
    } else {
        echo "<script> document.location.href = '../../produk.php'; </script>";
    }
} else {
    header("Location: ../../produk.php");
}



?>