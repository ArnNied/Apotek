<?php

require 'conn.php';

if(isset($_POST['cart'])) {
    $id = $_POST['cart'];

    $item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id = $id"));

    session_start();

    if(!isset($_SESSION['cart']['total'])) {
        $_SESSION['cart']['total']['harga'] = $item['harga'];
        $_SESSION['cart']['total']['qty'] = 1;
    } else {
        $_SESSION['cart']['total']['harga'] += $item['harga'];
        $_SESSION['cart']['total']['qty'] += 1;
    }
    
    if(!isset($_SESSION['cart']['item'][$item['id']])){
        $_SESSION['cart']['item'][$item['id']]['id'] = $item['id'];
        $_SESSION['cart']['item'][$item['id']]['gambar'] = $item['gambar'];
        $_SESSION['cart']['item'][$item['id']]['nama_produk'] = $item['nama_produk'];
        $_SESSION['cart']['item'][$item['id']]['harga'] = $item['harga'];
        $_SESSION['cart']['item'][$item['id']]['qty'] = 1;
        
    } else {
        $_SESSION['cart']['item'][$item['id']]['qty'] += 1;
    }
    $_SESSION['cart']['item'][$item['id']]['total'] = $_SESSION['cart']['item'][$item['id']]['harga'] * $_SESSION['cart']['item'][$item['id']]['qty'];

    if($_SESSION['cart']['item'][$item['id']]['qty'] > $item['qty']){
        $_SESSION['cart']['item'][$item['id']]['qty'] = $item['qty'];
        echo "<script>
        alert('Item exceeded stock');
        document.location.href = '../produk.php';
        </script>";
    } else {
        echo "<script>
        document.location.href = '../produk.php';
        </script>";
    }
} else {
    header("Location: ../produk.php");
}



?>