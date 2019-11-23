<?php

require "system/conn.php";

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: index.php');
} else if($_SESSION['user']['role'] != 1) {
    header('Location: produk.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">

    <title>Apotek | Tambah Produk</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container-fluid aqua-gradient">
        <div class="row">
            <div class="col-11 mx-auto bg-white">
                <h1 class="mt-5 text-center"><b>TAMBAH PRODUK</b></h1>
                <form action="system/tambahProduk.php" method="post" class="pt-5" enctype="multipart/form-data">
                    <div class="form-group mx-auto">
                        <input class="form-control my-3" type="text" placeholder="Nama Produk" name="nama_produk"
                            required>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="gambar">
                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                        </div>
                        <textarea class="form-control my-3" type="text" placeholder="Deskripsi" name="deskripsi"
                            required></textarea>
                        <input class="form-control my-3" type="text" placeholder="Takaran" name="takaran">
                        <input class="form-control my-3" type="number" placeholder="Harga" name="harga" required>
                        <input class="form-control my-3" type="number" placeholder="Kuantitas" name="qty" required>
                        <button class="btn btn-primary mx-auto mt-3 w-100" type="submit" name="tambah">TAMBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>

</html>